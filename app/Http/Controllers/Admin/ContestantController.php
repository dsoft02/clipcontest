<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contestant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ContestantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        checkAndDisableVoting();
        $contestants = Contestant::all();
        return view('admin.contestants.index', compact('contestants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.contestants.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:contestants,name',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20480',
            'video_link' => 'nullable|url',
            'video_file' => 'nullable|mimes:mp4,mov,ogg,qt|max:50000',
        ]);

        $coverImagePath = $request->file('cover_image') ? $request->file('cover_image')->store('cover_images', 'public') : null;
        $videoFilePath = $request->file('video_file') ? $request->file('video_file')->store('videos', 'public') : null;

        Contestant::create([
            'name' => $request->name,
            'description' => $request->description,
            'cover_image' => $coverImagePath,
            'video_link' => $request->video_link,
            'video_file' => $videoFilePath,
        ]);
        return redirect()->route('contestants.index')->with('success', 'Contestant created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contestant = Contestant::findOrFail($id);
        return view('admin.contestants.show', compact('contestant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contestant = Contestant::findOrFail($id);
        return view('admin.contestants.edit', compact('contestant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $contestant = Contestant::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255|unique:contestants,name,' . $contestant->id,
            'description' => 'nullable|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video_link' => 'nullable|url',
            'video_file' => 'nullable|mimes:mp4,mov,ogg,qt|max:50000',
        ]);

        if ($request->hasFile('cover_image')) {
            // Delete the old cover image if a new one is uploaded
            if ($contestant->cover_image) {
                Storage::disk('public')->delete($contestant->cover_image);
            }
            $contestant->cover_image = $request->file('cover_image')->store('cover_images', 'public');
        }

        if ($request->hasFile('video_file')) {
            // Delete the old video file if a new one is uploaded
            if ($contestant->video_file) {
                Storage::disk('public')->delete($contestant->video_file);
            }
            $contestant->video_file = $request->file('video_file')->store('videos', 'public');
        }

        $contestant->update([
            'name' => $request->name,
            'description' => $request->description,
            'cover_image' => $contestant->cover_image ?? $request->cover_image,
            'video_link' => $request->video_link,
            'video_file' => $contestant->video_file ?? $request->video_file,
        ]);
        return redirect()->route('contestants.index')->with('success', 'Contestant updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contestant = Contestant::findOrFail($id);
        if ($contestant->cover_image) {
            Storage::disk('public')->delete($contestant->cover_image);
        }
        if ($contestant->video_file) {
            Storage::disk('public')->delete($contestant->video_file);
        }
        $contestant->delete();


        return redirect()->route('contestants.index')->with('success', 'Contestant deleted successfully!');
    }


    public function getContestant($id)
    {
        $contestant = Contestant::with('votes')->find($id);

        if (!$contestant) {
            return response()->json(['error' => 'Contestant not found'], 404);
        }

        $data = [
            'name' => $contestant->name,
            'description' => $contestant->description,
            'totalVotes' => $contestant->getTotalVotesCount(),
            'videoUrl' => $contestant->video_file ? url('storage/' . $contestant->video_file) : convertYoutubeLink($contestant->video_link),
            'coverImageUrl' => $contestant->cover_image ? url('storage/' . $contestant->cover_image) : null,
            'shareableLink' => route('contestants', ['contestantId' => $contestant->id]),
        ];

        return response()->json($data);
    }

    public function getContestants()
    {
        $contestants = Contestant::all()->map(function ($contestant) {
            return [
                'id' => $contestant->id,
                'name' => $contestant->name,
                'description' => $contestant->description,
                'totalVotes' => $contestant->getTotalVotesCount(),
                'videoUrl' => $contestant->video_file ? url('storage/' . $contestant->video_file) : convertYoutubeLink($contestant->video_link),
                'coverImageUrl' => $contestant->cover_image ? url('storage/' . $contestant->cover_image) : null,
                'shareableLink' => route('contestants', ['contestantId' => $contestant->id]),
            ];
        });

        return response()->json($contestants);
    }

    public function resetVotes(Request $request)
    {
        // Reset votes for all contestants
        DB::table('votes')->delete();

        return redirect()->route('votes.index')->with('success', 'All votes have been reset!');
    }

}

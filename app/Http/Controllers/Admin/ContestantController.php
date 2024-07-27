<?php
namespace App\Http\Controllers\Admin;

use App\Models\Contestant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video_link' => 'required|url|unique:contestants,video_link',
        ]);

        $coverImagePath = $request->file('cover_image') ? $request->file('cover_image')->store('cover_images', 'public') : null;

        Contestant::create([
            'name' => $request->name,
            'description' => $request->description,
            'cover_image' => $coverImagePath,
            'video_link' => $request->video_link,
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
            'video_link' => 'required|url|unique:contestants,video_link,' . $contestant->id,
        ]);

        if ($request->hasFile('cover_image')) {
            // Delete the old cover image if a new one is uploaded
            if ($contestant->cover_image) {
                Storage::disk('public')->delete($contestant->cover_image);
            }
            $contestant->cover_image = $request->file('cover_image')->store('cover_images', 'public');
        }

        $contestant->update([
            'name' => $request->name,
            'description' => $request->description,
            'cover_image' => $contestant->cover_image ?? $request->cover_image,
            'video_link' => $request->video_link,
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
            'videoUrl' => $contestant->video_link,
            'coverImageUrl' => $contestant->cover_image_url,
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
                'videoUrl' => $contestant->video_link,
                'coverImageUrl' => $contestant->cover_image_url,
                'shareableLink' => route('contestants', ['contestantId' => $contestant->id]),
                // Add any other properties you need
            ];
        });

        return response()->json($contestants);
    }
}

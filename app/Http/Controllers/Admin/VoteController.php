<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vote;
use Illuminate\Http\Request;
use App\Lib\ClientInfo;

class VoteController extends Controller
{
    public function index()
    {
        // Fetch the voting history sorted by date with the latest on top
        $votes = Vote::with('contestant')->orderBy('created_at', 'desc')->get();

        // Pass the voting history to the view
        return view('admin.voting.index', compact('votes'));
    }



    public function store(Request $request)
    {
        //Validate the request
        $request->validate([
            'contestant_id' => 'required|exists:contestants,id',
            'email' => 'required|email',
        ]);

        // // Get the IP address of the user
        $ipAddress = ClientInfo::ipInfo()['ip'];

        // Check if the user has already voted for any contestant
        $existingVote = Vote::where(function ($query) use ($request, $ipAddress) {
            $query->where('email', $request->email)
            ->orWhere('ip_address', $ipAddress);
        })->first();

        if ($existingVote) {
            return redirect()->route('contestants')->with('error', 'You are allowed to vote only once!');
        }

        // Create a new vote
        Vote::create([
            'contestant_id' => $request->contestant_id,
            'email' => $request->email,
            'ip_address' => $ipAddress,
        ]);

        return redirect()->route('contestants')->with('success', 'Thank you for voting!');
    }
}

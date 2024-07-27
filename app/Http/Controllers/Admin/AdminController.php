<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contestant;
use App\Models\Vote;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        checkAndDisableVoting();
        $data = [
            'totalContestants' => Contestant::count(),
            'totalVotes' => Vote::count(),
            'leaderboard' => Contestant::withCount('votes')
                ->orderBy('votes_count', 'desc')
                ->get(),
        ];

        return view("admin.dashboard", $data);
    }

    public function leaderboard()
    {
        $data = [
            'leaderboard' => Contestant::withCount('votes')
                ->orderBy('votes_count', 'desc')
                ->get(),
        ];

        return view("admin.leaderboard", $data);
    }
}

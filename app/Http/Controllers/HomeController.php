<?php
namespace App\Http\Controllers;

use App\Models\Contestant;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $winner;

    public function __construct()
    {
        $this->winner = getWinner();
    }

    public function index()
    {
        checkAndDisableVoting();

        $leaderboard = Contestant::withCount('votes')
        ->orderBy('votes_count', 'desc')
        ->get();

        return view('home', compact('leaderboard'))->with('winner', $this->winner);
    }

    public function winner()
    {
        if (!isDeclareWinnerEnabled()) {
            return redirect()->route('constestant');
        }
        return view('winner', ['winner' => $this->winner]);
    }

    public function leaderboard()
    {
        // Fetch all contestants with their votes count
        $leaderboard = Contestant::withCount('votes')
            ->orderBy('votes_count', 'desc')
            ->get();

        return view('leaderboard', compact('leaderboard'))->with('winner', $this->winner);
    }

    public function contestants($id = null)
    {
        checkAndDisableVoting();
        $contestants = Contestant::all();

        $leaderboard = Contestant::withCount('votes')
        ->orderBy('votes_count', 'desc')
        ->get();

        return view('contestantslist', compact('contestants', 'leaderboard','id'))->with('winner', $this->winner);
    }
}

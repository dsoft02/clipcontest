<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        checkAndDisableVoting();
        $settings = Setting::all();
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        // Handle file uploads if present
        $this->updateFile($request, 'light_logo');
        $this->updateFile($request, 'dark_logo');
        $this->updateFile($request, 'light_icon');
        $this->updateFile($request, 'dark_icon');
        $this->updateFile($request, 'favicon');

        // Update other settings
        $settings = $request->except('_token', 'light_logo', 'dark_logo', 'light_icon', 'dark_icon', 'favicon','save_changes');

        // If declare_winner is set, then set enable_voting to 0
        if ($request->has('declare_winner')) {
            $settings['enable_voting'] = 0;
        } else {
            // Ensure enable_voting is set to 0 if not present
            if (!$request->has('enable_voting')) {
                $settings['enable_voting'] = 0;
            }
            else{
                if ($request->has('voting_enddate') && strtotime($request->input('voting_enddate')) < time()) {
                    $settings['enable_voting'] = 0;
                }
            }
        }

        // Ensure declare_winner is set to 0 if not present
        if (!$request->has('declare_winner')) {
            $settings['declare_winner'] = 0;
        }

        foreach ($settings as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        return redirect()->route('settings.index')->with('success', 'Settings updated successfully.');
    }

    private function updateFile(Request $request, $key)
    {
        if ($request->hasFile($key)) {
            $filePath = $request->file($key)->store('settings', 'public');
            Setting::updateOrCreate(['key' => $key], ['value' => $filePath]);
        }
    }
}

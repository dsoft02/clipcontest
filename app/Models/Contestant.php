<?php

namespace App\Models;

use App\Models\Vote;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Contestant extends Model
{
    use HasFactory;

    protected $fillable = [
        'contest_id', 'name', 'description', 'cover_image', 'video_link'
    ];

    // Relationship with votes
    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    // Accessor for cover image
    public function getCoverImageUrlAttribute()
    {
        if ($this->cover_image && Storage::disk('public')->exists($this->cover_image)) {
            return Storage::url($this->cover_image);
        } else {
            return asset('assets/images/contest-banner.jpg');
        }
    }

    // Method to get the total votes count
    public function getTotalVotesCount()
    {
        return $this->votes()->count();
    }
}

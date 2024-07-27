<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = ['email', 'ip_address', 'contestant_id', 'created_at'];

    public function contestant()
    {
        return $this->belongsTo(Contestant::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProgram extends Model
{
    use HasFactory;
    protected $fillable = [
        'program_id',
        'user_id',
    ];
    public function programs()
    {
        return $this->belongsTo(Program::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Satpam extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'foto', 'nik', 'nama', 'alamat', 'no_hp', 'pos_jaga', 'status', 'shift'
    ];
}

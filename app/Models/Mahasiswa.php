<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mahasiswa extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = ['id'];
    public function profiles()
    {
        return $this->hasOne(Profile::class, 'mahasiswa_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'list_id',
        'name',
        'email',
        'address',
        'phone',
    ];

    protected $table = 'contacts';

}

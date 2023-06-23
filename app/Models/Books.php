<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    protected $fillable = [
<<<<<<< HEAD
        'name', 'isbn', 'value'
=======
       'name', 'isbn', 'value'
>>>>>>> 749ab31b6ca1d396166df09b0d0bd4efad81f88d
    ];
}

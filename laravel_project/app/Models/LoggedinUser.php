<?php
//this could go if dont work 2/4, 3 and 4 being useredit and userindex
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoggedinUser extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'email',
        'password',
    ];
}


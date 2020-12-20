<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    protected $fillable =[
        'name', 'email', 'phone','address','photo'];
    use HasFactory;
}

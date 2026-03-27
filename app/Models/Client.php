<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'Client';

    /**
     * @var array<int, string>
     */
    
    protected $fillable = [
        'name',
        'email',
        'status',
    ];

    protected $hidden = [
        'remember_token',
    ];
    
}
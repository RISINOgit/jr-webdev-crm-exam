<?php

namespace App\Repositories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Collection;

class ClientRepository
{
    public function __construct()
    {
    }

    public function getAll(): Collection
    {
        return Client::all();
    }

    /**
     * Q1 get all users whose status is 'active'
     */
    // This method is not used because it is replaced by getStatus which is more flexible
    public function getActive()
    {
        return Client::where('status', 'active')
                    ->orderBy('created_at', 'desc') 
                    ->get();
    }
    public function getStatus($status)
    {
        return Client::where('status', $status)
                    ->orderBy('created_at', 'desc') 
                    ->get();
    }
    
    public function create(array $data): Client
    {
        return Client::create($data);
    }
}

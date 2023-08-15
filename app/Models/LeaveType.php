<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveType extends Model
{
    use HasFactory;
    protected $table = 'leave-types'; // Define the correct table name

    protected $fillable=[
        'name','Description'
    ];

    public function employees()
    {
        return $this->hasMany(employee::class);
    }

    public function leaveRequests()
{
    return $this->hasMany(LeaveRequest::class);
}
}

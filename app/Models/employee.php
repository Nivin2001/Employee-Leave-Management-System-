<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Illuminate\Contracts\Auth\Authenticatable;

class employee extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'address', 'career'];

    public function leaveType()
    {
        return $this->belongsTo(LeaveType::class);
    }

    public function leaveRequests()
{
    return $this->hasMany(LeaveRequest::class);
}


}

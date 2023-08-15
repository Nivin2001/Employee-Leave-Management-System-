<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;
    protected $fillable=[
        'name','email','addrees','career'
    ];

    public function leaveType()
    {
        return $this->belongsTo(LeaveType::class);
    }

    public function leaveRequests()
{
    return $this->hasMany(LeaveRequest::class);
}


}

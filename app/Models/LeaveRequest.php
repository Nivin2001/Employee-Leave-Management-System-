<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveRequest extends Model
{
    use HasFactory;

    protected $fillable=[
    'employee_id' ,'leave_type_id', 'start_date','end_date','status','approval_reason'

    ];

    public function employee()
{
    return $this->belongsTo(Employee::class);
}

public function leaveType()
{
    return $this->belongsTo(LeaveType::class);
}

public function isApproved()
{
    return $this->status === 'approved';
}

}

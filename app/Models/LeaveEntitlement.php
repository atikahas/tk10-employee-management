<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class LeaveEntitlement extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'leave_entitlement';
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];
}

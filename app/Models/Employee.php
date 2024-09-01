<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_id',
        'position_id',
        'first_name',
        'last_name',
        'middle_name',
        'email',
        'phone',
        'hire_date',
        'termination_date',
        'is_active',
        'sed_praktika_access',
        'ep_access',
        'rutoken_issued',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }
}
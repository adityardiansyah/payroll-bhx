<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    protected $fillable = ['employee_id','periode','total_basic_salary', 'total_allowance', 'total_overtime', 'total_bpjs', 'total_nwnp', 'total_accepted','is_verified'];

    /**
     * Get the employee that owns the Payroll
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}

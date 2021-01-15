<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeContact extends Model
{
    protected $primaryKey = 'contact_id';
    
    // set fillable properties
    protected $fillable = [
        'emp_id',
        'contact_number',
        'address'
    ];

    // one to many relationship between employee and employeeContact
    public function employee() {
        return $this->belongsTo('App\Employee');
    }
}

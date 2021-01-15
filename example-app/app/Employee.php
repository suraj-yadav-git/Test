<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $primaryKey = 'emp_id';
    
    // set fillable properties
    protected $fillable = [
        'department_id',
        'emp_name'
    ];

    // one to many relationship between department and employee
    public function department() {
        return $this->belongsTo('App\Department');
    }

    // one to many relationship between employee and employeeContact
    public function empContact() {
        return $this->hasMany('App\EmployeeContact');
    }
}

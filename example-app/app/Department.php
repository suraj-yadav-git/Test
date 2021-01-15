<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $primaryKey = 'department_id';

    // set fillable properties
    protected $fillable = [
        'department_name'
    ];

    // one to many relationship between department and employee
    public function employee() {
        return $this->hasMany('App\Employee');
    }
}

------------------------------------------------------  Routes ------------------------------------------------------------

+--------+-----------+------------------------------+--------------------+---------------------------------------------------+------------+
| Domain | Method    | URI                          | Name               | Action                                            | Middleware |
+--------+-----------+------------------------------+--------------------+---------------------------------------------------+------------+
|        | GET|HEAD  | /                            |                    | Closure                                           | web        |
|        | GET|HEAD  | api/user                     |                    | Closure                                           | api        |
|        |           |                              |                    |                                                   | auth:api   |
|        | POST      | contacts                     | contacts.store     | App\Http\Controllers\ContactsController@store     | web        |
|        | GET|HEAD  | contacts                     | contacts.index     | App\Http\Controllers\ContactsController@index     | web        |
|        | GET|HEAD  | contacts/create              | contacts.create    | App\Http\Controllers\ContactsController@create    | web        |
|        | PUT|PATCH | contacts/{contact}           | contacts.update    | App\Http\Controllers\ContactsController@update    | web        |
|        | GET|HEAD  | contacts/{contact}           | contacts.show      | App\Http\Controllers\ContactsController@show      | web        |
|        | DELETE    | contacts/{contact}           | contacts.destroy   | App\Http\Controllers\ContactsController@destroy   | web        |
|        | GET|HEAD  | contacts/{contact}/edit      | contacts.edit      | App\Http\Controllers\ContactsController@edit      | web        |
|        | GET|HEAD  | department                   | department.index   | App\Http\Controllers\DepartmentController@index   | web        |
|        | POST      | department                   | department.store   | App\Http\Controllers\DepartmentController@store   | web        |
|        | GET|HEAD  | department/create            | department.create  | App\Http\Controllers\DepartmentController@create  | web        |
|        | PUT|PATCH | department/{department}      | department.update  | App\Http\Controllers\DepartmentController@update  | web        |
|        | DELETE    | department/{department}      | department.destroy | App\Http\Controllers\DepartmentController@destroy | web        |
|        | GET|HEAD  | department/{department}      | department.show    | App\Http\Controllers\DepartmentController@show    | web        |
|        | GET|HEAD  | department/{department}/edit | department.edit    | App\Http\Controllers\DepartmentController@edit    | web        |
|        | GET|HEAD  | employee                     | employee.index     | App\Http\Controllers\EmpController@index          | web        |
|        | POST      | employee                     | employee.store     | App\Http\Controllers\EmpController@store          | web        |
|        | GET|HEAD  | employee/create              | employee.create    | App\Http\Controllers\EmpController@create         | web        |
|        | GET|HEAD  | employee/{employee}          | employee.show      | App\Http\Controllers\EmpController@show           | web        |
|        | PUT|PATCH | employee/{employee}          | employee.update    | App\Http\Controllers\EmpController@update         | web        |
|        | DELETE    | employee/{employee}          | employee.destroy   | App\Http\Controllers\EmpController@destroy        | web        |
|        | GET|HEAD  | employee/{employee}/edit     | employee.edit      | App\Http\Controllers\EmpController@edit           | web        |
|        | GET|HEAD  | token                        |                    | Closure                                           | web        |
+--------+-----------+------------------------------+--------------------+---------------------------------------------------+------------+


---------------------------------------------------------- Setup ----------------------------------------------------------

step 1: > clone repo

git clone git@github.com:suraj-yadav-git/Test.git

step 2: > go to example app dricetory

cd Test/example-app/

step 3: > run all the migrations

php artisan migrate

step 4: > go to your mysql and insert some test data in newly created tables 

departments
employees
employee_contacts

step 5: >  check all the available routes

php artisan route:list

step 6: > run laravel web server

php artisan serve


------------------------------------------------------- REST API Details ------------------------------------------------------

Employee data :

> Read all employees data

api: /employee
method: get

header:
	Accept : application/json
	X-CSRF-TOKEN : <csrf_token>  (use this get api for csrf token --> /token)

> Read employee data for employee id {id}

api: /employee/{id}
method: get

header:
	Accept : application/json
	X-CSRF-TOKEN : <csrf_token>  (use this get api for csrf token --> /token)

> Insert new employee record 

api: /employee
method: post

header:
	Accept : application/json
	X-CSRF-TOKEN : <csrf_token>  (use this get api for csrf token --> /token)

body:
	 {
        "department_id": 3,
        "emp_name": "quang thoi"
    }


> Update employee record 

api: /employee/{id}
method: put

header:
	Accept : application/json
	X-CSRF-TOKEN : <csrf_token>  (use this get api for csrf token --> /token)

body:
	 {
        "department_id": 3,
        "emp_name": "quang thoi"
    }


> Delete employee record

api: /employee/{id}
method: delete

header:
	Accept : application/json
	X-CSRF-TOKEN : <csrf_token>  (use this get api for csrf token --> /token)


Similar api call for departments and exmployee contact details :
departments api : /department
employee contact api : /contact

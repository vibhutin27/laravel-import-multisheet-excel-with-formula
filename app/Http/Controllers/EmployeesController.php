<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employees;

class EmployeesController extends Controller
{
    //
    /* Create two methods –

        index() – Load employee_data view.
        getUsers() – This method is call from $.ajax request in jQuery.
        If $id value equals to 0 then select all records from employees table otherwise select record by id from employees table.

        Assign fetched records to $userdata['data']. Return $userdata Array in JSON format. */

    public function index(){
        return view('employee_data');
     }

     public function getUsers($id = 0){

        if($id==0){ 
           $employees = Employees::orderby('id','asc')->select('*')->get(); 
        }else{   
           $employees = Employees::select('*')->where('id', $id)->get(); 
        }
        // Fetch all records
        $userData['data'] = $employees;
   
        echo json_encode($userData);
        exit;
     }
}

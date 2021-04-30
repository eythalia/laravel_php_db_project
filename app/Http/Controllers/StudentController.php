<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;

class StudentController extends Controller
{
    public function index(){
    	$student2=Students::all();

    	return view('welcome',compact('student2'));
    }


    public function create(){
    	return view('create');
    }

    public function store(Request $request){
    	$this->validate($request,[ 
    		'firstname'=>'required',
    		'lastname'=>'required',
    		'email'=>'required',
    		'telephone'=>'required'

    	]);


    	$student=new Students; //requires a use above everything in thissection of code(notsure)

    	$student->first_name=$request->firstname;
    	$student->last_name=$request->lastname;
    	$student->email=$request->email;
    	$student->phone=$request->telephone;

    	$student->save();

    	return redirect(route('home'))->with('successMsg','Record Added!!');


    }


   public function edit($id){

   	$student= Students::find($id);
   	return view('edit',compact('student'));

   }


   public function update(Request $request, $id){

   	$this->validate($request,[ 
    		'firstname'=>'required',
    		'lastname'=>'required',
    		'email'=>'required',
    		'telephone'=>'required'

    	]);


    	$student=Students::find($id); //requires a use above everything in thissection of code(notsure)

    	$student->first_name=$request->firstname;
    	$student->last_name=$request->lastname;
    	$student->email=$request->email;
    	$student->phone=$request->telephone;

    	$student->save();

    	return redirect(route('home'))->with('successMsg','Record Updated!!');

   }

   public function delete($id){

   		Students::find($id)->delete();
   		return redirect(route('home'))->with('successMsg','Record Deleted!!');

   }

}

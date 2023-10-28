<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Employee::all();
        // return view('employees.index', [
        //     'employees' => Employee::latest()->paginate(3)
        // ]);
        // $employees=Employee::all();
        // return view('employees.index', ['employees' =>$employees]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeStoreRequest $request)
    {
        $request->validated($request->all());
        $img_file = $request->file('emp_photo');
        $extension = $img_file->extension();
        $name =  $img_file->hashName();
            $filename = $name;
        // $filename = md5(time()) . '.' . $extension;
        $path = $img_file->storeAs('public/profile', $filename);
        $stored = Employee::create([
            'emp_name' => $request->emp_name,
            'emp_phno' => $request->emp_phno,
            'emp_email' => $request->emp_email,
            'emp_dob' => $request->emp_dob,
            'emp_address' => $request->emp_address,
            'emp_designation' => $request->emp_designation,
            'emp_doj' => $request->emp_doj,
            'emp_photo' => $filename,
        ]);
        //dd($request,$path,$store);
        if($stored){
            session()->flash('status', 'New Employee Added successfully!');
        }else{
            session()->flash('error', 'New Employee Added successfully!');
        }
        
        return redirect('/manageemployees');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $emp_id)
    {
        dd($emp_id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($emp_id)
    {
        // dd($emp_id);
        $editdata = Employee::where('emp_id', $emp_id)->get();
        session()->flash('editdata', $editdata);
        return redirect()->bacK();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //  dd($request->all());
        $request->validate([
            'emp_photo' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);
        if ($request->hasfile('emp_photo')) {
            $img_file = $request->file('emp_photo');
            $extension = $img_file->extension();
            // dd($extension);
            $name =  $img_file->hashName();
            $filename = $name;
            $path = $img_file->storeAs('public/profile', $filename);
            $file = $filename;
            Storage::delete($request->prev_image);
        } else {
            $file = $request->prev_image;
        }
        $updated = Employee::where('emp_id', $request->emp_id)->update([
            'emp_name' => $request->emp_name,
            'emp_phno' => $request->emp_phno,
            'emp_email' => $request->emp_email,
            'emp_dob' => $request->emp_dob,
            'emp_address' => $request->emp_address,
            'emp_designation' => $request->emp_designation,
            'emp_doj' => $request->emp_doj,
            'emp_photo' => $file,
        ]);
        if ($updated) {
            session()->flash('status', 'Updation successful!');
        } else {
            session()->flash('error', 'Updation Failed!');
        }

        return redirect('/manageemployees');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($emp_id)
    {
        // dd($emp_id);
        $deleted = Employee::where('emp_id', $emp_id)->delete();
        //dd($deleted);
        if (!$deleted) {
            session()->flash('status', 'Employee Details is deleted successfully');
        } else {
            session()->flash('status', 'Delete Operation Failed');
        }

        return redirect('/manageemployees');
    }
}

<?php

namespace App\Http\Controllers;

use App\Employee;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeesController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $employees = Employee::latest()->get();
        return view('employees.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,[
           'name' => 'required|max:255',
           'email' => 'required|unique:employees|max:255',
           'nid_no' => 'required|unique:employees|max:255',
           'address' => 'required',
           'phone' => 'required|max:13',
           'photo' => 'required',
           'salary' => 'required',
       ]);
        $data = array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['experience']=$request->experience;
        $data['nid_no']=$request->nid_no;
        $data['salary']=$request->salary;
        $data['vacation']=$request->vacation;
        $data['city']=$request->city;
//        image insert
        $image=$request->file('photo');
        if ($image) {
            $image_name= str_random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/employee/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['photo']=$image_url;
                $employee=DB::table('employees')
                    ->insert($data);
                if ($employee) {

                    Toastr::success('Employee Successfully Saved :)' ,'Success');
                    return Redirect()->back();
                }else{
                    $notification=array(
                        'messege'=>'error ',
                        'alert-type'=>'success'
                    );
                    return Redirect()->back()->with($notification);
                }

            }else{

                return Redirect()->back();

            }
        }else{
            return Redirect()->back();
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $show = Employee::find($id);
       return view('employees.show',compact('show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Employee::find($id);
        return view('employees.edit',compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'nid_no' => 'required|max:255',
            'address' => 'required',
            'phone' => 'required|max:13',

            'salary' => 'required',
        ]);

        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['experience']=$request->experience;
        $data['nid_no']=$request->nid_no;
        $data['salary']=$request->salary;
        $data['vacation']=$request->vacation;
        $data['city']=$request->city;

//        image Update
        $image=$request->photo;
        if ($image) {
            $image_name=str_random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/employee/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['photo']=$image_url;
                $img=DB::table('employees')->where('id',$id)->first();
                $image_path = $img->photo;
                $done=unlink($image_path);
                $user=DB::table('employees')->where('id',$id)->update($data);
                if ($user) {
                    Toastr::success('Employee Successfully Updated :)' ,'Success');
                    return Redirect()->route('employee.index');
                }else{
                    return Redirect()->back();
                }
            }
        }else{
            $oldphoto=$request->old_photo;
            if ($oldphoto) {
                $data['photo']=$oldphoto;
                $user=DB::table('employees')->where('id',$id)->update($data);
                if ($user) {
                    $notification=array(
                        'messege'=>'Employee Update Successfully',
                        'alert-type'=>'success'
                    );
                    return Redirect()->route('all.employee')->with($notification);
                }else{
                    return Redirect()->back();
                }
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $delete=DB::table('employees')
            ->where('id',$id)
            ->first();
        $photo=$delete->photo;
        unlink($photo);
        $dltuser=DB::table('employees')
            ->where('id',$id)
            ->delete();
        Toastr::success('Employee Successfully deleted :)' ,'Success');
        return redirect()->back();

    }
}

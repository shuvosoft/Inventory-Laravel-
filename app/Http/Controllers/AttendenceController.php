<?php

namespace App\Http\Controllers;

use App\Attendence;
use App\Employee;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendenceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function TakeAttendance(){
        $employee = Employee::all();
        return view('attendance.take-attendance',compact('employee'));
    }

    public function InsertAttendance(Request $request){

        $date=$request->att_date;
        $att_date=DB::table('attendences')->where('att_date',$date)->first();
        if ($att_date) {

            Toastr::error(' Today Attendance Already Taken' ,'error');
            return Redirect()->back();
        }else{

            foreach ($request->user_id as $id) {
                $data[]=[
                    "user_id"=>$id,
                    "attendence"=>$request->attendence[$id],
                    "att_date" =>$request->att_date,
                    "att_year" =>$request->att_year,
                    "month" =>$request->month,
                    "edit_date" =>date("d_m_y")

                ];
            }
            $att=DB::table('attendences')->insert($data);
            if ($att) {

                Toastr::success('Successfully Attendence Taken :)' ,'Success');
                return Redirect()->back();
            }else{
                $notification=array(
                    'messege'=>'error ',
                    'alert-type'=>'success'
                );
                return Redirect()->back()->with($notification);
            }
        }
    }

    public function AllAttndance()
    {
        $all_att=DB::table('attendences')->select('edit_date')->groupBy('edit_date')->get();
        return view('attendance.all_attendence', compact('all_att'));
    }
    public function EditAttednece($edit_date){
//        $data = DB::table('attendences')->join('employees','attendences.user_id','employees.id')
//            ->select('employees.name','employees.photo','attendences.*')
//            ->where('edit_date',$edit_date)
//            ->get();
//        return view('attendance.edit_attendence', compact('data'));
        $date=DB::table('attendences')->where('edit_date',$edit_date)->first();

        $data=DB::table('attendences')->join('employees','attendences.user_id','employees.id')->select('employees.name','employees.photo','attendences.*')->where('edit_date',$edit_date)->get();
        return view('attendance.edit_attendence', compact('data','date'));



    }

    public function UpdateAttendence(Request $request)
    {

        foreach ($request->id as $id) {
            $data=[
                "attendence"=>$request->attendence[$id],
                "att_date" =>$request->att_date,
                "att_year" =>$request->att_year,
                "month" =>$request->month
            ];

            $attendence= Attendence::where(['att_date' =>$request->att_date, 'id'=>$id])->first();
            $attendence->update($data);
        }
        if ($attendence) {
            $notification=array(
                'messege'=>'Successfully Attendence Updated ',
                'alert-type'=>'success'
            );
            return Redirect()->route('all.attendence')->with($notification);
        }else{
            $notification=array(
                'messege'=>'error ',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }

    }

    public function ViewAttednece($edit_date)
    {

        $date=DB::table('attendences')->where('edit_date',$edit_date)->first();
        $data=DB::table('attendences')->join('employees','attendences.user_id','employees.id')->select('employees.name','employees.photo','attendences.*')->where('edit_date',$edit_date)->get();
        return view('attendance.view_attendence', compact('data','date'));
    }


}

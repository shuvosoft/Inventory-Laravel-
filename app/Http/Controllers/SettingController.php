<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function Setting()
    {

        $setting=DB::table('settings')->first();
        return view('settings.setting', compact('setting'));
    }

    public function UpdateWebsite(Request $request, $id)
    {
        $validatedData = $request->validate([
            'company_name' => 'required|max:255',
            'company_address' => 'required|max:255',
            'company_email' => 'required|max:255',
            'company_mobile' => 'required',
            'company_city' => 'required|max:30',
            'company_country' => 'required',
            'company_phone' => 'required',
        ]);

        $data=array();
        $data['company_name']=$request->company_name;
        $data['company_address']=$request->company_address;
        $data['company_email']=$request->company_email;
        $data['company_mobile']=$request->company_mobile;
        $data['company_city']=$request->company_city;
        $data['company_country']=$request->company_country;
        $data['company_phone']=$request->company_phone;
        $data['company_zipcode']=$request->company_zipcode;
        $image=$request->company_logo;

        if ($image) {
            $image_name=str_random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/company/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['company_logo']=$image_url;
                $img=DB::table('settings')->where('id',$id)->first();
                $image_path = $img->company_logo;
                $done=unlink($image_path);
                $company=DB::table('settings')->where('id',$id)->update($data);
                if ($company) {
                    $notification=array(
                        'messege'=>'Information Update Successfully',
                        'alert-type'=>'success'
                    );
                    return Redirect()->back()->with($notification);
                }else{
                    return Redirect()->back();
                }
            }
        }else{
            $oldphoto=$request->old_photo;
            if ($oldphoto) {
                $data['company_logo']=$oldphoto;
                $comp=DB::table('settings')->where('id',$id)->update($data);
                if ($comp) {
                    $notification=array(
                        'messege'=>'Information Update Successfully',
                        'alert-type'=>'success'
                    );
                    return Redirect()->back()->with($notification);
                }else{
                    return Redirect()->back();
                }
            }
        }

        //end update company logo
    }
}

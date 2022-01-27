<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class Admin extends Controller
{
    public function postadmin(Request $req)//it should be in camel case
    {
        $validateData=$req->validate([
            'email'=>'required',
            'password'=>'required '
        ]);
        if($validateData)
        {
           
            $email=$req->email;
            $password=$req->password;   
            $user=User::where('email',$email)->first();
            if($user)
            {
                if(Hash::check($req->password,$user->password))
                {
                    $req->session()->put('sid',$email);
                    return redirect('dashboard');
                }
                else
                {
                    return back()->with('errMesg',"Login Error Occurs");
                }
        

                
            }
            else
            {
                return back()->with('errMesg',"Email or Password is Incorrect");
            }
        }
    }

    public function dashboard()
    {
        $user = session('sid');
        $result=DB::select(DB::raw("SELECT COUNT(*) as total_asset,asset_type FROM assets GROUP BY asset_type"));
        $chartdata="";
        foreach($result as $list){
            $chartdata.="['".$list->asset_type."',   ".$list->total_asset."],";

        }
        $arr['chartData']=rtrim($chartdata,",");
    
        //naming convention
        $result1=DB::select(DB::raw("SELECT count(*) as activestatus,is_active FROM assets GROUP BY is_active"));
        $chartdata1="";
        foreach($result1 as $list){
            $chartdata1="['".$list->is_active."',   ".$list->activestatus."],";

        }
        $arr1['chartDataa']=rtrim($chartdata1,",");
        return view('admin.dashboard.dashboard',compact('user'),$arr,$arr1);
    }
    public function logout()
    {
        session()->forget('sid');
        return redirect('/');
    }
}

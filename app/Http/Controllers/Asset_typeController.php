<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\asset_type;

class Asset_typeController extends Controller //dont use _ 
{
    public function addassettype() //recourses controller
    {
        $user=session('sid');
        return view('admin.dashboard.addassettype',compact('user'));
        // return view('admin.dashboard.add-assettype');
    }
    public function postassettype(Request $req)
    {
        $validateData=$req->validate([
            'asset_type'=>'required',
            'asset_description'=>'max:500'
        ],[
            'asset_type.required'=>'Asset Type Required',
            'asset_description.required'=>'Asset Description Required'
        ]);
        if($validateData)
        {
            $asset_type=$req->asset_type;
            $asset_description=$req->asset_description;

            $assettype=new asset_type();
            $assettype->asset_type=$asset_type;
            $assettype->asset_description=$asset_description;
            if($assettype->save())
            {
                return back()->with('success','Asset-type Added!!');
            }
            else {
                
                return back()->with('errMsg','Data not Added');
            }

        }
        else {
            
            return back()->with('errMsg','Uploading Error');
        }
    }
    public function listassettype()
    {
        $asset_types=asset_type::paginate(3);
        return view('admin.dashboard.listassettype',['asset_types'=>$asset_types]);
    }
    public function editassettype($id)
    {
        $user = session('sid');
        $editassettype=asset_type::where('id',$id)->first();
        return view('admin.dashboard.editassettype',compact('user','editassettype'));
    }
    public function posteditassetType(Request $req){
        $validateData = $req->validate([
            'asset_type'=>'required',
            'asset_description'=>'max:500'
        ],[
            'asset_type.required' => "Asset type is required !",
            'asset_description.max' => "Asset description must be maximum 500 characters. "
        ]);
        if($validateData){
            $asset_type = $req->asset_type;
            $asset_description = $req->asset_description;
            asset_type::where('id',$req->id)->update([
                'asset_type'=>$asset_type,
                'asset_description'=>$asset_description
            ]);
            return back();
        }
    }
    public function deleteassetstype(Request $req){
        asset_type::where('id',$req->aid)->delete();
        return back();
    } 
}

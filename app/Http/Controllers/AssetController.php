<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\asset_type;
use App\Models\asset;
use App\Models\asset_image;

class AssetController extends Controller
{   //always put coment on what this function use
    public function addasset()
    {
        $user = session('sid');
        $assets=asset_type::all();
        return view('admin.dashboard.addasset',compact('user','assets'));
    }
    public function postaddasset(Request $req)
    {
        $validateData=$req->validate([
            'asset_name'=>'required',
            'asset_type'=>'required',
            'is_active'=>'required',
        ]);
        if($validateData)
        {
            $asset_name=$req->asset_name;
            $asset_code=random_int(1000000000000000,9999999999999999);
            $asset_type=$req->asset_type;
            $is_active=$req->is_active;


            
                //how to insert multiple queries
                $asset=New asset();
                $asset->asset_name=$asset_name;
                $asset->asset_code=$asset_code;
                $asset->asset_type=$asset_type;
                $asset->is_active=$is_active;
                if($asset->save())
                {
                    if($files=$req->file('asset_image')){
                        $ass_type=asset::latest()->first();
                        foreach($files as $file):
                            $ass = new asset_image();
                            $filename=$file->getClientOriginalName();
                            echo $filename;
                            $ass->asset_image=$filename;
                            $ass->asset_id=$ass_type->id;
                            $dest=public_path("/assetimages");
                            if($file->move($dest,$filename))
                            {
                                    $ass->save();
                                    // return back()->with('success','Asset Added!!');
                                    
                            }
                            else
                            {
                                // return back()->with('errMesg','Asset-type Added!!');
                            }

                            
                        endforeach;
                    }
                    else
                    {
                    return back()->with("errMesg","Asset Image Error");

                    }
                   
                    
                }
                else
                {
                    return back()->with("errMesg","Asset Saving error");
                }

        }
    }
    public function assetlist()
    {
        $assets=asset::paginate(2);
        return view('admin.dashboard.assetlist',['assets'=>$assets]);
    }
    public function deleteasset(Request $req){
        asset::where('id',$req->aid)->delete();
        return back();
    }
    public function editAsset($id){
        //return $req->eid;
        $user = session('sid');
        $assets=asset::where('id',$id)->first();
        $selectedtype=asset_type::where('id',$assets->asset_type)->first();
        $types = asset_type::all();
        return view('admin.dashboard.editasset',compact('assets','types','user','selectedtype'));
    }
    public function posteditasset(Request $req){
        $assetcode = $req->assetcode;
        $assetid=$req->assetid;

        asset::where('id',$assetid)->update(['asset_name'=>$req->assetname,'asset_code'=>$assetcode,'asset_type'=>$req->assettype,'IsActive'=>$req->isactive]);
        return back()->with('success',"Details Added !");
    }
}

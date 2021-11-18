<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Uploadimage;
use App\Http\Resources\Uploadimage as UploadimageResource;
use DB;

class UploadimageController extends Controller
{
    public function index() {
       $uploadimages = Uploadimage::orderBy('created_at','desc')->get();
       return UploadimageResource::collection($uploadimages);
    }

    public function upload(Request $request) {
        if($request->input('upload')) {
           $image = $request->input('upload');
           $name = $request->input('name');
           \Image::make($request->input('upload'))->save(public_path('images/builder/upload_images/').$name);
           $uploadimage = $request->isMethod('put') ? uploadimage::findOrFail
           ($request->uploadimage_id) : new uploadimage;
           $uploadimage->id = $request->input('uploadimage_id');
           $uploadimage->name = $request->input('name');
           if($uploadimage->save()){
            return new UploadimageResource($uploadimage);
            }
         }
    }

    public function store(Request $request) {
        $uploadimage = $request->isMethod('put') ? uploadimage::findOrFail
        ($request->member_id) : new uploadimage;

        $uploadimage->id = $request->input('member_id');
        $uploadimage->admin_id = $request->input('admin_id');
        if($request->input('icon_upload'))
        {
           $image = $request->input('icon_upload');
           $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
           \Image::make($request->input('icon_upload'))->save(public_path('images/').$name);
           $uploadimage->icon = $name;
         }
         else {
            $uploadimage->icon = $request->input('icon');
         }
        if($uploadimage->save()){
            return new MemberResource($uploadimage);
        }
    }

    public function destroy($id) {
        $uploadimage = uploadimage::findOrFail($id); 
        if($appointment->delete()){
            return new UploadimageResource($uploadimage);
        }
    }
}

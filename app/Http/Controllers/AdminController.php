<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Admin;

class AdminController extends Controller
{
    public function admin(Request $request)
    {
        Log::debug($request->all());
        $validator = Validator::make($request->all(), [
            'title' => 'required|between:0,50',
            'price' => 'required|max:10',
            'description' => 'required|between:1,50',
            'image' => 'required|between:1,100'
        ]);

        if ($validator->fails()) {
            return response()->json(array(
                "status" => false,
                "errors" => $validator->errors()
            ), 400);
        }
            Admin::create(array_merge(
            $validator->validated(),
        ));
    }
    
    public function image (){
        $input_name = 'file';
        $url_path = '/uploads/';
        $tmp_path = $_SERVER['DOCUMENT_ROOT'] . $url_path;
        $files =[];
        $diff = count($_FILES[$input_name]) - count($_FILES[$input_name], COUNT_RECURSIVE);
        if ($diff == 0) {
            $files = array($_FILES[$input_name]);
        } else {
            foreach($_FILES[$input_name] as $k => $l) {
                foreach($l as $i => $v) {
                    $files[$i][$k] = $v;
                }
            }		
        }	
        foreach ($files as $file) {
            $info = @getimagesize($file['tmp_name']);
            $name  = $_FILES[$input_name]['name'];
            $src   = $tmp_path . $name ;
            $thumb = $tmp_path . $name . '-thumb';
            if (move_uploaded_file($file['tmp_name'], $src)) {
                switch ($info[2]) {
                    case 2: imageJpeg( $thumb, 100); break;			
                }
            }
        }
    }   
    
}
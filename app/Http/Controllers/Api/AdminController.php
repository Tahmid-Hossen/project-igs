<?php

namespace App\Http\Controllers\Api;
use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\Message;
use Exception;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function createPost(){
        return "tahmid";
    }
    public function storePost(Request $request){
        try{

            $post = new Post();
            $post->title = $request->title;
            $post->description = $request->description;
            $post->image = $request->image;
            $post->file = $request->file;
            if($request->hasFile('image')){
                $image = $request->file('image');
                $imagename = $image->getClientOriginalName();
                $picture = \date('His').'-'.$imagename;
                $image->move(\public_path('upload/image'),$picture);
                return response([
                    'message' => 'Image uploaded',
                    'file' => $picture
                ]);
            } else{
                return response([
                    'message' => 'Select image first'
                ]);

            if($request->hasFile('file')){
                $file = $request->file('file');
                $filename = $file->getClientOriginalName();
                $file = \date('His').'-'.$filename;
                $file->move(\public_path('upload/documents'),$file);
                return response([
                    'message' => 'file uploaded',
                    'file' => $file
                ]);
            } else{
                return response([
                    'message' => 'Select image first'
                ]);
            $post->save();
            return response([
                'post' => $post,
                'message' => 'post created'
            ]);

        } 
        
        // catch(Exception $ex){
        //     return redirect([
        //         'message' => $ex->getMessage()
        //     ]);
        // }
    }
}

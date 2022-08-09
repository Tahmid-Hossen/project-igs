<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\Message;
use Exception;
use App\Models\Post;
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
            $post->document = $request->document;
            if($request->hasFile('image')){
                $file = $request->file('image');
                $filename = $file->getClientOriginalName();
                $picture = \date('His').'-'.$filename;
                $file->move(\public_path('upload/image'),$picture);
            } else{
                return "select image first";
            }

            if($request->hasFile('document')){
                $file = $request->file('document');
                $filename = $file->getClientOriginalName();
                $docfile = \date('His').'-'.$filename;
                $file->move(\public_path('upload/doc'),$docfile);
            } else{
                return "select file first";
            }
            $post->save();
            return response([
                'post' => $post,
                'message' => 'post created'
            ]);

        } catch(Exception $ex){
            return redirect([
                'message' => $ex->getMessage()
            ]);
        }
    }

    public function getPost(){
        try{
            $posts = Post::all();
            return response([
                'posts' => $posts,
                'message' => 'success'
            ]);
        }catch(Exception $ex){
            return response([
                'message' => $ex->getMessage()
            ]);
        }
    }


    public function updatePost(Request $request, $id){
        try{
            $post = Post::find($id);
            $post->title = $request->title;
            $post->description = $request->description;
            $post->image = $request->image;
            $post->document = $request->document;
            if($request->hasFile('image')){
                $file = $request->file('image');
                $filename = $file->getClientOriginalName();
                $picture = \date('His').'-'.$filename;
                $file->move(\public_path('upload/image'),$picture);
            } else{
                return "select image first";
            }

            if($request->hasFile('document')){
                $file = $request->file('document');
                $filename = $file->getClientOriginalName();
                $docfile = \date('His').'-'.$filename;
                $file->move(\public_path('upload/doc'),$docfile);
            } else{
                return "select file first";
            }
            $post->save();
            return response([
                'post' => $post,
                'message' => 'post updated'
            ]);
        } catch(Exception $ex){
            return redirect([
                'message' => $ex->getMessage()
            ]);
        }  
    }



    public function deletePost($id){
        try{
            $post = Post::find($id)->delete();
            return response([
                'message' => 'post deleted'
            ]);
        } catch(\Throwable $th) {

            return response([
                'message' => $th->getMessage()
            ]);
        }
    }
}

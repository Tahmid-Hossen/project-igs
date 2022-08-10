<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Post;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        return view('admin.home');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->to('admin/login');
    }

    public function createPost()
    {
        return view('admin.createpost');
    }

    public function storePost(Request $request){
        try{
            $post = new Post();
            $post->title = $request->title;
            // $post->description = $request->description;
            // $post->image = $request->image;
            $post->document = $request->document;
            // if($request->hasFile('image')){
            //     $file = $request->file('image');
            //     $filename = $file->getClientOriginalName();
            //     $picture = \date('His').'-'.$filename;
            //     $file->move(\public_path('upload/image'),$picture);
            // } else{
            //     return "select image first";
            // }

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
                'message' => 'file uploaded'
            ]);
            // return redirect()->back()->with('success','successfully created');
            // return response([
            //     'post' => $post,
            //     'message' => 'post created'
            // ]);

        } catch(Exception $ex){
            return redirect([
                'message' => $ex->getMessage()
            ]);
        }
    }

    public function index(){
        $posts = Post::orderBy('created_at','ASC')->paginate(20);
        return view("admin.index", compact('posts'));
    }

    public function view($id){
        $post = Post::find($id)->get();
        return view("admin.view", compact('post'));
    }

    public function deletePost($id){
        $post = Post::find($id)->delete();
        return response([
            'message' => 'file deleted'
        ]);
        // return redirect()->back()->with('success','successfully deleted');
    }
}

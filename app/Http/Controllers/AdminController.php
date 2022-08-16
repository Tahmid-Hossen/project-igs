<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Storage;
use Auth;
use App\Models\Post;
use Storage;
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
            // return $request->document;
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
                // return $file;
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

    // $file=$request->file->store(('uploads'),$docfile);

    public function getDownload(Request $request,$document) {
        // $file_path = public_path('files/'.$file_name);
        // $file=public_path('files/'.$file_name);
        // return response()->download($file);
        // $filepath = public_path('upload/doc/200841-Habiba CV (1).pdf');
        // return Response()->download($filepath);
        // if(Storage::disk('public')->exists("upload/doc/$request->file")){
        //     $path = Storage::disk('public')->path('upload/doc/$request->file');
        //     $content = file_get_contents($path);
        //     return response($content)->withHeaders([
        //         'Content-Type' => mime_content_type($path)
        //     ]);
        // }
        // return redirect('/404');

        
        // $file = Storage::disk('public')->get($file_name);
        // return (new Response($file, 200))
        //         ->header('Content-Type', 'file/pdf');

        // return $document;

        return response()->download(public_path('upload/doc/'.$document));
      }
}

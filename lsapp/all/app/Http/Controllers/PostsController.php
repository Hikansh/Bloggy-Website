<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts=Post::all();   this is default
        //$posts=Post::orderBy('title','desc')->get(); //order by descending order of title name
        $posts=Post::orderBy('title','desc')->paginate(5);  //paginate by only 5 posts at a page...
        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[   //validation of forms is so simple in laravel
            'title'=>'required',
            'body'=>'required' ,   
           // 'cover_image'=>'required|image|mimes:png,gif,jpeg,jpg|nullable|max:1999'   //max size 1.9mb
            ]);

            /*//file upload
            if($request->hasFile('cover_image')){
                $fileNamewithExt=$request->file('cover_image')->getClientOriginalName();

                $fileName=pathinfo($fileNamewithExt,PATHINFO_FILENAME);

                $extension=$request->file('cover_image')->getClientOriginalExtension();
                //unique filename
                $filenametostore=$fileName.'_'.time().'_'.$extension;
                //uploading
                $path=$request->file('cover_image')->storeAs('public/cover_images',$filenametostore);
            }
            else{
                $filenametostore='noimage.jpg';
            }
*/
        //creating a new post here.....
            $post=new Post; 
            $post->title=$request->input('title');
            $post->body=$request->input('body');
            $post->user_id=auth()->user()->id;
  //          $post->cover_image=$filenametostore;
            $post->save();
            return redirect("/posts")->with('success','Post Created..!!');     
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
 
        //check for correct user
        if(auth()->user()->id != $post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');               
        }
 
        return view('posts.edit')->with('post', $post);   
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[   //validation of forms is so simple in laravel
            'title'=>'required',
            'body'=>'required'    
        ]);

        //creating a new post here.....
            $post=Post::find($id); 
            $post->title=$request->input('title');
            $post->body=$request->input('body');
            $post->save();
            return redirect("/posts")->with('success','Post Update..!!');     
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);

        //check for correct user
        if(auth()->user()->id != $post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');               
        }
        $post->delete();
        return redirect('/posts')->with('success','Post deleted..!');
    }
}

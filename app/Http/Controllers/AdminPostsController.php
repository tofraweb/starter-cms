<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\PostCreateRequest;
use App\Post;
use App\User;
use App\Photo;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::all();

        return view('admin.posts.index',compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $users = User::pluck('name','id')->all(); 

        return view('admin.posts.create', compact('users'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {

        $user = Auth::user();

        // $input =  $request->all();

        // if($file = $request->file('photo_id')){
            
        //     $name = time() . $file->getClientOriginalName();

        //     $file->move('images', $name);

        //     $photo = Photo::create(['file' => $name]);

        //     $input['photo_id'] = $photo->id;
        // }


        // $post = new Post();
        // $post->title = $input['title'];
        // $post->body = $input['body'];
        // $post->photo_id = $input['photo_id'];
        // $post->user_id = $input['user_id'];

        // $post->save();

        //return $input;

        $user->posts()->create($this->dataValidation($request));

        return redirect('admin/posts')->with('status', 'Post successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

        private function dataValidation($request)
    {

        $input = $request->all();

        if($file = $request->file('photo_id')){
            
            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['file' => $name]);

            $input['photo_id'] = $photo->id;
        }

        return $input;

    }


}

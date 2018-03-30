<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostRequest;
use App\Http\Services\PostService;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    protected $postServices;

    public function __construct(PostService $postService)
    {
        $this->postServices = $postService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $this->data('title',$this->title('All Posts'));
        $posts = $this->postServices->posts();
        return view(
            'Back.Pages.Posts.all-posts',
            $this->data,
            compact('posts')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data('title',$this->title('New Post'));
        $this->data('categories',Category::all());

        return view(
            'Back.Pages.Posts.new-post',
            $this->data
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        if($this->postServices->addNewPost($request)){
            if (Auth::user()->role->name=='admin'){
                return redirect()->route('posts.index')->with('success','Post has been added.');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $detail = $this->postServices->singlePost($id);
        $this->data('title',$this->title($detail->title));

        return view(
            'Back.Pages.Posts.details',
            $this->data,
            compact('detail')
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $detail = $this->postServices->singlePost($id);
        $this->data('title',$detail->title.' edit');
        $this->data('categories',Category::all());
        return view(
            'Back.Pages.Posts.edit-post',
            $this->data,
            compact('detail')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        if($this->postServices->updatePost($request,$id)){
            return redirect()->route('posts.index')->with('success','Post has been updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($this->postServices->deletePost($id)){
            return redirect()->route('posts.index')->with('success','Post has been deleted.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postApprove(Request $request, $id)
    {
        if (isset($request['enable'])) {
            $data['is_approved'] = 1;
            $message = "User was Enabled";
        }
        if (isset($request['disable'])) {
            $data['is_approved'] = 0;
            $message = "User was Disabled";
        }
        $post = Post::find($id);
        if ($post::where('id',$id)->update($data)) {
            return redirect()->route('posts.index')->with('success', $message);
        } else {
            return redirect()->back()->with('success', $message);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tag()
    {
        $this->data('title',$this->title('Tags'));
        return view(
            'Back.Pages.Posts.tag',
            $this->data
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function tagAdd(Request $request)
    {
        //
    }
  
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Services\PostService;
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postDelete($id)
    {
        if($this->postServices->deletePost($id)){
            return redirect()->route('posts.index')->with('success','Post has been deleted.');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function category()
    {
        $this->data('title',$this->title('Category'));
        return view(
            'Back.Pages.Posts.category',
            $this->data
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function categoryAdd(Request $request)
    {
        //
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

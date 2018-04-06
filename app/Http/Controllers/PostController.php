<?php

namespace App\Http\Controllers;

use App\AssignPost;
use App\Category;
use App\Http\Requests\PostRequest;
use App\Http\Services\PostService;
use App\Post;
use App\Resubmission;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends DashboardController
{
    protected $postServices;

    public function __construct(PostService $postService)
    {
        parent::__construct();
        $this->postServices = $postService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data('writerNotification',Post::where(['is_approved'=>1,'user_id'=>Auth::id()])->get());
        $this->data('writerRequestNotification',Post::where(['request_resubmission'=>1,'user_id'=>Auth::id()])->get());
        $this->data('postAssign',AssignPost::where(['is_assigned'=>1])->get());

        $this->data('title',$this->title('All Posts'));
        if(Auth::user()->role->slug=='admin'){
            $posts = $this->postServices->posts();
        }else{
            $posts = Post::where(
                function ($query){
                    $query->where('user_id',Auth::id());
                }
            )->latest()->get();
        }
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
        $this->data('writerNotification',Post::where(['is_approved'=>1,'user_id'=>Auth::id()])->get());
        $this->data('writerRequestNotification',Post::where(['request_resubmission'=>1,'user_id'=>Auth::id()])->get());
        $this->data('postAssign',AssignPost::where(['is_assigned'=>1])->get());

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
            return redirect()->route('posts.index')->with('success','Post has been added.');
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
        $this->data('writerNotification',Post::where(['is_approved'=>1,'user_id'=>Auth::id()])->get());
        $this->data('writerRequestNotification',Post::where(['request_resubmission'=>1,'user_id'=>Auth::id()])->get());
        $this->data('postAssign',AssignPost::where(['is_assigned'=>1])->get());

        $detail = $this->postServices->singlePost($id);
        if (count($detail)>0){
        $this->data('title',$this->title($detail->title));
        }else{
            return redirect()->route('posts.index')->with('error','Access denied.');
        }
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
        $this->data('writerNotification',Post::where(['is_approved'=>1,'user_id'=>Auth::id()])->get());
        $this->data('writerRequestNotification',Post::where(['request_resubmission'=>1,'user_id'=>Auth::id()])->get());
        $this->data('postAssign',AssignPost::where(['is_assigned'=>1])->get());

        $detail = $this->postServices->singlePost($id);
        if (count($detail)>0){
            $this->data('title',$detail->title.' edit');
        }else{
            return redirect()->route('posts.index')->with('error','Access denied.');
        }
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
            $data['state'] = 1;
            $message = "Post has been approved.";
            $post = Post::find($id);
            if ($post::where('id',$id)->update($data)) {
                $i = 500;
                $balance = $post->user->balance+100;
                while ($i>4000){
                    if ($post->words_count>$i){
                        $i = $i+500;
                        if($post->words_count>$i)
                            $balance = $balance+20;
                    }
                }
                if(User::find($post->user_id)->update(['balance'=>$balance])){
                    return redirect()->route('posts.index')->with('success', $message);
                }
            } else {
                return redirect()->back()->with('success', $message);
            }
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postResubmission(Request $request)
    {
        if(DB::table('posts')->where('id',$request->post_id)->update(['request_resubmission'=>1,'state'=>2])){
            if (Resubmission::create(['post_id'=>$request->post_id,'reasons'=>$request->reasons])){
                return redirect()->route('posts.index')->with('success','Post has been resubmitted.');
            }
        }
    }


    public function postLogs()
    {
        $this->data('writerNotification',Post::where(['is_approved'=>1,'user_id'=>Auth::id()])->get());
        $this->data('writerRequestNotification',Post::where(['request_resubmission'=>1,'user_id'=>Auth::id()])->get());
        $this->data('postAssign',AssignPost::where(['is_assigned'=>1])->get());

        if (Auth::user()->role->slug=='admin'){
            $this->data('approvedPost',Post::where(['state'=>1])->get()->count());
            $this->data('pendingPost',Post::where(['state'=>0,'is_resubmitted'=>0])->get()->count());
            $this->data('resubmittedPost',Post::where(['state'=>2,'is_resubmitted'=>1])->get()->count());
        }else{
            $this->data('approvedPost',Post::where(['state'=>1,'user_id'=>Auth::id()])->get()->count());
            $this->data('pendingPost',Post::where(['state'=>0,'user_id'=>Auth::id()])->get()->count());
            $this->data('resubmittedPost',Post::where(['state'=>2,'user_id'=>Auth::id()])->get()->count());
        }
        $this->data('title',$this->title('Post Logs'));
        if (Auth::user()->role->slug=='admin'){
            $posts = $this->postServices->posts();
        }else{
            $posts = Post::where(
                function ($query){
                    $query->where('user_id',Auth::id());
                }
            )->latest()->get();
        }
        return view(
            'Back.Pages.Posts.post-logs',
            $this->data,
            compact('posts')
        );
    }


    public function notification(){
        if (Post::where('is_active',1)->update(['notification'=>0,'is_resubmitted'=>0])){
            return Post::where('notification',1)->get()->count();
        }
    }

    public function authNotification()
    {
        if (Post::where('is_active',1)->update(['is_approved'=>0,'request_resubmission'=>0])){
            Post::where('is_approved',1)->get()->count();
        }
    }

    public function assignNotification()
    {
        if (AssignPost::where('is_active',1)->update(['is_assigned'=>0])){
            AssignPost::where('is_assigned',1)->get()->count();
        }
    }

    public function assignPostView()
    {
        $this->data('writerNotification',Post::where(['is_approved'=>1,'user_id'=>Auth::id()])->get());
        $this->data('writerRequestNotification',Post::where(['request_resubmission'=>1,'user_id'=>Auth::id()])->get());
        $this->data('postAssign',AssignPost::where(['is_assigned'=>1])->get());
        $this->data('title',$this->title('Assign Posts'));
        $posts = AssignPost::all();
        return view(
            'Back.Pages.AssignPost.all-assign',
            $this->data,
            compact('posts')
        );
    }
}

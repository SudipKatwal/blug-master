<?php

namespace App\Http\Controllers;

use App\Http\Services\PostService;
use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PublicPageController extends Controller
{
    protected $postService;
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;

    }

    public function index()
    {

        $this->data('title',$this->title('Home'));
        $posts = $this->postService->posts(3);
        $featureCategoryPorts = $this->postService->posts(1,'sports');
        $categoryPosts = $this->postService->posts(1,'sports');
        return view(
            'front.pages.index',
            $this->data,
            compact(['posts','featureCategoryPorts','categoryPosts'])
        );
    }

    public function singlePost($slug)
    {
        $this->data('title',$this->title('Home'));

        $posts = $this->postService->posts(3);

        $post = $this->postService->singleSlugPost($slug);

        return view(
            'front.pages.single',
            $this->data,
            compact(['post','posts'])
        );
    }

    public function like(Request $request)
    {
//        print_r($request->all()); die;
        if (Like::where(['user_id'=>$request->uid,'post_id'=>$request->pid])->count()>0){
            return Like::where(['post_id'=>$request->pid])->count();
        }else{
            if(Like::create(['user_id'=>$request->uid,'post_id'=>$request->pid])){
                return Like::where(['post_id'=>$request->pid])->count();
            }
        }
    }
}

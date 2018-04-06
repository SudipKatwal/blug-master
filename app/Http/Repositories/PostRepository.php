<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\PostRepositoryInterface;
use App\Image;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostRepository extends Repository implements PostRepositoryInterface
{

    function model()
    {
        return Post::class;
    }

    public function addNewPost($data)
    {
        $post = (new Post())->create($this->postJson($data));

        if (isset($data['tags'])){
            foreach ($data['tags'] as $key=>$tag){
                $post->tags()->create(
                    [
                        'name'      =>$data['tags'][$key],
                    ]
                );
            }
        }
        if (isset($data['image'])){
            foreach ($data['image'] as $key=>$image){
                $post->images()->create(
                    [
                        'name'      => $data['image'][$key],
                    ]
                );
            }
        }
        return $post;

    }

    public function updatePost($data, $id)
    {
        $post = (new Post())->where('id',$id)->update($this->updatePostJson($data));
        if (isset($data['image'])){
            foreach ($data['image'] as $key=>$image){
                (new Image())->create(
                    [
                        'name'      => $data['image'][$key],
                        'post_id'   => $id,
                    ]
                );
            }
        }
        return $post;
    }

    public function posts($limit = null, $category = null)
    {
        if (isset($limit) && isset($category)){
            return $this->model->where(
                function ($query){
                    $query->where(['is_active'=>1,'state'=>1]);
                }
            )->whereHas(
                'category',
                function ($query) use($category){
                    $query->where('slug',$category);
                }
            )->limit($limit)->get();
        }
        if (isset($limit)){
            return $this->model->where(
                function ($query){
                    $query->where(['is_active'=>1,'state'=>1]);
                }
            )->latest()->limit($limit)->get();
        }
        return $this->model->where(
            function ($query){
                $query->where('is_active',1);
            }
        )->latest()->get();
    }

    public function singlePost($id = null, $slug = null)
    {
        if (Auth::user()->role->slug=='admin') {
            return $this->model->where(
                function ($query) use ($id) {
                    $query->where(['is_active' => 1, 'id' => $id]);
                }
            )->first();
        }
        if (Auth::user()->role->slug!='admin'){
            return $this->model->where(
                function ($query) use ($id) {
                    $query->where(['is_active' => 1, 'id' => $id,'user_id'=>Auth::id()]);
                }
            )->first();
        }
    }

    public function singleSlugPost($slug)
    {
            return $this->model->where(
                function ($query) use ($slug){
                    $query->where(['is_active'=>1,'state'=>1, 'slug'=>$slug]);
                }
            )->first();
    }

    public function permanentlyDelete($id)
    {
        return $this->model->where(
            function ($query) use ($id){
                $query->where('id',$id);
            }
        )->delete();
    }
    public function imageDelete($id)
    {
        return DB::table('images')->where('id',$id)->delete();
    }

    protected function postJson($data)
    {
        return [
          'title'           => array_get($data,'title'),
          'slug'            => array_get($data,'slug'),
          'body'            => array_get($data,'description'),
          'thumbnail'       => array_get($data,'thumbnails'),
          'words_count'     => array_get($data,'words_count'),
          'user_id'         => array_get($data,'user_id'),
          'category_id'     => array_get($data,'category'),
          'main_keywords'   => array_get($data,'main_keyword'),
          'lsi_keywords'    => array_get($data,'lsi_keywords'),
          'is_approved'     => array_get($data,'is_approved'),
        ];
    }

    protected function updatePostJson($data)
    {
        return [
            'title'           => array_get($data,'title'),
            'slug'            => array_get($data,'slug'),
            'body'            => array_get($data,'description'),
            'thumbnail'       => array_get($data,'thumbnails'),
            'words_count'     => array_get($data,'words_count'),
            'category_id'     => array_get($data,'category'),
            'main_keywords'   => array_get($data,'main_keyword'),
            'lsi_keywords'    => array_get($data,'lsi_keywords'),
            'is_resubmitted'  => array_get($data,'is_resubmitted'),
            'state'           => array_get($data,'state'),
        ];
    }
}
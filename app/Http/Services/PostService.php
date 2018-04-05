<?php

namespace App\Http\Services;


use App\Http\Interfaces\PostRepositoryInterface;
use App\Tag;
use Illuminate\Support\Facades\Auth;
use Image;

class PostService extends Service
{
    public function interface()
    {
        return PostRepositoryInterface::class;
    }

    public function addNewPost($request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $data['user_type'] = Auth::user()->role->slug;
        $data['slug'] = strtolower(preg_replace('/[^A-Za-z0-9-]+/','-',$request->slug));

        $data['words_count'] = str_word_count($data['description']);
        if ($data['user_type']=='admin'){
            $data['is_approved'] = 1;
        }else{
            $data['is_approved'] =0;
        }

        if(isset($request->tags)){
            $data['tags'] = explode(',',$request->tags);
        }

        if ($request->hasFile('featured_image')){
            $thumbnail = $this->saveThumbnails($request->file('featured_image'));
            $data['thumbnails'] = $thumbnail;
        }
        if ($request->hasFile('images')){
            foreach ($request->file('images') as $image){
                $store = $this->saveImages($image);
                $data['image'][] = $store;
            }
        }
        return $this->interface->addNewPost($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePost($request, $id)
    {
        $data = $request->all();

        $data['slug'] = strtolower(preg_replace('/[^A-Za-z0-9-]+/','-',$request->slug));

        $data['words_count'] = str_word_count($data['description']);


        if ($request->hasFile('featured_image')){
            $imagePath = public_path('Images/post-thumbnails/' . $request->old_image);
            unlink($imagePath);
            $thumbnail = $this->saveThumbnails($request->file('featured_image'));
            $data['thumbnails'] = $thumbnail;
        }else{
            $data['thumbnails'] = $request->old_image;
        }
        if ($request->hasFile('images')){
            foreach ($request->file('images') as $image){
                $store = $this->saveImages($image);
                $data['image'][] = $store;
            }
        }
        return $this->interface->updatePost($data, $id);
    }

    /*
     *Methods for displaying store posts.
     */
    public function posts($limit = null,$category = null)
    {
        if (isset($limit) && isset($category)){
            return $this->interface->posts($limit,$category);
        }
        if (isset($limit)){
            return $this->interface->posts($limit);
        }
        return $this->interface->posts();
    }



    /*
     *Methods for displaying store posts.
     */
    public function singlePost($id)
    {
        return $this->interface->singlePost($id);
    }
    /*
     *Methods for displaying store posts.
     */
    public function singleSlugPost($slug)
    {
        return $this->interface->singleSlugPost($slug);
    }


    /*
    *Methods for deleting store posts.
    */
    public function deletePost($id)
    {
        $data = $this->interface->singlePost($id);

        if ($data){
                if (!empty($data->images)){
                    $this->imagesDelete($data->images);
                }
                return $this->interface->permanentlyDelete($id);
        }
    }

    protected function imagesDelete($images)
    {
        foreach ($images as $img=>$image) {
            $this->interface->imageDelete($image->id);
            $imagePath = public_path('Images/post-images/' . $image->name);
            $result = unlink($imagePath);
        }
        return true;
    }
    /**
     * Methods for saving front store images.
     *
     * @param $file
     * @return string
     */
    protected function saveThumbnails($image)
    {
        $uploadPath = public_path('Images/post-thumbnails/');
        $ext = $image->getClientOriginalExtension();
        $imageName = date('Ymds-').str_random(6).'.'.$ext;
        $save = $this->resizeImage($image,800,450);
        if ($save->save($uploadPath.$imageName)){
            return $imageName;
        }

    }
    /**
     * Methods for saving front store images.
     *
     * @param $file
     * @return string
     */
    protected function saveImages($image)
    {
        $uploadPath = public_path('Images/post-images/');
        $ext = $image->getClientOriginalExtension();
        $imageName = date('IMG_Ymds-').str_random(6).'.'.$ext;
        $save = $this->resizeImage($image,800,450);
        if ($save->save($uploadPath.$imageName)){
            return $imageName;
        }
    }

    /**
     * Methods for resizing the given image.
     *
     * @param $file
     * @param $width
     * @param $height
     * @return mixed
     */
    protected function resizeImage($file, $width, $height)
    {
        return Image::make($file)->resize(
            $width,
            null,
            function ($constraint) {
                $constraint->aspectRatio();
            }
        )->crop($width, $height);
    }
}
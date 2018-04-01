<?php
namespace App\Http\Interfaces;


interface PostRepositoryInterface extends RepositoryInterface
{
    public function addNewPost($data);

    public function updatePost($data,$id);

    public function posts($limit = null, $category = null);

    public function singlePost($id);

    public function singleSlugPost($slug);

    public function permanentlyDelete($id);

    public function imageDelete($id);
}
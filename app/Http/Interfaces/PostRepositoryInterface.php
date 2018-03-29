<?php
namespace App\Http\Interfaces;


interface PostRepositoryInterface extends RepositoryInterface
{
    public function addNewPost($data);

    public function posts();

    public function singlePost($id);

    public function permanentlyDelete($id);

    public function imageDelete($id);
}
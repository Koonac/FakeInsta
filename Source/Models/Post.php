<?php
namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;
use Example\Models\Address;

class Post extends DataLayer{
    public function __construct()
    {
        parent::__construct("post", ["imagePost", "descPost", "userPost"], "id", false);
    }

    public function add(User $user, string $imagePost, string $descPost): Post
    {
        $this->id_userPost = $user->id;
        $this->imagePost = $imagePost;
        $this->descPost = $descPost;

        return $this;
    }   
}

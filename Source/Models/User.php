<?php
namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;
use Source\Models\Post;

class User extends DataLayer{
    public function __construct()
    {
        parent::__construct("user", ["email", "nome", "login", "senha"], "id", false);
    }

    public function Posts()
    {
            return (new Post())->find("id_userPost= :uid", "uid={$this->id}")->fetch();
    }
}

<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;
use Source\Models\Post;
use Source\Models\User;

class Comments extends DataLayer{
    public function __construct()
    {
        parent::__construct("comments", ["id_user", "id_post", "comment"], "id_comment", true);
    }

    public function commentUser()
    {
        return (new User())->find("id= :uid", "uid= {$this->id_user}")->fetch();
    }
}
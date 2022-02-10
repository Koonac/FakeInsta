<?php
namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;
use Source\Models\User;

class Post extends DataLayer{
    public function __construct()
    {
        parent::__construct("post", ["imagePost", "descPost", "id_userPost"], "id", false);
    }

    public function User_post()
    {
        return (new User())->find("id= :idUser", "idUser={$this->id_userPost}")->fetch();
    }
}

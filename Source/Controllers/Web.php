<?php
    namespace Source\Controllers;

use CoffeeCode\DataLayer\Connect;
use Source\Models\User;
use Source\Models\Post;

//classe web onde tera todas as funçoes ou controladores
    class Web {
        
        //=====================================
        //  Function para trazer a pagina de home
        //=====================================
        public function home($data){            
            //url base e dps um require puxando a pagina home
            $url = URL_BASE;
            session_start();
            
            if ((!isset($_SESSION['login']) == true) and (!isset($_SESSION['pass']) == true)) {
                header("location: {$url}/");
            }else{
                require __DIR__."/../Views/home.php";
            }
            
        }

        //=====================================
        //  Function para trazer a pagina de login
        //=====================================
        public function loginView(){
            $url = URL_BASE;
            session_start();

            if ((isset($_SESSION['login']) == true) and (isset($_SESSION['pass']) == true)) {
                header("location: {$url}/home");
            }else{
                require __DIR__ . "/../Views/login.php";
            }
        }

        // ======================================================
        // Function para criar sessao e verificar se o login existe
        // ======================================================
        public function login($data){
            $url = URL_BASE;
            require __DIR__ . "/../Views/login.php";
            session_start();

            $user = strtolower($data{"user"});
            $pass = $data{"pass"};

            $userBD = (new User())->find("login = :user", "user={$user}")->fetch();

            if ($userBD){
                if ($userBD->login == $user && $userBD->senha == md5($pass)){
                    
                    $_SESSION['login'] = $user;
                    $_SESSION['pass'] = $pass;
                    $_SESSION['nome'] = $userBD->nome;

                    header("location: {$url}/home");

                }else{
                    unset($_SESSION['login']);
                    unset($_SESSION['nome']);

                    echo"<div class='row m-0 align-items-center justify-content-center'>
                        <div class='col-3 flex-wrap text-center p-1 alert alert-danger fw-bold'>
                            Usuário e/ou senha ínvalidos !
                        </div>
                    </div>";
                }
            }else{
                echo"<div class='row m-0 align-items-center justify-content-center'>
                        <div class='col-3 flex-wrap text-center p-1 alert alert-danger fw-bold'>
                            Usuário e/ou senha ínvalidos !
                        </div>
                    </div>";
            }
        }

        //=====================================
        //  Function para trazer a pagina de register
        //=====================================
        public function register($data){
            $url = URL_BASE;
            session_start();

            if ((isset($_SESSION['login']) == true) and (isset($_SESSION['pass']) == true)) {
                header("location: {$url}/");
            }else{
                require __DIR__."/../Views/register.php";
            }
        }

        //=====================================
        //  Function para registar um novo usuario no BD
        //=====================================
        public function registerSender($data){
            $url = URL_BASE;
            
            if ($data) {
                $login=strtolower($data{"user"});

                $usersBD = new User;

                if ($usersBD->find("login = :loginPage ", "loginPage=$login")->fetch()){
                    require __DIR__."/../Views/register.php";

                    echo "
                    <div class='row mt-3 align-items-center justify-content-center'>
                        <div class='col-3 flex-wrap text-center alert alert-danger border border-danger' role='alert'>
                            <strong>Nome de usuario já cadastrado ! </strong> 
                        </div>
                    </div>
                    ";
                }else{
                    $usersBD->email = $data{"email"};
                    $usersBD->nome = $data{"name"};
                    $usersBD->login = $login;
                    $usersBD->senha = md5($data{"pass"});

                    $usersBD->save();
                    header("Location: {$url}");
                }
                
                
            }
        }

        //==========================
        //  Function para testes
        //==========================
        public function test(){
            require __DIR__ . "/../../teste.php";
        }

        //=====================================
        //  Function para deslogar da sessao
        //=====================================
        public function sair(){
            $url = URL_BASE;
            session_start();

            if( isset($_SESSION['login']) == true){
                session_unset();
                header("location: {$url}");
            }else{
                header("location:{$url}/home");
            }
        }

        //=====================================
        //  Function para trazer a pagina de login
        //=====================================
        public function profile(){
            $url = URL_BASE;
            session_start();
            if ((isset($_SESSION['login']) == true) and (isset($_SESSION['pass']) == true)) {
                require __DIR__ . "/../Views/profile.php";
            }else{
                header("location: {$url}");
            }
            
        }

        //=====================================
        //Function para Deletar imagem de perfil
        //=====================================
        public function profileDelImage(){
            $url = URL_BASE;
            session_start();

            $modelBD = (new User())->find("login= :login", "login={$_SESSION['login']}")->fetch();

            // Deleta o FileImage
            unlink(__DIR__ . "/../Views/upload/profile/$modelBD->image");

            // função para deletar a imagem do BD
            $delImageBD = Connect::getInstance()->prepare("UPDATE `user` SET `image` = null WHERE `user`.`id` = {$modelBD->id}");
        
            // Deleta a imagem do BD
            $delImageBD->execute();

            header("location: {$url}/profile");
            
        }
        //=====================================
        //Function para deletar o usuario logado
        //=====================================
        public function profileDelUser(){
            $url = URL_BASE;
            session_start();

            $modelUser = (new User())->find("login= :login", "login={$_SESSION['login']}")->fetch();
            $modelPost = (new Post())->find("id_userPost= :userPost", "userPost={$modelUser->id}")->fetch(true);

            if(isset($modelPost)){
                foreach($modelPost as $posts){
                    $posts->destroy();
                }
            }
            
            session_unset();
            $modelUser->destroy();

            header("location: $url");

        }

        //=====================================
        //Function para editar dados do usuario
        //=====================================
        public function profileEditUser($data){
            $url = URL_BASE;
            session_start();

            $modelUser = (new User())->find("login= :login", "login={$_SESSION['login']}")->fetch();

            $modelUser->nome = $data['inputName'];
            $modelUser->email = $data['inputEmail'];
            
            $modelUser->Save();
            header("location: $url/profile");
        }   

        //=====================================
        //Function para exibir tela de erro de paginação
        //=====================================
        public function error($data){
            echo "<h1> OOOPS ocorreu um erro :( </h1>";
            echo "<h1>Error: {$data["errcode"]}</h1>";
            var_dump($data);
        }

    }

<?php
    namespace Source\Controllers;
    use Source\Models\User;
    use Source\Models\Post;


//classe web onde tera todas as funçoes ou controladores
    class Web {
        
        //=====================================
        //  Function para trazer a pagona de home
        //=====================================
        public function home($data){            
            //url base e dps um require puxando a pagina home
            $url = URL_BASE;
            require __DIR__."/../Views/home.php";

            
        }

        //=====================================
        //  Function para registrar um novo post no BD
        //=====================================

        public function homePost($data){
            $url = URL_BASE;
            require __DIR__."/../Views/home.php";

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

            $user = $data{"user"};
            $pass = $data{"pass"};

            $usersBD = new User;

            $test = $usersBD->find("login = :user", "user={$user}")->fetch();
            if ($test){
                if ($test->login == $user && $test->senha == $pass){
                    
                    $_SESSION['login'] = $user;
                    $_SESSION['pass'] = $pass;
                    $_SESSION['nome'] = $test->nome;

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
            require __DIR__."/../Views/register.php";
            // var_dump($data);
        }

        //=====================================
        //  Function para registar um novo usuario no BD
        //=====================================
        public function registerSender($data){
            $url = URL_BASE;
            // require __DIR__."/../Views/register.php";
            
            if ($data) {
                // var_dump($data);
            
                $usersBD = new User;
                $usersBD->email = $data{"email"};
                $usersBD->nome = $data{"name"};
                $usersBD->login = $data{"user"};
                $usersBD->senha = $data{"pass"};

                $usersBD->save();
                
                header("Location: {$url}");
            }
        }

        //==========================
        //  Function para testes
        //==========================
        public function test(){
            echo "<h1>TESTES</h1>";
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
        //Function para exibir tela de erro de paginação
        //=====================================
        public function error($data){
            echo "<h1> OOOPS ocorreu um erro :( </h1>";
            echo "<h1>Error: {$data["errcode"]}</h1>";
            var_dump($data);
        }
    }

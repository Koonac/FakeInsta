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
                    $usersBD->senha = $data{"pass"};

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
        //Function para exibir tela de erro de paginação
        //=====================================
        public function error($data){
            echo "<h1> OOOPS ocorreu um erro :( </h1>";
            echo "<h1>Error: {$data["errcode"]}</h1>";
            var_dump($data);
        }
    }

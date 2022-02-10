<?php

use Source\Models\User;

$userBD = new User;
$userProfile = $userBD->find("login= :login", "login={$_SESSION['login']}")->fetch();

?>
    <div class="topo border row ">
        <div class="offset-3 col-6 p-2 row">
            <div class="col-1">
                <a class="text-decoration-none" href="<?php echo $url ?>/home" rel="noopener noreferrer"><h2>FakeInsta</h2></a>
            </div>
            
            <div class="offset-3 col-3">
                <div class="barraPesq rounded row">
                    <div class="col-1">
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="offset-1 col-5">
                        <p>Pesquisar</p>
                    </div>
                </div> 
            </div>
            
            <div class="offset-1 col-4 pt-2 row">
                <div class="col-1">
                    <a class="text-decoration-none" href="<?php echo $url ?>/home">
                        <i class="fas fa-home fa-lg m15"></i>
                    </a>
                </div>
                <div class="offset-1 col-1">
                    <i class="far fa-comments fa-lg m15"></i>
                </div>
                <div class="offset-1 col-1">
                    <i class="far fa-compass fa-lg m15"></i>
                </div>
                <div class="offset-1 col-1">
                    <i class="far fa-heart fa-lg m15"></i>
                </div>
                <div class="offset-1 col-2 pb-3 border">
                    <?php
                        if($userProfile->image == null){
                            echo "<i class='far fa-user-circle fa-lg m15'></i>";
                        }else{
                            echo "<img class='img' src='Source/Views/upload/profile/$userProfile->image'>";  
                            }
                    ?>
                </div>
            </div>
        </div>
    </div>
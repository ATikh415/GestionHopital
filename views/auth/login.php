<?php

use App\App;
use App\Model\User;
use App\Validator\UserValidator;
use Core\Form\Form;

$data = $errors = [];

if(!empty($_POST)){

    $validator = new UserValidator();
    $errors = $validator->validates($_POST);
    $data = $_POST;

    if(empty($errors)){
        $table = App::getInstance()->getTable('User');
        $user = $table->findByLogin($_POST['login']);
        session_start();

        if($user === false){
            $user = $table->findByMed($_POST['login']);  
        }
        if(password_verify($_POST['password'], $user->getPassword()) == true){
            if($user->getRole() === 'admin'){
                $_SESSION['auth'] = $user->getId();
                header('location: '. $router->url('admin_home'));
                exit();
            }
            if($user->getRole() === 'secretary'){
                $_SESSION['auth'] = $user->getId();
                header('location: '. $router->url('secretary_home'));
                exit();
            }
            if($user->getRole() === 'doctor'){
                $_SESSION['auth'] = $user->getCin();
                header('location: '. $router->url('doctor_home'));
                exit();
               
            }
        }else{
         
            $errors['password'] = "Login ou Mot de Passe Incorrects";
        }
            
        


    }
}

$form = new Form($data, $errors);
?>

<div class="container">
    <h2> Se connecter </h2>
    <form action="" method="post" class="col s12">
        <?= $form->input('login', "Nom de l'ulisateur :", 'text','<i class="material-icons prefix">title</i>') ?>
        <?= $form->input('password', "Mot de passe :", 'password','<i class="material-icons prefix">vpn_key</i>') ?>
        <button type="submit" class="btn waves-effect waves-light">Se connecter
            <i class="material-icons right">send</i>
        </button>
    </form>
</div>
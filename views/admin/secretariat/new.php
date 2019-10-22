<?php

use App\App;
use App\Model\Patient;
use Core\Form\Form;
use App\Auth;
use App\Model\Secretariat;
use App\Validator\SecretariatValidator;

$title = "Administration";

$auth = (new Auth)->check();

$app = App::getInstance();
$id_users = "3";

$errors = [];
$data = [];

if(!empty($_POST)){
    $validator = new SecretariatValidator();
    $errors = $validator->validates($_POST);
    $data = $_POST;

    if(empty($errors)){
        
        $Table = $app->getTable('Secretariat');
        $secretary = $Table->hydrate(new Secretariat(), array_merge($data, ['id_users' => $id_users]));
        $Table->createSecretary($secretary);
        header('location: ' . $router->url('admin_secretary') . '?success=1');
        exit();
    }
}
$form = new Form($data, $errors);

?>

<div class="">
    <h2>Ajouter un Secretaire</h2>
    <form action="" method="post">
        <div class="row">
        <?= $form->input('name_sec', 'Nom et Prenom Secretaire :', 'text', '<i class="material-icons prefix">person</i>') ?>
        </div>
        <div class="row">
            <?= $form->input('login', "Nom de l'ulisateur :", 'text','<i class="material-icons prefix">title</i>') ?>
            <?= $form->input('password', "Mot de passe :", 'password','<i class="material-icons prefix">vpn_key</i>') ?>
        </div>
        <div class="row">
            <?= $form->input('addr', "Adresse :", 'text', '<i class="material-icons prefix">location_on</i>') ?>
            <?= $form->input('phone_sec', "Telephone format : 7x xxx xx xx", 'text', '<i class="material-icons prefix">contact_phone</i>') ?>
        </div>

        <button type="submit" class="btn waves-effect waves-light">Ajouter Secretaire
            <i class="material-icons right">send</i>
        </button>
        
    </form>
</div>
    

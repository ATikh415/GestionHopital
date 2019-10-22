<?php

use App\App;
use Core\Form\Form;
use App\Auth;
use App\Model\Secretariat;
use App\Validator\SecretariatValidator;

$title = "Administrateur";

$auth = (new Auth)->check();

$app = App::getInstance();
$Table = $app->getTable('Secretariat');

$item = $Table->find($params['id']);

$errors = [];
$data = [];

if(!empty($_POST)){
    $validator = new SecretariatValidator();
    $errors = $validator->validates($_POST);

    $data = $_POST;
    if(empty($errors)){
        $Table->hydrate($item, array_merge($data, ['password' => $item->getPassword(), 'id_users' => 3]));
        $Table->updateSecretary($item);
        header('location: ' . $router->url('admin_secretary'). '?edit=1');
        exit();
    }
}

$form = new Form($item, $errors);

?>

<div class="">
    <h2>Editer Secretaire <?= e($item->getNameSec()) ?></h2>
    <form action="" method="post">
        <div class="row">
            <?= $form->input('name_sec', 'Nom et Prenom Secretaire :', 'text', '<i class="material-icons prefix">person</i>') ?>
            <?= $form->input('login', "Nom de l'ulisateur :", 'text','<i class="material-icons prefix">title</i>') ?>
        </div>
        
        <div class="row">
            <?= $form->input('addr', "Adresse :", 'text', '<i class="material-icons prefix">location_on</i>') ?>
            <?= $form->input('phone_sec', "Telephone format : 7x xxx xx xx", 'text', '<i class="material-icons prefix">contact_phone</i>') ?>
        </div>

        <button type="submit" class="btn waves-effect waves-light">Editer Secretaire
            <i class="material-icons right">edit</i>
        </button>
    </form>
</div>
    
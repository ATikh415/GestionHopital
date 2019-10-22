<?php

use App\App;
use Core\Form\Form;
use App\Auth;
use App\Model\Medecin;
use App\Model\Secretariat;
use App\Validator\MedecinValidator;
use App\Validator\SecretariatValidator;

$title = "Administration";

$auth = (new Auth)->check();

$app = App::getInstance();
$id_users = "2";

$errors = [];
$data = [];

if(!empty($_POST)){
    
    $validator = new MedecinValidator();
    $errors = $validator->validates($_POST);
    $data = $_POST;
    if(empty($errors)){
        
        $Table = $app->getTable('Medecin');
        $doctor = $Table->hydrate(new Medecin(), array_merge($data, ['id_users' => $id_users]));
        $Table->createDoctor($doctor);
        header('location: ' . $router->url('admin_doctor') . '?success=1');
        exit();
    }
}

$services = $app->getTable('Service')->extract('id', 'name_service');
$specialistes = $app->getTable('Specialiste')->extract('id', 'name_sp');

$form = new Form($data, $errors);

?>

<div class="">
    <h2>Ajouter un Medecin</h2>
    <form action="" method="post">
        <div class="row">
        <?= $form->input('cin', "Numero d'Identite :", 'text', '<i class="material-icons prefix">vpn_key</i>') ?>
        <?= $form->input('name_med', 'Nom et Prenom Medecin :', 'text', '<i class="material-icons prefix">person</i>') ?>
        </div>
        <div class="row">
            <?= $form->input('login', "Nom de l'ulisateur :", 'text','<i class="material-icons prefix">title</i>') ?>
            <?= $form->input('password', "Mot de passe :", 'password','<i class="material-icons prefix">vpn_key</i>') ?>
        </div>
        <div class="row">
            <?= $form->select('id', 'Service : ', $services) ?>
            <?= $form->select('id_med_specialites', 'Specialite : ', $specialistes) ?>
        </div>
        <div class="row">
            <?= $form->input('addr_med', "Adresse :", 'text', '<i class="material-icons prefix">location_on</i>') ?>
            <?= $form->input('phone_med', "Telephone format : 7x xxx xx xx", 'text', '<i class="material-icons prefix">contact_phone</i>') ?>
        </div>

        <button type="submit" class="btn waves-effect waves-light">Ajouter Medecin
            <i class="material-icons right">send</i>
        </button>
        
    </form>
</div>
    

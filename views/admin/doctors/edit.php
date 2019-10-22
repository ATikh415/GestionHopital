<?php

use App\App;
use Core\Form\Form;
use App\Auth;
use App\Model\Secretariat;
use App\Validator\DoctorValidator;
use App\Validator\MedecinValidator;
use App\Validator\SecretariatValidator;

$title = "Administrateur";

$auth = (new Auth)->check();

$app = App::getInstance();
$Table = $app->getTable('Medecin');

$item = $Table->findWithCin($params['cin']);

$errors = [];
$data = [];

if(!empty($_POST)){
    $validator = new DoctorValidator();
    $errors = $validator->validates($_POST);

    $data = $_POST;
    if(empty($errors)){
        $Table->hydrate($item, array_merge($data, ['cin' => $item->getCin(), 'password' => $item->getPassword(), 'id_users' => 3]));
        $Table->updateDoctor($item);
        header('location: ' . $router->url('admin_doctor'). '?edit=1');
        exit();
    }
}
$services = $app->getTable('Service')->extract('id', 'name_service');
$specialistes = $app->getTable('Specialiste')->extract('id', 'name_sp');
$form = new Form($item, $errors);

?>

<div class="">
    <h2>Modifie un Medecin</h2>
    <form action="" method="post">
        <div class="row">
            <?= $form->input('name_med', 'Nom et Prenom Medecin :', 'text', '<i class="material-icons prefix">person</i>') ?>
            <?= $form->input('login', "Nom de l'ulisateur :", 'text','<i class="material-icons prefix">title</i>') ?>
        </div>

        <div class="row">
            <?= $form->select('id', 'Service : ', $services) ?>
            <?= $form->select('id_med_specialites', 'Specialite : ', $specialistes) ?>
        </div>
        <div class="row">
            <?= $form->input('addr', "Adresse :", 'text', '<i class="material-icons prefix">location_on</i>') ?>
            <?= $form->input('phone', "Telephone format : 7x xxx xx xx", 'text', '<i class="material-icons prefix">contact_phone</i>') ?>
        </div>

        <button type="submit" class="btn waves-effect waves-light">Ajouter Medecin
            <i class="material-icons right">send</i>
        </button>
        
    </form>
</div>
    
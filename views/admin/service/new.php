<?php

use App\App;
use Core\Form\Form;
use App\Auth;
use App\Model\Service;
use App\Validator\ServiceValidator;

$title = "Administration";

$auth = (new Auth)->check();

$app = App::getInstance();
$items = $app->getTable('Service')->getService();

$errors = [];
$data = [];

if(!empty($_POST)){
    
    $validator = new ServiceValidator();
    $errors = $validator->validates($_POST);

    foreach($items as $item){
        if($item->getIdSecretariats() == $_POST['id_secretariats']){
            $errors['id_secretariats'] = "Le secretaire se trouve deja dans un service";
        }
    }
    foreach($items as $item){
        if(strtolower($item->getNameService()) == strtolower($_POST['name_service'])){
            $errors['name_service'] = "Le {$item->getNameService()} existe deja, recommencer";
        }
    }
    $data = $_POST;
    if(empty($errors)){
        
        $Table = $app->getTable('Service');
        $service = $Table->hydrate(new Service(), $data);
        $Table->createService($service);
        header('location: ' . $router->url('admin_service') . '?success=1');
        exit();
    }
}

$speciality = $app->getTable('Speciality')->extract('id', 'name');
$secretary = $app->getTable('secretariat')->extract('id', 'name_sec');

$form = new Form($data, $errors);

?>

<div class="">
    <h2>Ajouter un Service</h2>
    <form action="" method="post">
        <?= require '_form.php' ?>
        <button type="submit" class="btn waves-effect waves-light">Ajouter Service
            <i class="material-icons right">send</i>
        </button>
    </form>
</div>
    

<?php

use App\App;
use Core\Form\Form;
use App\Auth;
use App\Validator\ServiceValidator;

$title = "Administration";

$auth = (new Auth)->check();

$app = App::getInstance();
$Table = $app->getTable('Service');
$items = $Table->getService();

$item = $Table->find($params['id']);

$errors = [];
$data = [];

if(!empty($_POST)){
    
    $validator = new ServiceValidator();
    $errors = $validator->validates($_POST);
    foreach($items as $serv){
        if($serv->getIdSecretariats() == $_POST['id_secretariats']){
            $errors['id_secretariats'] = "Le secretaire se trouve deja dans un service";
        }
    }
    foreach($items as $serv){
        if($serv->getNameService() == $_POST['name_service']){
            $errors['name_service'] = "Le {$serv->getNameService()} existe deja, recommencer";
        }
    }
    $data = $_POST;

    if(empty($errors)){
        
        $Table = $app->getTable('Service');
        $Table->hydrate($item, $data);
        $Table->updateService($item);
        header('location: ' . $router->url('admin_service') . '?edit=1');
        exit();
    }
}

$speciality = $app->getTable('Speciality')->extract('id', 'name');
$secretary = $app->getTable('secretariat')->extract('id', 'name_sec');

$form = new Form($item, $errors);

?>

<div class="">
    <h2>Modifier Le Service</h2>
    <form action="" method="post">
        <?= require '_form.php' ?>
        <button type="submit" class="btn waves-effect waves-light">Ajouter Service
            <i class="material-icons right">send</i>
        </button>
    </form>
</div>
    

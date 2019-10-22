<?php

use App\App;
use App\Model\Specialiste;
use App\Validator\SpecialisteValidator;
use Core\Form\Form;

$specialisteTable = App::getInstance()->getTable('Specialiste');
$specialiste = $specialisteTable->find($params['id']);
$errors = [];

if(!empty($_POST)){
    $validator = new SpecialisteValidator();
    $errors = $validator->validates($_POST);
   $_POST['id'] = $specialiste->getId();
    if(empty($errors)){
        $specialisteTable->hydrate($specialiste, $_POST);
        $specialisteTable->updateSpecialiste($specialiste);
        header('location: ' . $router->url('admin_specialiste') . '?edit=1');
        exit();
    }
}

$form = new Form($specialiste, $errors);
?>

<div class="container">
    <h4>Modifier Specialiste</h4>
    <form action="" method="post">
        <?= $form->input('name_sp', "Nom Specialite :", 'text') ?>  
        <button type="submit" class="btn waves-effect waves-light">Modifie Specialiste Medecin
            <i class="material-icons right">send</i>
        </button>
    </form>
</div>
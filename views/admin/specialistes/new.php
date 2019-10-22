<?php

use App\App;
use App\Model\Specialiste;
use App\Validator\SpecialisteValidator;
use Core\Form\Form;

$data = $errors = [];

if(!empty($_POST)){
    $validator = new SpecialisteValidator();
    $errors = $validator->validates($_POST);
    $data = $_POST;

    if(empty($errors)){
        $specialisteTable = App::getInstance()->getTable('Specialiste');
        $specialiste = $specialisteTable->hydrate(new Specialiste, $data);
        $specialisteTable->createSpecialiste($specialiste);
        header('location: ' . $router->url('admin_specialiste') . '?success=1');
        exit();
    }
}

$form = new Form($data, $errors);
?>

<div class="container">
    <h4>Ajout de Specialiste</h4>
    <form action="" method="post" class="col s12">
        <?= $form->input('name_sp', "Nom Specialite :", 'text','<i class="material-icons prefix">account_circle</i>') ?>  
        <button type="submit" class="btn waves-effect waves-light">Ajouter Specialitse Medecin
            <i class="material-icons right">send</i>
        </button>
    </form>
</div>
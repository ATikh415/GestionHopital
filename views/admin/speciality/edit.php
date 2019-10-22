<?php

use App\App;
use App\Validator\SpecialityValidator;
use Core\Form\Form;

$Table = App::getInstance()->getTable('Speciality');
$speciality = $Table->find($params['id']);
$items = $Table->all();

$errors = [];
$data =[
    'name' => $speciality->getName()
];

if(!empty($_POST)){
    $validator = new SpecialityValidator();
    $errors = $validator->validates($_POST);
    foreach($items as $item){
        if(strtolower($item->getName()) == strtolower($_POST['name'])){
            $errors['name'] = "Le {$item->getName()} existe deja, recommencer";
        }
    }

    $data = $_POST;
    if(empty($errors)){
        $Table->hydrate($speciality, $_POST);
        $Table->updateSpeciality($speciality);
        header('location: ' . $router->url('admin_speciality') . '?edit=1');
        exit();
    }
}

$form = new Form($data, $errors);
?>


<div class="container">
    <h4>Ajout de Specialiste</h4>
    <form action="" method="post" class="col s12">
        <?= $form->input('name', "Nom Specialite :", 'text','<i class="material-icons prefix">account_circle</i>') ?>  
        <button type="submit" class="btn waves-effect waves-light">Modifier Specialite
            <i class="material-icons right">send</i>
        </button>
    </form>
</div>
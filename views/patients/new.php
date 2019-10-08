<?php

use App\App;
use App\Model\Patient;
use App\Validator\PatientValidator;
use Core\Form\Form;

$app = App::getInstance();

$errors = [];
$data = [];

if(!empty($_POST)){
    $validator = new PatientValidator();
    $errors = $validator->validates($_POST);
    $data = $_POST;
    dump($errors);
    if(empty($errors)){
        
        $patientTable = $app->getTable('Patient');
        $patient = $patientTable->hydrate(new Patient(), $data);
        $patientTable->createPatient($patient);
        header('location: ' . $router->url('patient') . '?success=1');

    }
}

$form = new Form($data, $errors);

?>

<div class="container">
    <h2>Ajouter un nouveau patient</h2>
    <form action="" method="post">
        <?= require '_form.php' ?>
        <div class="form-group" >
            <button type="submit" class="btn btn-primary">Ajouter le Patient</button>
        </div>
    </form>
</div>
    

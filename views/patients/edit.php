<?php

use App\App;
use App\Model\Patient;
use App\Validator\PatientValidator;
use Core\Form\Form;

$app = App::getInstance();
$patientTable = $app->getTable('Patient');

$patient = $patientTable->findWithCin($params['cin']);

$errors = [];

if(!empty($_POST)){
    $validator = new PatientValidator();
    $errors = $validator->validates($_POST);
    dump($errors);
    if(empty($errors)){
        $patient = $patientTable->hydrate(new Patient(), $_POST);
        $patientTable->updatePatient($patient);
        header('location: ' . $router->url('patient'). '?success=1');

    }
}

$form = new Form($patient, $errors);

?>

<div class="container">
    <h2>Ajouter un nouveau patient</h2>
    <form action="" method="post">
        <?= require '_form.php' ?>
        <div class="form-group" >
            <button type="submit" class="btn btn-primary">Editer le Patient</button>
        </div>
    </form>
</div>
    
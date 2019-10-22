<?php

use App\App;
use App\Model\Patient;
use App\Validator\PatientValidator;
use Core\Form\Form;
use App\Auth;

$title = "Secretariat";

$auth = (new Auth)->check();

$app = App::getInstance();
$patientTable = $app->getTable('Patient');

$patient = $patientTable->findWithCin($params['cin']);

$errors = [];

if(!empty($_POST)){
    $validator = new PatientValidator();
    $errors = $validator->validates($_POST);
    if(empty($errors)){
        $patient = $patientTable->hydrate(new Patient(), $_POST);
        $patientTable->updatePatient($patient);
        header('location: ' . $router->url('secretary_patient'). '?edit=1');
        exit();
    }
}

$form = new Form($patient, $errors);

?>

<div class="">
    <h2>Editer le patient <?= $app->e($patient->getNamePatient()) ?></h2>
    <form action="" method="post">
        <?= require '_form.php' ?>
        <button type="submit" class="btn waves-effect waves-light">Editer le Patient
            <i class="material-icons right">edit</i>
        </button>
    </form>
</div>
    
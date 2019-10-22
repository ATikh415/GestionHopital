<?php

use App\App;
use App\Model\Patient;
use App\Validator\PatientValidator;
use Core\Form\Form;
use App\Auth;

$title = "Secretariat";

$auth = (new Auth)->check();

$app = App::getInstance();

$errors = [];
$data = [];

if(!empty($_POST)){
    $validator = new PatientValidator();
    $errors = $validator->validates($_POST);
    $data = $_POST;
    if(empty($errors)){
        
        $patientTable = $app->getTable('Patient');
        $patient = $patientTable->hydrate(new Patient(), $data);
        $patientTable->createPatient($patient);
        header('location: ' . $router->url('secretary_patient') . '?success=1');
        exit();
    }
}

$form = new Form($data, $errors);

?>

<div class="">
    <h2>Ajouter un patient</h2>
    <form action="" method="post">
        <?= require '_form.php' ?>
        <button type="submit" class="btn waves-effect waves-light">Ajouter le Patient
            <i class="material-icons right">send</i>
        </button>
        
    </form>
</div>
    

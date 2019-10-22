<?php

use App\App;
use App\Model\Planning;
use Core\Form\Form;
use App\Validator\PlanningValidator;
use App\Auth;

$title = "Secretariat";

$auth = (new Auth)->check();
$id_secretary = $_SESSION['auth'];

$app = App::getInstance();

$service = $app->getTable('Service')->findBySecretary($id_secretary);


$errors = [];
$data = [
    'date_start' => $_GET['date'] ?? date('Y-m-d'),
    'start' => date('H:i'),
    'end' => date('H:i')
];

$validator = new PlanningValidator($data);
if(!$validator->validate('date', 'date')){
    $data['date'] = date('Y-m-d');
}

if(!empty($_POST)){
    $validator = new PlanningValidator();
    $errors = $validator->validates($_POST);
    $data = $_POST;

    if(empty($errors)){
        $table = $app->getTable('Planning');
        $planning = $table->hydrate(new Planning, $data);
        $table->createPlanning($planning);
        header('location:' . $router->url('secretary_planning') . '?success=1');
        exit();

    }
    

}

$medecins = $app->getTable('Medecin')->extractByService('cin', 'name_med', $service->getId());
$form = new Form($data, $errors);
?>

<div class="container">
    <h3>Ajouter un planning</h3>
    <form action="" method="post">
       <?= require '_form.php' ?>
       <button type="submit" class="btn waves-effect waves-light">Ajouter un planning
            <i class="material-icons right">send</i>
        </button>
    </form>
</div>
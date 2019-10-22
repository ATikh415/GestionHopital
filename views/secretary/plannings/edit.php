<?php

use App\App;
use App\Validator\PlanningValidator;
use Core\Form\Form;
use App\Auth;

$title = "Secretariat";

$auth = (new Auth)->check();
$id_secretary = $_SESSION['auth'];

$app = App::getInstance();
$service = $app->getTable('Service')->findBySecretary($id_secretary);

$table = $app->getTable('Planning');

$item = $table->findBydoctor($params['id']);
$errors = [];
$data = [
    'date_start' => $item->getDateStart()->format('Y-m-d'),
    'start' => $item->getStart()->format('H:i'),
    'date_end' => $item->getDateEnd()->format('Y-m-d'),
    'end' => $item->getEnd()->format('H:i'),
    'cin' => $item->getCin()
];
if(!empty($_POST)){
    $validator = new PlanningValidator();
    $errors = $validator->validates($_POST);
    
    if(empty($errors)){
        dump($_POST);
        $table->hydrate($item, $_POST);
        $table->updatePlanning($item);
        header('location: ' . $router->url('secretary_planning'). '?edit=1');
        exit();
    }
}
$form = new Form($data, $errors);
$medecins = $app->getTable('Medecin')->extractByService('cin', 'name_med', $service->getId());

?>

<div class="">
    <h2>Editer le Planning</h2>
    <form action="" method="post">
        <?= require '_form.php' ?>
        <button type="submit" class="btn waves-effect waves-light">Editer le Planning
            <i class="material-icons right">edit</i>
        </button>
    </form>
</div>
    
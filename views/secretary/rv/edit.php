<?php

use App\App;
use Core\Form\Form;
use App\Model\Event;
use App\Validator\EventValidator;
use App\Auth;

$title = "Secretariat";
$auth = (new Auth)->check();
$id_secretary = $_SESSION['auth'];

$app = App::getInstance();
$table = $app->getTable('Event');
$event = $table->find($params['id']);
$service = $app->getTable('Service')->findBySecretary($id_secretary);
$items = $table->all();


$errors = [];

$data = [
    'name' => $event->getName(),
    'description' => $event->getDescription(),
    'date' => $event->getStart()->format('Y-m-d'),
    'hour' => $event->getStart()->format('H:i') . ' - ' . $event->getEnd()->format('H:i'),
    'cin' => $event->getCin(),
    'cin_medecins' => $event->getCinMedecins()
];


if(!empty($_POST)){
    $planning = $app->getTable('Planning')->findWithCin($_POST['cin_medecins']);

    $validator = new EventValidator();
    $errors = $validator->validates($_POST);

    if($_POST['date'] > $planning->getStart()->format('Y-m-d') && $_POST['date'] > $planning->getEnd()->format('Y-m-d')){
        $errors['date'] = "La date ne correspond pas au planning du medcin";

    }

    foreach($items as $item){
        if($item->getStart()->format('Y-m-d') === $_POST['date']){
            if((int)explode(' - ',$_POST['hour'])[0] === (int)$item->getStart()->format('H:i')){
                $errors['hour'] = "L'heure de rendez-vous est deja pris, recommencer SVP";
            }
        }
    }
    $data = $_POST;
    if(empty($errors)){
        $table->hydrate($event, array_merge($data, ['id' => $id_secretary]));
        $table->updateEvent($event);
        header('location: ' . $router->url('secretary_home') . '?edit=1');
        exit();
    }

}
$patients = $app->getTable('Patient')->extract('cin', 'name_patient');
$medecins = $app->getTable('Medecin')->extractByService('cin', 'name_med', $service->getId());

$form = new Form($data, $errors);
?>

<div class="container">
    <h3>Modifier le rendez-vous</h3>
    <form action="" method="post">
       <?= require '_form.php' ?>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Ajouter un rendez-vous</button>
        </div>
    </form>
</div>
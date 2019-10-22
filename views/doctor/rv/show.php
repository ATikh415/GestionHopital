<?php

use App\App;
use App\Auth;

$title = "Secretariat";

$auth = (new Auth)->check();

$app = App::getInstance();
$eventsTable = $app->getTable('Event');
$medecinTable = $app->getTable('Medecin');

if(!isset($params['id'])){
    $router->url('e404');
}

try{
    $event = $eventsTable->findEvent($params['id']);

}catch(Exception $e){
    $router->url('e404');
}

if(isset($_POST['valid'])){
    $eventsTable->valid($params['id'], 1);
    header('location: ' . $router->url('doctor_home') . '?success=1');
    exit();
}

?>

<?php if($event->getValid() == 1): ?>
    
  <div class="row">
    <div class="col s12 m5">
      <div class="card-panel teal">
        <span class="white-text">
            Le rendez-vous est passe avec succes, merci
        </span>
      </div>
    </div>
  </div>
<?php else: ?>
<form action="" method="post">
        <button class="btn waves-effect waves-light" type="submit" name="valid" >Valider le rendez-vous
        <i class="material-icons right">send</i>
    </button>         
</form>
<?php endif ?>
<h3>Nom du rendez vous : <?= $app->e($event->getName()) ?></h3>

<ul>
    <li> Date : <?= $event->getStart()->format('Y-m-d') ?></li>
    <li> Heure de Demarrage : <?= $event->getStart()->format('H:i') ?></li>
    <li> Heure de Fin : <?= $event->getEnd()->format('H:i') ?></li>
    <li>
        Description : <br>
        <?=$app->e($event->getDescription()) ?>
    </li>
</ul>
<h3>Nom du patient : <?= $app->e($event->getName_Patient()) ?></h3>

<ul>
    <li> Date et lieu de naissance: <?= $event->getDate_naissance()->format('Y-m-d'). ' a '. $event->getLieu_Naissance() ?></li>
    <li> Telephone : <?= $app->e($event->getPhone_Patient()) ?></li>
    <li> Addresse : <?= $app->e($event->getAddr_Patient()) ?></li>
</ul>
<h3>Nom du medecin : <?= $app->e($event->getName_Med()) ?></h3>

<ul>
    <li> Telephone : <?= $app->e($event->getPhone_Med()) ?></li>
    <li> Specialite : <?= $app->e($event->getName_Sp()) ?></li>
    <li> Service : <?= $app->e($event->getName_Service()) ?></li>
</ul>



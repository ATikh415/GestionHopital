<?php

use App\App;

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

?>

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
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

?>

<h3>Nom du rendez vous : <?= e($event->getName()) ?></h3>
<div class="row">
    <div class="col s6">
        <ul>
            <li> Date : <?= $event->getStart()->format('Y-m-d') ?></li>
            <li> Heure de Demarrage : <?= $event->getStart()->format('H:i') ?></li>
            <li> Heure de Fin : <?= $event->getEnd()->format('H:i') ?></li>
            <li>
                Description : <br>
                <?=$app->e($event->getDescription()) ?>
            </li>
         </ul>
    </div>
    <div class="col s6">
        <?php if($event->getValid() == 1): ?>
            <div class="row">
            <div class="col s12">
                <div class="card-panel teal">
                <span class="white-text">
                    Le rendez-vous est passe avec succes, merci
                </span>
                </div>
            </div>
            </div>
        <?php else: ?>
            <div style="display:flex; ">
                <a class="btn blue darken-4" href="<?= $router->url('secretary_rv_edit', ['id' => $params['id']]) ?>">
                    Editer
                </a>
                <form action="<?= $router->url('secretary_rv_delete', ['id' => $params['id']]) ?>" method="post"
                    onsubmit="return confirm('Voulez-vous effectuer cette action ?')"> 
                    <button class="btn red accent-4" type="submit">Supprimer</button>
                </form>
            </div>
    <?php endif ?>

    </div>
</div>

<h3>Nom du patient : <?= e($event->getName_Patient()) ?></h3>

<ul>
    <li> Date et lieu de naissance: <?= $event->getDate_naissance()->format('Y-m-d'). ' a '. $event->getLieu_Naissance() ?></li>
    <li> Telephone : <?= e($event->getPhone_Patient()) ?></li>
    <li> Addresse : <?= e($event->getAddr_Patient()) ?></li>
</ul>
<h3>Nom du medecin : <?= e($event->getName_Med()) ?></h3>

<ul>
    <li> Telephone : <?= e($event->getPhone_Med()) ?></li>
    <li> Specialite : <?= e($event->getName_Sp()) ?></li>
    <li> Service : <?= e($event->getName_Service()) ?></li>
</ul>
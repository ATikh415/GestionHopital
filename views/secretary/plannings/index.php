<?php

use App\App;
use App\Auth;

$title = "Secretariat";

$auth = (new Auth)->check();
$id_secretary = $_SESSION['auth'];

$app = App::getInstance();

$service = $app->getTable('Service')->findBySecretary($id_secretary);
$items = $app->getTable('Planning')->allByDoctor($service->getId());

?>
<div class="">
    <?php if(isset($_GET['success'])): ?>
        <div class="row">
            <div class="col s12">
            <div class="card-panel teal">
                <span class="white-text">
                    Planning ajoute avec succes, merci
                </span>
            </div>
            </div>
        </div>           
    <?php endif ?>
        <?php if(isset($_GET['edit'])): ?>
            <div class="row">
                <div class="col s12">
                <div class="card-panel teal">
                    <span class="white-text">
                        Planning modifier avec succes, merci
                    </span>
                </div>
                </div>
        </div>
        <?php endif ?>
            <?php if(isset($_GET['delete'])): ?>
            <div class="row">
                <div class="col s12">
                <div class="card-panel teal">
                    <span class="white-text">
                        Planning Supprime avec succes, merci
                    </span>
                </div>
                </div>
            </div>
            <?php endif ?>
    <table class="table">
        <thead class="thead-dark">
            <th>Nom du Medecin</th>
            <th>Date Debut</th>
            <th>Date de Fin</th>
            <th>
                <a href="<?= $router->url('secretary_planning_new') ?>" class="btn btn-success">Nouveau Planning</a>
            </th>
        </thead>
        <tbody>
            <?php foreach($items as $item): ?>
            <tr>
                <td>
                    <a href="<?= $router->url('secretary_planning_edit', ['id' => $item->getId()]) ?>">
                    <?= $app->e($item->getNameMed())  ?>
                </a> 
                </td>
                <td><?= $app->e($item->getStart()->format('Y-m-d H:i:s')) ?> </td>
                <td><?= $app->e($item->getEnd()->format('Y-m-d H:i:s')) ?></td>
                <td>
                    <div >
                        <a class="btn blue darken-4" href="<?= $router->url('secretary_planning_edit', ['id' => $item->getId()]) ?>">
                            Editer
                        </a>
                        <form action="<?= $router->url('secretary_planning_delete', ['id' => $item->getId()]) ?>" method="post"
                            onsubmit="return confirm('Voulez-vous effectuer cette action ?')" style="display:inline"> 
                            <button class="btn red accent-4" type="submit">Supprimer</button>
                        </form>
                    </div>
                    
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>


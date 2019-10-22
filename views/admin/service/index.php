<?php

use App\App;
use App\Auth;

$title = "Administration";

$auth = (new Auth)->check();

$app = App::getInstance();
$items = $app->getTable('Service')->getService();

?>
<div >
<?php if(isset($_GET['success'])): ?>
        <div class="row">
            <div class="col s12">
            <div class="card-panel teal">
                <span class="white-text">
                    Service ajoute avec succes, merci
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
                        Service modifier avec succes, merci
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
                        Service Supprime avec succes, merci
                    </span>
                </div>
                </div>
            </div>
            <?php endif ?>
        
    <div class="row" style="margin-top:15px; margin-bottom:5px">
        <div class="col s12">
             <a href="<?= $router->url('admin_speciality') ?>" class="btn purple darken-4">Specialites Service</a>
        </div>
    </div>
          
    <table class="highlight responsive-table">
        <thead>
            <th>Nom du service</th>
            <th>Specialite</th>
            <th>Secretaire</th>
            <th>
                <a href="<?= $router->url('admin_service_new') ?>" class="btn btn-success">Nouveau Service</a>
            </th>
        </thead>
        <tbody>
            <?php foreach($items as $item): ?>
                <tr>
                    <td>
                        <a href="<?= $router->url('admin_service_edit', ['id' => $item->getId()]) ?>">
                        <?= e($item->getNameService())  ?>
                    </a> 
                    </td>
                    <td><?= e($item->getName()) ?></td>
                    <td><?= e($item->getNameSec()) ?></td>
                   
                    <td>
                        <div style="display:flex;">
                            <a class="btn blue darken-4" href="<?= $router->url('admin_service_edit', ['id' => $item->getId()]) ?>">
                                Editer
                            </a>
                            <form action="#" method="post"
                                onsubmit="return confirm('Voulez-vous effectuer cette action ?')"> 
                                <button class="btn red accent-4" type="submit">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
            
            <?php endforeach ?>
        </tbody>
    </table>
</div>


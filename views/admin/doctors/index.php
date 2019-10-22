<?php

use App\App;
use App\Auth;

$title = "Administration";

$auth = (new Auth)->check();

$app = App::getInstance();
$items = $app->getTable('Medecin')->getAllDoctor();

?>
<div >
<?php if(isset($_GET['success'])): ?>
        <div class="row">
            <div class="col s12">
            <div class="card-panel teal">
                <span class="white-text">
                    Medecin ajoute avec succes, merci
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
                        Medecin modifier avec succes, merci
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
                        Medecin Supprime avec succes, merci
                    </span>
                </div>
                </div>
            </div>
            <?php endif ?>
        
    <div class="row" style="margin-top:15px; margin-bottom:5px">
        <div class="col s12">
             <a href="<?= $router->url('admin_specialiste') ?>" class="btn purple darken-4">Specialiste Medecin</a>
        </div>
    </div>
          
    <table class="highlight responsive-table">
        <thead>
            <th>Nom</th>
            <th>Login</th>
            <th>Service</th>
            <th>Specialite</th>
            <th>Telephone</th>
            <th>
                <a href="<?= $router->url('admin_doctor_new') ?>" class="btn btn-success">Nouveau Medecin</a>
            </th>
        </thead>
        <tbody>
            <?php foreach($items as $item): ?>
                <tr>
                    <td>
                        <a href="<?= $router->url('admin_doctor_edit', ['cin' => $item->getCin()]) ?>">
                        <?= e($item->getNameMed())  ?>
                    </a> 
                    </td>
                    <td><?= e($item->getLogin()) ?></td>
                    <td><?= e($item->getNameService()) ?></td>
                    <td><?= e($item->getNameSp()) ?></td>
                    <td><?= e($item->getPhone())  ?></td>
                    <td>
                        <div style="display:flex;">
                            <a class="btn blue darken-4" href="<?= $router->url('admin_doctor_edit', ['cin' => $item->getCin()]) ?>">
                                Editer
                            </a>
                            <form action="<?= $router->url('admin_doctor_delete', ['cin' => $item->getCin()]) ?>" method="post"
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


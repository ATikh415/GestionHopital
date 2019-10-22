<?php

use App\App;
use App\Auth;

$title = "Administration";

$auth = (new Auth)->check();

$app = App::getInstance();
$items = $app->getTable('Secretariat')->allById();

?>
<div >
<?php if(isset($_GET['success'])): ?>
        <div class="row">
            <div class="col s12">
            <div class="card-panel teal">
                <span class="white-text">
                    Secretaire ajoute avec succes, merci
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
                        Secretaire modifier avec succes, merci
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
                        Secretaire Supprime avec succes, merci
                    </span>
                </div>
                </div>
            </div>
            <?php endif ?>
    <table class="highlight responsive-table">
        <thead>
            <th>Nom</th>
            <th>Login</th>
            <th>Telephone</th>
            <th>Adresse</th>
            <th>
                <a href="<?= $router->url('admin_secretary_new') ?>" class="btn btn-success">Nouveau Secretaire</a>
            </th>
        </thead>
        <tbody>
            <?php foreach($items as $item): ?>
            <?php if($item->getId() != 7): ?>
                <tr>
                    <td>
                        <a href="<?= $router->url('admin_secretary_edit', ['id' => $item->getId()]) ?>">
                        <?= e($item->getNameSec())  ?>
                    </a> 
                    </td>
                    <td><?= e($item->getLogin()) ?></td>
                    <td><?= e($item->getPhoneSec())  ?></td>
                    <td><?= e($item->getAddr())  ?></td>
                    <td>
                        <div style="display:flex;">
                            <a class="btn blue darken-4" href="<?= $router->url('admin_secretary_edit', ['id' => $item->getId()]) ?>">
                                Editer
                            </a>
                            <form action="#" method="post"
                                onsubmit="return confirm('Voulez-vous effectuer cette action ?')"> 
                                <button class="btn red accent-4" type="submit">Supprimer</button>
                            </form>
                        </div>
                    </td>
            </tr>
           <?php endif ?>
            
            <?php endforeach ?>
        </tbody>
    </table>
</div>


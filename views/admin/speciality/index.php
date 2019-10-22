<?php

use App\App;
use App\Auth;

$title = "Administration";

$auth = (new Auth)->check();

$app = App::getInstance();
$items = $app->getTable('Speciality')->allById();

?>
<div >
<?php if(isset($_GET['success'])): ?>
        <div class="row">
            <div class="col s12">
            <div class="card-panel teal">
                <span class="white-text">
                    Specialite ajoute avec succes, merci
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
                        Specialite modifier avec succes, merci
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
                        Specialite Supprime avec succes, merci
                    </span>
                </div>
                </div>
            </div>
            <?php endif ?>
          
    <table class="highlight responsive-table">
        <thead>
            <th>Nom Specialite</th>
            <th>
                <a href="<?= $router->url('admin_speciality_new') ?>" class="btn btn-success">Nouveau Specialite</a>
            </th>
        </thead>
        <tbody>
            <?php foreach($items as $item): ?>
                <tr>
                    <td>
                        <a href="<?= $router->url('admin_speciality_edit', ['id' => $item->getId()]) ?>">
                        <?= e($item->getName())  ?>
                    </a> 
                    </td>
                    <td>
                        <div style="display:flex;">
                            <a class="btn blue darken-4" href="<?= $router->url('admin_speciality_edit', ['id' => $item->getId()]) ?>">
                                Editer
                            </a>
                            <form action="" method="post"
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
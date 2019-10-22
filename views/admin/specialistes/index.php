<?php

use App\App;

$app = App::getInstance();
$items = $app->getTable('Specialiste')->allById();

?>
<div class="container">
    <?php if(isset($_GET['success'])): ?>
        <div class="alert alert-success">
            Le specialiste est bien ajoute
        </div>
    <?php endif ?> 
    <?php if(isset($_GET['edit'])): ?>
        <div class="alert alert-success">
            Le specialiste est bien modifie
        </div>
    <?php endif ?> 
    <?php if(isset($_GET['delete'])): ?>
        <div class="alert alert-success">
            Le specialiste a ete bien Supprimer
        </div>
    <?php endif ?>
    <table class="highlight">
        <thead>
            <tr>
                <th>Nom specialiste</th>
                <th>
                    <a href="<?= $router->url('admin_specialiste_new') ?>" class="btn btn-success">Nouveau specialiste</a>
                </th>
            </tr>
            
        </thead>
        <tbody>
            <?php foreach($items as $item): ?>
            <tr>
                <td>
                    <a href="<?= $router->url('admin_specialiste_edit', ['id' => $item->getId()]) ?>">
                    <?= $app->e($item->getNameSp())  ?>
                </a> 
                </td>
                
                <td>
                    <a class="btn blue darken-4"  href="<?= $router->url('admin_specialiste_edit', ['id' => $item->getId()]) ?>">
                        Editer
                    </a>
                    <form action="#" method="post"
                        onsubmit="return confirm('Voulez-vous effectuer cette action ?')" style="display:inline"> 
                        <button class="btn red accent-4" type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>


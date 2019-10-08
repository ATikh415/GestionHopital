<?php

use App\App;

$app = App::getInstance();
$patients = $app->getTable('Patient')->all();
?>
<div class="container">
    <?php if(isset($_GET['success'])): ?>
        <div class="alert alert-success">
            Le Patient est bien modifie
        </div>
    <?php endif ?> <?php if(isset($_GET['delete'])): ?>
        <div class="alert alert-success">
            Le Patient a ete bien Supprimer
        </div>
    <?php endif ?>
    <table class="table">
        <thead class="thead-dark">
            <th>Nom</th>
            <th>Date naissance</th>
            <th>Telephone</th>
            <th>
                <a href="<?= $router->url('patient_new') ?>" class="btn btn-success">Nouveau Patient</a>
            </th>
        </thead>
        <tbody>
            <?php foreach($patients as $patient): ?>
            <tr>
                <td>
                    <a href="<?= $router->url('patient_edit', ['cin' => $patient->getCin()]) ?>">
                    <?= $app->e($patient->getNamePatient())  ?>
                </a> 
                </td>
                <td><?= $app->e($patient->getDateNaissanceP()->format('Y-m-d')) ?> - <?= $app->e($patient->getLieuNaissanceP()) ?></td>
                <td><?= $app->e($patient->getPhonePatient())  ?></td>
                <td>
                    <a class="btn btn-primary" href="<?= $router->url('patient_edit', ['cin' => $patient->getCin()]) ?>">
                        Editer
                    </a>
                    <form action="<?= $router->url('patient_delete', ['cin' => $patient->getCin()]) ?>" method="post"
                        onsubmit="return confirm('Voulez-vous effectuer cette action ?')" style="display:inline"> 
                        <button class="btn btn-danger" type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>


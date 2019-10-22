<?php

use App\App;
use App\Auth;

$title = "Secretariat";

$auth = (new Auth)->check();


$app = App::getInstance();
$patients = $app->getTable('Patient')->all();
?>
<div >
<?php if(isset($_GET['success'])): ?>
        <div class="row">
            <div class="col s12">
            <div class="card-panel teal">
                <span class="white-text">
                    Patient ajoute avec succes, merci
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
                        Patient modifier avec succes, merci
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
                        Patient Supprime avec succes, merci
                    </span>
                </div>
                </div>
            </div>
            <?php endif ?>
    <table class="highlight responsive-table">
        <thead>
            <th>Nom</th>
            <th>Date naissance</th>
            <th>Telephone</th>
            <th>
                <a href="<?= $router->url('secretary_patient_new') ?>" class="btn btn-success">Nouveau Patient</a>
            </th>
        </thead>
        <tbody>
            <?php foreach($patients as $patient): ?>
            <tr>
                <td>
                    <a href="<?= $router->url('secretary_patient_edit', ['cin' => $patient->getCin()]) ?>">
                    <?= $app->e($patient->getNamePatient())  ?>
                </a> 
                </td>
                <td><?= $app->e($patient->getDateNaissanceP()->format('Y-m-d')) ?> - <?= $app->e($patient->getLieuNaissanceP()) ?></td>
                <td><?= $app->e($patient->getPhonePatient())  ?></td>
                <td>
                    <div style="display:flex;">
                        <a class="btn blue darken-4" href="<?= $router->url('secretary_patient_edit', ['cin' => $patient->getCin()]) ?>">
                            Editer
                        </a>
                        <form action="<?= $router->url('secretary_patient_delete', ['cin' => $patient->getCin()]) ?>" method="post"
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


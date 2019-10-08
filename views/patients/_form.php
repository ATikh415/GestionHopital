<div class="row">
    <?= $form->input('cin', "Numero d'Identite", 'text', "Numero de carte d'identite ") ?>
    <?= $form->input('name_patient', 'Nom et Prenom Patient', 'text', 'Nom et Prenom') ?>
</div>

<div class="row">
    <?= $form->input('date_naissance_p', "Date de naissance", 'date', "format : jj/MM/AN ") ?>
    <?= $form->input('lieu_naissance_p', "Lieu de naissance", 'text', "Taper Lieu de naissance ") ?>
</div>

<fieldset class="form-group">
    <div  class="row">
        <legend class="col-form-label col-sm-2 pt-0">Sexe</legend>
        <div class="col-sm-10">
            <?= $form->radio('sex', "Masculin", 'masculin') ?>            
            <?= $form->radio('sex', "Feminin", 'feminin') ?>     
        </div>    
    </div>
</fieldset>

<div class="row">
    <?= $form->input('addr_patient', "Adresse", 'text', "Taper l'adresse du patient") ?>
    <?= $form->input('phone_patient', "Numero de Telephone", 'text', "format : 77 123 02 01 ") ?>
</div>
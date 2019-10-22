<div class="row">
    <?= $form->input('name', 'Titre', 'text', '<i class="material-icons prefix">Title</i>') ?>
    <?= $form->input('date', 'Date', 'date', '<i class="material-icons prefix">date_range</i>') ?>
</div>
<div class="row"> 
    <?= $form->select('hour', 'Heure de rendez-vous : ', CRENRAUX) ?>
</div>
<div class="row">
    <?= $form->select('cin', 'Patient : ', $patients) ?>
    <?= $form->select('cin_medecins', 'Medecin : ', $medecins) ?>
</div>
        <?= $form->textarea('description', 'Description :') ?>
<div class="row">
    <?= $form->input('date_start', 'Date Debut', 'date', '<i class="material-icons prefix">date_range</i>') ?>
    <?= $form->input('start', 'Heure de Demarrage :', 'time','<i class="material-icons prefix">timer</i>') ?>
</div>
<div class="row">
    <?= $form->input('date_end', 'Date Fin', 'date','<i class="material-icons prefix">date_range</i>') ?>
    <?= $form->input('end', 'Heure de Fin :', 'time','<i class="material-icons prefix">timer</i>') ?>
</div>
<div class="row">
    <?= $form->select('cin', 'Medecin : ', $medecins) ?>
</div>

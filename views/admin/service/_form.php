<div class="row">
     <?= $form->input('name_service', 'Nom du Service :', 'text', '<i class="material-icons prefix">person</i>') ?>
</div>
<div class="row">
    <?= $form->select('id_specialites', 'Specialites : ', $speciality) ?>
    <?= $form->select('id_secretariats', 'Secretaire : ', $secretary) ?>
</div>

       
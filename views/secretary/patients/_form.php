<div class="row">
    <?= $form->input('cin', "Numero d'Identite :", 'text', '<i class="material-icons prefix">vpn_key</i>') ?>
    <?= $form->input('name_patient', 'Nom et Prenom Patient :', 'text', '<i class="material-icons prefix">person</i>') ?>
</div>

<div class="row">
    <?= $form->input('date_naissance_p', "Date de naissance", 'date','<i class="material-icons prefix">date_range</i>') ?>
    <?= $form->input('lieu_naissance_p', "Lieu de naissance :", 'text', '<i class="material-icons prefix">timer</i>') ?>
</div>

    <div  class="row">
            <?= $form->radio('sex', "Masculin", 'masculin') ?>            
            <?= $form->radio('sex', "Feminin", 'feminin') ?>     
    </div>

<div class="row">
    <?= $form->input('addr_patient', "Adresse :", 'text', '<i class="material-icons prefix">location_on</i>') ?>
    <?= $form->input('phone_patient', "Telephone format : 7x xxx xx xx", 'text', '<i class="material-icons prefix">contact_phone</i>') ?>
</div>
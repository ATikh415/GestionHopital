<div class="row">
    <?= $form->input('name_sec', 'Nom et Prenom Secretaire :', 'text', '<i class="material-icons prefix">person</i>') ?>
</div>
<div class="row">
    <?= $form->input('login', "Nom de l'ulisateur :", 'text','<i class="material-icons prefix">title</i>') ?>
    <?= $form->input('password', "Mot de passe :", 'password','<i class="material-icons prefix">vpn_key</i>') ?>
</div>
<div class="row">
    <?= $form->input('addr', "Adresse :", 'text', '<i class="material-icons prefix">location_on</i>') ?>
    <?= $form->input('phone_sec', "Telephone format : 7x xxx xx xx", 'text', '<i class="material-icons prefix">contact_phone</i>') ?>
</div>

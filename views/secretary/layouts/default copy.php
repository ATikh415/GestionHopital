<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
  <link rel="stylesheet" href="css/calendar.css">
  <title><?= isset($title) ? e($title) : 'Gestion Hopital' ?></title>
</head>
<body>

  <div class="navbar-fixed">
    <nav class="nav-wrapper  blue darken-4">
      <div class="container">
        <a href="<?= $router->url('secretary_home') ?>" class="brand-logo">Gest Hopital</a>
        <a href="#" class="sidenav-trigger" data-target="mobile-links">
          <i class="material-icons">menu</i>
        </a>
        <ul class="right hide-on-med-and-down">
          <li><a href="<?= $router->url('secretary_home') ?>">Home</a></li>
          <li><a href="<?= $router->url('secretary_patient') ?>">Patients</a></li>
          <li><a href="<?= $router->url('secretary_planning') ?>">Planning</a></li>
          <li><a href="<?= $router->url('logout') ?>" class="btn white indigo-text">Se deconnecter</a></li>
        </ul>
      </div>
    </nav>
  </div>

  <ul class="sidenav" id="mobile-links">
    <li><a href="<?= $router->url('secretary_home') ?>">Home</a></li>
    <li><a href="<?= $router->url('secretary_patient') ?>">Patients</a></li>
    <li><a href="<?= $router->url('secretary_planning') ?>">Planning</a></li>
  </ul>
  <div class="container">
      <?= $content ?>
  </div>
  
  <!-- Compiled and minified JavaScript -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
  <script>
    $(document).ready(function(){
      $('.sidenav').sidenav();
      $('select').formSelect();
      $('.datepicker').datepicker({
        disableWeekends: true,
        yearRange: 1
      });
    });
  </script>
</body>
</html>
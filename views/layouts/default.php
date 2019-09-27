<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <header>
        <div class="logo">LOGO</div> 
        <nav>
            <ul>
                <li><a href="#" class="active">Home</a></li>
                <li><a href="#">About</a></li>
                <li class="sub-menu"><a href="#">Service</a>
                    <ul>
                        <li><a href="#">Link 1</a></li>
                        <li><a href="#">Link 1</a></li>
                        <li><a href="#">Link 1</a></li>
                        <li><a href="#">Link 1</a></li>
                    </ul>
                </li>
                <li class="sub-menu"><a href="#">Portifolio</a>
                    <ul>
                        <li><a href="#">Link 1</a></li>
                        <li><a href="#">Link 1</a></li>
                        <li><a href="#">Link 1</a></li>
                        <li><a href="#">Link 1</a></li>
                    </ul>
                </li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
        <div class="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i></div>

    </header>
    <div class="container site">
        <?= $content ?>
    </div>
    <script  src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script type="text/javascript">
        $(Document).ready(function(){
            $('.menu-toggle').click(function(){
                $('nav').toggleClass('active')
            })
             $('ul li').click(function(){
                 $(this).siblings().removeClass('active');
                 $(this).toggleClass('active')
             })
        })    
    </script>
</body>
</html> 
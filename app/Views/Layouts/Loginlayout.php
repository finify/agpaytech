<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <title><?= $this->siteTitle?></title>
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/png" href="../img/favicon.png">
        <link rel="stylesheet" type="text/css" href="style/indexstyle.css">

        <link rel="stylesheet" href="<?=PROOT?>assets/loginstyle.css">
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>

        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <?= $this->content('head');?>
    </head>
    <body>
        <div class="wrapper">
            <center>
            <h2>ICA RIVERS</h2><br>
            </center>
            
            <?= $this->content('body');?>
            
            <footer>
                <a href="../">
                    BACK TO HOMEPAGE <br>
                </a>
            </footer>
        </div>
        
    <!--  Scripts-->
    <script src="<?=PROOT?>/js/jquerry/jquery-2.2.4.min.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    </body>
</html>
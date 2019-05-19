<!doctype html>
<html lang="pt">
<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stock - Login</title>
    <style>
        .container {
            position: absolute;
            height: 100%;
            width: 100%;
            max-width: none;
        }

        .child {
            position: absolute;
            top: 50%;
            left: 50%;
            height: 50%;
            width: 50%;
            margin: -15% 0 0 -25%;
        }
    </style>
</head>
<body>
<?php
if ($_POST) {
    require __DIR__ . '/../controllers/UsuarioController.php';
    $control = new UsuarioController();
    $user = $control->login($_POST['login'], $_POST['senha']);
    if ($user){
        header('Location: ../index.php');
    } else {
        echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>';
        echo '<script src="js/login.js"></script>';
        echo '<script>showMessage("Ocorreu um erro de autenticação!")</script>';
    }
}
?>
<main class="container">
    <div class="child">
        <div class="row">
            <div class="col s12">
                <h5 class="teal-text center-align">Acesse sua conta</h5>
            </div>
        </div>
        <form class="col s12" method="post">
            <div class='row'>
                <div class='col s12'>
                </div>
            </div>
            <div class='row'>
                <div class='input-field col s8 offset-s2'>
                    <input class='validate' type='text' name='login' id='login'/>
                    <label for='login'>Informe o seu login</label>
                </div>
            </div>
            <div class='row'>
                <div class='input-field col s8 offset-s2'>
                    <input class='validate' type='password' name='senha' id='senha'/>
                    <label for='senha'>Informe a sua senha</label>
                </div>
            </div>
            <div class='row center-align'>
                <button type='submit' name='btn_login' class='col s6 offset-s3 btn btn-large waves-effect waves-light'>
                    Entrar
                </button>
            </div>
        </form>
    </div>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        M.updateTextFields();
        M.AutoInit();

        const elems = document.querySelectorAll('.tooltipped');
        M.Tooltip.init(elems, {});
    });
</script>
</body>

</html>
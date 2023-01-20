<?php
session_start();
@$login=$_POST["login"];
@$pass=$_POST["pass"];
@$valider=$_POST["valider"];
$message="";
if(isset($valider))
{
    include("conection.php");
    $res=$pdo->prepare("select * from users where login=? and pass=? limit 1 ");
    $res->setFetchMode(PDO :: FETCH_ASSOC);
    $res->execute(array($login,md5($pass)));
    $tab=$res->fetchall();
    if(count($tab)==0)
    {
        $message="mauvaise login ou mode pass";
    }
    else
    {
        $_SESSION["autoriser"]="oui";
        $_SESSION["nom"]=strtoupper($tab[0]["nom"]);
        header("location:acceuil.php");
    }
  
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
            <div class="wrap-login100 p-t-30 p-b-50">
                <span class="login100-form-title p-b-41">
                    Account Login
                </span>
                <form class="login100-form validate-form p-b-33 p-t-5">

                    <div class="wrap-input100 validate-input" data-validate="Enter username">
                        <input class="input100" type="text" name="login" value="<?php $login ?>"
                            placeholder="User name">
                        <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input class="input100" type="password" name="pass" value="<?php $pass ?>"
                            placeholder="Password">
                        <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                    </div>

                    <div class="container-login100-form-btn m-t-32">
                        <input class="login100-form-btn" type="submit" name="valider" value="Login">
                    </div>

                    <div class="container-login100-form-btn m-t-32">
                        <input class="login100-form-btn" type="submit" name="valider" value="S'inscrire"
                            href="inscription.php">
                    </div>

                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="fonts/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="fonts/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="fonts/bootstrap/js/popper.js"></script>
    <script src="fonts/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->

    <!--===============================================================================================-->

    <!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>

</html>
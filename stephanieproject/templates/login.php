<?php
session_start();
session_destroy();
//print_r($_SESSION);

require_once '../Core/Database.php';
require_once 'header.php';
$title = 'login';

$msg = '';
$msgClass = '';

function verifyInput($var){
    $var = trim($var);
    $var = stripslashes($var);
    $var = htmlspecialchars($var);

    return $var;
}

if(isset($_POST['submit'])){
    $emailConnect   = verifyInput($_POST['email']);
    $password       = verifyInput($_POST['password']);
    $passwordHashed = sha1($password);
    //$password       = verifyInput(password_hash($_POST["password"],PASSWORD_DEFAULT));

    $userVerify = $db->prepare("SELECT * FROM user WHERE email = ? AND password = ?");
    $userVerify->execute(array($emailConnect, $passwordHashed));
    $count = $userVerify->rowCount();

    if($count > 0){
        $_SESSION['User'] = $user;
        header('Location: home');
        exit();
    }else {
        $msg = "mail et/où mot de passe incorrect";
        $msgClass = "alert-danger";
    }
}










// if(isset($_POST['submit'])){

//     $emailConnect   = verifyInput($_POST['email']);
//     $password       = verifyInput(password_hash($_POST["password"],PASSWORD_DEFAULT));
    
//     if(empty($emailConnect) || empty($_POST["password"]))
//     {
//         $msg = "Veuillez remplir tous les champs requis";
//         $msgClass = "alert-danger";
//     }
//     else if(filter_var($emailConnect,FILTER_VALIDATE_EMAIL) === false){
//         $msg = "Veuillez entrer un email valid";
//         $msgClass = "alert-danger";
//     }
//     else 
//     {
//         $userVerify = $db->prepare("SELECT * FROM user WHERE email = ?");
//         $userVerify->execute(array($emailConnect));
//         $info  = $userVerify->fetch();
//         $hash  = $info['password'];

//         if(password_verify($password, $hash)){

//             $_SESSION['auth'] = $info['id'];
//             header ("location : home?id=".$_SESSION["auth"]);
//             exite();
//             $msg = "Bienvenue ".$info['name'] . " - " . $info['password'];
//             $msgClass = "alert-success";
//         }           
//     }               
// }                   

?>

        <div class="register">
            <img src="images/contact.jpg" alt="">
        </div>
    <div class="container register">
        
        <form class="register-form" method="POST">
            <?php if($msg != '') : ?>
                <div class="alert <?php echo $msgClass ?>"><?php echo $msg ?></div>
            <?php endif ?>
            <h2>Connexion </h2>
            <div class="register-div">
                <label for="">E-mail:</label>
                <input type="text" id="email" name="email" class="register-input" placeholder="Votre Email" value="<?php isset($emailConnect) ? $emailConnect : '' ?>">
            </div>
            <div class="register-div">
                <label for="">Mot de passe:</label>
                <input type="password" id="password"  name="password" class="register-input" placeholder="Mot de passe">
            </div>
            <input type="submit" value="Se connecter" class="submit-btn" name="submit">
        </form>
    </div>

<?php require_once 'footer.php' ?>
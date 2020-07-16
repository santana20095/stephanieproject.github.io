<?php
    require_once '../Core/Database.php';
    $title = "sing in";

    $msg = '';
    $msgClass = '';    

    function verifyInput($var){
        $var = trim($var);
        $var = stripslashes($var);
        $var = htmlspecialchars($var);

        return $var;
    }
    
    if(isset($_POST['submit'])){
        
        $name           = verifyInput($_POST['name']) ; 
        $email          = verifyInput($_POST['email']);
        $phone          = verifyInput($_POST['phone']);
        $password       = verifyInput(sha1($_POST["password"]));
        $password_con   = verifyInput(sha1($_POST["password_con"]));

        if(empty($name) || empty($email) || empty($password) || empty($password_con))
        {
            $msg = "veuillez remplir tout les champs";
            $msgClass = "alert-danger";
        }
        else if(empty($name))
        {
            $msg = "veuillez entrer votre nom";
            $msgClass = "alert-danger";
        }
        else if(empty($password || $password_con))
        {
            $msg = "veuillez entrer un mot de passe";
            $msgClass = "alert-danger";
        }
        else if ($_POST["password"] != $_POST["password_con"])
        {
            $msg = "veuillez entrer le même mot de passe";
            $msgClass = "alert-danger";
        }
        else if(empty($email)) 
        {
            $msg = "veuillez entrer un email";
            $msgClass = "alert-danger";
        }
        else if(filter_var($email, FILTER_VALIDATE_EMAIL) === false)
        {
            $msg = "veuillez entrer un email valide";
            $msgClass = "alert-danger";
        }

        else
        {
            $userVerify = $db->prepare("SELECT * FROM user WHERE email = ? ");
            $userVerify->execute(array($email));
            $exist = $userVerify->rowCount();
            if($exist){
                $msg = "email déja utilisé";}
                $msgClass = "alert-danger";
            }

        if(empty($msg)){
            $userReq = $db->prepare("INSERT INTO user (name,email,phone,password) VALUES (:name,:email,:phone,:password)");

            $userReq->execute([ ':name'         => $name,
                                ':email'        => $email,
                                ':phone'        => $phone,
                                ':password'     => $password
                        ]);
            
            $msg = "Votre inscription a bien été enregistrée";
            $msgClass = "alert-success";
        }
    }

    require_once 'header.php' ;
?>

        <div class="register">
            <img src="images/contact.jpg" alt="">
        </div>
    <div class="container register">
        
        <form class="register-form" method="POST" action="">
            <?php if($msg != ''): ?>
                <div class="alert <?php echo $msgClass; ?>"> <?php echo $msg ?></div>
            <?php endif?>
            <h2>Inscription </h2>
            <div class="register-div">
                <label for="">Nom <span class="etoile">*</span></label>
                <input type="text" id="name" name="name" class="register-input"  placeholder="Votre Nom" value="">
            </div>
            <div class="register-div">
                <label for="">E-mail <span class="etoile">*</span></label>
                <input type="text" id="email" name="email" class="register-input" placeholder="Votre Email"  value="">
            </div>
            <div class="register-div">
                <label for="">Tél (Facultatif)</label>
                <input type="number" id="phone"  name="phone" class="register-input" placeholder="Votre Numéro"  value="">
            </div>
            <div class="register-div">
                <label for="">Mot de passe <span class="etoile">*</span></label>
                <input type="password" id="password"  name="password" class="register-input" placeholder="Mot de passe"  value="">
            </div>
            <div class="register-div">
                <label for="">Confirmation du mot de passe <span class="etoile">*</span></label>
                <input type="password" id="password_con"  name="password_con" class="register-input" placeholder="Confirmez le mot de passe"  value="">
            </div>
            <input type="submit" value="Enregistrer" class="submit-btn" name="submit">
        </form>
    </div>

<?php require_once 'footer.php' ?>
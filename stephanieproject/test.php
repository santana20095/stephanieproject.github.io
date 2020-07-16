<?php
if (isset ($_POST["submit''])){
    $nom = htmlspecialchars ($_POST["nom"]);
    $email = htmlspecialchars ($_POST["nom"]);

    if (empty ($nom)){
    $erreur = '' veillez saisir votre nom'';}

    if (empty ($email)){
    $erreur = '' veillez saisir votre email'';}
    
    else {
    $req = $db->prepare("SELECT * FROM nom de la table WHERE email = ?");

    $req->execute (array ($email));

    if($existe->rowCount () == 1){

    $erreur = '' adresse email déjà utilisé'';}

    }

    if (empty ($erreur)){
    //On inscrit
}
          
if(!empty($name) && !empty($email) && !empty($phone) && !empty($password) && !empty($password_con)){
            


    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false ){
        $msg = "Veuilez entrer un email valide";
        $msgClass = "alert-danger";

    } else{
        
    }
    $userReq = $db->prepare("INSERT INTO user (name,email,phone,password) VALUES (:name,:email,:phone,:password)");

    $userReq->execute([ ':name'         => $name,
                        ':email'        => $email,
                        ':phone'        => $phone,
                        ':password'     => $password
                        ]);

    $msg = "Votre inscription a bien été enregistrée";
    $msgClass = "alert-success";
       
} else {
    $msg = "Veuilez remplir tout les champs";
    $msgClass = "alert-danger";
}
}





/* LOGIN */

if(!empty($emailConnect) && !empty($password)){

    $userReq = $db->prepare("SELECT * FROM user WHERE email = ? AND password = ?");
    $userReq->execute(array($emailConnect,$password));
    $userExist = $userReq->rowCount();

    if($userExist == 1)
    {
        $msg = "Vous etes connecté";
        $msgClass = "alert-success";
    }

}else 
{
    $msg = "Veuilez remplir tout les champs";
    $msgClass = "alert-danger";
}

$req = $db->prepare ("SELECT * FROM user WHERE email = ?");
$req->execute (array ($email));
$info = $req->fetch ();
$hash = $info["password''];
if(password_verify($password, $hash)){
session_start();
$_SESSION["auth"] = $info["id"];
header ("location : compte.php?id=".$_SESSION["auth'']);
exit();
}else {
$erreur = ''email ou mot de passe incorrect'';
}








/* Bon coin */
Bonjour
veuillez bien lire l'annonce SVP.

je met en vente cette belle voiture

Options: Vitres électriques, Clim, CD avec commandes au volant, jantes alu, direction assistée, fermeture centralisée, ordinateur de bord, airbags, ESP, ABS,...

Intérieur et extérieur propres appart quelque rayure mais rien de méchant
la voiture est entretenu chez un garage avec plein de factures depuis sa mis en circulation

CT ok 02/07/2020 sauf un voyant pollution allumé
j'ai changé la sonde lambda avec nettoyage total du catalyseur et j'ai fini par changer les bougies mais le voyant est toujours là ( facture à l’appui ).

la voiture roule super bien et elle démarre au quarte de tour sans aucun problème .

pour plus de photos ou d'information n'hésitez pas m'appeler.

Cordialement
<?php
    $html = "";
    function verifUser($username){
        include("connection_bdd.php");
        $query = "SELECT mdp, no_util FROM utilisateurs WHERE login = '$username'";
        $statement = $connexion->prepare($query);
        $statement->execute();
        $row = $statement->fetch();
        $password = $row[0];
        $no_util = $row[1];
        $passwordco = hash('sha256',trim($_POST["mdpco"]));
        if(strcmp($password, $passwordco)==0) {
            $_SESSION["nom"] = $username;
            $_SESSION["no_util"] = $no_util;
            return true;
        }
        else return false;
    }
    
    if(isset($_POST["ndcco"])) {
        $username = trim($_POST["ndcco"]);
        if(verifUser($username)==true) {
            $html.='<div style="text-align: center;">
            <h2 style="color:green"> La connexion a fonctionnée.</h2>
            </div>';
        }
        else $html.='<div style="text-align: center;">
            <h2 style="color:red"> Le nom d\'utilisateur ou le mot de passe est incorrect</h2>
            </div>';
        
    }
    
    $html.= "</body>
    </html>";

    echo $html;
    
?>
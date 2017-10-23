<div class="row">
                
        <div id="banniere">
                <br/>
                <div class="col-xs-3">
                    <div class="padd40">
                    <form action="" method="post">
                        <input type="text" name="recherche" id="recherche" placeholder="Recherche de cocktails..." required=""/>
                        <input id="search" class="btn btn-danger" type="submit" value="Recherche"/>
                    </form>
                    </div>
                </div>
                <!-- A remplacer par un logo ou autre -->
                <div class="col-xs-offset-2 col-xs-2">
                    <a href="index.php">Accueil</a>
                </div>
                <form action="#" method="post" class="form-horizontal">
                    <div class="col-xs-offset-2 col-xs-4">
                    <div class="padd20">
                        <!-- champs du nom d'utilisateur -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="ndcco">Nom d'utilisateur</label>  
                            <div class="col-md-7">
                                <input id="ndcco" name="ndcco" placeholder="" class="form-control input-md" required="" type="text">
                            </div>
                        </div>  
                    </div>      
                        <!-- champs du mot de passe -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="mdpco">Mot de passe</label>
                            <div class="col-md-7">
                                <input id="mdpco" name="mdpco" placeholder="" class="form-control input-md" required="" type="password"/>
                            </div>
                        </div>

                    </div>
                    <div class="col-xs-1">
                        <!-- connection button-->
                        <input id="connect" type="submit" class="btn btn-danger" value="Connection"/>
                </form>
                        <!-- inscription button-->
                        <a href="inscription.php" class="btn btn-warning">Inscription</a>
                    </div>
                </div>   

            </div>

</div>
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
            header("Refresh:0");
        }
        else $html.='<div style="text-align: center;">
            <h2 style="color:red"> Le nom d\'utilisateur ou le mot de passe est incorrect</h2>
            </div>';
        
    }

    echo $html;
    
?>
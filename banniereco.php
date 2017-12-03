
    <div class="row">
                
        <div id="banniere">
                <div class="padd40">
                    <form action="#" method="post">
                        <input type="text" name="recherche" id="recherche" placeholder="Recherche de cocktails..." required=""/>
                        <input class="btn btn-danger" type="submit" value="Recherche"/>
                    </form>
                </div>
                <div class="padd40">
                    <div class="col-xs-offset-8 col-xs-2">

                        <div class="form-group">
                                <p> Username : 
                                <?php
                                echo $_SESSION['nom'];
                                ?>    
                                </p>
                                <!-- recettes préférées bouton-->
                                <a href="recettespreferees.php" class="btn btn-warning">Mes recettes préférées <span class="glyphicon glyphicon-user"></span></a>
                                <!-- profil bouton-->
                                <a href="monprofil.php" class="btn btn-warning">Mon profil <span class="glyphicon glyphicon-user"></span></a>
                                 <!-- deconnection bouton-->
                                <form action="#" method="post" class="form-horizontal">
                                    <input name="deconnection" type="submit" class="btn btn-danger" value="Deconnection"/>
                                </form>
                        </div>
                    
                    </div>
                </div>
            </div>
                
    </div>
<?php
    include ("fonctions.php");
    if(isset($_POST['deconnection'])){
        deconnection();
    }
?>
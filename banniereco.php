
    <div class="row">
                
        <div id="banniere">
                <div class="padd40">
                    <form action="#" method="post">
                        <input type="text" name="recherche" id="recherche" placeholder="Recherche de cocktails..." required=""/>
                        <input id="search" class="btn btn-danger" type="submit" value="Recherche"/>
                    </form>
                </div>

                <!-- A remplacer par un logo ou autre -->
                <div class="col-xs-offset-2 col-xs-2">
                    <a href="index.php">Accueil</a>
                </div>
                <div class="padd40">
                    <div class="col-xs-offset-3 col-xs-2">

                        <div class="form-group">
                                <p> Username : 
                                <?php
                                echo $_SESSION['nom'];
                                ?>    
                                </p>
                                <!-- profil button-->
                                <a href="#" class="btn btn-warning">Profile <span class="glyphicon glyphicon-user"></span></a>
                                 <!-- deconnection button-->
                                <form action="#" method="post" class="form-horizontal">
                                    <input name="deconnection" type="submit" class="btn btn-danger" value="Deconnection"/>
                                </form>
                        </div>
                    
                    </div>
                </div>
            </div>
                
    </div>
<?php
    if(isset($_POST['deconnection'])){
        session_unset();
        session_destroy();
        header("Refresh:0");
    }
?>
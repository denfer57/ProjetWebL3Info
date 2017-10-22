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
                <form action="" method="post" class="form-horizontal">
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
                                <input href="connection.php" id="connect" type="submit" class="btn btn-danger" value="Connection"/>
                </form>
                        <!-- inscription button-->
                        <a href="inscription.php" class="btn btn-warning">Inscription</a>
                    </div>
                </div>   

            </div>

</div>
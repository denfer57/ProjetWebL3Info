<div class="row">
                
        <svg viewBox="0 0 760 300">
            <symbol id="s-text">
                    <text text-anchor="middle" x="50%" y="80%"> Cocktail </text>
            </symbol>
            <g class = "g-ants">
                    <use xlink:href="#s-text" class="text-copy"></use>
                    <use xlink:href="#s-text" class="text-copy"></use>
                    <use xlink:href="#s-text" class="text-copy"></use>
                    <use xlink:href="#s-text" class="text-copy"></use>
                    <use xlink:href="#s-text" class="text-copy"></use>
            </g>
        </svg>
   <h4 align="center"> Un porjet réalisé par </br> <b> Jordan Fromeyer & Marwin Nimeskern </b>  </h4> 
   <div class="container">
<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"> 
        <span class="glyphicon glyphicon-glass">  </span> 
        Cocktail
        <span class="glyphicon glyphicon-glass"></span>
      </a>
    </div>

    <!-- Menu contenu + sous-menu deroulant -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        
      
         <form action="index.php" method="post" class="navbar-form navbar-left">
                   <div class="form-group">
                        <input type="text" class="form-control" name="recherche" id="recherche" placeholder="Recherche de cocktails..." required="" >
                    </div>
                    <input class="btn btn-danger" type="submit" value="Recherche"/>
        </form>
      </ul>

      <ul class="nav navbar-nav navbar-right">
      
       <!-- 
        <li><a href="#"><i class="icon-comment"></i> 
                <span class="glyphicon glyphicon-glass"></span>
                Favoris 
                <span class="badge badge-info">00</span></a>
        </li>
        -->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Se connecter <span class="glyphicon glyphicon-user"></span> 
          <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li>
            <!-- Link trigger modal se connecter -->
                <a data-toggle="modal" data-target="#login" >Connexion <span class="glyphicon glyphicon-heart"></span> </a> </li>
            <li class="divider"></li>
            <li>
            <!-- Link trigger modal Inscription -->
                <a href="inscription.php"> Inscription  <span class="glyphicon glyphicon-home"></span>  </a> </li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</div>
                
                
                
                <!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////--> 
        
<!-- Modal Login -->
        <form id="logingform" action="index.php" method="post" >
        <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h2 class="modal-title" id="myModalLabel">Login</h2>
              </div>
              
              <div class="modal-body">
                <div class="form-group has-feedback">
                     <label class="control-label" for="ndcco">Nom d'utilisateur</label>
                        <input type="text" class="form-control" name="ndcco" id="ndcco" aria-describedby="inputSuccess2Status" placeholder="" required="">
                  <!-- <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span> -->
                </div>
                
                <div class="form-group has-feedback">
              
                    <label class="control-label" for="mdpco">Mot de Passe</label>
                        <input type="password" class="form-control" id="mdpco" name="mdpco" aria-describedby="inputSuccess2Status" placeholder="" required="">
                
                 <!-- <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span> -->
                </div>
                
                <input id="connect" type="submit" class="btn btn-primary" value="Connection"/>
               <!--  
               <input type="checkbox" value="rememberme" id="rememberme">Se souvenir de Moi<br/><br/>
               <a href="#">Forgot your password?</a> 
               -->
                
              </div>
              
              <div class="modal-footer">
              <h4 class="modal-title" id="myModalLabel"> Si vous n'avez jamais goute a nos cocktails </h4>
                 <a href="inscription.php" > <h4> Enregistrez-Vous </h4> </a>
                <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>-->
              </div>
              
            </div>
          </div>
        </div><!-- end become a member modal -->
        </form> <!-- end login form -->
        
	</div>
</div>

<!-- end login form -->

<!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<?php
    $html = "";
    include ("fonctions.php");

    if(isset($_POST["ndcco"])) {
        $username = trim($_POST["ndcco"]);
        if(connection($username)==true) {
	    error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
            echo " <meta http-equiv=\"refresh\" content=\"0\"> " ;
        }
        else {
            $html.='
            <div style="text-align: center;">
                <h2 style="color:red"> Le nom d\'utilisateur ou le mot de passe est incorrect</h2>
            </div>';
        }
    }

    
?>

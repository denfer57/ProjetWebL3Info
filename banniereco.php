
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
      
        <li><a href="recettespreferees.php" ><i class="icon-comment"></i> 
                <span class="glyphicon glyphicon-glass"></span>
                Mes recettes préférées
                <!--<span class="badge badge-info">   </span> -->
            </a>
        </li>
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <?php   echo $_SESSION['nom'];   ?> <span class="glyphicon glyphicon-user"></span> 
          <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li>
            <!-- Link trigger modal se connecter -->
                <a href="monprofil.php" > Mon profil <span class="glyphicon glyphicon-heart"></span> </a> </li>
            <li class="divider"></li>
            <li>
            <!-- Link trigger modal Inscription -->
                <a>     <form action="#" method="post" class="form-horizontal">
                                    <input name="deconnection" type="submit" class="btn btn-danger" value="Deconnexion"/>
                        </form>  
                </a> 
            </li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</div>


<!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->  
        
<?php
    include ("fonctions.php");
    if(isset($_POST['deconnection'])){
        deconnection();
    }
?>

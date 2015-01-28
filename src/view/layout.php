
<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Art Space</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://artspace.local/css/normalize.min.css" />
        <link rel="stylesheet" href="http://artspace.local/css/bootstrap.min.css" />
        <link rel="stylesheet" href="http://artspace.local/css/main.css" />
        <link rel="stylesheet" media="screen and (max-device-width: 640px)" href="http://artspace.local/css/mobile.css" />
        <script src="<?php echo service\Config::url('dist/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js', null); ?>"></script>
    </head>

    <body>
        <!-- ****************** Menu *************** -->

        <header>

            <!--  logo + menu -->
         
            <img src="http://artspace.local/img/header-footer/logo.png" id="logo" alt="logo Art Space"/>
            <nav>

                <ul>
                    <li><a href="/" id="select">Tour</a></li>
                    <!--<li><a href="#">Templates</a></li>-->
                    <!--<li><a href="#">Developers</a></li>-->
                                     
                    <li><a href="/pricing/1">Pricing</a></li>
                    <?php
                                      
                           
                     if (!empty($_SESSION['user']))
                      {
                           
                               $veri=  service\DiverService::VerifUser($_SESSION['user']);
                           
                                if ($veri!=true)
                               {
                                       $_SESSION['user']=[];
                                      // a faire message d'erreur
                                       goto sanslogin;
                                 }
                                             
                                $nom=$_SESSION['user'][1];
                                echo '<li><a href="/login">Bonjour '.$nom.'</a></li>';
                                echo '<li><a href="/historique">historique</a></li>';
                     
                                if($_SESSION['user'][3]=='administrator')
                                {
                                    echo '<li><a href="/admin/liste/Produit">admin</a></li>';
                                }
                                echo '<li><a href="/logout">Log out</a></li>';
                            }
                            /****** non loger ****/
                       else 
                      {
                                sanslogin: ;
                               echo '<li><a href="/login">Login</a></li>';
                               echo '<li><a href="/inscription">Register</a></li>';
                      }
                      //********** panier *********//
                            if (!empty($_SESSION['panier']))
                             {
                                 echo '<li><a href="/Panier">Panier '.count($_SESSION['panier']).'</a></li>';
                             }
                          
                    ?>
                    
                </ul>
            </nav>

        </header>
       
     
     <!-- *******************   colonne droite et gauche *************-->
     
      
        <?php
                echo $content;
        // put your code here
        ?>
     <!--</div>-->
        <!-- ******************** footer   ******************************************-->
        <footer>
            <div class="container">
                <ul>
                    <li>   <!-- class orange pour le survol des lien en orange-->
                        <a href="#" class="orange" >PRODUCT</a> 
                        <ul class="footDessous">
                            <li><a href="#" class="orange">Tour</a></li>
                            <li><a href="#" class="orange">Templates</a></li>
                            <li><a href="#" class="orange">Mobile apps</a></li>
                            <li><a href="#" class="orange">Developpers</a></li>
                            <li><a href="#" class="orange">Pricing</a></li>
                            <li><a href="#" class="orange">Sign up</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="orange">COMPANY</a>
                        <ul class="footDessous">
                            <li><a href="#" class="orange">About</a></li>
                            <li><a href="#" class="orange">Careers</a></li>
                            <li><a href="#" class="orange">Press & media</a></li>
                            <li><a href="#" class="orange">Environnement impact</a></li>
                            <li><a href="#" class="orange">Affiliates program</a></li>
                            <li><a href="#" class="orange">Terms services</a></li>
                            <li><a href="#" class="orange">Privacy policy</a></li>
                            <li><a href="#" class="orange">contact us</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="orange">COMMUNITY</a>
                        <ul class="footDessous">
                            <li><a href="#" class="orange">Blog</a></li>
                            <li><a href="#" class="orange">Help & support</a></li>
                            <li><a href="#" class="orange">Answer</a></li>
                            <li><a href="#" class="orange">Workshops</a></li>
                            <li><a href="#" class="orange">Service updates</a></li>
                            <li><a href="#" class="orange">twitter</a></li>
                            <li><a href="#" class="orange">Facebook</a></li>
                            <li><a href="http://google.com" class="orange">Google</a></li>
                            <li><a href="https://www.youtube.com" class="orange">Youtube</a></li>
                        </ul>
                    </li>

                </ul>

                <div id="try" class="boutonArrondi">
                    <a href="#">TRY IT FREE</a><br/><br/>
                    <p>free 14-day trial.<br/>
                        no credit card required.<br/>
                        24/7 support.</p>
                    <img  src ="http://artspace.local/img/header-footer/footer-truste.png" alt="truste"/>
                </div>
            </div>
            <!--<div class="clearfix"></div>-->
        </footer>

        <script src="http://artspace.local/js/jquery-2.1.1.min.js"></script>
        <script src="http://artspace.local/js/caroussel2.js"></script>
    </body>
</html>


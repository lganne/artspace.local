<?php
session_start();
$_session['panier']=array();
$_session['login']=array();
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Art Space</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/normalize.min.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" media="screen and (max-device-width: 640px)" href="css/mobile.css" type="text/css" />
        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    
     <!-- ****************** Menu *************** -->
     
        <header>
            
            <!--  logo + menu -->
            <img src="img/header-footer/logo.png" id="logo" alt="logo Art Space"/>
            
            <nav>
                   
                <ul>
                    <li><a href="tour.php" id="select">Tour</a></li>
                    <li><a href="#">Templates</a></li>
                    <li><a href="#">Developers</a></li>
                    <li><a href="http://artspace.local/pricing/1">Pricing</a></li>
                    <?php
                             if (!empty($_SESSION['user']))
                            {
                                $nom=$_SESSION['user'][1];
                                echo '<li><a href="/login">Bonjour'
                                . ''.$nom.'</a></li>';
                                echo '<li><a href="/historique">historique</a></li>';
                                echo '<li><a href="/logout">Log out</a></li>';
                            }
                            else 
                            {
                               echo '<li><a href="/login">Login</a></li>';
                               echo '<li><a href="/inscription">Register</a></li>';
                          }
                            if (!empty($_SESSION['panier']))
                             {
                                 echo '<li><a href="/Panier">Panier '.count($_SESSION['panier']).'</a></li>';
                             }
                    ?>
                </ul>
            </nav>
           
        </header>
        
         
    <!-- *************************** 1 partie : presentation  ************************* -->
    
        <section class="blanc" id="banner" >
            <div class="container" >
                <h1>Everything you need to create an exceptional Website</h1>
                <p>
                    free 14 day trial with 24/7 support. No credit card required.
                </p>
                <a class="boutonArrondi btJaune" href="#"><strong>GET STARTED</strong></a>
                <a href="#" class="watch">watch demo<img src="img/tour/watch-demo.png" alt="fleche"/></a>
                <p id="nomArtiste">
                    <strong>Sarah blake</strong><br>
                    <span> Fine Artist</span>
                </p>
            </div>
        </section>  
        <footer class="gris" id="footbanner">
            <div class="container" >
                <p>As feature in
                    <img src="img/tour/press/press-logo-fastco.png" alt="logo fast company"/>
                    <img src="img/tour/press/press-logo-time.png" alt="logo times"/>
                    <img src="img/tour/press/press-logo-forbes.png" alt="logo forbes"/>
                    <img src="img/tour/press/press-logo-techcrunch.png" alt="fast company logo"/>
                    <img src="img/tour/press/press-logo-pandodaily.png" alt="logo pandodaily"/>
                    <img src="img/tour/press/press-logo-betabeat.png" alt="logo betabeat"/>
                </p>
            </div>
        </footer>
       
        
        
    <!--  ******************  2 partie :  stunning****************************** -->
        <section id="stunning" class="blanc centrer">
            <div class="container">
                <h1 class="souligneMilieu">STUNNING DESIGNS FROM THE START.</h1>
               
                <p>
                    Art space you with beautiful templates right out of the box- each handcrafted by our <br/>
                     award winning design team to make your content stand out
                </p><br/>
             
                 <div  class="carrousel" id="ecran">
                     <a class="infGauche"><img src="img/tour/templates-gallery-left-arrow.png" alt="fleches"/></a>             
                           <img src="img/tour/slider_start/img1.png" alt="backend" class="slider" data-indice="0" data-tab="1"/>
                      <a class="supDroite"><img src="img/tour/templates-gallery-right-arrow.png" alt="fleches"/></a>
                </div>
                 
            </div>
            
        
               
               
           
        </section>
        
        
    <!--******************************* Galerie ***************************-->
     <section class="gris centrer">
        <div class="container">
            <h1 class="souligneMilieu">Pages gallery and blogs<br/>
            all in one platform </h1>
             <figure>
                <figcaption>
                    whetever you need simple pages, <strong>sotiphisticated galleries</strong>, or a professionale blog - or any
                     combination for each of those - it all comes standart with you web site.<br/>
                </figcaption>
              
              <img src="img/tour/tour-all-in-one.png" alt="tour-all-in-one"/>
             </figure>
        </div>
        
       
        
     </section>
     
     <!--*********************   introducing layout ***************-->
     <section class="blanc" >
        <div class="container">
            <h1 class="souligneDroite">introducing layoutengine<br/>
          a New page builder from artspace</h1>
            <figure>
                <figcaption>
                    Our revolutionnary LayoutEngine technology give you freedom to create
                    visualy rich page with any configuration of textes, images or blocks by draggings items
                    exalty where you want them we lay things out in perfects grid so everything is alway aligned<br/>
                </figcaption>
            
            
                 <img src="img/tour/tour-layoutengine-video-poster.jpg" alt="tour-layoutengine-video-poster"/>
            </figure>
        </div>
        
        
     </section>
     
     <!--**********************************   creative tools ***************************************-->
     
     <section class="gris" >
        <div class="container">
            <h1 class="souligneDroite">Gallery with cutting-edge creative tools</h1>
            <figure>
                <figcaption>
                    our photo galleries comme with next generation features you ll love it.Enjoy easy uploading by
                     dragging files from your destok into the broswer. Edit images any time  you want with aviary.
                    select the focale point of each image, ensuring  the best crop possible.<br/>
                </figcaption>
            
                <img src="img/tour/tour-gallery.jpg" alt="tour-gallery"/>
            </figure>
        </div>
        
               
        
     </section>
     
     <!--**************************************   Blog state of art *********************-->
      <section class="blanc" id="slider-blog">
        <div class="container">
            <h1 class="souligneDroite">state-of-the blogging</h1>
            <p>
                    Effortlessly create content with you page builder and gallery system. 
                    with native geolocation, and use your bookmaker to reblog content from the web.
               
            </p>
            <!--<div id="imgBlogHaut"> </div>-->
            <img src="img/tour/yourbrand-haut.png" alt="bandeau browser yourband" id="imgBlogBas">
                    <div class="carrousel" >
                         <a  class="infGauche"><img src="img/tour/templates-gallery-left-arrow.png" alt="fleches"/></a> 
                          <img src="img/tour/slider_blog/tour-blog-backend.jpg" alt="backend" class="slider" data-indice="0" data-tab="0" />
                         <a class="supDroite"><img src="img/tour/templates-gallery-right-arrow.png" alt="fleches"/></a>
                    </div>    
            <img src="img/tour/yourbrand-bas.png" alt="bandeau browser yourband" id="imgBlogBas">
             <p>Blogging manager interface</p>  
                <div id="import">
                    <h2>import seamlessy</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Etiam a purus quis turpis dictum accumsan. 
                        
                    </p>
                    <img src="img/tour/icon/icon-wordpress-24-dark.png" alt="icon-wordpress-24-dark">
                    <img src="img/tour/icon/icon-tumblr-24-dark.png" alt="icon-tumblr-24-dark">
                    <img src="img/tour/icon/icon-posterous-24-dark.png" alt="icon-posterous-24-dark">
                    <img src="img/tour/icon/icon-blogger-24-dark.png" alt="icon-blogger-24-dark">
                    <img src="img/tour/icon/icon-artspace-24-dark.png" alt="icon-artspace-24-dark">
                 </div>
                <div id="push">
                    <h2>push content out</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Etiam a purus quis turpis dictum accumsan. 
                        
                    </p>
                    <img src="img/tour/icon/icon-facebook-24-dark.png" alt="icon-facebook-24-dark">
                    <img src="img/tour/icon/icon-twitter-24-dark.png" alt="icon-twitter-24-dark">
                    <img src="img/tour/icon/icon-google-24-dark.png" alt="icon-google-24-dark">
                    <img src="img/tour/icon/icon-tumblr-24-dark.png" alt="icon-tumblr-24-dark">
                </div>
                <div id="shares">
                    <h2>shares buttons</h2>
                    <p>
                        Sed id pharetra magna.
                         Sed mollis, ante ac blandit posuere, elit neque ultricies tortor, vel euismod velit dolor
                    </p>
                    <img src="img/tour/icon/icon-facebook-24-dark.png" alt="icon-facebook-24-dark">
                    <img src="img/tour/icon/icon-twitter-24-dark.png" alt="icon-twitter-24-dark">
                    <img src="img/tour/icon/icon-google-24-dark.png" alt="icon-google-24-dark">
                    <img src="img/tour/icon/icon-linkedin-24-dark.png" alt="icon-linkedin-24-dark">
                    <img src="img/tour/icon/icon-stumbleupon-24-dark.png" alt="icon-stumbleupon-24-dark">
                    <img src="img/tour/icon/icon-reddit-24-dark.png" alt="icon-reddit-24-dark">
                    <img src="img/tour/icon/icon-pinterest-24-dark.png" alt="icon-pinterest-24-dark">
                </div>
             <!--</div>  <!-- footer --> 
        </div>  <!--container-->
      </section>
    
      <hr>
      <!--*****************************  custom look ***************************************-->
      
      <section class="gris">
            <div class="container">
                <h1 class="souligneDroite">The costum look you want</h1>
                <figure>
                    <figcaption>
                       Make any temple your now with a few clicks in the style editor.Choose a preset
                       color palette or select your ows fonts, colors, and layouts to create teh custom look you want.
                    </figcaption>
                    <img src="img/tour/tour-style-editor.jpg" alt="tour-style-editor"/>
                </figure>
            </div>
        
      </section>
        
       <!-- *************************** mobile site ***************************-->
       <hr>
       <section class="blanc">
            <div class="container">
                <div class="colGauche">
                    <h1 class="souligneDroite">Mobile sites built rigth in</h1>
                    <p>
                        Phasellus placerat justo ante, id varius nunc imperdiet in.
                        Sed quam lorem, gravida sed venenatis vel, ullamcorper nec justo.
                        Nunc a purus et dui elementum commodo ac sit amet arcu.<br/>
                    </p>
                    <img src="img/tour/tour-mobile-logos.png" alt="differents mobile logos"/>
                </div>
            
               <div  class="colDroite" id="mobile">
                                  
                    <img src="img/tour/tour-mobile.png" alt="tour-mobile" id="mobile"/>
                </div>
             </div>   
           
       </section >
       <hr>
              
        <!--******************************** connect **********************************-->
        
        <section class="gris" >
            <div class="container">
                
                <h1 class="souligneDroite">Connect with the services you love</h1>
                <p>
                       Suspendisse dapibus leo nec hendrerit mattis.
                       Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                       Proin iaculis ante non dignissim imperdiet.<br/>
                      
                </p>
            </div>
            <div class="container-bis">
                <div class="colGauche" id="gaucheConnect" >
                    <img src="img/tour/tour-social-blob.png" alt="social-blob" />
                    
                </div>
                <div class="colDroite" id="connect">
                    <h2>Import</h2>
                    <p>
                        automatically pull in your latest twitter stream
                       and instragram photos to be beautifully displayed on your site
                    </p>
                    <h2>Sync</h2>
                    <p>
                        Quisque nec lobortis purus, vehicula tempor nibh. In placerat pulvinar tortor ac maximus.
                        Proin sed elit at sem elementum fringilla.
                    </p>
                    <h2>Publish</h2>
                    <p>
                        Let your blog automatically tweet for you whetenever you post something new.
                    </p>
                </div>
                
            </div>
        </section>
              
    <!--************************************ powerful connecting *******************************-->
        <section class="blanc">
            <div class="container">
               
               <div class="colGauche">
                    <img src="img/tour/tour-comments.png" alt="social-blob" style="background-size:100%" />
               </div>
                <div class="colDroite">
                     <h1>Powerful connecting</h1>
                     <p>
                        lLorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Suspendisse eros ipsum, elementum eget malesuada quis, auctor eu erat.
                        Vivamus et nisl sit amet nibh blandit ultrices. Maecenas sed vulputate dui. Donec ac bibendum nibh.
                        Praesent mattis mattis magna et fermentum. Nam et turpis purus.
                        Cras quis tellus et lacus dapibus dignissim. Mauris ultricies aliquam ipsum a hendrerit.<br/>
                     </p>   
                </div>    
                        
                <hr>  
            </div>
        </section>
        
        
    <!--***************************** statistic***********************************-->
        <section class="gris">
            <div class="container">
                <h1 class="souligneDroite">Real-time statistics for audience insight.</h1>
                <figure>
                    <figcaption>
                         
                        Suspendisse dapibus leo nec hendrerit mattis.
                        Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                        Proin iaculis ante non dignissim imperdiet.
                        Cras vel eleifend magna.<br/>
                    </figcaption>
                    <img src="img/tour/tour-stats.jpg" alt="social-blob" />
                    
                </figure>
            </div>
       
        </section>
    <!-- ************************ contributors***********************************   -->
    
    <section class="gris">
        <div class="container">
            <div class="colGauche">
              <h1 class="souligneDroite">search engine optimaze</h1>
              <p>ed sodales urna non enim pellentesque dictum.
                    Mauris tempus dignissim mauris, sit amet tincidunt est posuere sed.
                    Quisque luctus lectus et purus bibendum bibendum.</p>
                    
                    <div class="presPersonne">
                        <img src="img/tour/tour-rob-space.jpg" alt="rob-space"/>
                        <div>
                            Rob Space, CEO |<!--<img src="img/tour/logo-seomoz.png">-->
                        </div>
                    </div>
                    
                    <blockquote>
                        <strong>&#147;</strong>  Sed sodales urna non enim pellentesque dictum.
                        Mauris tempus dignissim mauris, sit amet tincidunt est posuere sed.
                        Quisque luctus lectus et purus bibendum bibendum.
                        Nullam fringilla, tellus at malesuada tristique.
                      
                        
                    </blockquote>
              </figure>
                              
            </div>
            
            <div class="colDroite">
                 <h1 class="souligneDroite">choose your contributor</h1>
                 <p>Sed sodales urna non enim pellentesque dictum. Mauris tempus dignissim mauris, sit amet tincidunt est posuere sed.
                    Quisque luctus lectus et purus bibendum bibenduh<br/>
                    Nullam fringilla, tellus at malesuada tristique, turpis nisl dignissim enim, ac sagittis massa magna ac erat.
                    Donec hendrerit est et facilisis vehicula. 
                 </p>
                 <img src="img/tour/tour-contributors.png" alt="rob-space"/>
            </div>

        </div>
            
    </section>        
    <!--************************************   cloud *****************************-->
   
    <section class="blanc">
        <div class="container">
            <div class="colGauche">
               <h1 class="souligneDroite">Clouds hosting for the best</h1>
               <figure>
                    <figcaption>
                       Sed sodales urna non enim pellentesque dictum. Mauris tempus dignissim mauris, sit amet tincidunt est posuere sed.
                       Quisque luctus lectus et purus bibendum bibendu<br/>
                    </figcaption>
                    <img src="img/tour/tour-clouds.png" alt="social-blob"/>
                </figure> 
                
            </div>
            <div class="colDroite">
               <h1 class="souligneDroite">Customn domain names</h1>
               <figure>
                    <figcaption>
                        Sed sodales urna non enim pellentesque dictum. Mauris tempus dignissim mauris, sit amet tincidunt est posuere sed.
                        Quisque luctus lectus et purus bibendum bibendu<br/>
                    </figcaption>
                    <img src="img/tour/tour-domain.png" alt="social-blob"/>
                </figure> 
            </div>
            
         </div>
        
               
    </section>
    
   
    
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
                        <img  src ="img/header-footer/footer-truste.png" alt="truste"/>
                </div>
            </div>
                <!--<div class="clearfix"></div>-->
        </footer>
    
      <script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/caroussel2.js"></script>
</body>
</html>

<footer class="site-footer">
    <div class="contenedor clearfix">
      <div class="footer-informacion">
        <h3>Sobre <span>vallewebcamp</span></h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam recusandae, hic qui magni ad molestiae? Ullam, tempore distinctio cum accusamus in sint voluptatem officiis doloribus, vel corporis, dicta ipsa enim!</p>
      </div>
      <div class="ultimos-tweets">
        <h3>Ultimos <span>Tweets</span></h3>
        <ul>
          <li>Lorem, ipsum dolor sit amet consectetur <span>adipisicing</span> elit. Magnam debitis nobis voluptatibus facerem accusamus omnis aliquam dolor tempore nostrum eos iusto laudantium quidem.</li>
          <li>Lorem, ipsum dolor si porro accusantium repudiandae. Voluptate, necessitatibus quas magnam accusamus <span>omnis</span>  aliquam dolor tempore nostrum eos iusto laudantium quidem.</li>
          <li>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magnam debitis nobis voluptatibus facere accusamus omnis <span>aliquam</span> dolor tempore nostrum eos iusto laudantium quidem.</li>
        </ul>
      </div>
      <div class="menu">
        <h3>Redes <span>Sociales</span></h3>
        <nav class="redes-sociales">
          <a href="#"><i class="fab fa-facebook-square"></i></a>
          <a href="#"><i class="fab fa-twitter-square"></i></a>
          <a href="#"><i class="fab fa-pinterest-square"></i></a>
          <a href="#"><i class="fab fa-youtube-square"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
        </nav>
      </div>
    </div>

    <p class="copyright contenedor">Todos los derechos reservados &copy; vallewebcamp 2019</p>

    <!-- Begin Mailchimp Signup Form -->
    <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
    <style type="text/css">
      #mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
      /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
        We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
    </style>
    <div style = "display:none;">  
      <div id="mc_embed_signup">
      <form action="https://facebook.us20.list-manage.com/subscribe/post?u=3aa5babf470c861784563cc5f&amp;id=371f71a522" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
          <div id="mc_embed_signup_scroll">
        <h2>Subscribete al newsletter para estar al tanto de todo!</h2>
        <div class="indicates-required"><span class="asterisk">*</span>Campos requeridos</div>
        <div class="mc-field-group">
          <label for="mce-EMAIL">Correo electrónico  <span class="asterisk">*</span>
        </label>
          <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
        </div>
        <div class="mc-field-group">
          <label for="mce-FNAME">Nombre <span class="asterisk">*</span></label>
          <input type="text" value="" name="FNAME" class="" id="mce-FNAME">
        </div>
        <div class="mc-field-group">
          <label for="mce-LNAME">Apellido <span class="asterisk">*</span></label>
          <input type="text" value="" name="LNAME" class="" id="mce-LNAME">
        </div>
        <div id="mce-responses" class="clear">
          <div class="response" id="mce-error-response" style="display:none"></div>
          <div class="response" id="mce-success-response" style="display:none"></div>
        </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
          <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_3aa5babf470c861784563cc5f_371f71a522" tabindex="-1" value=""></div>
          <div class="clear"><input type="submit" value="Subscribirse" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
          </div>
      </form>
      </div>
      <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='ADDRESS';ftypes[3]='address';fnames[4]='PHONE';ftypes[4]='phone';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
      <!--End mc_embed_signup-->
    </div>
  </footer>

  <script src="js/vendor/modernizr-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
  <script src="js/plugins.js"></script>
  <script src="js/jquery.animateNumber.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  

  <!--CARGAR CODIGO CSS DE ACUERDO A LA PAGINA ACTUAL-->
  <?php $archivo = basename($_SERVER['PHP_SELF']);//RETORNA EL NOMBRE DEL ARCHIVO ACTUAL
        $pagina = str_replace(".php","", $archivo);
        if ($pagina == "invitados") {
          echo '<script src="js/jquery.colorbox.js"></script>';
        }else if($pagina == "index"){
          echo '<script src="js/jquery.colorbox.js"></script>';
          echo '<script src="js/jquery.waypoints.min.js"></script>';
        }else if($pagina == "conferencias" ){
          echo '<script src="js/lightbox.js"></script>';
        }
  ?>
  
 
  <script src="js/jquery.lettering.js"></script>
  <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"></script>
  <script src="js/main.js"></script>


  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async defer></script>
  
  <!--newsletter con mailchamp-->
  <script type="text/javascript" src="//downloads.mailchimp.com/js/signup-forms/popup/unique-methods/embed.js" data-dojo-config="usePlainJson: true, isDebug: false"></script><script type="text/javascript">window.dojoRequire(["mojo/signup-forms/Loader"], function(L) { L.start({"baseUrl":"mc.us20.list-manage.com","uuid":"3aa5babf470c861784563cc5f","lid":"371f71a522","uniqueMethods":true}) })</script>
</body>

</html>
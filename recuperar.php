<?php  

header("Content-type: text/html;charset=\"utf-8\"");                  // Necesario para caracteres latinos


session_start();        // Necesario para que recuerde si ya habia iniciado sesión, el reanuda una sesion que
                        // se hubiera iniciado anteriormente, o inicia una nueva si no la hubiera.
                        // se debe colocar en todas las paginas del sitio web.


  $errorZ="";  // acumula los mensajes de error
  $infoZ="";   // acumula los mensajes de información
  $exitoZ="";  // acumula los mensajes de éxito



if (!isset($_SERVER['HTTP_REFERER'])){ 
 session_destroy();
 }           // con esto es imposible entrar aqui, tipeando la direccion.


// error_reporting(0);



if ($_SESSION ['id_id_id'] == '' OR $_SESSION ['name_MM'] == '' && $_SESSION ['surname_MM'] == ''  )

        {

            session_unset();                     // libera todas las variables de sessión

            setcookie("id_id_id", "", time()-60*60);   // crea la cookie id_per con el valor vacio y que caduque una hora antes.
            $_COOKIE ['id_id_id']="";                  // borra el valor de id_per contenido en el cookie, por medida extra

            setcookie("name_MM", "", time()-60*60);   // crea la cookie rol con el valor vacio y que caduque una hora antes.
            $_COOKIE ['name_MM']="";                  // borra el valor de rol contenido en el cookie, por medida extra


            setcookie("surname_MM", "", time()-60*60);   // crea la cookie id_per con el valor vacio y que caduque una hora antes.
            $_COOKIE ['surname_MM']="";                  // borra el valor de id_per contenido en el cookie, por medida extra

          

            header("Location: index.php");

        }



    




if(isset($_POST['submit']))  //  chequea si se ha enviado algo, de ser si --> se conecta a la BD y comprueba

   {

include("b_conectar.php");


     if ($_POST['new_pass'] != $_POST['new_pass_confirm'] )  // compara ambas claves
                                        {  $errorZ .= "Passwords do not match."; }
                      



                         if ($errorZ!="")            //  si $errorZ es distinto de vacío,  es que ha habido algun error
                            {
                               $infoZ ="";
                               $errorZ = "<p> " . $errorZ. " </p> <b>Try Again</b>";            
                            }
                               

                         else      // Sequencia actualización de Contraseña...
                      
                              {




                                $pass= mysqli_real_escape_string($enlace,$_POST['new_pass']);  // almaceno el valor de clave limpio

                                $passwordHasheada=md5( md5 ($_SESSION['id_id_id']) . $pass ) ;

                                $idM = $_SESSION['id_id_id'];

                                 // almaceno el valor de clave HASHEADA   
                            
                                $query = " UPDATE tb_personal SET password_per = '$passwordHasheada' WHERE id_per = '$idM' LIMIT 1 "; 
                                $result = mysqli_query($enlace,$query);

                                 $infoZ ="";




                           $exitoZ="<p>New Password<b> Has BeenSet</b></p>
                                      
                                       <b>Go Back to <a href=\"index.php\">Log In</a></b> ";


                                     session_unset();

                                     mysqli_close($enlace);

                              }


   }








 include ("a_header.php"); ?>


<style>
#countdown{ font-weight: bold; font-size: 14px; color: black;}
</style>



<script type="text/javascript">

function start_countdown()
{
 var counter=75;
 myVar= setInterval(function()
 { 
  if(counter>=0)
  {
   document.getElementById("countdown").innerHTML=""+counter+" Sec";
  }
  if(counter==0)
  {
   $.ajax
   ({
     type:'post',
     url:'login-logout.php',
     data:{
      logout:"logout"
     },
     success:function(response) 
     {
      window.location="index.php";
     }
   });
   }
   counter--;
 }, 1000)
}
</script>



<body class="authentication-bg pb-0">




    <div class="auth-fluid" style="background: url('assets/images/bg-recovery.jpg') center;">
        <!--Auth fluid left content -->
        <div class="auth-fluid-form-box">
            <div class="card-body d-flex flex-column h-75 gap-3">



                <!-- Logo -->
                <div class="auth-brand text-center "> <!-- text-lg-start   coloca la imagen a la izq-->
                    <a href="index.php" class="logo-dark">
                        <span><img src="assets/images/logo-dark.png" alt="dark logo" height="135"></span>
                    </a>
                   
                </div>


 <div class="my-auto"> <!-- coloca a la izquierda -->
                    <!-- title-->
<h4 class="text-center mt-0 mb-4" <?php if ( $exitoZ!=""){?>style="display:none"<?php } ?> ><?php echo $_SESSION['name_MM']; ?> Set Your New Password</h4>
                  <!--  <p class="text-muted mb-4">Enter your data to reset your password.</p> -->



                    <!-- form -->
                    <form method="POST">

<script>start_countdown();</script>






                        
                        <div class="mb-3" <?php if ( $exitoZ!=""){?>style="display:none"<?php } ?> >
                            <label for="new_pass" class="form-label">Enter new password</label>

<input class="form-control" type="password" maxlength="12" id="new_pass" name="new_pass"  placeholder="Enter new password" required>

                        </div>





                        <div class="mb-3" <?php if ( $exitoZ!=""){?>style="display:none"<?php } ?>>
                            <a href="" class="text-muted float-end"><small></small></a>   <!-- lo dejo para que mantenga el margen -->
                            <label for="new_pass_confirm" class="form-label">Repeat password</label>

<input class="form-control" type="password" maxlength="12"  id="new_pass_confirm" name="new_pass_confirm" placeholder="Repeat password" required>

                        </div>    


                        <script src="00_zqueryajax/jquery.min.js"></script>

                        <div class="d-grid mb-0 text-center">
<button class="btn btn-info" type="submit" name="submit" id='btnReset' <?php if ( $exitoZ!=""){?>style="display:none"<?php } ?>  >Save ( <i id="countdown"></i> ) </button>
                        </div>




                    </form>
                    <!-- end form-->


             <p class="text-muted mt-2">Back to <a href="index.php" class="text-muted"><b>Log In</b></a></p>      



                </div>



 <!-- no habilita el boton de enviar hasta que los campos esten llenos -->          
<script>
    
$(document).ready(function() {
  validate();
  $('input').on('keyup', validate);
});

function validate() {
  var inputsWithValues = 0;
  
  // get all input fields except for type='submit'
  var myInputs = $("input:not([type='submit'])");

  myInputs.each(function(e) {
    // if it has a value, increment the counter
    if ($(this).val()) {
      inputsWithValues += 1;
    }
  });

  if (inputsWithValues == myInputs.length) {
    $("button[type=submit]").prop("disabled", false);
  } else {
    $("button[type=submit]").prop("disabled", true);
  }
}


</script>   





   



</body>




<?php include ("z_footer.php"); ?>
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






if(isset($_POST['comprobar']))  //  chequea si se ha enviado algo, de ser si --> se conecta a la BD y comprueba

   {

include("b_conectar.php");




$queryC = "SELECT id_per, p_name_per, p_surname_per, doc_per, id_data_per, status FROM tb_personal WHERE doc_per = '".mysqli_real_escape_string($enlace,$_POST['recuperar_doc'])."' LIMIT 1";

                    $resultC = mysqli_query($enlace,$queryC);
                    $fila=mysqli_fetch_array($resultC);

                 

                 if (isset($fila))   // si tengo algo en la fila significa que existe el doc en la BD, compruebo si tiene acceso
                
                  {    


                          if ($fila['status'] == '1') {


                            // confirmo que el email tambien sea valido

                    $id_de_los_datos = $fila['id_data_per'];


                    $queryCcc = "SELECT id_data_per, email_per FROM tb_data_personal
                     WHERE email_per = '".mysqli_real_escape_string($enlace,$_POST['recuperar_email'])."'
                     and id_data_per = '$id_de_los_datos' LIMIT 1";

                    $resultCcc = mysqli_query($enlace,$queryCcc);
                    $fila_e=mysqli_fetch_array($resultCcc);

                 if (isset($fila_e))   // si tengo algo en la fila_e significa que el email esta en la BD

                            {

                            $_SESSION['id_id_id']=$fila['id_per'];
                            $_SESSION['name_MM']=$fila['p_name_per'];
                            $_SESSION['surname_MM']=$fila['p_surname_per'];  // almaceno algunas variables de session

                                mysqli_close($enlace);
                                header ("Location: recuperar.php");


                            }




                            else {   // email no esta

                                    $errorZ="Invalid username or email. ";
                                    mysqli_close($enlace);

                                  }


                           }





                           else {   // documento no esta


                                $errorZ="Restricted access. ";
                                mysqli_close($enlace);

                              }


                  }


                  else {   // documento no esta


                    $errorZ="Invalid username or email. ";
                    mysqli_close($enlace);

                  }


   }









 include ("a_header.php"); ?>





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
                    <h4 class="text-center mt-0 mb-4">Reset Password</h4>
                  <!--  <p class="text-muted mb-4">Enter your data to reset your password.</p> -->

                    <!-- form -->
                    <form method="POST">


                        
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>

<input class="form-control" type="text" maxlength="12" id="recuperar_doc" name="recuperar_doc" required="" placeholder="Enter your username">

                        </div>
                        <div class="mb-3">
                            <a href="" class="text-muted float-end"><small></small></a>   <!-- lo dejo para que mantenga el margen -->
                            <label for="password" class="form-label">Enter your email</label>

<input class="form-control" type="email" maxlength="39" required="" id="recuperar_email" name="recuperar_email" placeholder="Enter your email">

                        </div>    


                        

                        <div class="d-grid mb-0 text-center">
                            <button class="btn btn-info" type="submit" name="comprobar"><i class="mdi mdi-lock-reset"></i> Continue </button>
                        </div>

    

                    </form>
                    <!-- end form-->


             <p class="text-muted mt-2">Back to <a href="index.php" class="text-muted"><b>Log In</b></a></p>      



                </div>








   



</body>




<?php include ("z_footer.php"); ?>
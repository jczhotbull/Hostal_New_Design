<?php  

session_start();        // Necesario para que recuerde si ya habia iniciado sesión, el reanuda una sesion que
                        // se hubiera iniciado anteriormente, o inicia una nueva si no la hubiera.
                        // se debe colocar en todas las paginas del sitio web.


session_unset();
session_destroy();
session_start();




if (!isset($_SERVER['HTTP_REFERER'])){ 
 session_destroy();
 }           // con esto es imposible entrar aqui, tipeando la direccion.


// error_reporting(0);


                        // este parametro solo se usa una vez finalizada la pagina y comprobado
                        // su funcionamiento, con este comando no se mostrara ningun tipo de error
                        // me sirve ya que uso sesiones y suele pasar que si se sale
                        //  sin hacer un cierre correcto, la sesion queda con bug algunas veces
                        // de esta manera en esta pagina inicial, no mostrara nada al pedir el valor de sesion.



header("Content-type: text/html;charset=\"utf-8\"");                  // Necesario para caracteres latinos




  $errorZ="";  // acumula los mensajes de error
  $infoZ="";   // acumula los mensajes de información
  $exitoZ="";  // acumula los mensajes de éxito








if (array_key_exists("Logout",$_GET))  // Si hubiese un logout, entonces 
    {
      session_unset();                     // libera todas las variables de sessión
      setcookie("id_per", "", time()-60*60);   // crea la cookie id con el valor vacio y que caduque una hora antes.
      $_COOKIE ['id_per']="";                  // borra el valor de id contenido en el cookie, por medida extra

      setcookie("id_rol_per", "", time()-60*60);   // crea la cookie cargo con el valor vacio y que caduque una hora antes.
      $_COOKIE ['id_rol_per']="";                  // borra el valor de cargo contenido en el cookie, por medida extra
    }

    else if ((array_key_exists("id_per", $_SESSION) AND $_SESSION ['id_per']) OR (array_key_exists("id_per", $_COOKIE) AND $_COOKIE['id_per'])) 
      // si existe la clave id en el arreglo session y tiene algo     ó   existe la clave id en el arreglo cookie y tiene algo....    

    {           if ($_SESSION['id_rol_per'] == '1')
                {
                   header ("Location: z_admin/main.php");
                }

                 if ($_SESSION['id_rol_per'] == '2')
                {
                   header ("Location: z_admin/main.php");
                }               

                if ($_SESSION['id_rol_per'] == '3')      /* Guest Only */

                {  
                   header ("Location: index.php");

               } 


               if ($_SESSION['id_rol_per'] == '4')

                {  
                  header ("Location: index.php");
                
               } 


               if ($_SESSION['id_rol_per'] == '5')

                {  
                  header ("Location: index.php");
                
               } 


    } 




if(isset($_POST['ingresar']))  //  chequea si se ha enviado algo, de ser si --> se conecta a la BD y comprueba

   {

 include("b_conectar.php");


// primero verifico si el doc de id esta en la base de datos del personal

$queryC = "SELECT id_per, doc_per, password_per, id_hostel, status FROM tb_personal WHERE doc_per = '".mysqli_real_escape_string($enlace,$_POST['input_doc'])."' LIMIT 1";

          $resultC = mysqli_query($enlace,$queryC);
          $fila=mysqli_fetch_array($resultC);


if (isset($fila))   // si tengo algo en la fila significa que existe la ci, ahora compruebo si el usuario tiene permitido acceder

                   {

                       if ($fila['status'] == '1') {    /* detecta si esta habilitado como usuario */
                           


                   $pass= mysqli_real_escape_string($enlace,$_POST['input_pass']);  // almaceno el valor de clave limpio

                   $passwordHasheada=md5( md5 ($fila['id_per']).$pass) ;   // esto no decifra el password, tan solo lo vuelve a crear

                                                                         // para comprabar el hash con el hash de la bd



                      if ($passwordHasheada==$fila['password_per'])   // si la clave ingresada coincide con la de la BD            

                       {   // usuario autenticado
                          
                        $el_hostalillo = $fila['id_hostel'];

                        $queryCoco = "SELECT id_hostel, status_hostel FROM z_hostel WHERE id_hostel = '$el_hostalillo'
                        LIMIT 1";
                       
                       $resultCoco = mysqli_query($enlace,$queryCoco);
                       $filaCoco=mysqli_fetch_array($resultCoco); 


           
                        if ( $filaCoco['status_hostel'] == '1'      ) {   // verifica si el hostal esta cerrado
                         


                          $_SESSION['id_per']=$fila['id_per'];  // almacena el valor de id en el valor de session
           


                          // procedo a guardar el rol
            
                          $queryP = "SELECT id_per, id_rol_per, id_hostel FROM tb_personal WHERE id_per = ' ".$_SESSION['id_per']." ' LIMIT 1";
            
                          $resultP = mysqli_query($enlace,$queryP);
                          $filaP=mysqli_fetch_array($resultP);
                          
                          $_SESSION['id_rol_per']=$filaP['id_rol_per'];  // almacena el valor del id_rol en un valor de session
                       $_SESSION['hostel_activo']=$filaP['id_hostel'];  // almacena el valor de id del hostel del usuario, sera el activo
            
            
            
                                    if ($_SESSION['id_rol_per'] == '1')  //  Super Admin
                                     {  
                                     header ("Location: z_admin/main.php");
                                     mysqli_close($enlace);
                                    }
            
                                    if ($_SESSION['id_rol_per'] == '2')  //  Voluntario
                                     {  header ("Location: z_admin/main.php"); 
                                      mysqli_close($enlace);
                                    }
            
                                    if ($_SESSION['id_rol_per'] == '3')  //  Guest Only
                                     { $errorZ="- Invalid Username or Password. "; 
                                      mysqli_close($enlace);
                                    }
            
                                     if ($_SESSION['id_rol_per'] == '4')  //  Por Definir
                                     {   header ("Location: z_admin/main.php");
                                      mysqli_close($enlace);
                                    }
            
            
                                     if ($_SESSION['id_rol_per'] == '5')  //  Por Definir
                                     {   header ("Location: z_admin/main.php");
                                      mysqli_close($enlace);
                                    }



                        }


                        else {
                          // el hostel esta cerrado
                          $errorZ="The hostel is closed. ";
                          mysqli_close($enlace);

                        }




                        }



                        else 
                         {  // el password no coincide


                        $errorZ="Invalid username or password. ";
                        mysqli_close($enlace);


                         }




                       }



                       else {

                        $errorZ="Restricted access.";
                        mysqli_close($enlace);


                       }




                    }   // cierre de comprobar que el documento esta presente en la tabla


                  else 
                   {  // el documento no esta en la BD


                  $errorZ="Invalid username or password. ";
                  mysqli_close($enlace);


                   }




 }  // cierre de solicitud de ingreso












include ("b_conectar.php");

// verifica si hay o no hay hostales registrados

$query_String_inicio = "SELECT COUNT(*) AS total_inicio FROM z_hostel";
$query_inicio = mysqli_query($enlace, $query_String_inicio);
$row_inicio = mysqli_fetch_object($query_inicio);

mysqli_close($enlace);


$url = 'iniciando.php';

if ($row_inicio->total_inicio == '0') {
  header( "Location: $url" );
}


 include ("a_header.php"); ?>





<body class="authentication-bg pb-0">



    <div class="auth-fluid" style="background: url('assets/images/bg-auth.jpg') center;">
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
                    <h4 class="text-center mt-0 mb-4">Sign In Freelance Hostel</h4>
                  <!--  <p class="text-muted mb-4">Enter your username and password to access account.</p> -->

                    <!-- form -->
                    <form method="POST">


                        
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>

<input class="form-control" type="text" maxlength="12" id="input_doc" name="input_doc" required="" placeholder="Enter your username">

                        </div>
                        <div class="mb-3">
                            <a href="reset.php" class="text-muted float-end"><small>Forgot your password?</small></a>
                            <label for="password" class="form-label">Password</label>

<input class="form-control" type="password" maxlength="12" required="" id="input_pass" name="input_pass" placeholder="Enter your password">

                        </div>    


                        

                        <div class="d-grid mb-0 text-center">
                            <button class="btn btn-info" type="submit" name="ingresar"><i class="mdi mdi-login"></i> Log In </button>
                        </div>

                      

                    </form>
                    <!-- end form-->


                </div>


<p class="text-muted mt-2"><a href="" class="text-muted ms-1 "><b></b></a></p> <!-- lo dejo para mantener el margen en las paginas principales --> 





   



</body>




<?php include ("z_footer.php"); ?>
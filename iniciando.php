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





include ("b_conectar.php");

// verifica si hay o no hay hostales registrados

$query_String_inicio = "SELECT COUNT(*) AS total_inicio FROM z_hostel";
$query_inicio = mysqli_query($enlace, $query_String_inicio);
$row_inicio = mysqli_fetch_object($query_inicio);

mysqli_close($enlace);


$url = 'index.php';

if ($row_inicio->total_inicio >= '1') {
  header( "Location: $url" );
}





$alerta_principal = "0";   // usado para que aparezca alguna nota al ingresar en esta pagina.
$conteo_errorAr = "0";   // Si es distinto debe borrar registros incorrectos anteriores



// empieza la insercion del usuario y del hostal inicial

if(isset($_POST['add_user_and_hostel']))  // chequea si se ha enviado algo, de ser si --> se conecta a la BD y comprueba
{

    $alerta_principal = "2";



include("b_conectar.php");   

 
    $hostel_country = $_POST["country"]; 


            // proceso de insercion y creacion del id en la tabla direcciones correspondiente al hostel.

            $query_d_hostel = "INSERT INTO tb_address(city_address, id_country) 

                            VALUES (   '".mysqli_real_escape_string($enlace,$_POST['hostel_city'])."'         ,
                                       '$hostel_country'     

                                    )";


            if (!mysqli_query($enlace,$query_d_hostel))  // si no logro ingresar la direccion...
            {
            $direcc_danger="<i class=\"fas fa-times-circle fa-lg\"></i>";  // coloca danger al lado de direcc

            $errorZ="- Error Hostel Address. ";

            mysqli_close($enlace); 
            }




            else {    // procedo a almacenar la data del hostel
                      

      $direcc_id_hostel = mysqli_insert_id($enlace);  // almacena el id insertado en el query pasado direcc hostel.

      $hostel_ranking = '1';
      $hostel_phone = $_POST["phone"]; 

           
            $query_p_hostel = "INSERT INTO z_data_hostel(a_phone_hostel, ranking_hostel)   
            VALUES ('$hostel_phone', '$hostel_ranking' )"; 

            
                        if (!mysqli_query($enlace,$query_p_hostel))      // si no ha logrado ingresar los datos del usuario
                        {
                        $datos_danger="<i class=\"fas fa-times-circle fa-lg\"></i>";  // coloca danger al lado de datos personales. 
                        $errorZ="- Error Hostel Data. ";

                        // secuencia que borra la direccion del usuario en caso de error

                                            $sqlAAAA = "DELETE FROM tb_address WHERE id_address = '$direcc_id_hostel' "; 

                                            if (mysqli_query($enlace,$sqlAAAA))  // si no logro crear los datos del usuario borro la direccion.
                                            {                                      
                                            $errorZ.="- &nbsp; Reg Address Hostel Clear!!! &nbsp ";
                                            $conteo_errorAr = "1";
                                            }
                                            else {$errorZ.="- &nbsp; Reg Address Hostel Not-Clear!!! &nbsp ";}


                         mysqli_close($enlace); 
                        }



                 else {
                         $id_datos_hostel = mysqli_insert_id($enlace); // almacena el id insertado en el query pasado id_datos_host...
            

                        $hostel_name = $_POST["hostel_name"];
                        
                        $hostel_code = $_POST['hostel_code'];

                        $hostel_currency = $_POST['currency'];
                                             

                        $query_host = "INSERT INTO z_hostel(name_hostel, code_hostel, id_address, id_data_hostel, id_currency)   

                        VALUES ('$hostel_name', '$hostel_code', '$direcc_id_hostel', '$id_datos_hostel', '$hostel_currency')"; 


                        if (!mysqli_query($enlace,$query_host))      // si no ha logrado ingresar los datos
                        {
                        $hostel_danger="<i class=\"fas fa-times-circle fa-lg\"></i>";  // coloca danger al lado de infor personal. 
                        $errorZ="- Error Hostel Info. ";


                       // secuencia que borra la direccion del usuario y los datos del usuario


                                            $sqlAAAA = "DELETE FROM tb_address WHERE id_address = '$direcc_id_hostel' "; 

                                            if (mysqli_query($enlace,$sqlAAAA))  // si no logro crear los datos del usuario borro la direccion.
                                            {                                      
                                            $errorZ.="- &nbsp; Reg Address Hostel Clear!!! &nbsp ";
                                            $conteo_errorAr = "1";
                                            }
                                            else {$errorZ.="- &nbsp; Reg Address Hostel Not-Clear!!! &nbsp ";}


                                            $sqlBBB = "DELETE FROM z_data_hostel WHERE id_data_hostel = '$id_datos_hostel' "; 

                                            if (mysqli_query($enlace,$sqlBBB))  // si no logro crear los datos del usuario borro la direccion.
                                            {                                      
                                            $errorZ.="- &nbsp; Reg Data Hostel Clear!!! &nbsp ";
                                            $conteo_errorAr = "2";
                                            }
                                            else {$errorZ.="- &nbsp; Reg Data Not-Clear!!! &nbsp ";}


                        }


                        else  {    // almaceno todos los datos del hostel, ahora voy con el usuario....
                  

        $id_del_hostel = mysqli_insert_id($enlace); // almacena el id insertado en el query pasado id_del_host...


                           
    $city_per = '...'; 
    $country_per = '1';  



include("b_conectar.php");

            // proceso de insercion y creacion de la direccion del usuario

            $query_d = "INSERT INTO tb_address(city_address, id_country) 

                            VALUES (   '.'         ,
                                       '$country_per'                                      

                                    )";


            if (!mysqli_query($enlace,$query_d))  // si no logro ingresar la direccion...
            {
            $direcc_danger="<i class=\"fas fa-times-circle fa-lg\"></i>";  // coloca danger al lado de direcc

            $errorZ="- Error Address Per. ";

            mysqli_close($enlace); 
            }



            else {    //  proceso de insercion y creacion de la data del usuario
                        


            $direcc_id_personal = mysqli_insert_id($enlace);  // almacena el id insertado en el query pasado direcc.
            

            $email_per =  mysqli_real_escape_string($enlace,$_POST['email_per']);
            $query_p = "INSERT INTO tb_data_personal(email_per)   

            VALUES ('$email_per')"; 

            
                        if (!mysqli_query($enlace,$query_p))      // si no ha logrado ingresar los datos del usuario
                        {
                        
                        $errorZ="- Error Data Per. ";

                        // secuencia que borra la direccion del usuario en caso de error

                                            $sqlAAAA = "DELETE FROM tb_address WHERE id_address = '$direcc_id_personal' "; 

                                            if (mysqli_query($enlace,$sqlAAAA))  // si no logro crear los datos del usuario borro la direccion.
                                            {                                      
                                            $errorZ.="- &nbsp; Reg Address User Clear!!! &nbsp ";
                                            $conteo_errorAr = "1";
                                            }
                                            else {$errorZ.="- &nbsp; Reg Address Not-Clear!!! &nbsp ";}


                         mysqli_close($enlace); 
                        }



                        else {  // ahora a registrar al personal como tal



$id_datos_per = mysqli_insert_id($enlace); // almacena el id insertado en el query pasado id_datos_per...

                        
                        $nationality_per = '1';
                        
                        $hostel_rol_per = '1';
                            
                        
                       
                        $doc_per = mysqli_real_escape_string($enlace,$_POST['doc_per']);
                        $p_name_per = mysqli_real_escape_string($enlace,$_POST['p_name_per']);
                        $p_surname_per = mysqli_real_escape_string($enlace,$_POST['p_surname_per']);
                        $date_birth_per = $_POST["date_birth_per"];
                        $sex_per = $_POST["sex_per"];

                        $pass_per = mysqli_real_escape_string($enlace,$_POST['doc_per']);
                        
                       

                        $query_per = "INSERT INTO tb_personal(doc_per, p_name_per, p_surname_per,  
                        birth_per,  id_address, id_sex, id_nationality, password_per, id_rol_per, id_hostel, id_data_per)   

   VALUES ('$doc_per', '$p_name_per', '$p_surname_per', 
      '$date_birth_per', '$direcc_id_personal', '$sex_per', '$nationality_per', '$pass_per', '$hostel_rol_per',

       '$id_del_hostel', '$id_datos_per')"; 


                        if (!mysqli_query($enlace,$query_per))      // si no ha logrado ingresar los datos
                        {
                        $user_danger="<i class=\"fas fa-times-circle fa-lg\"></i>";  // coloca danger al lado de infor personal. 
                        $errorZ="- Error. ";


                       // secuencia que borra la direccion del usuario y los datos del usuario


                                            $sqlAAAA = "DELETE FROM tb_address WHERE id_address = '$direcc_id' "; 

                                            if (mysqli_query($enlace,$sqlAAAA))  // si no logro crear los datos del usuario borro la direccion.
                                            {                                      
                                            $errorZ.="- &nbsp; Reg Address User Clear!!! &nbsp ";
                                            $conteo_errorAr = "1";
                                            }
                                            else {$errorZ.="- &nbsp; Reg Address Not-Clear!!! &nbsp ";}


                                            $sqlBBB = "DELETE FROM tb_data_personal WHERE id_data_per = '$id_datos_per' "; 

                                            if (mysqli_query($enlace,$sqlBBB))  // si no logro crear los datos del usuario borro la direccion.
                                            {                                      
                                            $errorZ.="- &nbsp; Reg Data User Clear!!! &nbsp ";
                                            $conteo_errorAr = "2";
                                            }
                                            else {$errorZ.="- &nbsp; Reg Data Not-Clear!!! &nbsp ";}


                        }




                        else {     // almaceno quien registro al al usuario....

$id_del_personal = mysqli_insert_id($enlace); // almacena el id insertado en el query pasado id_datos_per...

        





          $pass= mysqli_real_escape_string($enlace,$_POST['doc_per']);  // almaceno el valor de clave limpio

              $passwordHasheada= md5(md5(mysqli_insert_id ($enlace)).$pass);

$query_pass = " UPDATE tb_personal SET password_per = '$passwordHasheada' WHERE id_per = ".mysqli_insert_id($enlace). " LIMIT 1 ";

           // he indicado que me haga un hash de un un hash del id concatenado con la clave insertada...       
                mysqli_query ($enlace, $query_pass);  // Ejecuta el query...









              $sql_pp_per = "UPDATE tb_personal SET per_registered_by = '$id_del_personal'

                                                WHERE id_per='$id_del_personal' LIMIT 1 ";

                       
                            if (!mysqli_query($enlace,$sql_pp_per))      // actualiza y si no ha logrado ingresar los datos
                                   {
                                    $errorZ="- Error Who Registered User. ";
                                    mysqli_close($enlace);
                                  
                                    }

                            

                             else {     // almaceno quien registro al hostel....




              $sql_pp_hostel_who = "UPDATE z_hostel SET hostel_registered_by = '$id_del_personal'

                                                WHERE id_hostel='$id_del_hostel' LIMIT 1 ";

                       
                            if (!mysqli_query($enlace,$sql_pp_hostel_who))      // actualiza y si no ha logrado ingresar los datos
                                   {
                                    $errorZ="- Error Who Registered Hostel. ";
                                    mysqli_close($enlace);
                                  
                                    }

                             else{   // actualizo el pass



                     $exitoZ = "Your momentary password is your <br> identification <b>doc or id number.</b><br>

                                                       <b>Back to <a href=\"index.php\">Log In</a></b>";  
                     mysqli_close($enlace); 








                                }



 }
            
                         }


                         }


                  }





                             }     // en esto almaceno lo relacionado con el usuario.


                  }



                  }



}




 include ("a_header.php"); ?>





<body class="authentication-bg pb-0">




    <div class="auth-fluid" style="background: url('assets/images/bg-ini.jpg') center;">
        <!--Auth fluid left content -->
        <div class="auth-fluid-form-box_big">
            <div class="card-body d-flex flex-column ">


                <!-- Logo -->
                <div class="auth-brand text-center "> <!-- text-lg-start   coloca la imagen a la izq-->
                    <a href="iniciando.php" class="logo-dark">
                        <span><img src="assets/images/logo-dark.png" alt="dark logo" height="75"></span>
                    </a>
                   
                </div>




<div class="row" <?php if ( $errorZ!= '' or $exitoZ != '' ){?>style="display:none"<?php } ?> >

<div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="header-title mb-3"> Register Basic Information</h4>


<form  method="POST" data-persist="garlic"  data-expires="360" enctype="multipart/form-data"  name="add_user_and_hostel">  <!-- garlic desabilitado input remember -->


                                            <div id="progressbarwizard">


                                                <ul class="nav nav-pills nav-justified form-wizard-header mb-3">
                                                    <li class="nav-item" data-target-form="#accountForm">

<a href="#first" data-bs-toggle="" data-toggle="tab" class="nav-link rounded-0 py-2">  <!-- si coloco tab en data-bs-toggle avanza haciendo click -->

                                                            <i class="mdi mdi-account-circle font-18 align-middle me-1"></i>
                                                            <span class="d-none d-sm-inline">Super Admin</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item" data-target-form="#profileForm">
                                                        <a href="#second" data-bs-toggle="" data-toggle="tab"  class="nav-link rounded-0 py-2">
                                                            <i class="mdi mdi-home-circle font-18 align-middle me-1"></i>
                                                            <span class="d-none d-sm-inline">Main Hostel</span>  
                                                        </a>
                                                    </li>
                                                    <li class="nav-item" data-target-form="#otherForm">
                                                        <a href="#third" data-bs-toggle="" data-toggle="tab" class="nav-link rounded-0 py-2">
                                                            <i class="mdi mdi-checkbox-marked-circle-outline font-18 align-middle me-1"></i>
                                                            <span class="d-none d-sm-inline">Finish</span>
                                                        </a>
                                                    </li>
                                                </ul>

                                                <div class="tab-content mb-0 b-0">


                                                    <div id="bar" class="progress mb-3" style="height: 7px;">
                                                        <div class="bar progress-bar progress-bar-striped progress-bar-animated bg-success"></div>
                                                    </div>



                                                    <div class="tab-pane" id="first">
                                                       
                                                            


                                                            <div class="row">
                                                                <div class="col-12">



                                                                    <div class="row mb-2">
                                                                        <label class="col-md-3 col-form-label" for="doc_per">Enter Doc or Id</label>
                                                                        <div class="col-md-9">
<input type="text" maxlength="12" class="form-control" id="doc_per" name="doc_per" placeholder="( It will be the temporary password )" required>
                                                                        </div>
                                                                    </div>


                                                                     <div class="row mb-2">
                                                                    <label class="col-md-3 col-form-label" for="p_name_per">Enter First Name</label>
                                                                    <div class="col-md-9">
<input type="text" maxlength="19" id="p_name_per" name="p_name_per" class="form-control" placeholder="First Name" required>
                                                                    </div>
                                                                </div>


                                                                    
                                                                    
                                                                <div class="row mb-2">
                                                                    <label class="col-md-3 col-form-label" for="p_surname_per">Enter Surname</label>
                                                                    <div class="col-md-9">
<input type="text" maxlength="19" id="p_surname_per" name="p_surname_per" class="form-control" placeholder="Surname" required>
                                                                    </div>
                                                                </div>




<div class="row mb-2">
    <label for="date_birth_per" class="col-md-3 col-form-label">Date of Birth</label>
    <div class="col-md-9">
    <input class="form-control" id="date_birth_per" type="date" name="date_birth_per" required>
    </div>
</div>


<div class="row mb-2">
    <label for="sex_per" class="col-md-3 col-form-label">Gender</label>
    <div class="col-md-9">
    <select class="form-select" id="sex_per" name="sex_per" required>
       <option selected disabled value=""></option>


<?php

include("b_conectar.php"); 

    $sex_A = "SELECT * FROM sex  WHERE  name_sex != '.' ORDER BY name_sex ASC";
    $datos_sex_A = mysqli_query($enlace, $sex_A) or die(mysqli_error());
    $row_datos_sex_A = mysqli_fetch_assoc($datos_sex_A);

mysqli_close($enlace); 

?>
                                <?php do{?>                                

<option value="<?php echo $row_datos_sex_A['id_sex']; ?>"><?php echo $row_datos_sex_A['name_sex']; ?></option>

                                <?php } while ($row_datos_sex_A = mysqli_fetch_assoc($datos_sex_A)); ?> 

                                        </select>
    </div>
</div>



                                                                <div class="row mb-2">
                                                                    <label class="col-md-3 col-form-label" for="email_per">Enter Email</label>
                                                                    <div class="col-md-9">
<input type="text"  maxlength="39" id="email_per" name="email_per" class="form-control " placeholder="admin@email.com" required >
                                                                    </div>
                                                                </div>










                                                                </div> <!-- end col -->
                                                            </div> <!-- end row -->
                                    

                                                        <ul class="list-inline wizard mb-0">
                                                            <li class="next list-inline-item float-end">

         <button hidden  type="button" id="submit_a"  class="btn btn-info">Next <i class="mdi mdi-arrow-right ms-1"></i></button>


                                                            </li>
                                                        </ul>
                                                    </div>










                                                    <div class="tab-pane fade" id="second">
                                 
                                                            <div class="row">
                                                                <div class="col-12">


                                                                    <div class="row mb-2">
                                                                        <label class="col-md-3 col-form-label" for="hostel_name"> Hostel name</label>
                                                                        <div class="col-md-9">
<input type="text" maxlength="49" id="hostel_name" name="hostel_name" class="form-control" placeholder="Freelance..." required>
                                                                        </div>
                                                                    </div>



                                                                    <div class="row mb-2">
                                                                        <label class="col-md-3 col-form-label" for="hostel_code"> Hostel code</label>
                                                                        <div class="col-md-9">
<input type="text" maxlength="19" id="hostel_code" name="hostel_code" class="form-control" placeholder="FL001" required>
                                                                        </div>
                                                                    </div>


                                                                    <div class="row mb-2">
                                                                        <label class="col-md-3 col-form-label" for="phone"> Main phone</label>
                                                                        <div class="col-md-9">
<input type="text" maxlength="19" id="phone" name="phone" class="form-control" placeholder="Enter hostal main phone" required>
                                                                        </div>
                                                                    </div>





<div class="row mb-2">
    <label for="country" class="col-md-3 col-form-label"> Country</label>
    <div class="col-md-9">
    <select class="form-select" id="country" name="country" required>
       <option selected disabled value=""></option>


<?php

include("b_conectar.php"); 

    $country_A = "SELECT * FROM country  WHERE  name_country != '.' ORDER BY name_country ASC";
    $datos_country_A = mysqli_query($enlace, $country_A) or die(mysqli_error());
    $row_datos_country_A = mysqli_fetch_assoc($datos_country_A);

mysqli_close($enlace); 

?>
                                <?php do{?>                                

<option value="<?php echo $row_datos_country_A['id_country']; ?>"><?php echo $row_datos_country_A['name_country']; ?></option>

                                <?php } while ($row_datos_country_A = mysqli_fetch_assoc($datos_country_A)); ?> 

                                        </select>
    </div>
</div>














                                                                    <div class="row mb-2">
                                                                        <label class="col-md-3 col-form-label" for="hostel_city"> Hostel city</label>
                                                                        <div class="col-md-9">
<input type="text" maxlength="19" id="hostel_city" name="hostel_city" class="form-control" placeholder="City where hostel is located." required>
                                                                        </div>
                                                                    </div>








<div class="row mb-2">
    <label for="currency" class="col-md-3 col-form-label">Main Currency</label>
    <div class="col-md-9">
    <select class="form-select" id="currency" name="currency" required>
       <option selected disabled value=""></option>


<?php

include("b_conectar.php"); 

    $currency_A = "SELECT * FROM currency  WHERE  name_currency != '.' ORDER BY name_currency ASC";
    $datos_currency_A = mysqli_query($enlace, $currency_A) or die(mysqli_error());
    $row_datos_currency_A = mysqli_fetch_assoc($datos_currency_A);

mysqli_close($enlace); 

?>
                                <?php do{?>                                

<option value="<?php echo $row_datos_currency_A['id_currency']; ?>"><?php echo $row_datos_currency_A['name_currency']; ?></option>

                                <?php } while ($row_datos_currency_A = mysqli_fetch_assoc($datos_currency_A)); ?> 

                                        </select>
    </div>
</div>







                                                                </div>
                                                                <!-- end col -->
                                                            </div>
                                                            <!-- end row -->
                      



                                                        <ul class="pager wizard mb-0 list-inline">
                                                            <li class="previous list-inline-item">

<button type="button" class="btn btn-light"><i class="mdi mdi-arrow-left me-1"></i> Back to Super Admin</button>

                                                            </li>
                                                            <li class="next list-inline-item float-end">



   <button hidden  type="button" id="submit_b"  class="btn btn-info">Next <i class="mdi mdi-arrow-right ms-1"></i></button>                                                               
                                                            </li>
                                                        </ul>
                                                    </div>



            

 <script>



const submitButton_a = document.getElementById("submit_a");

const input_email = document.getElementById("email_per");
const input_doc = document.getElementById("doc_per");
const input_name = document.getElementById("p_name_per");
const input_surname = document.getElementById("p_surname_per");

const input_date = document.getElementById("date_birth_per");
const input_sex = document.getElementById("sex_per");

 




input_doc.addEventListener("keyup", (e) => {
  if(input_email.value === '' || input_doc.value === '' || input_name.value === ''
   || input_surname.value === '' || input_date.value === '' || input_sex.value === '')

  {
    submitButton_a.hidden = true;
  }else{
    submitButton_a.hidden = false;
  }
});



input_name.addEventListener("keyup", (e) => {
  if(input_email.value === '' || input_doc.value === '' || input_name.value === ''
   || input_surname.value === '' || input_date.value === '' || input_sex.value === '')

  {
    submitButton_a.hidden = true;
  }else{
    submitButton_a.hidden = false;
  }
});



input_surname.addEventListener("keyup", (e) => {
  if(input_email.value === '' || input_doc.value === '' || input_name.value === ''
   || input_surname.value === '' || input_date.value === '' || input_sex.value === '')

  {
    submitButton_a.hidden = true;
  }else{
    submitButton_a.hidden = false;
  }
});



input_date.addEventListener("keyup", (e) => {
  if(input_email.value === '' || input_doc.value === '' || input_name.value === ''
   || input_surname.value === '' || input_date.value === '' || input_sex.value === '')

  {
    submitButton_a.hidden = true;
  }else{
    submitButton_a.hidden = false;
  }
});



input_sex.addEventListener("keyup", (e) => {
  if(input_email.value === '' || input_doc.value === '' || input_name.value === ''
   || input_surname.value === '' || input_date.value === '' || input_sex.value === '')

  {
    submitButton_a.hidden = true;
  }else{
    submitButton_a.hidden = false;
  }
});



input_email.addEventListener("keyup", (e) => {
  if(input_email.value === '' || input_doc.value === '' || input_name.value === ''
   || input_surname.value === '' || input_date.value === '' || input_sex.value === '')

  {
    submitButton_a.hidden = true;
  }else{
    submitButton_a.hidden = false;
  }
});
















const submitButton_b = document.getElementById("submit_b");


const input_hostel = document.getElementById("hostel_name");
const input_code = document.getElementById("hostel_code");
const input_phone = document.getElementById("phone");
const input_country = document.getElementById("country");
const input_city = document.getElementById("hostel_city");
const input_currency = document.getElementById("currency");

  
   

input_hostel.addEventListener("keyup", (e) => {
  if(input_hostel.value === '' || input_code.value === '' || input_phone.value === ''
   || input_country.value === '' || input_city.value === '' || input_currency.value === '')

  {
    submitButton_b.hidden = true;
  }else{
    submitButton_b.hidden = false;
  }
});


input_code.addEventListener("keyup", (e) => {
  if(input_hostel.value === '' || input_code.value === '' || input_phone.value === ''
   || input_country.value === '' || input_city.value === '' || input_currency.value === '')

  {
    submitButton_b.hidden = true;
  }else{
    submitButton_b.hidden = false;
  }
});

input_phone.addEventListener("keyup", (e) => {
  if(input_hostel.value === '' || input_code.value === '' || input_phone.value === ''
   || input_country.value === '' || input_city.value === '' || input_currency.value === '')

  {
    submitButton_b.hidden = true;
  }else{
    submitButton_b.hidden = false;
  }
});

input_country.addEventListener("keyup", (e) => {
  if(input_hostel.value === '' || input_code.value === '' || input_phone.value === ''
   || input_country.value === '' || input_city.value === '' || input_currency.value === '')

  {
    submitButton_b.hidden = true;
  }else{
    submitButton_b.hidden = false;
  }
});

input_city.addEventListener("keyup", (e) => {
  if(input_hostel.value === '' || input_code.value === '' || input_phone.value === ''
   || input_country.value === '' || input_city.value === '' || input_currency.value === '')

  {
    submitButton_b.hidden = true;
  }else{
    submitButton_b.hidden = false;
  }
});

input_currency.addEventListener("keyup", (e) => {
  if(input_hostel.value === '' || input_code.value === '' || input_phone.value === ''
   || input_country.value === '' || input_city.value === '' || input_currency.value === '')

  {
    submitButton_b.hidden = true;
  }else{
    submitButton_b.hidden = false;
  }
});



 </script>
















                                                    <div class="tab-pane fade" id="third">
                                              
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="text-center">
                                                                        <h2 class="mt-0">
                                                                            <i class="mdi mdi-check-all"></i>
                                                                        </h2>
                                                                        <h3 class="mt-0">Excellent !</h3>
                                                        
                                                                        <p class="w-75 mb-2 mx-auto">Click submit to finish the initial system configuration.</p>

                                                                        <p class="w-75 mb-2 mx-auto">When entering do not forget to update the remaining information.</p>
                                                        
                                                              <!--          <div class="mb-3">
                                                                            <div class="form-check d-inline-block">
                                                                                <input type="checkbox" class="form-check-input" id="customCheck4" required>
                                                                                <label class="form-check-label" for="customCheck4">I agree with the Terms and Conditions</label>
                                                                            </div>
                                                                        </div>  -->



                                                                    </div>
                                                                </div>
                                                                <!-- end col -->
                                                            </div>
                                                            <!-- end row -->
                                                      


                                                        <ul class="pager wizard mb-0 list-inline mt-1">
                                                            <li class="previous list-inline-item">
                                                                <button type="button" class="btn btn-light"><i class="mdi mdi-arrow-left me-1"></i> Back to Main Hostel</button>
                                                            </li>
                                                            <li class="next list-inline-item float-end">
    <button type="submit" name="add_user_and_hostel" class="btn btn-info" id='add_user_and_hostel'>Submit</button>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                </div> <!-- tab-content -->
                                          </div> <!-- end #rootwizard-->
                                     

  </form>



                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->



</div>  <!-- cierre unico row -->







                                            












   



</body>




<?php include ("z_footer.php"); ?>
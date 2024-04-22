 <?php



include("00_identificador.php");


$alerta_principal = "0";   // usado para que aparezca alguna nota al ingresar en esta pagina.


    $logo_success="";
    $logo_danger="";
    $logo_info="1";

    $direcc_success=""; // notificador del proceso de insercion de direccion
    $direcc_danger="";  // notificador del proceso de insercion de direccion

    $datos_success="";
    $datos_danger="";


    $hostel_success="";  // notificador del proceso de insercion de informacion del usuario
    $hostel_danger="";


    $conteo_errorAr = "0";   // Si es distinto debe borrar registros incorrectos anteriores

$yo_soy = $_SESSION['id_per'];









// lo siguiente confirma la actualizacion de la foto personal

if(isset($_POST['update_pic_per']))
    {
$alerta_principal = "2";

$pic_per_esta ="0";

$update_pic_perdU = $_POST['update_pic_per'];

$update_doc_perdU = $_POST['update_doc_per'];

$id_update_perU = $_POST['id_update_per'];

$id_data_update_perU = $_POST['id_data_update_per'];


clearstatcache();
$filenameUP = "00_croppie/pic_per_".$id_update_perU."_".$update_doc_perdU.".png";



          if (file_exists($filenameUP )) {    // de haber una foto le cambia el nombre y la mueve a otro lugar            
            $pic_per_esta ="1";

            $extU = 'png';
           
            $newfilenameU = "img_personal/pic/".$update_pic_perdU."_".$update_doc_perdU.".".$extU;


             
            if(rename($filenameUP,$newfilenameU))
      {     

      include("../b_conectar.php");   

          $query_fotoU = "UPDATE tb_data_personal SET pic_per = '$newfilenameU' WHERE id_data_per = '$id_data_update_perU' LIMIT 1 ";
          

          if (!mysqli_query($enlace,$query_fotoU))      // si no ha logrado ingresar la foto
                   {

           $errorZ.="- Error. ";

                unlink($newfilenameU);
                        
              mysqli_close($enlace);

                   }

          else {
          
          $exitoZ .= "- Done. ";
          mysqli_close($enlace);  

            }   

             
      }

            else{
            
            $errorZ.="- File Error. ";

              unlink($filenameUP);
                         
              mysqli_close($enlace);


            }
                

                 }  // cierre de que no hay foto..

              
                 if ($pic_per_esta =="0") {

$alerta_principal = "2";
 $errorZ="- File not available. ";  

            }


            if ($errorZ!="")     //  si $errorZ es distinto de vacío,  es que ha habido algun error
                          {
                             $errorZ = " <i class=\"fas fa-exclamation-triangle fa-lg\"></i> &nbsp; " . $errorZ. " ";
                             
                          }     


                if ($exitoZ!="")            //  si $exitoZ es distinto de vacío,  es que todo ok
                          {
                             $exitoZ = " <i class=\"far fa-thumbs-up fa-lg\"></i> &nbsp; " . $exitoZ. "  ";            
 
                           }
    
    }
















// lo siguiente confirma la actualizacion del doc del personal

if(isset($_POST['update_doc_per_doc']))
    {
$alerta_principal = "2";

$doc_per_esta ="0";

$update_pic_perdU = $_POST['update_doc_per_doc'];

$update_doc_perdU = $_POST['update_doc_per2'];

$id_update_perU = $_POST['update_doc_per_doc'];

$id_data_update_perU = $_POST['id_data_update_per'];


clearstatcache();
$filenameUP = "00_croppie/doc_per_".$id_update_perU."_".$update_doc_perdU.".png";



          if (file_exists($filenameUP )) {    // de haber una foto le cambia el nombre y la mueve a otro lugar            
            $doc_per_esta ="1";

            $extU = 'png';
           
            $newfilenameU = "img_personal/doc/".$update_pic_perdU."_".$update_doc_perdU.".".$extU;


             
            if(rename($filenameUP,$newfilenameU))
      {     

      include("../b_conectar.php");   

          $query_fotoU = "UPDATE tb_data_personal SET pic_doc_per = '$newfilenameU' WHERE id_data_per = '$id_data_update_perU' LIMIT 1 ";
          

          if (!mysqli_query($enlace,$query_fotoU))      // si no ha logrado ingresar la foto
                   {

           $errorZ.="- Error. ";

                unlink($newfilenameU);
                        
              mysqli_close($enlace);

                   }

          else {
          
          $exitoZ .= "- Done. ";
          mysqli_close($enlace);  

            }   

             
      }

            else{
            
            $errorZ.="- File Error. ";

              unlink($filenameUP);
                         
              mysqli_close($enlace);


            }
                

                 }  // cierre de que no hay foto..

              
                 if ($doc_per_esta =="0") {

$alerta_principal = "2";
 $errorZ="- File not available. ";  

            }


            if ($errorZ!="")     //  si $errorZ es distinto de vacío,  es que ha habido algun error
                          {
                             $errorZ = " <i class=\"fas fa-exclamation-triangle fa-lg\"></i> &nbsp; " . $errorZ. " ";
                             
                          }     


                if ($exitoZ!="")            //  si $exitoZ es distinto de vacío,  es que todo ok
                          {
                             $exitoZ = " <i class=\"far fa-thumbs-up fa-lg\"></i> &nbsp; " . $exitoZ. "  ";            
 
                           }
    
    }
















// lo siguiente confirma la actualizacion del passport del personal

if(isset($_POST['update_passport_per_passport']))
    {
$alerta_principal = "2";

$passport_per_esta ="0";


$update_pic_perdU = $_POST['update_passport_per_passport'];

$update_doc_perdU = $_POST['update_doc_per2'];

$id_update_perU = $_POST['update_passport_per_passport'];

$id_data_update_perU = $_POST['id_data_update_per'];






clearstatcache();
$filenameUP = "00_croppie/passport_per_".$id_update_perU."_".$update_doc_perdU.".png";



          if (file_exists($filenameUP )) {    // de haber una foto le cambia el nombre y la mueve a otro lugar            
            $passport_per_esta ="1";

            $extU = 'png';
           
            $newfilenameU = "img_personal/passport/".$id_update_perU."_".$update_doc_perdU.".".$extU;


             
            if(rename($filenameUP,$newfilenameU))
      {     

      include("../b_conectar.php");   

          $query_fotoU = "UPDATE tb_data_personal SET pic_passport_per = '$newfilenameU' WHERE id_data_per = '$id_data_update_perU' LIMIT 1 ";
          

          if (!mysqli_query($enlace,$query_fotoU))      // si no ha logrado ingresar la foto
                   {

           $errorZ.="- Error. ";

                unlink($newfilenameU);
                        
              mysqli_close($enlace);

                   }

          else {
          
          $exitoZ .= "- Done. ";
          mysqli_close($enlace);  

            }   

             
      }

            else{
            
            $errorZ.="- File Error. ";

              unlink($filenameUP);
                         
              mysqli_close($enlace);


            }
                

                 }  // cierre de que no hay foto..

              
                 if ($passport_per_esta =="0") {

$alerta_principal = "2";
 $errorZ="- File not available. ";  

            }


            if ($errorZ!="")     //  si $errorZ es distinto de vacío,  es que ha habido algun error
                          {
                             $errorZ = " <i class=\"fas fa-exclamation-triangle fa-lg\"></i> &nbsp; " . $errorZ. " ";
                             
                          }     


                if ($exitoZ!="")            //  si $exitoZ es distinto de vacío,  es que todo ok
                          {
                             $exitoZ = " <i class=\"far fa-thumbs-up fa-lg\"></i> &nbsp; " . $exitoZ. "  ";            
 
                           }
    
    }











// borrar pic del personal

if(isset($_POST['borrarXX_pic_per']))
    {

$alerta_principal = "2";

include("../b_conectar.php");

$queryKKC = "SELECT * FROM tb_data_personal WHERE id_data_per = '$_POST[id_data_per_RR]' LIMIT 1";

                      $resultKKC = mysqli_query($enlace,$queryKKC);
                      $filaKK=mysqli_fetch_array($resultKKC);         // lo anterior me permite tener el nombre del registro
                                                                  // gracias al id ...


$pic_a_borrar = $filaKK["pic_per"];

                      if (!empty( $pic_a_borrar )) {   // si hay algo en pic, borra ese archivo
                         
                            unlink($pic_a_borrar);             

$deleteXX = "UPDATE tb_data_personal SET pic_per = '' WHERE id_data_per = '$_POST[id_data_per_RR]' LIMIT 1 ";
$resultXXC = mysqli_query($enlace,$deleteXX);

                        $exitoZ="<i class=\"fa-regular fa-thumbs-up fa-lg\"></i> Pic deleted.";

                         }  

                         else {

                            $errorZ="- Nothing to delete. ";
                         }

mysqli_close($enlace); 

 }









// borrar doc del personal

if(isset($_POST['borrarXX_doc_per']))
    {

$alerta_principal = "2";

include("../b_conectar.php");

$queryKKC = "SELECT * FROM tb_data_personal WHERE id_data_per = '$_POST[id_data_per_RR]' LIMIT 1";

                      $resultKKC = mysqli_query($enlace,$queryKKC);
                      $filaKK=mysqli_fetch_array($resultKKC);         // lo anterior me permite tener el nombre del registro
                                                                  // gracias al id ...


$pic_a_borrar = $filaKK["pic_doc_per"];

                      if (!empty( $pic_a_borrar )) {   // si hay algo en pic, borra ese archivo
                         
                            unlink($pic_a_borrar);             

$deleteXX = "UPDATE tb_data_personal SET pic_doc_per = '' WHERE id_data_per = '$_POST[id_data_per_RR]' LIMIT 1 ";
$resultXXC = mysqli_query($enlace,$deleteXX);

                        $exitoZ="<i class=\"fa-regular fa-thumbs-up fa-lg\"></i> Doc or Id Pic deleted.";

                         }  

                         else {

                            $errorZ="- Nothing to delete. ";
                         }

mysqli_close($enlace); 

 }










// borrar passport del personal

if(isset($_POST['borrarXX_passport_per']))
    {

$alerta_principal = "2";

include("../b_conectar.php");

$queryKKC = "SELECT * FROM tb_data_personal WHERE id_data_per = '$_POST[id_data_per_RR]' LIMIT 1";

                      $resultKKC = mysqli_query($enlace,$queryKKC);
                      $filaKK=mysqli_fetch_array($resultKKC);         // lo anterior me permite tener el nombre del registro
                                                                  // gracias al id ...


$pic_a_borrar = $filaKK["pic_passport_per"];

                      if (!empty( $pic_a_borrar )) {   // si hay algo en pic, borra ese archivo
                         
                            unlink($pic_a_borrar);             

$deleteXX = "UPDATE tb_data_personal SET pic_passport_per = '' WHERE id_data_per = '$_POST[id_data_per_RR]' LIMIT 1 ";
$resultXXC = mysqli_query($enlace,$deleteXX);

                        $exitoZ="<i class=\"fa-regular fa-thumbs-up fa-lg\"></i> Passport deleted.";

                         }  

                         else {

                            $errorZ="- Nothing to delete. ";
                         }

mysqli_close($enlace); 

 }

























  include ("a_header.php");  ?>




            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">


                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">                                    
                                    <div class="page-title-right">

                                    <!--      <form class="d-flex">
                                            <div class="input-group">
                                                <input type="text" class="form-control form-control-light" id="dash-daterange">
                                                <span class="input-group-text bg-primary border-primary text-white">
                                                    <i class="mdi mdi-calendar-range font-13"></i>
                                                </span>
                                            </div>
                                           
                                        </form> -->

                                    </div>

                                    <h4 class="page-title">My User</h4>

                                </div>
                            </div>
                        </div>




<?php

include ("../b_conectar.php");

$queryFHL = "SELECT * FROM tb_personal, tb_address, sex, nationality, roles, tb_data_personal
WHERE tb_personal.id_address = tb_address.id_address 
and   tb_personal.id_sex = sex.id_sex
and   tb_personal.id_nationality = nationality.id_nationality
and   tb_personal.id_rol_per = roles.id_rol_per
and   tb_personal.id_data_per = tb_data_personal.id_data_per
and   tb_personal.id_per = '$yo_soy'

limit 1";

$usuarios = mysqli_query($enlace, $queryFHL) or die(mysqli_error());

$row_usuarios = mysqli_fetch_assoc($usuarios);

$totalRows_usuarios = mysqli_num_rows($usuarios);

mysqli_close($enlace);

?>









                        <!-- start page -->
                        <div class="row">
                           






<div class="col-xl-3 col-lg-4">    <!-- inicio izquierdo -->

                               



                                <div class="card text-center">   <!-- todas las fotos del usuario -->
                                    <div class="card-body">





<ul class="nav nav-pills bg-nav-pills nav-justified mb-3">

    <li class="nav-item">
        <a href="#home1" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
            <i class="mdi mdi-home-variant d-md-none d-block"></i>
            <span class="d-none d-md-block"><i class="fas fa-id-card fa-lg"></i></span>
        </a>
    </li>

    <li class="nav-item">
        <a href="#profile1" data-bs-toggle="tab" aria-expanded="true" class="nav-link rounded-0 active">
            <i class="mdi mdi-account-circle d-md-none d-block"></i>
            <span class="d-none d-md-block"><i class="fa-solid fa-camera-retro fa-lg"></i></span>  
        </a>
    </li>

    <li class="nav-item">
        <a href="#settings1" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
            <i class="mdi mdi-settings-outline d-md-none d-block"></i>
            <span class="d-none d-md-block"><i class="fa-solid fa-passport fa-lg"></i></span>
        </a>
    </li>
</ul>

<div class="tab-content">






    <div class="tab-pane" id="home1">    <!-- doc id -->

<img  src="<?php echo $row_usuarios['pic_doc_per']; ?>?nocache=<?php echo time(); ?>" class="mt-4 img-fluid rounded" width="174"
                  alt="profile-image"  onerror="this.src='img_personal/doc/000.jpg'; this.width='174';"  />

      
<div class="row mt-4">
<div class="col-xl-6 col-lg-6 text-lg-end">


          <div class="upload-btn-wrapper">

          <div data-toggle="tooltip" data-placement="top" title="Update Doc or Id." >
                <a class="action-icon text-info" ><i class="fas fa-id-card fa-2x"></i></a>

<input class="center-block punterodd" type="file" accept="image/*"
name="upload_image_doc_per<?php echo $row_usuarios['id_per']; ?>" id="upload_image_doc_per<?php echo $row_usuarios['id_per']; ?>"
                   onchange="return fileValidation_doc_per<?php echo $row_usuarios['id_per']; ?>()" /> 
          </div>


          </div>

  <?php include ("per_pic_mod/update_doc_per.php"); ?> 

   </div> <!-- cierre div -->




<div class="col-xl-6 col-lg-6 text-lg-start">

 <div data-toggle="tooltip" data-placement="top" title="Delete Doc or Id." >

                <a type="button" class="action-icon text-danger" data-bs-toggle="modal"
                 data-bs-target ="#borrar_doc_per<?php echo $row_usuarios['id_per']; ?>"> <i class="fa-solid fa-ban fa-2x"></i></a>

        
  </div>



  <?php include ("per_pic_mod/delete_doc_per.php"); ?> 


</div> <!-- cierre div -->
</div>     <!-- cierre row -->   




       
    </div>  <!-- cierre doc id -->


















    <div class="tab-pane show active" id="profile1">  <!-- pic personal -->

<img  src="<?php echo $row_usuarios['pic_per']; ?>?nocache=<?php echo time(); ?>" class="img-fluid rounded" width="100"
                  alt="profile-image"  onerror="this.src='img_personal/pic/000.jpg';  this.width='100';"  />

                                        <h4 class="mb-0 mt-2"><?php echo $row_usuarios['p_name_per'];?> <?php echo $row_usuarios['p_surname_per'];?></h4>
                                        <p class="text-muted font-14"><?php echo $row_usuarios['name_rol']; ?></p>




<div class="row">
<div class="col-xl-6 col-lg-6 text-lg-end">


          <div class="upload-btn-wrapper">

          <div data-toggle="tooltip" data-placement="top" title="Update Pic." >
                <a class="action-icon text-info" ><i class="fas fa-camera-retro fa-2x"></i></a>

<input class="center-block punterodd" type="file" accept="image/*"
      name="upload_image_pic_per<?php echo $row_usuarios['id_per']; ?>" id="upload_image_pic_per<?php echo $row_usuarios['id_per']; ?>"
                   onchange="return fileValidation<?php echo $row_usuarios['id_per']; ?>()" /> 
          </div>
          </div>

  <?php include ("per_pic_mod/update_pic_per.php"); ?> 

   </div> <!-- cierre div -->










<div class="col-xl-6 col-lg-6 text-lg-start">

 <div data-toggle="tooltip" data-placement="top" title="Delete Pic." >

                <a type="button" class="action-icon text-danger" data-bs-toggle="modal"
                 data-bs-target="#borrar_pic_per<?php echo $row_usuarios['id_per']; ?>"> <i class="fa-solid fa-ban fa-2x"></i></a>
    
</div>


<?php include ("per_pic_mod/delete_pic_per.php"); ?> 


</div> <!-- cierre div -->
</div>     <!-- cierre row -->   
        



    </div>   <!-- cierre pic personal -->
  








    <div class="tab-pane" id="settings1">  <!-- passport personal -->


 <img  src="<?php echo $row_usuarios['pic_passport_per']; ?>?nocache=<?php echo time(); ?>" class="img-fluid rounded" width="140"
                  alt="profile-image"  onerror="this.src='img_personal/passport/000.jpg';  this.width='170';"  />



<div class="row mt-1">
<div class="col-xl-6 col-lg-6 text-lg-end">


          <div class="upload-btn-wrapper">

         <div data-toggle="tooltip" data-placement="top" title="Update Passport." >  
                <a class="action-icon text-info" ><i class="fa-solid fa-passport fa-2x"></i></a>

                <input class="center-block punterodd" type="file" accept="image/*"
                   name="upload_image_passport_per<?php echo $row_usuarios['id_per']; ?>" id="upload_image_passport_per<?php echo $row_usuarios['id_per']; ?>"
                   onchange="return fileValidation_passport_per<?php echo $row_usuarios['id_per']; ?>()" /> 
          </div>



          </div>

   <?php include ("per_pic_mod/update_passport_per.php"); ?> 

   </div> <!-- cierre div -->




<div class="col-xl-6 col-lg-6 text-lg-start">

  <div data-toggle="tooltip" data-placement="top" title="Delete Passport." >

                <a type="button" class="action-icon text-danger" data-bs-toggle="modal"
                 data-bs-target="#borrar_passport_per<?php echo $row_usuarios['id_per']; ?>"> <i class="fa-solid fa-ban fa-2x"></i></a>
        
  </div>



  <?php include ("per_pic_mod/delete_passport_per.php"); ?> 


</div> <!-- cierre div -->
</div>     <!-- cierre row -->   
        



       
    </div>    <!-- cierre passport personal -->

</div>




















                                        
                                    </div> <!-- end card-body -->
                                </div> <!-- end card todas las fotos del usuario-->



</div> <!-- cierre div izquierdo, contiene foto, doc y pass-->


































<div class="col-xl-9 col-lg-8"> <!-- inicio col derecho -->







                                <div class="card">
                                    <div class="card-body">




                                    </div> <!-- end card body -->
                                </div> <!-- end card -->










</div> <!-- end col lado derecho -->


                        </div>
                        <!-- end page -->                        












                    </div>
                    <!-- container -->

                </div>
                <!-- content -->




</body>





<?php include ("z_footer.php"); ?>
              
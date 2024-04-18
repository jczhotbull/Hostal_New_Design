 <?php

include("00_identificador.php");


    $alerta_principal = "0";   // usado para que aparezca alguna nota al ingresar en esta pagina.


    $foto_success="";       // relacionada a la carga de imagenes
    $foto_danger="";
    $foto_info="1";

    $doc_foto_success="";       // relacionada a la carga de imagenes de doc
    $doc_foto_danger="";
    $doc_foto_info="1";

    $cuenta_de_usos_per = '0';  // para borrar un usuario lleva el conteo si es usado.


    $direcc_success=""; // notificador del proceso de insercion de direccion
    $direcc_danger="";  

    $datos_success=""; // notificador del proceso de insercion de datos del usuario
    $datos_danger="";

    $user_success="";  // notificador del proceso de insercion de informacion del usuario
    $user_danger="";


    $conteo_errorAr = "0";   // Si es distinto debe borrar registros incorrectos anteriores


include("../b_conectar.php");
include ("consultas_add/query_users.php"); 


//Turn off all error reporting
//error_reporting(0);



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

                                    <h4 class="page-title">Users</h4>

                                </div>
                            </div>
                        </div>










                        <!-- start page -->
                     
                           

<div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="row mb-2">  <!-- Primer row -->

                                            <div class="col-sm-5">
                                                <a href="javascript:void(0);" class="btn btn-info mb-2"><i class="mdi mdi-plus-circle me-2"></i> Add User</a>
                                            </div>

                                            <div class="col-sm-7">
                                                
                                            </div><!-- end col-->

                                        </div>   <!-- End Primer row -->







<div class="table-responsive row mb-2">


<?php

include ("../b_conectar.php");

$queryFHL = "SELECT * FROM tb_personal, tb_address, sex, nationality, roles, tb_data_personal 
WHERE tb_personal.id_address = tb_address.id_address 
and   tb_personal.id_sex = sex.id_sex
and   tb_personal.id_nationality = nationality.id_nationality
and   tb_personal.id_rol_per = roles.id_rol_per
and   tb_personal.id_data_per = tb_data_personal.id_data_per

ORDER BY tb_personal.p_surname_per ASC";

$usuarios = mysqli_query($enlace, $queryFHL) or die(mysqli_error());

$row_usuarios = mysqli_fetch_assoc($usuarios);

$totalRows_usuarios = mysqli_num_rows($usuarios);

mysqli_close($enlace);


?>














<table id="basic-datatable" class="table table-centered table-hover dt-responsive nowrap w-100" <?php if ( $totalRows_usuarios == '0' ){?>style="display:none"<?php } ?> >

    <thead>

        <tr>

            <th><i class="fa-solid fa-signature fa-lg"></i></th>
            <th><i class="fas fa-camera-retro fa-lg"></i></th>
            <th><i class="fa-solid fa-gear fa-lg"></i></th>

            <th><i class="fa-solid fa-id-card fa-lg"></i></th>
            <th><i class="fa-solid fa-crop fa-lg"></i></th>  


            <th><i class="fa-solid fa-passport fa-lg"></i></th>
            <th><i class="fa-solid fa-gears fa-lg"></i></th>

            <th><i class="fa-regular fa-address-book fa-lg"></i></th>



            <th><i class="fa-solid fa-user-gear fa-lg"></i></th>  


            

        </tr>

    </thead>


    <tbody>


<?php do{?>  <!-- va a generarme tantas filas como datos tenga esta BD -->   

        <tr>



            <td class="table-user" align="center" > 

 <?php    /* me ayuda a saber quien registro a cada usuario */

include ("../b_conectar.php");

$este_lo_registro = $row_usuarios['per_registered_by'];

$queryFH_whoL = "SELECT id_per, p_name_per, p_surname_per FROM tb_personal 
WHERE id_per = '$este_lo_registro' limit 1";

$usuarios_whoL = mysqli_query($enlace, $queryFH_whoL) or die(mysqli_error());

$row_usuarios_whoL = mysqli_fetch_assoc($usuarios_whoL);

mysqli_close($enlace);

?>             
                 

<div data-toggle="tooltip" data-placement="top"
title="Registered by: <?php echo $row_usuarios_whoL['p_surname_per'];?> <?php echo $row_usuarios_whoL['p_name_per'];?>. " >

<span class="text-body fw-semibold"><?php echo $row_usuarios['p_name_per'];?> <b><?php echo $row_usuarios['p_surname_per'];?></b></span>
<br>
<span class="text-info fw-semibold" style="font-size:12px;"><?php echo $row_usuarios['name_nationality']; ?></span> <br>

  <span class="text-dark" style="font-size:12px;">"<b><?php echo $row_usuarios['name_rol']; ?></b>"</span> <br>

                <span class="badge badge-success-lighten">Active</span>

</div>


            </td>



            <td class="align-middle" align="center">  

<img id="myImg" src="<?php echo $row_usuarios['pic_per']; ?>?nocache=<?php echo time(); ?>" class="img-fluid rounded" width="60"
                  alt="table-user"  onerror="this.src='img_per/000.jpg';"  /> 
                
            </td>




            <td class="align-middle" align="center">

          <div class="upload-btn-wrapper">

          <div data-toggle="tooltip" data-placement="top" title="Update Pic." >
                <a class="action-icon text-info" ><i class="fas fa-camera-retro"></i></a>

                <input class="center-block" type="file" accept="image/*"
                   name="upload_image_pic_per<?php echo $row_usuarios['id_per']; ?>" id="upload_image_pic_per<?php echo $row_usuarios['id_per']; ?>"
                   onchange="return fileValidation<?php echo $row_usuarios['id_per']; ?>()" /> 
          </div>
          </div>




  <?php include ("per_pic_mod/update_pic_per.php"); ?> 





 <div data-toggle="tooltip" data-placement="top" title="Delete Pic." >

                <a type="button" class="action-icon text-danger" data-bs-toggle="modal"
                 data-bs-target="#borrar_pic_per<?php echo $row_usuarios['id_per']; ?>"> <i class="fa-solid fa-ban"></i></a>

    
</div>


<?php include ("per_pic_mod/delete_pic_per.php"); ?> 


            
            </td>

           


            <td class="align-middle" align="center">

<span class="text-muted"> <?php echo $row_usuarios['doc_per'];
 $id_del_personal = $row_usuarios['id_per']; // necesario para editar o eliminar ?></span>

<br>

                  <img id="myImg_doc" src="<?php echo $row_usuarios['pic_doc_per']; ?>?nocache=<?php echo time(); ?>"
                  alt="table-user"  onerror="this.src='img_doc_per/000.jpg';" class="img-fluid rounded" width="80px" />

                  <br>

                  <span class="text-muted" style="font-size:12px;"><b><?php echo $row_usuarios['passport_per'];  ?></b></span>


                
            </td>


            <td class="align-middle" align="center">



  <div class="upload-btn-wrapper">

          <div data-toggle="tooltip" data-placement="top" title="Update Doc or Id." >
                <a class="action-icon text-info" ><i class="fas fa-id-card"></i></a>

                <input class="center-block " type="file" accept="image/*"
                   name="upload_image_doc_per<?php echo $row_usuarios['id_per']; ?>" id="upload_image_doc_per<?php echo $row_usuarios['id_per']; ?>"
                   onchange="return fileValidation_doc_per<?php echo $row_usuarios['id_per']; ?>()" /> 
          </div>

  </div>



  <?php include ("per_pic_mod/update_doc_per.php"); ?> 





  <div data-toggle="tooltip" data-placement="top" title="Delete Doc or Id." >

                <a type="button" class="action-icon text-danger" data-toggle="modal"
                 data-target="#borrar_doc_per<?php echo $row_usuarios['id_per']; ?>"> <i class="fa-solid fa-ban"></i></a>
        
  </div>



  <?php include ("per_pic_mod/delete_doc_per.php"); ?> 

            
            </td>








            <td class="align-middle" align="center">

                   <img id="myImg_pass" src="<?php echo $row_usuarios['pic_passport_per']; ?>?nocache=<?php echo time(); ?>"
                  alt="table-user"  onerror="this.src='img_passport_per/000.jpg';" class="img-fluid rounded" width="60px" /> 

            </td>



             <td class="align-middle" align="center">


<div class="upload-btn-wrapper">

          <div data-toggle="tooltip" data-placement="top" title="Update Passport." >  
                <a class="action-icon text-info" ><i class="fa-solid fa-passport"></i></a>

                <input class="center-block " type="file" accept="image/*"
                   name="upload_image_passport_per<?php echo $row_usuarios['id_per']; ?>" id="upload_image_passport_per<?php echo $row_usuarios['id_per']; ?>"
                   onchange="return fileValidation_passport_per<?php echo $row_usuarios['id_per']; ?>()" /> 
          </div>

  </div>

  <?php include ("per_pic_mod/update_passport_per.php"); ?> 
 



  <div data-toggle="tooltip" data-placement="top" title="Delete Passport." >

                <a type="button" class="action-icon text-danger" data-toggle="modal"
                 data-target="#borrar_passport_per<?php echo $row_usuarios['id_per']; ?>"> <i class="fa-solid fa-ban"></i></a>
        
  </div>



  <?php include ("per_pic_mod/delete_passport_per.php"); ?> 


               
            </td>





            <td class="align-middle" align="center">

            <b><?php echo $row_usuarios['a_phone_per']; ?></b> <?php

                                                        if (!$row_usuarios['b_phone_per'] == "") {       
                                                            echo " <br>" .$row_usuarios['b_phone_per'];
                                                          } 
                  ?><br>
                  <span class="text-info"><b><?php echo $row_usuarios['email_per']; ?></b></span>

                
            </td>






            <td class="table-action">

<a type="button" class="action-icon text-info" data-toggle="modal"
                  data-target="#modificar<?php echo $row_usuarios['id_per']; ?>">
                                                                        <!-- este ultimo identifica cual modal abrir -->
                  <i class="fas fa-edit"></i></a>    


<?php include("updates/update_personal_modal.php"); ?>






<a type="button" class="action-icon" data-toggle="modal"
                  data-target="#password<?php echo $row_usuarios['id_per']; ?>">
                                                                        <!-- este ultimo identifica cual modal abrir -->
                  <i class="fa-solid fa-key"></i></a>    

<?php include("updates/update_pass_personal_modal.php"); ?>






<a type="button" class="action-icon text-danger" data-toggle="modal"
                  data-target="#borrar<?php echo $row_usuarios['id_per']; ?>">
                                                                        <!-- este ultimo identifica cual modal abrir -->

                  <i class="far fa-trash-alt"></i></a>           

<?php include("deletes/delete_per_modal.php"); ?>






            </td>

        </tr>
      
<?php } while ($row_usuarios = mysqli_fetch_assoc($usuarios)); ?>

    </tbody>

</table>

          


</div>






                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->



















                      
                        <!-- end page -->                        







                    </div>
                    <!-- container -->

                </div>
                <!-- content -->




</body>





<?php include ("z_footer.php"); ?>
              
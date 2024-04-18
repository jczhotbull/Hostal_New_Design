<!-- Small modal incativar -->

<div class="modal fade" id="desactivar<?php echo $row_usuarios['id_per']; ?>"
data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">

    <div class="modal-dialog">  <!-- tamaños modal-sm  modal-lg    modal-full-width --> 

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title text-secondary" id="mySmallModalLabel">
                Registered for the first time on
 <?php $fecha_de_primer_registro_formateada = date('d-m-Y', strtotime($row_usuarios['creado_el']));
 echo $fecha_de_primer_registro_formateada;
 ?>, by &nbsp;<b><?php echo $row_usuarios_whoL['p_surname_per'];?></b>&nbsp;<?php echo $row_usuarios_whoL['p_name_per'];?>.
                </h5>

            </div>



            <div class="modal-body">


 <?php

$id_del_reg = $row_usuarios['id_per'];      
include ("../b_conectar.php");    // me da la info si existe de la tabla quien y cuando per

$queryFHL_status_changes = "SELECT * FROM quien_y_cuando_per, tb_personal                    
WHERE  quien_y_cuando_per.id_quien_act_o_desact = tb_personal.id_per        
and  quien_y_cuando_per.id_per_act_o_desact = '$id_del_reg' 
order by fecha_act_o_desact DESC";

$usuarios_status_changes = mysqli_query($enlace, $queryFHL_status_changes) or die(mysqli_error());
$row_usuarios_status_changes = mysqli_fetch_assoc($usuarios_status_changes);
$totalRows_usuarios_status_changes = mysqli_num_rows($usuarios_status_changes);

mysqli_close($enlace);

?>

<form method="post">

<table class="table table-hover table-sm table-centered mt-1 mb-4" <?php if ( $totalRows_usuarios_status_changes == '0' ){?>style="display:none"<?php } ?>  >
  <thead>
   
    <tr>
      <td  class="text-dark" colspan="4"><b style="font-size:18px;">Historical:</b></td>
      
    </tr>
   
  
    <tr>
      <th scope="col">Date</th>
      <th scope="col">Status</th>
      <th scope="col">By</th>
      <th scope="col">Observations</th>
    </tr>


  </thead>


  <tbody>

  <?php do{?>  <!-- va a generarme tantas filas como datos tenga esta BD -->   


    <tr>
      <td><?php

$fecha_formateada = date('d-m-Y', strtotime($row_usuarios_status_changes['fecha_act_o_desact']));

echo $fecha_formateada; ?></td>

     
     
     <td><?php
      
$statuto_cc = $row_usuarios_status_changes['historial_status'];


if ($statuto_cc == '0') { $el_esta_asi = 'Inactive'; }

else {$el_esta_asi = 'Active';}
            
      echo $el_esta_asi; ?></td>


      <td> <b><?php
    

      $id_del_responsable = $row_usuarios_status_changes['id_quien_act_o_desact'];      
      include ("../b_conectar.php");    // me da la info si existe de la tabla quien y cuando per
      
      $queryFHL_fue = "SELECT id_per, p_name_per, p_surname_per FROM tb_personal                    
      WHERE  id_per = '$id_del_responsable' limit 1";
      
      $usuarios_fue = mysqli_query($enlace, $queryFHL_fue) or die(mysqli_error());
      $row_usuarios_fue = mysqli_fetch_assoc($usuarios_fue);
      $totalRows_usuarios_fue = mysqli_num_rows($usuarios_fue);
      
      mysqli_close($enlace);              
      
      echo $row_usuarios_fue['p_name_per']; ?></b> <?php echo $row_usuarios_fue['p_surname_per']; ?>.</td>

      
      <td><?php echo $row_usuarios_status_changes['text_act_o_desact']; ?></td>


    </tr>
    
 <?php } while ($row_usuarios_status_changes = mysqli_fetch_assoc($usuarios_status_changes)); ?>

  </tbody>
</table>



<div class="row">

<div class="">
    <label for="example-textarea" class="form-label"><b>Observation:</b></label>
    <textarea class="form-control" maxlength="109" id="nota_text"
   name="nota_text"  rows="1" required></textarea>
</div>



</div>




              
            </div>  <!-- cierre body -->



  <div class="modal-footer">


<input name="desactivado_by" type="hidden" value="<?php echo $_SESSION['id_per']; ?>">

<input name="name_del_cambiante" type="hidden" value="<?php echo $row_usuarios['p_name_per']; ?>">
<input name="apellido_del_cambiante" type="hidden" value="<?php echo $row_usuarios['p_surname_per']; ?>">



<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-xmark fa-lg"></i></button>

<button type="submit" class="ms-2 btn btn-outline-danger" name="inactive_personal" value="<?php echo $row_usuarios['id_per']; ?>" ><i class="fa-solid fa-user-minus fa-lg"></i></button>

</form> 

            </div>    <!-- cierre footer -->
          


        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

























<!-- Small modal active -->
<div class="modal fade" id="activar<?php echo $row_usuarios['id_per']; ?>"
data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">

    <div class="modal-dialog">  <!-- tamaños modal-sm  modal-lg    modal-full-width --> 

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title text-secondary" id="mySmallModalLabel">
                Registered for the first time on
 <?php $fecha_de_primer_registro_formateada = date('d-m-Y', strtotime($row_usuarios['creado_el']));
 echo $fecha_de_primer_registro_formateada;
 ?>, by &nbsp;<b><?php echo $row_usuarios_whoL['p_surname_per'];?></b>&nbsp;<?php echo $row_usuarios_whoL['p_name_per'];?>.
                </h5>

            </div>



            <div class="modal-body">


 <?php

$id_del_reg = $row_usuarios['id_per'];      
include ("../b_conectar.php");    // me da la info si existe de la tabla quien y cuando per

$queryFHL_status_changes = "SELECT * FROM quien_y_cuando_per, tb_personal                    
WHERE  quien_y_cuando_per.id_quien_act_o_desact = tb_personal.id_per        
and  quien_y_cuando_per.id_per_act_o_desact = '$id_del_reg' 
order by fecha_act_o_desact DESC";

$usuarios_status_changes = mysqli_query($enlace, $queryFHL_status_changes) or die(mysqli_error());
$row_usuarios_status_changes = mysqli_fetch_assoc($usuarios_status_changes);
$totalRows_usuarios_status_changes = mysqli_num_rows($usuarios_status_changes);

mysqli_close($enlace);

?>

<form method="post">

<table class="table table-hover table-sm table-centered mb-4 mt-1" <?php if ( $totalRows_usuarios_status_changes == '0' ){?>style="display:none"<?php } ?>  >
  <thead>
   
    <tr>
      <td  class="text-dark" colspan="4"><b style="font-size:18px;">Historical:</b></td>
      
    </tr>
   
  
    <tr>
      <th scope="col">Date</th>
      <th scope="col">Status</th>
      <th scope="col">By</th>
      <th scope="col">Observations</th>
    </tr>


  </thead>


  <tbody>

  <?php do{?>  <!-- va a generarme tantas filas como datos tenga esta BD -->   


    <tr>
      <td><?php

$fecha_formateada = date('d-m-Y', strtotime($row_usuarios_status_changes['fecha_act_o_desact']));

echo $fecha_formateada; ?></td>

     
     
     <td><?php
      
$statuto_cc = $row_usuarios_status_changes['historial_status'];


if ($statuto_cc == '0') { $el_esta_asi = 'Inactive'; }

else {$el_esta_asi = 'Active';}
            
      echo $el_esta_asi; ?></td>


      <td> <b><?php
    

      $id_del_responsable = $row_usuarios_status_changes['id_quien_act_o_desact'];      
      include ("../b_conectar.php");    // me da la info si existe de la tabla quien y cuando per
      
      $queryFHL_fue = "SELECT id_per, p_name_per, p_surname_per FROM tb_personal                    
      WHERE  id_per = '$id_del_responsable' limit 1";
      
      $usuarios_fue = mysqli_query($enlace, $queryFHL_fue) or die(mysqli_error());
      $row_usuarios_fue = mysqli_fetch_assoc($usuarios_fue);
      $totalRows_usuarios_fue = mysqli_num_rows($usuarios_fue);
      
      mysqli_close($enlace);              
      
      echo $row_usuarios_fue['p_name_per']; ?></b> <?php echo $row_usuarios_fue['p_surname_per']; ?>.</td>

      
      <td><?php echo $row_usuarios_status_changes['text_act_o_desact']; ?></td>


    </tr>
    
 <?php } while ($row_usuarios_status_changes = mysqli_fetch_assoc($usuarios_status_changes)); ?>

  </tbody>
</table>



<div class="row">

<div class="">
    <label for="example-textarea" class="form-label"><b>Observation:</b></label>
    <textarea class="form-control" maxlength="109" id="nota_text"
   name="nota_text_2"  rows="1" required></textarea>
</div>



</div>




              
            </div>  <!-- cierre body -->



  <div class="modal-footer">


<input name="desactivado_by" type="hidden" value="<?php echo $_SESSION['id_per']; ?>">

<input name="name_del_cambiante" type="hidden" value="<?php echo $row_usuarios['p_name_per']; ?>">
<input name="apellido_del_cambiante" type="hidden" value="<?php echo $row_usuarios['p_surname_per']; ?>">



<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-xmark fa-lg"></i></button>

<button type="submit" class="ms-2 btn btn-outline-info" name="active_personal" value="<?php echo $row_usuarios['id_per']; ?>" ><i class="fa-solid fa-user-plus fa-lg"></i></button>




</form> 

            </div>    <!-- cierre footer -->
          


        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
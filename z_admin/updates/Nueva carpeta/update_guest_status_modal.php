
<!-- ini modal editar -->

<div class="modal fade" id="edit_status_guest<?php echo $row_usuarios["id_guests"]; ?>"
 tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">   <!-- modal-lg -->
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title text-secondary" id="exampleModalLabel">
        Guest Behavior: </h5>  

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> 
      </div>

      <form method="post">
      <div class="modal-body">

      <select class="form-control importantex" id="status_mod" name="status_mod" required>

<option selected value="<?php echo $row_usuarios['guests_status']; ?>">
<?php echo $row_usuarios['name_behaviors']; ?></option>
               <option style="background-color: #00000;" disabled></option>                             
                       

<?php

include("../conectar.php"); 

$inc_A = "SELECT * FROM behaviors  WHERE  name_behaviors != '.' ORDER BY name_behaviors ASC";
$datos_inc_A = mysqli_query($enlace, $inc_A) or die(mysqli_error());
$row_datos_inc_A = mysqli_fetch_assoc($datos_inc_A);

mysqli_close($enlace); 

?>

                            <?php do{?>                                

<option value="<?php echo $row_datos_inc_A['id_behaviors']; ?>">
<?php echo $row_datos_inc_A['name_behaviors']; ?></option>

                            <?php } while ($row_datos_inc_A = mysqli_fetch_assoc($datos_inc_A)); ?> 


                                    </select>




      </div> <!-- modal body -->
             

      <div class="modal-footer">

        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
        
        <button type="submit" name="edit_status_ggg" class="btn btn-secondary"
         value="<?php echo $row_usuarios["id_guests"]; ?>">
              <i class="fa-regular fa-floppy-disk fa-lg"></i> </button>   

      </div>

      </form>
      


    </div>
  </div>
</div>


<!-- cierre modal de editar -->
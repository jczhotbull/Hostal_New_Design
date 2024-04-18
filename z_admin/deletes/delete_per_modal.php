<!-- Small modal eliminar -->
<div class="modal fade" id="borrar<?php echo $row_usuarios['id_per']; ?>"
data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">

    <div class="modal-dialog">  <!-- tamaños modal-sm  modal-lg    modal-full-width --> 

        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title text-danger" id="mySmallModalLabel">Warning</h5>
      <!--          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button> --> 
            </div>



            <div class="modal-body">

<b>&nbsp;"&nbsp;<?php echo $row_usuarios['p_surname_per'];?> 
                                     <?php echo $row_usuarios['p_name_per'];?> 
                             "&nbsp;</b> will be deleted.
              
            </div>


            <div class="modal-footer">

<form method="post">

<input type="hidden" id="id_addrexx"   name="id_addrexx"   value="<?php echo $row_usuarios['id_address']; ?>">
<input type="hidden" id="id_dataxx"    name="id_dataxx"   value="<?php echo $row_usuarios['id_data_per']; ?>">


<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-xmark fa-lg"></i></button>

<button type="submit" class="ms-2 btn btn-outline-danger" name="borrar_per" value="<?php echo $row_usuarios['id_per']; ?>" ><i class="far fa-trash-alt fa-lg"></i></button>

</form> 

            </div>


        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->











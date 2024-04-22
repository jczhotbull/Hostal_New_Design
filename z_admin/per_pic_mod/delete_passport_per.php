

<!--  modal eliminar pic doc -->
<div class="modal fade" id="borrar_passport_per<?php echo $row_usuarios['id_per']; ?>"
data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">

    <div class="modal-dialog">  <!-- tamaños modal-sm  modal-lg    modal-full-width --> 

        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title text-danger" id="mySmallModalLabel">Warning</h5>
      <!--          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button> --> 
            </div>



            <div class="modal-body">

<?php echo $row_usuarios['p_surname_per'];?>, <?php echo $row_usuarios['p_name_per'];?> <b>Passport</b> will be deleted. 
              
            </div>


            <div class="modal-footer">

<form method="post" name="delete_pic_per"> 

    <input type="hidden" id="update_docX" name="update_docX"
    value="<?php echo $row_usuarios['doc_per']; ?>">  


     <input type="hidden" id="id_per_RR" name="id_per_RR"
    value="<?php echo $row_usuarios['id_per']; ?>">  


         <input type="hidden" id="id_data_per_RR" name="id_data_per_RR"
    value="<?php echo $row_usuarios['id_data_per']; ?>">  



<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-xmark fa-lg"></i></button>

<button type="submit" class="ms-2 btn btn-outline-danger" name="borrarXX_passport_per" id="borrarXX_passport_per"><i class="far fa-trash-alt fa-lg"></i></button>

</form> 

            </div>


        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



















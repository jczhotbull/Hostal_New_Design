<?php 


/* muestra o no los toast segun las variables tengan o no algo */

if ($errorZ!="") {
  $alerta_error = 'show';
}

if ($exitoZ!="") {
  $alerta_exito = 'show';
}

if ($infoZ!="") {
  $alerta_info = 'show';
}





?>



 <!-- toast, solo son visibles si las variables tienen algo --> 


<div class="toast-container position-fixed top-0 start-50 translate-middle-x m-4">    <!-- $exitoZ -->

  <div id="alert-success" class="toast animate_in <?php echo $alerta_exito; ?> "
  style="border-right: 1px solid #10c469; border-left: 1px solid #10c469;" role="alert" aria-live="assertive" aria-atomic="true">   

    <div class="toast-header text-bg-success">
       <!-- <img src="assets/images/logo-dark-sm.png" alt="brand-logo" height="12" class="me-1" /> -->
        <!--<i class="fa-solid fa-circle-info fa-lg"></i>--> &nbsp;<strong class="me-auto">Success:</strong>
      <!--  <small>11 mins ago</small> -->
        <button type="button" class="ms-2 btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    
    <div class="toast-body">
        <?php echo $exitoZ; ?>
    </div>

    <div class="toast-loader text-bg-success"></div>

  </div>

</div>




<div class="toast-container  position-fixed top-0 start-50 translate-middle-x m-4">    <!-- $errorZ --> 

  <div id="alert-error" class="toast  animate_in <?php echo $alerta_error; ?>"
  style="border-right: 1px solid #ff5b5b; border-left: 1px solid #ff5b5b;"  role="alert" aria-live="assertive" aria-atomic="true">   

    <div class="toast-header text-bg-danger">
       <!-- <img src="assets/images/logo-dark-sm.png" alt="brand-logo" height="12" class="me-1" /> -->
        <!--<i class="fa-solid fa-circle-info fa-lg"></i>--> &nbsp;<strong class="me-auto">Warning:</strong>
      <!--  <small>11 mins ago</small> -->
        <button type="button" class="ms-2 btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    
    <div class="toast-body"   >
        <?php echo $errorZ; ?>
    </div>

     <div class="toast-loader text-bg-danger"></div>

  </div>

</div>




<div class="toast-container position-fixed top-0 start-50 translate-middle-x m-4">    <!-- $infoZ -->

  <div id="alert-info" class="toast animate_in <?php echo $alerta_info; ?> "
  style="border-right: 1px solid #35b8e0; border-left: 1px solid #35b8e0;" role="alert" aria-live="assertive" aria-atomic="true">   

    <div class="toast-header text-bg-info">
       <!-- <img src="assets/images/logo-dark-sm.png" alt="brand-logo" height="12" class="me-1" /> -->
        <!--<i class="fa-solid fa-circle-info fa-lg"></i>--> &nbsp;<strong class="me-auto">Info:</strong>
      <!--  <small>11 mins ago</small> -->
        <button type="button" class="ms-2 btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    
    <div class="toast-body">
        <?php echo $infoZ; ?>
    </div>

    <div class="toast-loader text-bg-info"></div>

  </div>
</div>




<script>


function hideAlert(alert_id) {
    setTimeout(function() {
        document.getElementById(alert_id).classList.remove('animate_in');
        document.getElementById(alert_id).classList.add('animate_out');
        setTimeout(() => document.getElementById(alert_id).classList.remove('show'), 900);
    }, 6000); 
}

hideAlert('alert-error');

</script>

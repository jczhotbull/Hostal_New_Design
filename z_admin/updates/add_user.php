


<p>
    <button class="btn btn-info ms-1" type="button"
        data-bs-toggle="collapse" data-bs-target="#collapseExample"
        aria-expanded="false" aria-controls="collapseExample">
        <i class="mdi mdi-plus-circle"></i> Add User
    </button>
</p>


<div class="collapse " id="collapseExample">
    <div class="card border-info border card-body mb-0">
        


                      
<form  method="POST" data-persist="garlic"  data-expires="360" enctype="multipart/form-data"  name="add_user">                           


                  



                            <div class="row">  <!-- datos principales -->

                                <div class="col-md-12 ml-1 mb-1">

                                <b class="text-info"> Info: </b>            

                        <?php 
                          if ($user_success!="")
{ echo "<i class=\"text-success\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Saved.\">".$user_success."</i>"; }
                        ?>

                        <?php 
                          if ($user_danger!="")
{ echo "<i class=\"text-danger\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Not Saved.\">".$user_danger."</i>"; }
                        ?>
                            <!-- SOLO ES VISIBLE SI LA VARIABLE TIENE ALGO-->


                                </div>

                            </div>

                      






                          <div class="row"> 


                            <div class="col-sm-12 col-md-6 col-lg-3 mb-2">  
                              <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-id-card fa-lg"></i></span>  
                                        
                                            <input type="text" maxlength="29" class="form-control form-control-sm   importantex" id="doc_per" name="doc_per" placeholder="Doc or Id Number" aria-label="doc_per" aria-describedby="basic-addon1" required>
                              </div>    
                              </div>

                              <div class="col-sm-12 col-md-6 col-lg-3 mb-2">  
                              <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-passport fa-lg"></i></span>  
                                        
                                            <input type="text" maxlength="29" class="form-control form-control-sm  " id="passport_per" name="passport_per" placeholder="Passport" aria-label="passport_per" aria-describedby="basic-addon1" >
                              </div>  
                              </div>










                              <div class=" col-sm-12 col-md-6 col-lg-3 mb-2">
                              <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-pencil fa-lg"></i></span>  
                                        
                                            <input type="text" maxlength="19" class="form-control form-control-sm importantex" id="p_name_per" name="p_name_per" placeholder="First Name" aria-label="p_name_per" aria-describedby="basic-addon1" required>
                              </div></div>



                              <div class=" col-sm-12 col-md-6 col-lg-3 mb-2"> 
                              <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-marker fa-lg"></i></span>  
                                        
                                            <input type="text" maxlength="19" class="form-control form-control-sm" id="s_name_per" name="s_name_per" placeholder="Middle Name" aria-label="s_name_per" aria-describedby="basic-addon1" >
                              </div></div>




                             <div class=" col-sm-12 col-md-6 col-lg-3 mb-2">  
                              <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-pen-fancy fa-lg"></i></span>  
                                       
                                            <input type="text" maxlength="19" class="form-control form-control-sm importantex" id="p_surname_per" name="p_surname_per" placeholder="Surname" aria-label="p_surname_per" aria-describedby="basic-addon1" required>
                              </div> </div>



                              <div class=" col-sm-12 col-md-6 col-lg-3 mb-2">  
                              <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-pen-clip fa-lg"></i></span>  
                                       
                                            <input type="text" maxlength="19" class="form-control form-control-sm" id="s_surname_per" name="s_surname_per" placeholder="Last Name" aria-label="s_surname_per" aria-describedby="basic-addon1" >
                              </div> </div>


                              <div class="  col-sm-12 col-md-6 col-lg-3 mb-2">
                              <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-cake-candles fa-lg"></i></span>  
                                       
                                            <input type="date"  class="form-control form-control-sm importantex" id="date_birth_per" name="date_birth_per"  aria-label="date_birth_per" aria-describedby="basic-addon1" required> 
                              </div> </div>


                              <div class="  col-sm-12 col-md-6 col-lg-3 mb-2"> 
                              <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-mars-and-venus-burst fa-lg"></i></span>  
                                        


                                        <select class="form-control form-control-sm importantex" id="sex_per" name="sex_per" required>
                                                        
                                                        <option selected disabled value="">Gender:</option>
                                                        <option disabled></option>

                               <?php do{?>                                

<option value="<?php echo $row_datos_sex['id_sex']; ?>"><?php echo $row_datos_sex['name_sex']; ?></option>

                                <?php } while ($row_datos_sex = mysqli_fetch_assoc($datos_sex)); ?> 

                           



                                        </select>
  
                              </div></div>  




 <div class="  col-sm-12 col-md-6 col-lg-3 mb-2">
                              <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-flag fa-lg"></i></span>  
                                        


                                        <select class="form-control form-control-sm importantex" id="nationality_per" name="nationality_per" required>
                                                        
                                                        <option selected disabled value="">Nationality:</option>
                                                        <option disabled></option>


                               <?php do{?>                                

<option value="<?php echo $row_datos_nacionality['id_nationality']; ?>"><?php echo $row_datos_nacionality['name_nationality']; ?></option>

                                <?php } while ($row_datos_nacionality = mysqli_fetch_assoc($datos_nacionality)); ?> 

                           
                                        </select>

                              </div> </div>




                              <div class="  col-sm-12 col-md-6 col-lg-3 mb-2">
                              <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-key fa-lg"></i></span>   
                                        
                                            <input type="text" maxlength="16" class="form-control form-control-sm importantex" id="pass_per" name="pass_per" placeholder="Password" aria-label="pass_per" aria-describedby="basic-addon1" required>   
                              </div> </div>




   <div class="  col-sm-12 col-md-6 col-lg-3 mb-2">
                              <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-clipboard-user fa-lg"></i></span>  
                                        


                                        <select class="form-control form-control-sm importantex" id="hostel_rol_per" name="hostel_rol_per" required>
                                                        
                                                        <option selected disabled value="">Rol:</option>
                                                        <option disabled></option>

                               <?php do{?>                                

<option value="<?php echo $row_datos_rol['id_rol_per']; ?>"><?php echo $row_datos_rol['name_rol']; ?></option>

                                <?php } while ($row_datos_rol = mysqli_fetch_assoc($datos_rol)); ?> 
                           
                                        </select>

                                          
                              </div> </div> 




                              <div class="  col-sm-12 col-md-6 col-lg-3 mb-2">
                              <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user-clock fa-lg"></i></span>  
                                        

                                        <select class="form-control form-control-sm importantex" id="work_for_per" name="work_for_per" required>
                                                        
                                                        <option selected disabled value="">Hostel:</option>
                                                        <option disabled></option>


                               <?php do{?>                                

<option value="<?php echo $row_datos_hostel['id_hostel']; ?>"><?php echo $row_datos_hostel['name_hostel']; ?></option>

                                <?php } while ($row_datos_hostel = mysqli_fetch_assoc($datos_hostel)); ?> 


                           
                                        </select>

 
                              </div>  </div>

</div> <!-- cierre row -->




















                            <div class="row">  <!-- datos segundarios -->

                                <div class="col-md-12 ml-1 mb-1">

                                <b class="text-info"> Data: </b>            

                        <?php 
                          if ($datos_success!="")
{ echo "<i class=\"text-success\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Saved.\">".$datos_success."</i>"; }
                        ?>

                        <?php 
                          if ($datos_danger!="")
{ echo "<i class=\"text-danger\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Not Saved.\">".$datos_danger."</i>"; }
                        ?>
                            <!-- SOLO ES VISIBLE SI LA VARIABLE TIENE ALGO-->


                                </div>

                            </div>








                          <div class="row"> 







                              <div class="  col-sm-12 col-md-6 col-lg-3 mb-2">  
                              <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-mobile-screen-button fa-lg"></i></span>  
                                        
                                            <input type="text" maxlength="39" class="form-control form-control-sm" id="a_phone_per" name="a_phone_per" placeholder="Main Phone" aria-label="a_phone_per" aria-describedby="basic-addon1">    
                              </div></div>


                              <div class="  col-sm-12 col-md-6 col-lg-3 mb-2">
                              <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-mobile-screen fa-lg"></i></span>  
                                        
                                            <input type="text" maxlength="39" class="form-control form-control-sm" id="b_phone_per" name="b_phone_per" placeholder="Extra Phone" aria-label="b_phone_per" aria-describedby="basic-addon1">    
                              </div></div>






                              <div class="  col-sm-12 col-md-6 col-lg-6 mb-2">
                              <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-at fa-lg"></i></span>   
                                       
                                            <input type="email" maxlength="39" class="form-control form-control-sm importantex" id="email_per" name="email_per" placeholder="Email" aria-label="email_per" aria-describedby="basic-addon1" required>    
                              </div>  </div>


                              


</div> <!-- cierre row -->










                            <div class="row">  <!-- datos segundarios -->

                                <div class="col-md-12 ml-1 mb-1">

                                <b class="text-info"> Address: </b>            

                        <?php 
                          if ($direcc_success!="")
{ echo "<i class=\"text-success\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Saved.\">".$direcc_success."</i>"; }
                        ?>

                        <?php 
                          if ($direcc_danger!="")
{ echo "<i class=\"text-danger\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Not Saved.\">".$direcc_danger."</i>"; }
                        ?>
                            <!-- SOLO ES VISIBLE SI LA VARIABLE TIENE ALGO-->


                                </div>

                            </div>




                          <div class="row"> 
                             




                              <div class="  col-sm-12 col-md-6 col-lg-3 mb-2">
                              <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-tree-city fa-lg"></i></span>  
                                      
                                            <input type="text" maxlength="19" class="form-control form-control-sm" id="city_per" name="city_per" placeholder="City where you live" aria-label="city_per" aria-describedby="basic-addon1">    
                              </div>    </div>





                             <div class="  col-sm-12 col-md-6 col-lg-3 mb-2">
                              <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-earth-americas fa-lg"></i></span>  
                                        

                                        <select class="form-control form-control-sm importantex" id="country_per" name="country_per" required>
                                                        
                                                        <option selected disabled value="">Country where you live:</option>
                                                        <option disabled></option>

                               <?php do{?>                                

<option value="<?php echo $row_datos_country['id_country']; ?>"><?php echo $row_datos_country['name_country']; ?></option>

                                <?php } while ($row_datos_country = mysqli_fetch_assoc($datos_country)); ?> 

                       
                                        </select>
   
                              </div>  </div>




                            <div class="  col-sm-12 col-md-6 col-lg-2 mb-2">
                              <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-location-dot fa-lg"></i></span>  
                                       
                                            <input type="number" min="1" maxlength="10" class="form-control form-control-sm" id="post_code_per" name="post_code_per" placeholder="Zip Code" aria-label="post_code_per" aria-describedby="basic-addon1">   
                              </div>  </div>




                           <div class="  col-sm-12 col-md-6 col-lg-3 mb-2">
                              <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-signs-post fa-lg"></i></span>  
                                       
                                            <input type="text" maxlength="109" class="form-control form-control-sm" id="address_per" name="address_per" placeholder="Address" aria-label="address_per" aria-describedby="basic-addon1">    
                           </div>   </div>




                        <div class="col-1 mb-2 d-grid">

                        <button type="submit" name="add_user" class="btn btn-sm btn-info " id='add_user'>
                        <i class="fa-solid fa-floppy-disk fa-lg"></i></button> 
                    
                        </div>




                            </div>


</form>












    </div>
</div>
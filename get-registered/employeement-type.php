<?php include('header.php'); ?>
<?php 
    $input_data = $_POST;
    $_SESSION["step_3_data"] = $_POST;
?>
<img
   class="wave"
   src="./../assets/images/wave.svg"
   alt="wave"
   />
<div class="container">
   <div class="row" style="padding-top:5rem">
      <div class="col-md-12 col-lg-6 col-xl-5 form-section-col">
         <div class="loader"></div>
         <div class="form-div">
            <form action="employment-details.php" method="POST"
               class="demo-form"
               id="welcome-form"
               data-parsley-excluded="input[class=select-search-input], [data-novalidate]"
               >
               <div class="form-section employeement-type" data-step="empType">
                  <section id="employeement-type">
                     <div class="container profession">
                        <div class="row">
                           <div class="col">
                              <h1>Employment Type</h1>
                              <p>Your Profession</p>
                              <div class="container p-0">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="d-flex flex-wrap mb-3 space-gap">
                                          <div>
                                             <div class="features">
                                                <input
                                                   class="form-control-radio"
                                                   type="radio"
                                                   name="employment-type"
                                                   id="salaried"
                                                   value="Salaried"
                                                   data-parsley-multiple="emp_type"
                                                   data-parsley-errors-container=".errorBlock2"
                                                   data-parsley-required-message="Employment type is required"
                                                   required
                                                   />
                                                <label
                                                   class="feature-box-radio"
                                                   for="salaried"
                                                   >
                                                   <img
                                                      src="./../assets/images/salaried.svg"
                                                      alt="travel-icon"
                                                      />
                                                   <h6>Salaried</h6>
                                                </label>
                                             </div>
                                          </div>
                                          <div>
                                             <div class="features">
                                                <input
                                                   class="form-control-radio"
                                                   type="radio"
                                                   name="employment-type"
                                                   value="Self Employed Professional"
                                                   id="self-employed-professional"
                                                   data-parsley-multiple="emp_type"
                                                   />
                                                <label
                                                   class="feature-box-radio"
                                                   for="self-employed-professional"
                                                   >
                                                   <img
                                                      src="./../assets/images/self-employeed-profetional.svg"
                                                      alt="travel-icon"
                                                      />
                                                   <h6>Self Employed professional</h6>
                                                </label>
                                             </div>
                                          </div>
                                          <div>
                                             <div class="features">
                                                <input
                                                   class="form-control-radio"
                                                   type="radio"
                                                   name="employment-type"
                                                   value="Self Employed"
                                                   id="self-employed"
                                                   data-parsley-multiple="emp_type"
                                                   />
                                                <label
                                                   class="feature-box-radio"
                                                   for="self-employed"
                                                   >
                                                   <img
                                                      src="./../assets/images/self-employeed.svg"
                                                      alt="travel-icon"
                                                      />
                                                   <h6>Self Employed</h6>
                                                </label>
                                             </div>
                                          </div>
                                          <div>
                                             <div class="features">
                                                <input
                                                   class="form-control-radio"
                                                   type="radio"
                                                   name="employment-type"
                                                   value="Others"
                                                   id="others"
                                                   data-parsley-multiple="emp_type"
                                                   />
                                                <label
                                                   class="feature-box-radio"
                                                   for="others"
                                                   >
                                                   <img
                                                      src="./../assets/images/others.svg"
                                                      alt="travel-icon"
                                                      />
                                                   <h6>Others</h6>
                                                </label>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="errorBlock errorBlock2"></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </section>
                  <div class="form-navigation">
                     <div class="container">
                        <div class="row reverse-btn">
                           <div class="col-xs-12 col-sm-6 justify-content-center">
                              <button
                                 type="button"
                                 class="button-prev previous btn btn-info pull-left"
                                 >
                              <i class="fa-sharp fa-solid fa-arrow-left"></i>
                              Previous
                              </button>
                           </div>
                           <div class="col-xs-12 col-sm-6 justify-content-center">
                              <a href="#step5">
                              <button
                                 type="button"
                                 class="button-next next btn btn-info pull-right"
                                 >
                              Next
                              <i class="fa-sharp fa-solid fa-arrow-right"></i>
                              </button>
                              </a>
                           </div>
                        </div>
                     </div>
                     <span class="clearfix"></span>
                  </div>
               </div>
               
               <br /> 
               <br />
            </form>
         </div>
         
<?php include_once('form-footer.php'); ?>

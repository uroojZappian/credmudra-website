<?php include('header.php'); ?>
<?php 
    $input_data = $_POST;
    $_SESSION["step_2_data"] = $_POST;
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
            <form action="employeement-type.php" method="POST"
               class="demo-form"
               id="welcome-form"
               data-parsley-excluded="input[class=select-search-input], [data-novalidate]"
               >
               <div class="form-section" data-step="loanDetails">
                  <section id="loan-details">
                     <div class="container">
                        <div class="row">
                           <div class="col">
                              <h1>Loan Details</h1>
                              <div class="form-group">
                                 <div class="d-flex justify-content-between align-items-center" style="width: 100%">
                                    <label for="loanAmount">Enter the Loan Amount:</label>
                                    <span style="border-bottom: 2px solid #c6e5cb">
                                       <img style="width: 18px; padding-right: 5px" src="./../assets/images/rupee.png"
                                          alt="rupee-icon" />
                                       <input type="text" id="loanAmountValue" class="loanamountvalue" style="outline: none;
                                          border: none;
                                          background: none;
                                          padding: 0;
                                          font-weight: bold
                                          " size="7"
                                          oninput="this.value = this.value.replace(/[^0-9]/g,''); if(this.value > 500000) this.value = 1000000;"
                                          min="1000" max="1000000" value="1000" required
                                          data-parsley-errors-container=".errorContainer_loanAMount" />
                                    </span>
                                 </div>
                                 <input type="range" class="form-control-range slider" id="loanAmount" name="loanAmount"
                                    min="1000" max="1000000" step="1000" value="1000" />
                                 <div class="d-flex justify-content-between p-1" style="width: 100%">
                                    <small>1000</small>
                                    <small>10,00,000</small>
                                 </div>
                                 <div class="errorContainer_loanAMount"></div>
                              </div>
                              <div class="form-group pt-1 pb-1">
                                 <div class="d-flex justify-content-between align-items-center">
                                    <label for="loanDuration">Enter the Loan Tenure:</label>
                                    <span style="border-bottom: 2px solid #c6e5cb">
                                       <input type="text" style="outline: none;
                                          border: none;
                                          background: none;
                                          padding: 0;
                                          font-weight: bold
                                          " size="2"
                                          oninput="this.value = this.value.replace(/[^0-9]/g,''); if(this.value > 60) this.value = 60;"
                                          class="loan-duration-input" id="loanDurationValue" value="2" min="1" max="60"
                                          required data-parsley-errors-container=".errorContainer_loantenure">
                                       <span id="loanDurationUnit">Month</span>
                                    </span>
                                 </div>
                                 <input type="range" class="form-control-range slider" id="loanDuration"
                                    name="loanDuration" min="1" max="60" step="1" value="2"
                                    data-parsley-group="block-2">
                                 <div class="d-flex justify-content-between p-1">
                                    <div><small>1 Month</small></div>
                                    <div><small>60 Months</small></div>
                                 </div>
                                 <div class="errorContainer_loantenure"></div>
                              </div>
                              <label for="pan">PAN Card Number *</label>
                              <input style="width: 100%; text-transform: uppercase" type="text" id="pan"
                                 data-parsley-panverify data-parsley-panverify-message="Please enter correct PAN"
                                 name="pan" placeholder="PAN Number" maxlength="10" required
                                 data-parsley-required-message="Pan number is required" />
                              <div>
                                 <label for="email_address">Email Address *</label>
                              </div>
                              <input style="width: 100%" type="email" id="email_address" name="email_address"
                                 placeholder="abc@gmail.com" data-parsley-type="email" required required
                                 data-parsley-required-message="Email address is required" />
                           </div>
                        </div>
                     </div>
                  </section>
                  <div class="form-navigation">
                     <div class="container">
                        <div class="row">
                           <div class="col-xs-12 col-sm-6 justify-content-center">
                           </div>
                           <div class="col-xs-12 col-sm-6 justify-content-center">
                              <a href="#step4">
                                 <button type="submit" class="button-next next btn btn-info pull-right panSubmit">
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
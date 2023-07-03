<?php include('header.php'); ?>
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
            <form action="otp-verification.php" method="POST"
               class="demo-form"
               id="welcome-form"
               data-parsley-excluded="input[class=select-search-input], [data-novalidate]"
               >
               <input type="hidden" value="<?= $city; ?>" name="location">
               <input type="hidden" value="<?= $browser; ?>" name="browser">
               <input type="hidden" value="<?= $os; ?>" name="os">
               <input type="hidden" value="<?= $PublicIP; ?>" name="ipAddress">
               <input type="hidden" value="<?= $useragent; ?>" name="userAgent">
               <input type="hidden" name="utm_source" value="<?php if(isset($_SESSION['utm_source'])){echo $_SESSION['utm_source'];}?>"/>
               <input
                  type="hidden"
                  name="utm_medium"
                  value="<?php if(isset($_SESSION['utm_medium'])){echo $_SESSION['utm_medium'];}?>"
                  />
               <input
                  type="hidden"
                  name="utm_campaign"
                  value="<?php if(isset($_SESSION['utm_campaign'])){echo $_SESSION['utm_campaign'];}?>"
                  />
               <input
                  type="hidden"
                  name="utm_id"
                  value="<?php if(isset($_SESSION['utm_id'])){echo $_SESSION['utm_id'];}?>"
                  />
               <input
                  type="hidden"
                  name="utm_term"
                  value="<?php if(isset($_SESSION['utm_term'])){echo $_SESSION['utm_term'];}?>"
                  />
               <input
                  type="hidden"
                  name="utm_content"
                  value="<?php if(isset($_SESSION['utm_content'])){echo $_SESSION['utm_content'];}?>"
                  />
               <?php if($mobile==''){ ?>
               <div class="form-section" data-step="mobile">
                  <section id="mobile-no">
                     <div class="container">
                        <div class="row">
                           <div class="col">
                              <h1>Welcome To Credmudra</h1>
                              <label for="phone-number"
                                 >Enter your 10 digit mobile number to proceed:
                              *</label
                                 >
                              <div style="display: flex; align-items: center">
                                 <div class="number-flag">
                                    <span style="margin-right: 5px">🇮🇳</span>
                                    <span style="margin-right: 5px">+91</span>
                                 </div>
                                 <input
                                    oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                                    style="
                                    width: 100%;
                                    border-bottom-left-radius: 0px;
                                    border-top-left-radius: 0px;
                                    "
                                    type="tel"
                                    id="phone-number"
                                    name="phone-number"
                                    placeholder="XXXXXXXXXX"
                                    pattern="[0-9]{10}"
                                    data-parsley-maxlength="10"
                                    maxlength="10"
                                    data-parsley-minlength="10"
                                    data-parsley-minlength-message="Please enter 10 digit mobile no."
                                    data-parsley-maxlength-message="Please enter 10 digit mobile no."
                                    data-parsley-validation-threshold="10"
                                    data-parsley-type="digits"
                                    data-parsley-notdefault="000000000"
                                    required
                                    trigger="blur"
                                    data-parsley-errors-container=".errorContainer_mobile"
                                    data-parsley-required-message="Mobile number is required"
                                    />
                              </div>
                              <div class="errorContainer_mobile"></div>
                              <label
                                 class="form-check-label"
                                 >
                                 <div class="squaredThree">
                                    <input
                                       type="checkbox"
                                       value="true"
                                       id="chkterms"
                                       checked
                                       required
                                       data-parsley-errors-container=".errorContainer_checkbox"
                                       data-parsley-required-message="Please accept to proceed"
                                       />
                              <label for="chkterms"></label>
                              </div>
                              <div class="label-text-checkbox">By continuing, I agree to Credmudra's
                                 <a href="/privacy-policy">Privacy Policy</a> and
                                 <a href="/terms-and-conditions"
                                    >Terms &amp; Conditions</a
                                    >
                                 and receive communication from Credmudra via SMS,
                                 E-mail, and WhatsApp.
                              </div>
                              </label>
                              <div class="errorContainer_checkbox"></div>
                           </div>
                        </div>
                     </div>
                  </section>
                  <div class="form-navigation">
                     <div class="container">
                        <div class="row">
                           <div class="col-xs-12 col-sm-6 justify-content-center">
                              <a href="#step2"
                                 ><button
                                 type="submit"
                                 id="sendOtp"
                                 class="button-next next btn btn-info pull-right sendOtp"
                                 >
                              Next
                              <i class="fa-sharp fa-solid fa-arrow-right"></i></button
                                 ></a>
                           </div>
                        </div>
                     </div>
                     <span class="clearfix"></span>
                  </div>
                  <br/>
               </div>
               
               <?php }else{ ?>
               <input
                  type="hidden"
                  id="phone-number"
                  name="phone-number"
                  value="<?php echo $mobile;?>"
                  />
               <div class="form-section" data-step="otp">
                  <section id="otp">
                     <div class="container">
                        <div class="row">
                           <div class="col">
                              <h1>Verify Mobile</h1>
                              <div style="display: flex">
                                 <label for="phone-number"
                                    >Enter 6 digit OTP received on your mobile <br />
                                 <strong
                                    ><span class="mobileNo"
                                    ><?php echo $mobile;?></span
                                    ></strong
                                    >
                                 <a
                                    href="/get-registered"
                                    style="text-decoration: none"
                                    ><span> change ? *</span></a
                                    ></label
                                    >
                                 <!-- <p style="padding-left: 6rem; padding-top: 2rem">
                                    <span id="timer"></span> seconds.
                                    </p>-->
                              </div>
                              <div class="input-group py-2" style="width: 100%">
                                 <input
                                    oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                                    style="border-right: none"
                                    id="otp"
                                    name="otp"
                                    data-parsley-otpverify
                                    data-parsley-otpverify-message="Invalid OTP"
                                    maxlength="6"
                                    data-parsley-maxlength="6"
                                    data-parsley-minlength="6"
                                    data-parsley-type="digits"
                                    data-parsley-validation-threshold="6"
                                    type="tel"
                                    data-parsley-errors-container=".errorBlock1"
                                    class="form-control"
                                    placeholder="OTP"
                                    required
                                    data-parsley-required-message="OTP is required"
                                    />
                                 <a class="resend-btn timerBtn" type="button"><span id="timer"></span> seconds.</span></a> 
                                 <a class="resend-btn resendOtp"
                                    id="resendOtp"
                                    type="button"
                                    >Resend?</a
                                    >
                              </div>
                              <div class="errorBlock errorBlock1"></div>
                              <label
                                 class="form-check-label"
                                 for="flexCheckDefault"
                                 >
                              <i class="fa-solid fa-circle-info"></i>
                              Credmudra agents will never ask you to transfer
                              money or OTP for verification or any other services
                              </label>
                           </div>
                        </div>
                        <br/>
                     </div>
                  </section>
                  <div class="form-navigation">
                     <div class="container">
                        <div class="row">
                           <div class="col-xs-12 col-sm-6 justify-content-center">
                              <!-- <button
                                 type="button"
                                 class="button-prev previous btn btn-info pull-left"
                                 >
                                 <i class="fa-sharp fa-solid fa-arrow-left"></i>
                                 Previous
                                 </button> -->
                           </div>
                           <div class="col-xs-12 col-sm-6 justify-content-center">
                              <a href="#step3">
                              <button
                                 type="submit"
                                 class="button-next next btn btn-info pull-right otpVerification"
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
                  <br/>
               </div>
               <?php } ?>
               
               
               <!-- <div class="form-section hidden salaried-employee"
                  data-step="salary"
                  >
                  <section id="salaried-employee">
                     <h1>Employment Type</h1>
                     <br />
                     <p><span style="color: green">Salaried Employee</span></p>
                     <div class="form-group mt-3">
                        <label for="industry">Company Type *</label>
                        <div class="row">
                           <div class="col-sm-12">
                              <div class="form-group">
                                 <select class="selectpicker" id="company-type" name="company-type" data-live-search="true" data-width="auto" data-parsley-trigger="change"
                                    required
                                    data-parsley-errors-container=".errorBlock_company-type"
                                    data-parsley-required-message="Company type is required" data-none-selected-text="Please select...">
                                    <option>Select Company Type</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="errorBlock errorBlock_company-type"></div>
                     </div>
                     <div class="form-group mt-3">
                        <label for="industry">Industry *</label>
                        <div class="row">
                           <div class="col-sm-12">
                              <div class="form-group">
                                 <select class="selectpicker" id="salaried_industery" name="salaried_industery" data-live-search="true" data-width="auto" data-parsley-required-message="Industry type is required" data-parsley-errors-container=".errorBlock_salaried_industery" required  data-none-selected-text="Please select...">
                                    <option>Select Industry</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="errorBlock errorBlock_salaried_industery"></div>
                     </div>
                     <div class="form-group mt-3">
                        <label for="designation">Designation *</label>
                        <input
                           oninput="this.value=this.value.replace(/[^a-zA-Z\s]/g,'');"
                           type="text"
                           class="form-control"
                           id="designation"
                           name="salary_designation"
                           placeholder="Enter your designation"
                           required
                           data-parsley-required-message="Designation is required"
                           />
                     </div>
                     <div class="form-group mt-3">
                        <label for="company_name">Company Name *</label>
                        <input
                           type="text"
                           class="form-control"
                           id="company_name"
                           name="company_name"
                           placeholder="Enter your Company Name"
                           data-parsley-trigger="blur"
                           required
                           data-parsley-required-message="Company Name is required"
                           />
                     </div>
                     <div class="form-group mt-3">
                        <label for="company-address">Company Address *</label>
                        <input
                           type="text"
                           class="form-control"
                           id="salary_company_address"
                           name="salary_company_address"
                           placeholder="Company Address"
                           required
                           data-parsley-required-message="Address is required"
                           />
                     </div>
                     <div class="form-group mt-3">
                        <input
                           maxlength="6"
                           oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                           type="tel"
                           class="form-control pincode"
                           data-field-step="salary"
                           id="pincode"
                           name="salary_pincode"
                           placeholder="Enter Company Pincode *"
                           required
                           data-parsley-required-message="Pincode is required"
                           />
                     </div>
                     <div class="form-group mt-3">
                        <input
                           type="text"
                           class="form-control city_salary"
                           id="city"
                           name="salary_city"
                           placeholder="City *"
                           required
                           data-parsley-required-message="City is required"
                           />
                     </div>
                     <div class="form-group mt-3">
                        <input
                           type="text"
                           class="form-control state_salary"
                           id="state"
                           name="salary_state"
                           placeholder="State *"
                           required
                           readonly
                           data-parsley-required-message="State is required"
                           />
                     </div>
                     <div class="form-group mt-3">
                        <input
                           type="text"
                           class="form-control country_salary"
                           id="country"
                           name="salary_country"
                           placeholder="Country *"
                           trigger="blur"
                           required
                           data-parsley-required-message="Country is required"
                           readonly
                           />
                     </div>
                     <div class="form-group mt-3">
                        <label for="years-worked">How Many Years You Are Working in Current Company? *</label>
                        <div class="row">
                           <div class="col-sm-12">
                              <div class="form-group">
                                 <select class="selectpicker" id="years-worked" name="working_years" data-live-search="true" data-width="auto" data-parsley-errors-container=".errorBlock_working_years" required data-parsley-required-message="Working year is required" data-none-selected-text="Please select...">
                                    <option value="1">1 Year</option>
                                    <option value="2">1-2 Years</option>
                                    <option value="3">3 Years</option>
                                    <option value="5">3-5 Years</option>
                                    <option value="6">5+ Years</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="errorBlock errorBlock_working_years"></div>
                     </div>
                     <div class="form-group mt-3">
                        <label for="monthly-income">Monthly Income *</label>
                        <input
                           min="9000"
                           minlength="4"
                           maxlength="7"
                           oninput="this.value=this.value.replace(/[^0-9]/g,'').replace(/^0+/, '');"
                           type="tel"
                           class="form-control"
                           id="monthly-income"
                           name="monthly_salary"
                           placeholder="Enter your Monthly Income"
                           required
                           data-parsley-trigger="blur"
                           data-parsley-required-message="Monthly Income is required"
                           checked
                           />
                        <span
                           id="income-in-words"
                           style="color: #5cb46a; font-size: 14px"
                           ></span>
                     </div>
                     <div class="form-group mt-3">
                        <label>Mode of Salary *</label><br />
                        <div class="form-check-inline" style="display: flex">
                           <div class="features">
                              <input
                                 class="form-control-radio"
                                 type="radio"
                                 name="mode-of-salary"
                                 value="Bank Transfer"
                                 data-parsley-multiple="salary_mode"
                                 required
                                 data-parsley-errors-container=".errorContainer_modeofsalary"
                                 data-parsley-required-message="Mode of Salary is required *"
                                 id="bank-transfer"
                                 />
                              <label
                                 class="feature-box-radio form-check-label"
                                 for="bank-transfer"
                                 >
                                 <img
                                    src="./../assets/images/bank-transfer.svg"
                                    alt="travel-icon"
                                    />
                                 <h6>Bank Transfer</h6>
                              </label>
                           </div>
                           <div class="features">
                              <input
                                 class="form-control-radio"
                                 type="radio"
                                 name="mode-of-salary"
                                 data-parsley-multiple="salary_mode"
                                 id="cash"
                                 value="Cash"
                                 required
                                 />
                              <label
                                 class="feature-box-radio form-check-label"
                                 for="cash"
                                 >
                                 <img
                                    src="./../assets/images/cash.svg"
                                    alt="travel-icon"
                                    />
                                 <h6>Cash</h6>
                              </label>
                           </div>
                        </div>
                        <div class="errorContainer_modeofsalary"></div>
                     </div>
                     <div class="form-group mt-3">
                        <label for="bank_name">Name of Bank Account *</label>
                        <div class="row">
                           <div class="col-sm-12">
                              <div class="form-group">
                                 <select class="selectpicker" id="bank_name" name="salary_bank_name" data-live-search="true" data-width="auto" data-parsley-errors-container=".errorBlock_salary_bank_name" required data-parsley-required-message="Bank Name is required" data-none-selected-text="Please select...">
                                    <option value="">Select Bank Name</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="errorBlock errorBlock_salary_bank_name"></div>
                     </div>
                     <input
                        type="hidden"
                        name="salary_city_id"
                        class="city_id_salary"
                        data-novalidate
                        />
                     <input
                        type="hidden"
                        name="salary_state_id"
                        class="state_id_salary"
                        data-novalidate
                        />
                     <input
                        type="hidden"
                        name="salary_country_id"
                        class="country_id_salary"
                        data-novalidate
                        />
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
                              <a href="#step6"
                                 ><button
                                 type="button"
                                 class="button-next next btn btn-info pull-right salariedNext"
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
               <div class="form-section self-employed-business hidden"
                  data-step="business"
                  >
                  <section id="self-employed-business">
                     <h1>Employment Type</h1>
                     <br />
                     <p><span style="color: green">Business</span></p>
                     <div class="form-group mt-3">
                        <label for="businessOwnedId">Business Run By*</label>
                        <div class="row">
                           <div class="col-sm-12">
                              <div class="form-group">
                                 <select class="selectpicker" id="businessOwnedId" name="businessOwnedId" data-live-search="true" data-width="auto"  data-parsley-errors-container=".errorContainer_businessOwnedId"
                                    data-parsley-required-message="Business Run By is required"  data-none-selected-text="Please select...">
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="errorBlock errorContainer_businessOwnedId"></div>
                     </div>
                     <div class="form-group mt-3">
                        <label for="business_years">How Many Years You Are Working in Current Business?*</label>
                        <div class="row">
                           <div class="col-sm-12">
                              <div class="form-group">
                                 <select class="selectpicker" id="business_years-worked" name="business_years" data-live-search="true" data-width="auto"  data-parsley-errors-container=".errorContainer_working_current_business_year"
                                    data-parsley-required-message="Working Year is required"  data-none-selected-text="Please select...">
                                    <option value="1">1 Year</option>
                                    <option value="2">1-2 Years</option>
                                    <option value="3">3 Years</option>
                                    <option value="5">3-5 Years</option>
                                    <option value="6">5+ Years</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="errorBlock errorContainer_working_current_business_year"></div>
                     </div>
                     <div class="form-group mt-3">
                        <label for="business-type">Business Type *</label>
                        <div class="row">
                           <div class="col-sm-12">
                              <div class="form-group">
                                 <select class="selectpicker" id="business-type-select" name="business-type" data-live-search="true" data-width="auto"  
                                    data-parsley-trigger="change"
                                    data-parsley-errors-container=".errorContainer_businesss-type"
                                    data-parsley-required-message="Business Type is required"  data-none-selected-text="Please select...">
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="errorBlock errorContainer_businesss"></div>
                     </div>
                     <div class="form-group mt-3">
                        <label for="business-industery">Industry *</label>
                        <div class="row">
                           <div class="col-sm-12">
                              <div class="form-group">
                                 <select class="selectpicker" id="business-industery" name="business-industery" data-live-search="true" data-width="auto"  
                                    data-parsley-trigger="change"
                                    data-parsley-errors-container=".errorContainer_businesss-business-industery"
                                    data-parsley-required-message="Business Industery is required"  data-none-selected-text="Please select...">
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="errorBlock errorContainer_businesss-business-industery"></div>
                     </div>
                     <div class="form-group mt-3">
                        <label for="business_company_name">Company Name *</label>
                        <input
                           type="text"
                           class="form-control"
                           id="business_company_name"
                           name="business_company_name"
                           placeholder="Enter your Company Name"
                           required
                           data-parsley-required-message="Company Name is required"
                           />
                     </div>
                     <div class="form-group mt-3">
                        <label for="pincode">Company Address *</label>
                        <input
                           type="text"
                           class="form-control"
                           id="business_company_address"
                           name="business_company_address"
                           placeholder="Company Address"
                           required
                           data-parsley-required-message="Address is required"
                           />
                     </div>
                     <div class="form-group mt-3">
                        <input
                           type="tel"
                           oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                           maxlength="6"
                           class="form-control pincode"
                           data-field-step="business"
                           name="business_pincode"
                           id="pincode"
                           placeholder="Pincode"
                           required
                           data-parsley-required-message="Pincode is required"
                           />
                     </div>
                     <div class="form-group mt-3">
                        <input
                           type="text"
                           class="form-control city_business"
                           id="city"
                           placeholder="City"
                           name="business_city"
                           required
                           data-parsley-required-message="City is required"
                           />
                     </div>
                     <div class="form-group mt-3">
                        <input
                           type="text"
                           class="form-control state_business"
                           id="state"
                           placeholder="State"
                           name="business_state"
                           required
                           readonly
                           data-parsley-required-message="State is required"
                           />
                     </div>
                     <div class="form-group mt-3">
                        <input
                           type="text"
                           class="form-control country_business"
                           id="country"
                           placeholder="Country"
                           name="business_country"
                           readonly
                           required
                           trigger="blur"
                           data-parsley-required-message="Country is required"
                           />
                     </div>
                     <div class="form-group mt-3">
                        <label for="designation">Designation *</label>
                        <input
                           oninput="this.value=this.value.replace(/[^a-zA-Z\s]/g,'');"
                           type="text"
                           class="form-control"
                           id="business_designation"
                           placeholder="Enter your Designation"
                           name="business_designation"
                           required
                           data-parsley-required-message="Designation is required"
                           />
                     </div>
                     <div class="form-group mt-3">
                        <label for="monthly-income"
                           >Gross Annual Sales/Turnover *</label
                           >
                        <input
                           oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                           type="text"
                           class="form-control"
                           name="business_monthly_income"
                           id="business_turnover"
                           placeholder="Enter monthly Turnover"
                           required
                           data-parsley-required-message="Gross annual Sales is required"
                           />
                        <span
                           id="income-in-words-business"
                           style="color: #5cb46a; font-size: 14px"
                           ></span>
                     </div>
                     <div class="form-group mt-3">
                        <label for="monthly-income">Montly Profit *</label>
                        <input
                           oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                           type="text"
                           class="form-control"
                           id="business_monthly_profit"
                           name="business_monthly_profit"
                           placeholder="Enter Monthly Profit"
                           required
                           data-parsley-required-message="Monthly Profit is required"
                           />
                        <span
                           id="income-in-words-business-monthly"
                           style="color: #5cb46a; font-size: 14px"
                           ></span>
                     </div>
                     <div class="form-group mt-3">
                        <label for="business_current_bank_account">Business/Current Account Is With? *</label>
                        <div class="row">
                           <div class="col-sm-12">
                              <div class="form-group">
                                 <select class="selectpicker" id="business_current_bank_account" name="business_current_bank_account" data-live-search="true" data-width="auto"  
                                    data-parsley-trigger="change"
                                    data-parsley-errors-container=".errorContainer_current-account-business"
                                    data-parsley-required-message="Current Account is required"  data-none-selected-text="Please select...">
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="errorBlock errorContainer_current-account-business"></div>
                     </div>
                     <div class="form-group mt-3">
                        <label for="business_saving_bank_account">Primary/Savings Bank Account Is With? *</label>
                        <div class="row">
                           <div class="col-sm-12">
                              <div class="form-group">
                                 <select class="selectpicker" id="business_saving_bank_account" name="business_saving_bank_account" data-live-search="true" data-width="auto"  
                                    data-parsley-trigger="change"
                                    data-parsley-errors-container=".errorContainer_sba-business"
                                    data-parsley-required-message="Saving Bank Account is required"  data-none-selected-text="Please select...">
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="errorBlock errorContainer_sba-business"></div>
                     </div>
                     <input
                        type="hidden"
                        name="business_city_id"
                        class="city_id_business"
                        data-novalidate
                        />
                     <input
                        type="hidden"
                        name="business_state_id"
                        class="state_id_business"
                        data-novalidate
                        />
                     <input
                        type="hidden"
                        name="business_country_id"
                        class="country_id_business"
                        data-novalidate
                        />
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
                              <a href="#step7">
                              <button
                                 type="button"
                                 class="button-next next btn btn-info pull-right businessNext"
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
               <div class="form-section hidden self-employed-professional"
                  data-step="selfEmployed"
                  >
                  <section id="self-employed-professional">
                     <h1>Employment Type</h1>
                     <br />
                     <p>
                        <span style="color: green"
                           >Self Employed- Professional</span
                           >
                     </p>
                     <div class="form-group mt-3">
                        <label for="current-profession">How Many Years You Are In Current Profession? *</label>
                        <div class="row">
                           <div class="col-sm-12">
                              <div class="form-group">
                                 <select class="selectpicker" id="current-profession" name="self_business_years" data-live-search="true" data-width="auto"  
                                    data-parsley-trigger="change"
                                    data-parsley-errors-container=".errorContainer_cpy"
                                    data-parsley-required-message="Current profession is required"  data-none-selected-text="Please select...">
                                    <option value="1">1 Year</option>
                                    <option value="2">1-2 Years</option>
                                    <option value="3">3 Years</option>
                                    <option value="5">3-5 Years</option>
                                    <option value="6">5+ Years</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="errorBlock errorContainer_cpy"></div>
                     </div>
                     <div class="form-group mt-3">
                        <label for="profession-type-select">Profession Type *</label>
                        <div class="row">
                           <div class="col-sm-12">
                              <div class="form-group">
                                 <select class="selectpicker" id="profession-type-select" name="profession_type" data-live-search="true" data-width="auto"  
                                    data-parsley-trigger="change"
                                    data-parsley-errors-container=".errorContainer_profession_type"
                                    data-parsley-required-message="Profession Type is required"  data-none-selected-text="Please select...">
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="errorBlock errorContainer_profession_type"></div>
                     </div>
                     <div class="form-group mt-3">
                        <label for="company-name">Company Name *</label>
                        <input
                           type="text"
                           class="form-control"
                           id="self_company_name"
                           name="self_company_name"
                           placeholder="Enter your Company Name"
                           required
                           data-parsley-required-message="Company Name is required"
                           />
                     </div>
                     <div class="form-group mt-3">
                        <label for="company-address">Company Address *</label>
                        <input
                           type="text"
                           class="form-control"
                           id="selfbusiness_company_address"
                           name="selfbusiness_company_address"
                           placeholder="Company Address"
                           required
                           data-parsley-required-message="Address is required"
                           />
                     </div>
                     <div class="form-group mt-3">
                        <input
                           oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                           type="tel"
                           class="form-control pincode"
                           data-field-step="self"
                           id="pincode"
                           name="company_pincode"
                           placeholder="Pincode"
                           required
                           data-parsley-required-message="Pincode is required"
                           maxlength="10"
                           />
                     </div>
                     <div class="form-group mt-3">
                        <input
                           type="text"
                           class="form-control city_self"
                           id="city"
                           name="company_city"
                           placeholder="City"
                           data-parsley-required-message="City is required"
                           required
                           />
                     </div>
                     <div class="form-group mt-3">
                        <input
                           type="text"
                           class="form-control state_self"
                           id="state"
                           name="company_state"
                           placeholder="State"
                           required
                           readonly
                           data-parsley-required-message="State is required"
                           />
                     </div>
                     <div class="form-group mt-3">
                        <input
                           type="text"
                           class="form-control country_self"
                           id="country"
                           name="company_country"
                           placeholder="Country"
                           required
                           data-parsley-required-message="Country is required"
                           readonly
                           />
                     </div>
                     <div class="form-group mt-3">
                        <label for="monthly-income">Gross Annual Income *</label>
                        <input
                           oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                           type="text"
                           class="form-control"
                           id="annual_income"
                           name="self_annual_income"
                           placeholder="Please Enter Gross Annual Income"
                           required
                           data-parsley-required-message="Gross Annual Income is required"
                           />
                        <span
                           id="income-in-words-annual"
                           style="color: #5cb46a; font-size: 14px"
                           ></span>
                     </div>
                     <div class="form-group mt-3">
                        <label for="self_employed_current_bank">Business/Current Account Is With ? *</label>
                        <div class="row">
                           <div class="col-sm-12">
                              <div class="form-group">
                                 <select class="selectpicker" id="self_employed_current_bank" name="self_employed_current_bank" data-live-search="true" data-width="auto"  
                                    required
                                    data-parsley-trigger="change"
                                    data-parsley-errors-container=".errorContainer_cab"
                                    data-parsley-required-message="Current Account is required"  data-none-selected-text="Please select...">
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="errorBlock errorContainer_cab"></div>
                     </div>
                     <div class="form-group mt-3">
                        <label for="self_employed_saving_bank_account">Primary/Savings Bank Account Is With? *</label>
                        <div class="row">
                           <div class="col-sm-12">
                              <div class="form-group">
                                 <select class="selectpicker" id="self_employed_saving_bank_account" name="self_employed_saving_bank_account" data-live-search="true" data-width="auto"  
                                    required
                                    data-parsley-trigger="change"
                                    data-parsley-errors-container=".errorContainer_saving_bank_account"
                                    data-parsley-required-message="Saving Bank Account is required"  data-none-selected-text="Please select...">
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="errorBlock errorContainer_saving_bank_account"></div>
                     </div>
                     <input
                        type="hidden"
                        name="company_city_id"
                        class="city_id_self"
                        data-novalidate
                        />
                     <input
                        type="hidden"
                        name="company_state_id"
                        class="state_id_self"
                        data-novalidate
                        />
                     <input
                        type="hidden"
                        name="company_country_id"
                        class="country_id_self"
                        data-novalidate
                        />
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
                              <a href="#step8">
                              <button
                                 type="button"
                                 class="button-next next btn btn-info pull-right professionalNext"
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
               <div class="form-section others hidden" data-step="other">
                  <section id="others">
                     <h1>Employment Type</h1>
                     <br />
                     <p><span style="color: green">Others</span></p>
                     <div class="form-group">
                        <label for="profession">What's your profession? *</label>
                        <div class="form-check">
                           <input
                              class="form-check-input"
                              type="radio"
                              name="profession"
                              id="student"
                              value="student"
                              data-parsley-multiple="profession"
                              required
                              data-parsley-errors-container=".errorContainer_profession"
                              data-parsley-required-message="required"
                              />
                           <label
                              class="form-check-label"
                              for="student"
                              style="padding-left: 1rem"
                              >Student</label
                              >
                        </div>
                        <div class="form-check">
                           <input
                              class="form-check-input"
                              type="radio"
                              name="profession"
                              id="job-seeker"
                              value="job-seeker"
                              data-parsley-multiple="profession"
                              required
                              data-parsley-errors-container=".errorContainer_profession"
                              data-parsley-required-message="Profession is required"
                              />
                           <label
                              class="form-check-label"
                              for="job-seeker"
                              style="padding-left: 1rem"
                              >Job Seeker</label
                              >
                        </div>
                        <div class="form-check">
                           <input
                              class="form-check-input"
                              type="radio"
                              name="profession"
                              id="retired"
                              value="retired"
                              data-parsley-multiple="profession"
                              required
                              data-parsley-errors-container=".errorContainer_profession"
                              data-parsley-required-message="Profession is required"
                              />
                           <label
                              class="form-check-label"
                              for="retired"
                              style="padding-left: 1rem"
                              >Retired</label
                              >
                        </div>
                        <div class="form-check">
                           <input
                              class="form-check-input"
                              type="radio"
                              name="profession"
                              id="homemaker"
                              value="homemaker"
                              required
                              data-parsley-errors-container=".errorContainer_profession"
                              data-parsley-required-message="Profession is required"
                              data-parsley-multiple="profession"
                              />
                           <label
                              class="form-check-label"
                              for="homemaker"
                              style="padding-left: 1rem"
                              >Homemaker</label
                              >
                        </div>
                        <div class="form-check">
                           <input
                              class="form-check-input"
                              type="radio"
                              name="profession"
                              id="other"
                              value="other"
                              required
                              data-parsley-errors-container=".errorContainer_profession"
                              data-parsley-required-message="Profession is required"
                              data-parsley-multiple="profession"
                              />
                           <label
                              class="form-check-label"
                              for="other"
                              style="padding-left: 1rem"
                              >Other</label
                              >
                        </div>
                     </div>
                     <div class="errorContainer_profession"></div>
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
                              <a href="#step9"
                                 ><button
                                 type="button"
                                 class="button-next next btn btn-info pull-right otherNext"
                                 >
                              Next
                              <i
                                 class="fa-sharp fa-solid fa-arrow-right"
                                 ></i></button
                                 ></a>
                           </div>
                        </div>
                     </div>
                     <span class="clearfix"></span>
                  </div>
               </div>
               <div class="form-section" data-step="personal">
                  <section id="personal-details">
                     <h1>Personal Details</h1>
                     <br />
                     <div class="form-group">
                        <label for="first-name"
                           >First Name (As per PAN card) *</label
                           >
                        <input
                           oninput="this.value=this.value.replace(/[^a-zA-Z\s]/g,'');"
                           type="text"
                           class="form-control"
                           id="first-name"
                           name="first-name"
                           required
                           data-parsley-required-message="First Name is required"
                           />
                     </div>
                     <div class="form-group">
                        <label for="last-name"
                           >Last Name (As per PAN card) *</label
                           >
                        <input
                           oninput="this.value=this.value.replace(/[^a-zA-Z\s]/g,'');"
                           type="text"
                           class="form-control"
                           id="last-name"
                           name="last-name"
                           required
                           data-parsley-required-message="Last Name required"
                           />
                     </div>
                     <div class="form-group">
                        <label for="dob">DOB</label>
                        <input
                           type="date"
                           class="form-control"
                           style="
                           border-top-right-radius: 8px;
                           border-bottom-right-radius: 8px;
                           "
                           id="dob"
                           name="dob"
                           value="25/05/2000"
                           placeholder="dd/mm/yyyy"
                           data-date-format="mm/dd/yyyy"
                           data-parsley-trigger="keyup"
                           data-parsley-minimumage="18" 
                           data-parsley-minimumage-message="Applicant must be at least 18 years of age to apply"
                           required
                           data-parsley-required-message="Dob is required"
                           data-parsley-errors-container="dob_error_container"
                           />
                        <span class="input-group-addon">
                        </span>
                        <div class="dob_error_container"></div>
                     </div>
                     <div class="form-group">
                        <label for="gender">Gender *</label>
                        <div class="row">
                           <div class="col-sm-12">
                              <div class="form-group">
                                 <select class="selectpicker" id="gender" name="gender" data-live-search="false" data-width="auto"  
                                    required
                                    data-parsley-trigger="change"
                                    data-parsley-errors-container=".errorContainer_gender"
                                    data-parsley-required-message="Gender is required"  data-none-selected-text="Please select...">
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="errorBlock errorContainer_gender"></div>
                     </div>
                     <div class="form-group mt-3">
                        <label>Marital Status *</label><br />
                        <div class="form-check-inline d-flex">
                           <input
                              class="form-control-radio"
                              type="radio"
                              name="marital_status"
                              data-parsley-multiple="marital_status"
                              value="Single"
                              id="single"
                              required
                              trigger="click"
                              data-parsley-errors-container=".errorContainer_marital-status"
                              data-parsley-required-message="Marital Status is required"
                              />
                           <label class="feature-box-radio" for="single">
                              <img
                                 src="./../assets/images/man.svg"
                                 alt="travel-icon"
                                 />
                              <h6>Single</h6>
                           </label>
                           <input
                              class="form-control-radio"
                              type="radio"
                              name="marital_status"
                              data-parsley-multiple="marital_status"
                              value="Married"
                              id="married"
                              />
                           <label class="feature-box-radio" for="married">
                              <img
                                 src="./../assets/images/couple.svg"
                                 alt="travel-icon"
                                 />
                              <h6>Married</h6>
                           </label>
                        </div>
                        <div class="errorContainer_marital-status"></div>
                     </div>
                     <div class="form-group mt-3">
                        <label for="qualification">Qualification *</label>
                        <div class="row">
                           <div class="col-sm-12">
                              <div class="form-group">
                                 <select class="selectpicker" id="qualification" name="qualification" data-live-search="false" data-width="auto"  
                                    required
                                    data-parsley-trigger="change"
                                    data-parsley-errors-container=".errorContainer_qualification"
                                    data-parsley-required-message="Qualification is required"  data-none-selected-text="Please select...">
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="errorBlock errorContainer_qualification"></div>
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
                              <a href="#step10"
                                 ><button
                                 type="button"
                                 class="button-next next btn btn-info pull-right personalNext"
                                 >
                              Next
                              <i
                                 class="fa-sharp fa-solid fa-arrow-right"
                                 ></i></button
                                 ></a>
                           </div>
                        </div>
                     </div>
                     <span class="clearfix"></span>
                  </div>
               </div>
               <div class="form-section" data-step="address" data-field-step="home">
                  <section id="address-details">
                     <h1>Address Details *</h1>
                     <br />
                     <div class="form-group">
                        <label for="address-line-1"
                           >Address Line 1 (Flat/Block) *</label
                           >
                        <input
                           type="text"
                           class="form-control"
                           id="home_address"
                           name="home_address"
                           required
                           data-parsley-required-message="Address is required"
                           />
                     </div>
                     <div class="form-group">
                        <label for="landmark">Landmark (Area/Locality) *</label>
                        <input
                           type="text"
                           class="form-control"
                           id="home_landmark"
                           name="home_landmark"
                           required
                           data-parsley-required-message="Landmark is required"
                           />
                     </div>
                     <div class="form-group">
                        <label for="pin-code">Pin Code *</label>
                        <input
                           maxlength="6"
                           oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                           type="tel"
                           class="form-control pincode"
                           data-field-step="home"
                           id="home_pincode"
                           name="home_pincode"
                           placeholder="Pincode"
                           required
                           data-parsley-required-message="Pincode is required"
                           />
                     </div>
                     <div class="form-group">
                        <label for="city">City *</label>
                        <input
                           type="text"
                           class="form-control city_home"
                           id="home_city"
                           name="home_city"
                           placeholder="City"
                           required
                           data-parsley-required-message="City is required"
                           />
                     </div>
                     <div class="form-group">
                        <label for="state">State *</label>
                        <input
                           type="text"
                           class="form-control state_home"
                           id="home_state"
                           name="home_state"
                           placeholder="State"
                           tigger="change"
                           required
                           readonly
                           data-parsley-required-message="State is required"
                           />
                     </div>
                     <div class="form-group">
                        <label for="country">Country *</label>
                        <input
                           type="text"
                           class="form-control country_home"
                           id="home_country"
                           name="home_country"
                           placeholder="Country"
                           readonly
                           required
                           tigger="change"
                           data-parsley-required-message="Country is required"
                           />
                     </div>
                     <div class="form-group mb-2">
                        <label for="residence-type">Residence Type *</label>
                        <div class="row">
                           <div class="col-sm-12">
                              <div class="form-group">
                                 <select class="selectpicker" id="residence-type" name="residence-type" data-live-search="false" data-width="auto"  
                                    required
                                    data-parsley-trigger="change"
                                    data-parsley-errors-container=".errorContainer_residence-type"
                                    data-parsley-required-message="Residence type is required"  data-none-selected-text="Please select...">
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="errorBlock errorContainer_residence-type"></div>
                     </div>
                     <div class="form-group mt-3">
                        <label for="years-living">How Many Years You Are Living in Current Address?</label>
                        <div class="row">
                           <div class="col-sm-12">
                              <div class="form-group">
                                 <select class="selectpicker" id="years-living" name="years-living" data-live-search="false" data-width="auto"  
                                    required
                                    data-parsley-trigger="change"
                                    data-parsley-errors-container=".errorContainer_living-years"
                                    data-parsley-required-message="Years living is required"  data-none-selected-text="Please select...">
                                    <option value="1">1 Year</option>
                                    <option value="2">1-2 Years</option>
                                    <option value="3">3 Years</option>
                                    <option value="5">3-5 Years</option>
                                    <option value="6">5+ Years</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="errorBlock errorContainer_living-years"></div>
                     </div>
                     <input
                        type="hidden"
                        name="home_city_id"
                        class="city_id_home"
                        data-novalidate
                        />
                     <input
                        type="hidden"
                        name="home_state_id"
                        class="state_id_home"
                        data-novalidate
                        />
                     <input
                        type="hidden"
                        name="home_country_id"
                        class="country_id_home"
                        data-novalidate
                        />
                     <div class="errorContainer_living-years"></div>
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
                              <a href="#step11"
                                 ><button
                                 type="button"
                                 class="button-next next btn btn-info pull-right addressNext"
                                 >
                              Next
                              <i
                                 class="fa-sharp fa-solid fa-arrow-right"
                                 ></i></button
                                 ></a>
                           </div>
                        </div>
                     </div>
                     <span class="clearfix"></span>
                  </div>
               </div>
               <div class="form-section" data-step="emiDetails">
                  <section id="other-details">
                     <h1>Other Details</h1>
                     <br />
                     <div class="form-group">
                        <div
                           class="d-flex justify-content-between align-items-center"
                           style="width: 100%"
                           >
                           <label for="emi"
                              >Total EMI Pay currently Per Month:</label
                              >
                           <span style="border-bottom: 2px solid #c6e5cb">
                           <img
                              style="width: 18px; padding-right: 5px"
                              src="./../assets/images/rupee.png"
                              alt="rupee-icon"
                              />
                           <input
                              type="text"
                              id="emiValue"
                              class="emivalue"
                              style="
                              font-weight: 600;
                              outline: none;
                              border: none;
                              background: transparent;
                              padding:0;
                              "
                              size="7"
                              oninput="this.value = this.value.replace(/[^0-9]/g,''); if(this.value > 500000) this.value = 500000;"
                              min="0"
                              max="500000"
                              value="0"
                              required
                              data-parsley-errors-container=".errorContainer_emi"
                              data-parsley-required-message="Please enter 0 in emi amount "
                              />
                           </span>
                        </div>
                        <input
                           type="range"
                           class="form-control-range slider"
                           id="emi"
                           name="emi"
                           min="0"
                           max="500000"
                           step="1000"
                           minlength="1"
                           maxlength="7"
                           value="0"
                           required
                           />
                        <div
                           class="d-flex justify-content-between p-1"
                           style="width: 100%"
                           >
                           <small>0</small>
                           <small>5,00,000</small>
                        </div>
                        <div class="errorContainer_emi"></div>
                     </div>
                     <div class="form-group pt-3">
                        <label for="years-living">Are you interested in getting any credit card? *</label>
                        <div class="row">
                           <div class="col-sm-12">
                              <div class="form-group">
                                 <select class="selectpicker" id="credit-card" name="credit-card" data-live-search="false" data-width="auto"  
                                    required
                                    data-parsley-trigger="change"
                                    data-parsley-errors-container=".errorContainer_creditcard"
                                    data-parsley-required-message="Credit card is required"  data-none-selected-text="Please select...">
                                    <option value="true">Yes</option>
                                    <option value="false">No</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="errorBlock errorContainer_creditcard"></div>
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
                              <a href="#step12"
                                 ><button
                                 type="button"
                                 class="button-next next btn btn-info pull-right emiNext"
                                 >
                              Next
                              <i
                                 class="fa-sharp fa-solid fa-arrow-right"
                                 ></i></button
                                 ></a>
                           </div>
                        </div>
                     </div>
                     <span class="clearfix"></span>
                  </div>
               </div>
               <div class="form-section" data-step="submit-form">
                  <section id="form-submit">
                     <h1>Submit Loan Request</h1>
                     <br />
                     <label
                        class="form-check-label"
                        >
                        <div class="squaredThree">
                           <input
                              type="checkbox"
                              value="true"
                              id="defaultCheck2"
                              checked
                              required
                              data-parsley-errors-container=".errorContainer_checkbox2"
                              data-parsley-required-message="Please accept to proceed"
                              />
                     <label for="defaultCheck2"></label>
                     </div>
                     <div class="label-text-checkbox">I hereby declare that I have read, understood and agree
                        to the Terms & Conditions and the Privacy Policy of this
                        platform. I allow Credmudra, its Lending Partners and
                        subsidiaries to contact me via phone,email or any other
                        mode of communication for loan, credit card or any other
                        related matters, Information or promotions.
                     </div>
                     </label>
                     <div class="errorContainer_checkbox2"></div>
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
                              <button
                                 type="button"
                                 class="button-next btn btn-info pull-right"
                                 id="final-submit"
                                 >
                              Submit
                              <i class="fa-sharp fa-solid fa-arrow-right"></i>
                              </button>
                           </div>
                        </div>
                     </div>
                     <span class="clearfix"></span>
                  </div>
               </div> -->
               <br /> 
               <br />
            </form>
         </div>
         
<?php include_once('form-footer.php'); ?>
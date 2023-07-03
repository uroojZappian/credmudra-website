<section class="pl_feature_benefites">
            <div class="container-fluid" style="display:block !important">
               <div class="row align-items-md-center1">
                  <div class="col-md-12">
                     <div class="pl_feature_benefites_one">
                        <h4>Features and Benefits of Personal Loans:</h4>
                        <ul class="ul_style">
                           <li>Personal loans come with no restrictions on how the funds are used.</li>
                           <li>The loan amount can go up to Rs. 40 lakh, or even higher based on the discretion of the lenders.</li>
                           <li>Repayment tenure can extend up to 5 years, with some banks/NBFCs offering longer durations.</li>
                           <li>Minimal documentation is required to apply for a personal loan.</li>
                           <li>Quick disbursals ensure fast access to the funds.</li>
                           <li>Individuals with excellent credit profiles may qualify for pre-approved or pre-qualified personal loans, which come with instant disbursal.</li>
                        </ul>
                        <h5>Eligibility Criteria for Personal Loans:</h5>
                        <ul class="ul_style">
                           <li>Age: 18 - 60 years</li>
                           <li>Income: Minimum Rs 15,000/month for salaried applicants</li>
                           <li>Credit Score: Preferably 750 and above as having higher credit scores increase the chances of your loan approval at lower interest rates</li>
                        </ul>
                     </div>
                     <div class="pl_feature_benefites_one">
                        <p>The APR of a personal loan represents its annualized cost, including the interest rate, processing fees, documentation fees, and other charges during loan origination. APR is expressed as a percentage and helps applicants identify loan schemes with lower interest rates but higher processing fees or additional charges.Personal loan APR typically ranges from 11.29% to 35%.</p>
                        <p>Assume you have taken a personal loan of Rs. 5 lakhs at an interest rate of 10.50% per annum for a repayment period of 5 years. The processing fee for this loan is 1.5% of the loan amount, totaling Rs. 7,500. Therefore, the APR for your personal loan would be 11.60%.</p>
                        <p><b>Disclaimer: </b> Credmudra functions as a loan aggregator and provides services on behalf of its partners, duly authorized for the purpose.</p>
                        <p>The registered address is B No.08 Nirupam, PH-II Nirupam state, Ahmedpur kalan Hujur, Bhopal, Madhya Pradesh 462026.</p>
                     </div>
                  </div>
                  <div class="offset-md-1 col-md-5">
                  </div>
               </div>
            </div>
        </section>
      </div>
      <div class="col-md-12 col-lg-6 col-xl-6 form_image_div">
         <img src="./../assets/images/form-new-image.png" alt="form-bnr">
      </div>
   </div>
</div>
<div id="snackbar"></div>
</main>
<div
   class="modal fade" id="myModal" tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalCenterTitle" aria-hidden="true"
   >
   <div class="modal-dialog" role="document">
      <div class="modal-content rounded-4 shadow">
         <div class="modal-body p-5">
            <div class="loader1"></div>
            <br />
            <br />
            <div class="center">
               <h1>Processing Loan Request</h1>
               <p>This will take a few moments</p>
               <p class="subtext">
                  Please wait while the loan request is being processed. The loan
                  request process can take few minutes, please do not click
                  back or refresh the page.
               </p>
            </div>
            <div id="barcontainer">
               <div class="bar">
                  <div class="progress"></div>
                  <div id="steps">
                     <div class="step current" data-desc="Verifying Your Profile">
                        1
                     </div>
                     <div class="step" data-desc="Finding A Suitable Lender">
                        2
                     </div>
                     <div class="step" data-desc="Processing Your Requests">3</div>
                     <div class="step" data-desc="Final Match">4</div>
                     <div class="step" data-desc="Complete">5</div>
                  </div>
               </div>
            </div>
            <div class="progress-text">
               <ul>
                  <li class="current">Verifying Your Profile</li>
                  <li>Finding A Suitable Lender</li>
                  <li>Processing Your Requests</li>
                  <li>Final Match</li>
                  <li>Complete</li>
               </ul>
            </div>
            <div class="center">
               <p>You Are Getting Redirect Shortly</p>
            </div>
            <button
               type="button"
               class="continue btn btn-lg btn-success mt-5 w-100"
               data-bs-dismiss="modal"
               style="display: none"
               >
            Continue
            </button>
         </div>
      </div>
   </div>
</div>
<style>
   .pl_feature_benefites{
   padding:0;
   }
   .pl_feature_benefites h4{
   font-weight: 700;
   margin-bottom: 20px;
   font-size: 15px;
   }
   .pl_feature_benefites h5{
   font-weight: 700;
   margin-bottom: 20px;
   font-size: 15px;
   }
   .pl_feature_benefites ul{}
   .pl_feature_benefites ul li{
   font-size: 12px;
   }
   .pl_feature_benefites p{
   font-size: 12px;
   }
</style>
<script src='./../assets/js/popper.min.js'></script>
<script src='./../assets/js/bootstrap4.min.js'></script>
<script
   type="text/javascript"
   src="./../assets/js/parsley.js"
   ></script>

<script src="./../assets/js/bootstrap-datepicker.min.js"></script>

<script src="./../assets/js/moment.min.js"></script>
<script src="./../assets/js/custom-function.js"></script>
<script src="./../assets/js/bootstrap-select.js"></script>

<script>
   var fullForm = $("#welcome-form");
   var base_url = "https://gateway.credmudra.com/";
   //var base_url = "https://dev.credmudra.com/apis/";
   $("#final-submit").on("click", function (e) {
     var formData = fullForm.serializeArray();
     var curIndex = $(".form-section").index(
       $(".form-section").filter(".current")
     );
     
     
     fullForm
       .parsley()
       .whenValidate({
         group: "block-" + curIndex,
       })
       .done(function () {
         $("#myModal").modal("toggle");
         
         submitprogress(1);
         $(window).off("beforeunload");
         var formData = fullForm.serializeArray();
         const userSessData = sessionStorage.getItem("sessionData");
         const jsonData = JSON.parse(userSessData);
   
         formData.push({
           name: "token",
           value: jsonData.token.accessToken,
         });
         formData.push({
           name: "dob",
           value: moment($("#dob").val()).format("YYYY-MM-DD"),
         },{name: "leadId",value: jsonData?.leadId});
         
         $.ajax({
           type: "POST",
           url: "submit.php",
           data: formData,
           success: function (resp) {
             console.log(resp);
   
             var response = JSON.parse(resp);
             webEngage("SUBMIT");
             
             if (response.status.code == 200) {
               var lead_id = response.data.id;
               setTimeout(function () {
                 
                 if(lead_id!=''){
                 	  leadStatus(jsonData.token.accessToken,lead_id);
                 }
               }, 10000);
               
             } else {
               $("#snackbar").html(
                 "Something went wrong please try again later"
               );
               var x = document.getElementById("snackbar");
               x.className = "show";
               setTimeout(function () {
                 x.className = x.className.replace("show", "");
               }, 3000);
               //setTimeout(function () {
                 //submitprogress(0);
                 //window.location = base_url+"/get-registered/";
                //}, 5000);
             }
             // const obj = JSON.parse(resp);
             // dbLeadId = obj.leadId;
           },
         });
       });
   });

	function eligibilityCheck(){
      var userSessData = sessionStorage.getItem("sessionData");
      var jsonData = JSON.parse(userSessData);
      var formData = fullForm.serializeArray();

      if (jsonData?.token && jsonData?.leadId) {
        
        formData.push({name: "leadId",value: jsonData?.leadId},{name:"eligibilityCheck",value:true},{
           name: "token",
           value: jsonData.token.accessToken,
         },{
           name: "dob",
           value: moment($("#dob").val()).format("YYYY-MM-DD"),
         });
        var settings = {
            url: "submit.php",
            method: "POST",
            timeout: 0,
            headers: {
                Authorization: "Bearer " + jsonData?.token.accessToken,
            },
            data: formData
        };
        $.ajax(settings).done(function(response) {
          console.log(response);
        });
      }else{

      }
    }
</script>
<script>
   var countDown = 60;
   var timer = document.getElementById("timer");
   var sendButton = document.getElementById("sendOtp");
   var resendButton = document.getElementById("resendOtp");
   var intervalId;
   function otpResendTimer(){
   $("#resendOtp").hide();
         $(".timerBtn").show();
       
     	resendButton.disabled = false; // enable the resend button
         countDown = 60; // reset the countdown
         timer.textContent = countDown;
   
         intervalId = setInterval(function () {
           countDown--;
           timer.textContent = countDown;
   
           if (countDown <= 0) {
             clearInterval(intervalId);
             timer.textContent = "0";
             $(".timerBtn").hide();
             $("#resendOtp").show();
             resendButton.disabled = true; // disable the resend button
           }
         }, 1000);
   }
   <?php if($mobile!='') : ?>
         otpResendTimer();
   <?php endif; ?>
     sendButton.addEventListener("click", function () {
       otpResendTimer();
     });
   
   	
   $(function () {
     $(".datepicker").datepicker({
       language: "es",
       autoclose: true,
       format: "dd/mm/yyyy",
       yearRange: "1950:2021",
       minDate: "-75y",
       maxDate: "-18y",
     });
   });
   
   
</script>


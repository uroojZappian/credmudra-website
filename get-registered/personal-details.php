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
            <form action="personal-details.php" method="POST"
               class="demo-form"
               id="welcome-form"
               data-parsley-excluded="input[class=select-search-input], [data-novalidate]"
               >

            </form>
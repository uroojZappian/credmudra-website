<?php
/*
Template Name: All Offers
*/
include('header.php'); ?>
<style>
  .left-div-submit {
    height: 100vh;
    overflow: scroll;
  }

  .left-div-submit::-webkit-scrollbar {
    display: none;
  }

  .left-div-submit h1 {
    font: normal normal 900 42px/66px Inter;
    letter-spacing: 0px;
    color: #262250;
    text-transform: capitalize;
    opacity: 1;
  }

  .left-div-submit p {
    font: normal normal normal 16px/22px Inter;
    letter-spacing: 0px;
    color: #262250;
  }

  .left-div-submit p span {
    font: normal normal medium 16px/22px Inter;
    letter-spacing: 0px;
    color: #5ab56b;
  }

  .button-next {
    background: #5ab56b 0% 0% no-repeat padding-box;
    border: 1px solid #5ab56b;
    border-radius: 10px;
    opacity: 1;
    padding: 10px;
    margin: 25px 12px;
    color: #000;
  }

  .button-next:hover {
    background: #5ab56b 0% 0% no-repeat padding-box;
    border: 1px solid #fff;
    border-radius: 10px;
    opacity: 1;
    padding: 10px;
    margin: 25px 12px;
    color: white;
  }

  .card {
    background: #ffffff 0% 0% no-repeat padding-box;
    box-shadow: 0px 3px 6px #0000001c;
    border: 1px solid #5ab56b;
    border-radius: 10px;
    opacity: 1;
    padding: 10px;
  }

  .card h2 {
    font: normal normal bold 14px/30px Inter;
    letter-spacing: 0px;
    color: #262250;
    opacity: 1;
  }

  .card li {
    font: normal normal normal 12px/30px Inter;
    letter-spacing: 0px;
    color: #262250;
    opacity: 0.84;
    list-style: none;
  }

  .card ul {
    margin: 0;
    padding: 0;
  }

  .checked {
    color: #5ab56b;
  }

  .card .review-btn {
    background: #5ab56b 0% 0% no-repeat padding-box;
    border: 1px solid #5ab56b;
    border-radius: 5px;
    opacity: 1;
    padding: 10px;
    color: #fff;
    text-decoration: none;
  }

  .card a {
    text-decoration: underline;
    font: normal normal normal 14px/36px Inter;
    letter-spacing: 0px;
    color: #262250;
    opacity: 0.42;
  }

  .banner-right-image {
    position: absolute;
    right: 0;
    height: 100%;
    z-index: -1;
    "
 max-width: 45%;
  }
</style>
<main id="primary" class="site-main">
  <img class="wave" src="./../assets/images/wave.svg" alt="wave" />
  <div class="container pt-5 pb-5">
    <div class="row">
      <div class="col-md-12 col-lg-7">
        <div class="left-div-submit" style="padding-top:5rem;padding-bottom:8rem">
          <h1 style="font: normal normal 900 35px/50px Inter">
            Explore Exclusive Personal Loan Offers By Credmudra
          </h1>
          <p style="
                  font: normal normal normal 20px/30px Inter;
                  letter-spacing: 0px;
                  color: #262250;
                  opacity: 0.84;
                ">
            Unlock Limitless Possibilities: Discover Credmudra's Personal Loan Wonderland, Where Exclusive Offers Await, Paving the Way to a Brighter Future and a Life of Financial Freedom!
          </p>
          <div class="card" style="display:none">
            
              <div class="row d-flex align-items-center">
                <div class="col-md-3">
                  <img src="./../assets/images/mpocket.png" alt="offer-1" />
                </div>
                <div class="col-md-5">
                  <h2>Loan Amount : &#8377 500 - &#8377 30,000</h2>
                  <ul>
                    <li>
                      <span><i style="color: #5ab56b" class="fa-solid fa-check"></i>
                      </span>
                      Paperless Process
                    </li>
                    <li>
                      <span><i style="color: #5ab56b" class="fa-solid fa-check"></i>
                      </span>
                      No Collaterals Needed
                    </li>
                    <li>
                      <span><i style="color: #5ab56b" class="fa-solid fa-check"></i>
                      </span>
                      Interest Rate Starting from 0%
                    </li>
                  </ul>
                </div>
                <div class="col-md-4" style="text-align: center">
                  <!-- <div class="star-rating">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                      </div> -->
                  <br />
                  <div><a class="review-btn" href="https://web.mpokket.in/?utm_source=credmudra&utm_medium=sms">Get Started</a></div>

                </div>
              </div>
            
          </div>


          <div class="card">
            
              <div class="row d-flex align-items-center">
                <div class="col-md-3">
                  <img src="./../assets/images/nira.png" alt="offer-1" />
                </div>
                <div class="col-md-5">
                  <h2>Unlock Your Dreams with a Personal Loan</h2>
                  <ul>
                    <li>
                      <span><i style="color: #5ab56b" class="fa-solid fa-check"></i>
                      </span>
                      Amount Up to 1 lac
                    </li>
                    <li>
                      <span><i style="color: #5ab56b" class="fa-solid fa-check"></i>
                      </span>
                      Quick Approval
                    </li>
                    <li>
                      <span><i style="color: #5ab56b" class="fa-solid fa-check"></i>
                      </span>
                      Hassle-Free Process
                    </li>
                  </ul>
                </div>
                <div class="col-md-4" style="text-align: center">
                  <!-- <div class="star-rating">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                      </div> -->
                  <br />
                  <div><a class="review-btn" data-offer="nira" target="_blank" href="https://nirapartner.onelink.me/jG7h/m0drhjyt">Get Started</a></div>

                </div>
              </div>
            
          </div>
        </div>
      </div>
      <div class="col-md-5 pt-5 d-md-none d-lg-block">
        <img src="./../assets/images/form-new-image.png" alt="form-bnr">
      </div>
    </div>
  </div>
</main>


<script>
  $(document).ready(function() {
    const main = $("main");
    const scrollableDiv = $(".left-div-submit");

    main.on("wheel", function(event) {
      event.preventDefault();
      scrollableDiv.scrollTop(
        scrollableDiv.scrollTop() + event.originalEvent.deltaY
      );
    });
    var userSessData = sessionStorage.getItem("sessionData");
    var jsonData = JSON.parse(userSessData);
    $(".review-btn").on("click",function(){
      var offerName = $(this).attr('data-offer');
      webengage.track("Exit Status", {
        Lender: offerName,
          LeadID: jsonData?.leadId
      });
      webengage.user.logout();
    });
  });
</script>
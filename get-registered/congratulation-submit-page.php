<?php
/*
Template Name: Submit Page
*/
include('header.php');

if(isset($_REQUEST['PRE_AMNT'])){
	$amount = $_REQUEST['PRE_AMNT'];
}else{
	$amount = '';
}

if(isset($_REQUEST['NAME'])){
	$buyer = $_REQUEST['NAME'];
}else{
	$buyer = '';
}

if(isset($_REQUEST['RED_URL'])){
	$RED_URL = $_REQUEST['RED_URL'];
}else{
	$RED_URL = '';
}

?>


<style>
		.left-div-submit{padding-left:2rem}
        .left-div-submit h1{
            font: normal normal 900 42px/66px Inter;
            letter-spacing: 0px;
            color: #262250;
            text-transform: capitalize;
            opacity: 1;
			margin:0;
			padding:0;
        }

        .left-div-submit p{
            font: normal normal normal 16px/22px Inter;
            letter-spacing: 0px;
            color: #262250;
        }

        .left-div-submit p span{
            font: normal normal medium 16px/22px Inter;
            letter-spacing: 0px;
            color: #5AB56B;
        }

            .button-next {
                background: #5ab56b 0% 0% no-repeat padding-box;
                border: 1px solid #5ab56b;
                border-radius: 10px;
                opacity: 1;
                padding: 12px 3rem 10px;
                color: #000;
            }

            .button-next:hover {
              background: #5ab56b 0% 0% no-repeat padding-box;
              border: 1px solid #fff;
              border-radius: 10px;
              opacity: 1;
              padding: 12px 3rem 10px;
              color: white;
            }
            .congratulation-gif{
              max-width:200px;
            }
			.logo-lender{
              max-width:180px;
              margin-top:1rem;
              margin-bottom:2rem;
			}
          .banner-right-image{
            	position: absolute;
                right: 0;
                height: 100%;
                z-index: -1;"
          }
            @media screen and (max-width: 576px) {
              .congratulation-gif{
				max-width:100%;
              	margin:auto;
              }
              .left-div-submit h1{
                text-align:center;
            }
             .logo-lender{
              	max-width:70%;
                margin:auto;
                display:flex;
                margin-bottom:2rem;
			}
              .button-next {
                background: #5ab56b 0% 0% no-repeat padding-box;
                border: 1px solid #5ab56b;
                border-radius: 10px;
                opacity: 1;
                padding: 12px 3rem 10px;
                color: #000;
                margin: auto 5rem;
                justify-content: center;
                display: flex;
                align-items: center;
            }
            .left-div-submit p{
                font: normal normal normal 14px/22px Inter;
                letter-spacing: 0px;
                color: #262250;
                text-align:center;
            }
            }
    </style>
    <main id="primary" class="site-main">
        <img class="wave" src="./../assets/images/wave.svg" alt="wave" />
        <div class="container pt-5">
            <div class="row align-items-center">
                <div class="col-md-12 col-lg-5">
                    <?php if($buyer=='cashe'){?>
					<div class="left-div-submit pb-5">
                        <img class="congratulation-gif" src="./../assets/images/output-onlinegiftools-final.gif" alt="congatulations"/>
                        <h1>Congratulations</h1>
                        <p>Your Loan has been Pre Approved by our Lender.</p>
                        <img class="logo-lender" src="https://www.credmudra.com/wp-content/uploads/2023/05/cashe-lendar.png" alt="verified-partners-logo"/>
                        <?php if($amount!='' && $amount!=0){?>
                                <p>For the Amount =  <img
                                      style="width: 20px; padding-right: 5px"
                                      src="./../assets/images/rupee.png"
                                      alt="rupee-icon"
                                    /><b><?=$amount;?>/-</b></p>
                        <?php } ?>
                        <div><a href="<?=$RED_URL;?>" class="button-next next btn btn-info"> Continue <span>&nbsp<i class="fa-sharp fa-solid fa-arrow-right"></i></span></a></div>
                        <p style="margin-top:20px">
                            Complete you KYC & Get your Money Now
                        </p>
                    </div>
					<?php } ?>
					<?php if($buyer=='fibe'){?>
					<div class="left-div-submit pb-5">
                        <img class="congratulation-gif" src="./../assets/images/output-onlinegiftools-final.gif" alt="congatulations"/>
                        <h1>Congratulations</h1>
                        <p>Your Loan has been Pre Approved by our Lender.</p>
                        <img class="logo-lender" src="https://www.credmudra.com/wp-content/uploads/2023/05/fibe.png" alt="verified-partners-logo"/>
                        <?php if($amount!='' && $amount!=0){?>
                                <p>For the Amount =  <img
                                      style="width: 20px; padding-right: 5px"
                                      src="./../assets/images/rupee.png"
                                      alt="rupee-icon"
                                    /><b><?=$amount;?>/-</b></p>
                        <?php } ?>
                        <div><a href="<?=$RED_URL;?>" class="button-next next btn btn-info"> Continue <span>&nbsp<i class="fa-sharp fa-solid fa-arrow-right"></i></span></a></div>
                        <p style="margin-top:20px">
                            Complete you KYC & Get your Money Now
                        </p>
                    </div>
					<?php } ?>
					<?php if($buyer=='kreditbee'){?>
					<div class="left-div-submit pb-5">
                        <img class="congratulation-gif" src="./../assets/images/output-onlinegiftools-final.gif" alt="congatulations"/>
                        <h1>Congratulations</h1>
                        <p>Your Loan has been Pre Approved by our Lender.</p>
                        <img class="logo-lender" src="https://www.credmudra.com/wp-content/uploads/2023/05/kreditbee.png" alt="verified-partners-logo"/>
                        <?php if($amount!='' && $amount!=0){?>
                                <p>For the Amount =  <img
                                      style="width: 20px; padding-right: 5px"
                                      src="./../assets/images/rupee.png"
                                      alt="rupee-icon"
                                    /><b><?=$amount;?>/-</b></p>
                        <?php } ?>
                        <div><a href="<?=$RED_URL;?>" class="button-next next btn btn-info"> Continue <span>&nbsp<i class="fa-sharp fa-solid fa-arrow-right"></i></span></a></div>
                        <p style="margin-top:20px">
                            Complete you KYC & Get your Money Now
                        </p>
                    </div>
					<?php } ?>
					<?php if($buyer=='moneytap'){?>
					<div class="left-div-submit pb-5">
                        <img class="congratulation-gif" src="./../assets/images/output-onlinegiftools-final.gif" alt="congatulations"/>
                        <h1>Congratulations</h1>
                        <p>Your Loan has been Pre Approved by our Lender.</p>
                        <img class="logo-lender" src="https://www.credmudra.com/wp-content/uploads/2023/05/moneytap.png" alt="verified-partners-logo"/>
                        <?php if($amount!='' && $amount!=0){?>
                                <p>For the Amount =  <img
                                      style="width: 20px; padding-right: 5px"
                                      src="./../assets/images/rupee.png"
                                      alt="rupee-icon"
                                    /><b><?=$amount;?>/-</b></p>
                        <?php } ?>
                        <div><a href="<?=$RED_URL;?>" class="button-next next btn btn-info"> Continue <span>&nbsp<i class="fa-sharp fa-solid fa-arrow-right"></i></span></a></div>
                        <p style="margin-top:20px">
                            Complete you KYC & Get your Money Now
                        </p>
                    </div>
                  <?php } ?>
				  <?php if($buyer=='mpocket'){?>
					<div class="left-div-submit pb-5">
                        <img class="congratulation-gif" src="./../assets/images/output-onlinegiftools-final.gif" alt="congatulations"/>
                        <h1>Congratulations</h1>
                        <p>Your Loan has been Pre Approved by our Lender.</p>
                        <img class="logo-lender" src="https://www.credmudra.com/wp-content/themes/credmudra/assets/images/mpocket.png" alt="verified-partners-logo"/>
                        <?php if($amount!='' && $amount!=0){?>
                                <p>For the Amount =  <img
                                      style="width: 20px; padding-right: 5px"
                                      src="./../assets/images/rupee.png"
                                      alt="rupee-icon"
                                    /><b><?=$amount;?>/-</b></p>
                        <?php } ?>
                        <div><a href="<?=$RED_URL;?>" class="button-next next btn btn-info"> Continue <span>&nbsp<i class="fa-sharp fa-solid fa-arrow-right"></i></span></a></div>
                        <p style="margin-top:20px">
                            Complete you KYC & Get your Money Now
                        </p>
                    </div>
                  <?php } ?>
				  <?php if($buyer=='paysense'){?>
					<div class="left-div-submit pb-5">
                        <img class="congratulation-gif" src="./../assets/images/output-onlinegiftools-final.gif" alt="congatulations"/>
                        <h1>Congratulations</h1>
                        <p>Your Loan has been Pre Approved by our Lender.</p>
                        <img class="logo-lender" src="./../assets/images/paysense.png" alt="verified-partners-logo"/>
                        <?php if($amount!='' && $amount!=0){?>
                                <p>For the Amount =  <img
                                      style="width: 20px; padding-right: 5px"
                                      src="./../assets/images/rupee.png"
                                      alt="rupee-icon"
                                    /><b><?=$amount;?>/-</b></p>
                        <?php } ?>
                        <div><a href="<?=$RED_URL;?>" class="button-next next btn btn-info"> Continue <span>&nbsp<i class="fa-sharp fa-solid fa-arrow-right"></i></span></a></div>
                        <p style="margin-top:20px">
                            Complete you KYC & Get your Money Now
                        </p>
                    </div>
                  <?php } ?>
				 <?php if($buyer=='lendingkart'){?>
					<div class="left-div-submit pb-5">
                        <img class="congratulation-gif" src="./../assets/images/output-onlinegiftools-final.gif" alt="congatulations"/>
                        <h1>Congratulations</h1>
                        <p>Your Loan has been Pre Approved by our Lender.</p>
                        <img class="logo-lender" src="./../assets/images/landingkart.png" alt="verified-partners-logo"/>
                        <?php if($amount!='' && $amount!=0){?>
                                <p>For the Amount =  <img
                                      style="width: 20px; padding-right: 5px"
                                      src="./../assets/images/rupee.png"
                                      alt="rupee-icon"
                                    /><b><?=$amount;?>/-</b></p>
                        <?php } ?>
                        <div><a href="<?=$RED_URL;?>" class="button-next next btn btn-info"> Continue <span>&nbsp<i class="fa-sharp fa-solid fa-arrow-right"></i></span></a></div>
                        <p style="margin-top:20px">
                            Complete you KYC & Get your Money Now
                        </p>
                    </div>
                  <?php } ?>
                </div>
				<div class="col-md-7 d-md-none d-lg-block">
            	  <img src="https://www.credmudra.com/wp-content/uploads/2023/05/form-new-image.png" alt="form-bnr" style="padding:5rem">
        		</div>
            </div>
        </div>
    </main>

<?php include('./../footer.php'); ?>
<?php 
$base_url = "https://gateway.credmudra.com/";
$dob = $_POST['dob'];
$businessOwnedId = '';
$accessToken = $_POST['token'];
if($_POST['employment-type']== 'Salaried' ){
    $companyAddress = $_POST['salary_company_address'];
    $companyPincode = $_POST['salary_pincode'];
    $companyCity = $_POST['salary_city_id'];
    $companyState = $_POST['salary_state_id'];
    $companyCountry = $_POST['salary_country_id'];
    $designation=$_POST['salary_designation'];
    $turnover = '0';
    $workingYears = $_POST['working_years'];
    $monthly = $_POST['monthly_salary'];
    $account1 = $_POST['salary_bank_name'];
    $account2 = $_POST['salary_bank_name'];
    $salaryMode=$_POST['mode-of-salary'];
    $companyName=$_POST['company_name'];
	$businessType='64216362e039171199aff843';
	$profession_type='642165d0e039171199aff84d';
	$company_type=$_POST['company-type'];
	$industryTypeId=$_POST['salaried_industery'];
}elseif($_POST['employment-type'] == 'Self Employed Professional'){
    $companyAddress = $_POST['selfbusiness_company_address'];
    $companyPincode = $_POST['company_pincode'];
    $companyCity = $_POST['company_city_id'];
    $companyState = $_POST['company_state_id'];
    $companyCountry = $_POST['company_country_id'];
    $designation='Employee';
    $turnover = '';
    $workingYears = $_POST['self_business_years'];
    $monthly = $_POST['self_annual_income'];
    $account1 = $_POST['self_employed_current_bank'];
    $account2 = $_POST['self_employed_saving_bank_account'];
    $salaryMode="Bank Transfer";
    $companyName=$_POST['self_company_name'];
	$businessType=$_POST['business-type'];
	$profession_type=$_POST['profession_type'];
	$company_type="64215cd9e039171199aff830";
	$industryTypeId="64216e71bb7d37192b8e002b";
}elseif($_POST['employment-type'] == 'Self Employed'){
    $companyAddress = $_POST['business_company_address'];
    $companyPincode = $_POST['business_pincode'];
    $companyCity = $_POST['business_city_id'];
    $companyState = $_POST['business_state_id'];
    $companyCountry = $_POST['business_country_id'];
    $designation=$_POST['business_designation'];
    $turnover = $_POST['business_monthly_income'];
    $workingYears = $_POST['business_years'];
    $monthly = $_POST['business_monthly_profit'];
    $account1 = $_POST['business_current_bank_account'];
    $account2 = $_POST['business_saving_bank_account'];
    $salaryMode="Bank Transfer";
    $companyName=$_POST['business_company_name'];
	$businessType=$_POST['business-type'];
	$profession_type='642165d0e039171199aff84d';
	$company_type="64215cd9e039171199aff830";
	$industryTypeId=$_POST['business-industery'];
    $businessOwnedId=$_POST['businessOwnedId'];
}elseif($_POST['employment-type'] == 'Other'){
    $companyAddress = '';
    $companyPincode = '';
    $companyCity = '';
    $companyState = '';
    $companyCountry = '';
    $designation='Employee';
    $turnover = '';
    $workingYears = '';
    $monthly = '';
    $account1 = '';
    $account2 = '';
    $salaryMode = '';
    $companyName='';
	$businessType='';
	$profession_type='';
	$company_type='';
	$industryTypeId='';
}
if(isset($_POST['utm_source'])){$utm_source=$_POST['utm_source'];}else{$utm_source='';}
if(isset($_POST['utm_medium'])){$utm_medium=$_POST['utm_source'];}else{$utm_medium='';}
if(isset($_POST['utm_campaign'])){$utm_campaign=$_POST['utm_source'];}else{$utm_campaign='';}
if(isset($_POST['utm_id'])){$utm_id=$_POST['utm_id'];}else{$utm_id='';}
if(isset($_POST['utm_term'])){$utm_term=$_POST['utm_term'];}else{$utm_term='';}
if(isset($_POST['utm_content'])){$utm_content=$_POST['utm_content'];}else{$utm_content='';}


if(isset($_POST['eligibilityCheck'])){
   $postingData=array(
    "data"=>array(
  		"leadId"=>$_POST['leadId'],
		"termsAndCondition"=>true,
        "loan"=>array(
            "reason"=>null,
            "amount"=>$_POST['loanAmount'],
            "tenure"=>$_POST['loanDuration']
        ),
        "employmentType"=>$_POST['employment-type'],
        "employmentDetails"=>array(
            "companyTypeId"=> $company_type,
            "industryTypeId"=> $industryTypeId,
            "companyName"=> $companyName,
            "designation"=> $designation,
            "address"=> $companyAddress,
            "pinCode"=> $companyPincode,
            "countryId"=> $companyCountry,
            "stateId"=> $companyState,
            "cityId"=> $companyCity,
            "yearsWorkingIn"=> $workingYears,
            "businessTypeId"=> $businessType,
            "professionTypeId"=> $profession_type,
            "turnover"=> $turnover,
            "monthlyProfit"=> $monthly,
            "income"=> $monthly,
            "salaryMode"=> $salaryMode,
            "bankId"=> $account2,
            "currentAccountBankId"=> $account1,
            "savingAccountBankId"=> $account2,
            "businessOwnedId"=>$businessOwnedId
        ),
        "personalInfo"=>array(
            "emailId"=> $_POST['email_address'],
            "firstName"=> $_POST['first-name'],
            "lastName"=> $_POST['last-name'],
            "genderId"=> $_POST['gender'],
            "dateOfBirth"=> $dob,
            "qualificationId"=> $_POST['qualification'],
            "maritalStatus"=> $_POST['marital_status']
        ),
        "address"=> array(
            "addressLine1"=> $_POST['home_address'],
            "addressLine2"=> $_POST['home_landmark'],
            "pinCode"=> $_POST['home_pincode'],
            "countryId"=> $_POST['home_country_id'],
            "stateId"=> $_POST['home_state_id'],
            "cityId"=> $_POST['home_city_id'],
			"residenceTypeId"=>$_POST['residence-type'],
            "yearsLivingIn"=>$_POST['years-living']
        ),
        "finance"=> array(
            "panCard"=> strtoupper($_POST['pan'])
        ),
        "others"=> array(
            "totalEmiPaidMonthly"=> " ",
            "interestedToGetCreditCard"=> " "
        ),
		"utm"=> array(
            "id"=> $utm_id,
            "source"=> $utm_source,
            "medium"=> $utm_medium,
            "campaign"=> $utm_campaign,
            "term"=> $utm_term,
            "content"=> $utm_content
        ),
		"extras"=> array(
            "browser"=> $_POST['browser'],
            "operatingSystem"=> $_POST['os'],
            "ipAddress"=> $_POST['ipAddress'],
            "timestamp"=> '',
            "userAgent"=> $_POST['userAgent'],
            "location"=> $_POST['location']
        )
    )
);
$endpoint = $base_url.'users/check-eligibility';
  
}else{

  $postingData=array(
    "data"=>array(
  		"leadId"=>$_POST['leadId'],
		"termsAndCondition"=>true,
        "loan"=>array(
            "reason"=>null,
            "amount"=>$_POST['loanAmount'],
            "tenure"=>$_POST['loanDuration']
        ),
        "employmentType"=>$_POST['employment-type'],
        "employmentDetails"=>array(
            "companyTypeId"=> $company_type,
            "industryTypeId"=> $industryTypeId,
            "companyName"=> $companyName,
            "designation"=> $designation,
            "address"=> $companyAddress,
            "pinCode"=> $companyPincode,
            "countryId"=> $companyCountry,
            "stateId"=> $companyState,
            "cityId"=> $companyCity,
            "yearsWorkingIn"=> $workingYears,
            "businessTypeId"=> $businessType,
            "professionTypeId"=> $profession_type,
            "turnover"=> $turnover,
            "monthlyProfit"=> $monthly,
            "income"=> $monthly,
            "salaryMode"=> $salaryMode,
            "bankId"=> $account2,
            "currentAccountBankId"=> $account1,
            "savingAccountBankId"=> $account2,
            "businessOwnedId"=>$businessOwnedId
        ),
        "personalInfo"=>array(
            "emailId"=> $_POST['email_address'],
            "firstName"=> $_POST['first-name'],
            "lastName"=> $_POST['last-name'],
            "genderId"=> $_POST['gender'],
            "dateOfBirth"=> $dob,
            "qualificationId"=> $_POST['qualification'],
            "maritalStatus"=> $_POST['marital_status']
        ),
        "address"=> array(
            "addressLine1"=> $_POST['home_address'],
            "addressLine2"=> $_POST['home_landmark'],
            "pinCode"=> $_POST['home_pincode'],
            "countryId"=> $_POST['home_country_id'],
            "stateId"=> $_POST['home_state_id'],
            "cityId"=> $_POST['home_city_id'],
			"residenceTypeId"=>$_POST['residence-type'],
            "yearsLivingIn"=>$_POST['years-living']
        ),
        "finance"=> array(
            "panCard"=> strtoupper($_POST['pan'])
        ),
        "others"=> array(
            "totalEmiPaidMonthly"=> $_POST['emi'],
            "interestedToGetCreditCard"=> $_POST['credit-card']
        ),
		"utm"=> array(
            "id"=> $utm_id,
            "source"=> $utm_source,
            "medium"=> $utm_medium,
            "campaign"=> $utm_campaign,
            "term"=> $utm_term,
            "content"=> $utm_content
        ),
		"extras"=> array(
            "browser"=> $_POST['browser'],
            "operatingSystem"=> $_POST['os'],
            "ipAddress"=> $_POST['ipAddress'],
            "timestamp"=> '',
            "userAgent"=> $_POST['userAgent'],
            "location"=> $_POST['location']
        )
    )
);

//echo json_encode($postingData);
$endpoint = $base_url.'users/generate-lead';

}
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $endpoint,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>json_encode($postingData),
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer '.$accessToken,
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);
$resp = json_decode($response);
$resp->payload=json_encode($postingData);
curl_close($curl);
echo json_encode($resp);



?>
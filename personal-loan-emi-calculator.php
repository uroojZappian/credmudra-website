<?php include('header.php'); ?>
<main id="primary" class="site-main">
    <style>

    </style>
    <link rel="stylesheet" href="assets/css/core/personal_loan.css" type="text/css">
    <link rel="stylesheet" href="assets/css/core/calc_style.css" type="text/css">
    <div class="ple_page_wrapper plec_top_wrapper">
        <div class="container">
            <div class="ple_page_container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="ple_page_content">
                            <h1>Personal Loan EMI Calculator</h1>
                            <p>A personal loan is one of the most sought-after credit facilities available. This hike in popularity is due to the ease of its application process and higher approval rates. In the time of emergencies, the availability of funds matters the most to you than anything else.</p>
                            <p>The repayment process can be a hassle-free affair if you plan it properly. This is why you should use a personal loan EMI calculator before you apply for the credit. Using this tool is extremely easy. You can figure out how much credit you should apply for so that you can comfortably pay it off.</p>
                            <p>Personal loan interest rates are usually higher than the other types of credit facilities. This is due to the fact that it falls under the “unsecured loan” header. Higher interest means higher EMI outflow. Missing out on one EMI can lead to a hefty penalty payment. This will further enhance your loan's burden.</p>
                            <p>You can avoid these mishaps with the <b> personal loan EMI calculator </b>online at the right time.</p>
                            <p>Learn the particulars of a personal loan EMI calculator and more in this blog by <b> Credmudra. </b></p>
                            <h2>How Does Online Personal Loan EMI Calculator Calculate Loan EMI?</h2>
                            <p>A personal loan EMI has two components:</p>
                            <ul>
                                <li><span>Principal amount component</span> </li>
                                <li><span>Interest amount component</span> </li>
                            </ul>
                            <p>The repayment procedure is not linear. Hence, calculating the EMI amount manually is not simple. However, there is a mathematical expression that you can use to figure it out. Take a look at the formula below:</p>

                            <p>The formula –</p>

                            <p class="pl_formula"><b> EMI = [P x R x (1+R)^N]/[(1+R)^N-1]</b></p>

                            <p>Here</p>
                            <div class="credmdra_table">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>EMI</td>
                                            <td>Equated Monthly Payment</td>
                                        </tr>
                                        <tr>
                                            <td>P</td>
                                            <td>Principal amount</td>
                                        </tr>
                                        <tr>
                                            <td>R</td>
                                            <td>Rate of interest</td>

                                        </tr>
                                        <tr>
                                            <td>N</td>
                                            <td>Number of months</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>



                            <p>Suppose, you have taken a <b> personal loan (P) of Rs.50,000.</b> The lender has levied interest at a rate of <b> 11% per month (R).</b> The repayment tenure is <b> 2 years or 24 months (N). </b></p>
                            <p>Now, putting these values in the formula, we get –</p>
                            <p><b> EMI = [50,000 x 11 x (1+11)^24]/[(1+11)^24-1]</b></p>
                            <p>Hence, you have to pay a monthly <b> EMI of Rs.2330 per month for the next 24 months.</b></p>


                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="ple_page_sidebar">
                            <div class="ple_sidebar_links">
                                <h4> Personal Loan Pages </h4>
                                <ul>
                                    <li><a href="personal-loan-interest-rate.php">Personal Loan Interest Rate</a> </li>
                                    <li><a href="personal-loan-eligibility.php">Personal Loan Eligibility</a> </li>
                                    <li><a href="personal-loan-emi-calculator.php">Personal Loan EMI Calculator</a></li>
                                    <!-- <li><a href="">Personal Loan Documents Required</a></li>
                                    <li><a href="">Personal Loan Status</a></li>
                                     -->
                                </ul>
                            </div>
                            <!-- <div class="ple_sidebar_form">
                                <form action="">
                                    <h5>For Expert Advice on the Right Money Solutions, leave your details below..</h5>
                                    <select class="form-control" name="" id="">
                                        <option value="">Intrested In</option>
                                        <option value="Personal Loan"></option>
                                    </select>
                                    <input type="text" class="form-control" id="name" placeholder="Enter Full Name" name="name">
                                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                                    <input type="text" class="form-control" id="pin_code" placeholder="Pin Code" name="pin_code">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" name="remember"> I agree to the <a href=""><b> Terms & Conditions</b></a>
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-primary side_submit">Contact Me</button>

                                </form>

                            </div> -->
                            <!-- <div class="ple_sidebar_links">
                                <h4> Personal Loan Providers </h4>
                                <ul>
                                    <li><a href="">Cashe Personal Loan</a></li>
                                    <li><a href="">Moneytap Personal Loan</a></li>
                                    <li><a href="">IDFC First Bank Personal Loan</a></li>
                                    <li><a href="">Kreditbee Personal Loan</a></li>
                                    <li><a href="">Moneyview Personal Loan</a></li>
                                    <li><a href="">Early Salary Personal Loan</a></li>
                                    <li><a href="">Aditya Birla Personal Loan</a></li>
                                </ul>
                            </div> -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



    <div class="ple_calc_wrapper">
        <div class="container">
            <div class="ple_calc_head">
                <h2>The Process Is Pretty Time-Consuming, Isn't It?</h2>
                <h6>Choose the faster, more accurate, and easier option – the personal loan EMI calculator online.</h6>
            </div>
            <div class="sub-container">
                <div class="row align-items-lg-center">
                    <div class="col-md-12 col-lg-6">

                        <div class="ple_calc_div">
                            <div class="detail_wrapper">
                                <div class="detail">
                                    <p>Amount</p>
                                    <p id="loan-amt-text"></p>
                                </div>
                                <input type="range" id="loan-amount" min="0" max="10000000" step="50000">
                            </div>
                            <div class="detail_wrapper">
                                <div class="detail">
                                    <p>Length</p>
                                    <p id="loan-period-text"></p>
                                </div>
                                <input type="range" id="loan-period" min="1" max="30" step="1">
                            </div>
                            <div class="detail_wrapper">
                                <div class="detail">
                                    <p>% Interest</p>
                                    <p id="interest-rate-text"></p>
                                </div>
                                <input type="range" id="interest-rate" min="1" max="15" step="0.5">
                            </div>
                            <div class="month_pay">
                                <p id="price-container"><span id="price">0</span>/mo</p>
                            </div>
                            <div class="calc_cta">
                                <a class="theme_cta" href="get-registered/">Apply Now!</a>
                            </div>
                        </div>


                    </div>
                    <div class="col-md-12 col-lg-6">
                        <div class="ple_chart_div">
                            <canvas id="pieChart"></canvas>
                            <div class="loan-details">
                                <div class='chart-details'>
                                    <p class="chart-details-head">Principal</p>
                                    <p id="cp"><span class='calc_rupee'>₹</span></p>
                                </div>
                                <div class='chart-details'>
                                    <p class="chart-details-head">Interest</p>
                                    <p id="ci"><span class='calc_rupee'>₹</span></p>
                                </div>
                                <div class='chart-details'>
                                    <p class="chart-details-head">Total Payable</p>
                                    <p id="ct"><span class='calc_rupee'>₹</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- <canvas id="lineChart" height="200px" width="200px"></canvas> -->

        </div>
    </div>



    <div class="ple_page_wrapper plec_bottom_wrapper">
        <div class="container">
            <div class="ple_page_container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="ple_page_content">
                            <h2>Steps To Use A Personal Loan EMI Calculator</h2>
                            <p>The steps are extremely simple to follow and you can figure it out from any place at any time.</p>
                            <ul>
                                <li><span>Step 1:</span> Enter your loan amount. </li>
                                <li><span>Step 2:</span>Enter the interest rate applicable to your lender.</li>
                                <li><span>Step 3:</span> Choose your preferred tenure for repayment.</li>

                            </ul>
                            <p>You should note that the higher the repayment tenure, the lower will be the EMI amount. However, in the long run, you will end up paying more interest. This is why, if feasible, you should go for a shorter repayment tenure.</p>

                            <h2>Benefits Of Using A Personal Loan EMI Calculator</h2>
                            <p>Check out the following pointers to know how you can benefit from using a personal loan EMI calculator:</p>


                            <ul>
                                <li><span>Fast & Accurate Results:</span> By using a personal loan EMI calculator, you will get faster and more accurate results in just a few seconds. </li>
                                <li><span>Compare & Select Lenders:</span> You can compare different lenders and their interest rates and choose the one most suitable to your requirements. </li>
                                <li><span>Choose Your Repayment Tenure:</span> You can choose different repayment tenures and choose the one you are most comfortable with. </li>
                                <li><span>More Info than Just EMI:</span> With a personal loan EMI calculator, you also get the amortisation or repayment schedule. This will help you get a clear idea about your loan repayment structure and the outstanding amount after each payment.</li>
                                <li><span>Free of Cost: </span> Using this calculator is totally free. So, you can perform as much "trial and error" as you need to come to the conclusion most feasible for you. </li>
                                <li><span></span> </li>

                                <li><span>100% Paperless Process:</span> Our loan process from application to approval is totally digital. Your physical presence is not required at all and you can apply for it from any place at any time. </li>
                                <li><span>Explore Flexible Options:</span> For loan amounts ranging between Rs.1,000 to Rs.1,00,000, you can choose a tenure between 3 months to 2 years as per your preference. </li>


                            </ul>

                            <h2>Factors Affecting Personal Loan EMI</h2>

                            <p>Take a look at these factors that play a significant role in determining your EMI amount:</p>

                            <ul>
                                <li><span>Repayment Tenure:</span> The loan repayment tenure you choose is inversely proportional to your EMI amount. This means the lower the repayment tenure, the higher the EMI amount, and vice-versa. Thus, you might find that having a longer loan tenure is more convenient. However, interest outgo is higher for longer loan tenure.</li>
                                <li><span>Principal Amount:</span> The principal amount that your lender approves depends on a lot of factors, such as your credit score, repayment history, your relationship with the lender, etc. Also, the higher the principal amount, the higher the EMI. So, make your decisions carefully and within your capabilities.</li>
                                <li><span>Rate of Interest:</span> The EMI is directly proportional to the interest rate. Also, in the case of personal loans, the rate of interest depends mostly on the borrower. If your creditworthiness sounds promising to the lender, they will sanction your loan at the lowest rate of interest possible.</li>

                            </ul>

                            <h2>How To Use Credmudra Personal Loan EMI Calculator</h2>

                            <p>Using the <b> Credmudra Personal Loan EMI Calculator </b> is so straightforward and simple that even a person who is the least accustomed to the internet can operate it with absolute ease.</p>
                            <p>You just need to enter the loan amount, rate of interest applicable, and preferred tenure correctly in the respective sections. </p>
                            <p>Consider all the factors mentioned and choose your repayment tenure and lender carefully before applying for the loan. Lastly, using a <b> personal loan EMI calculator </b> is absolutely recommended for making an informed decision, which will offer financial benefits as well as stability.</p>


                        </div>

                        <div class="ple_banner_content_banner">
                            <img src="assets/images/cred_angle_full.png" alt="">
                            <div class="row align-items-lg-center">
                                <div class="col-lg-8">
                                    <h4>Apply For A Personal Loan Online With<span> Minimal Documentation</span></h4>
                                </div>
                                <div class="col-lg-4">
                                    <div class="ple_banner_div">
                                        <a class="theme_cta" href="get-registered">Apply Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>  

                        <section class="lp_faq_wrapper ple_faq">
                            <div class="container">

                                <h3>FAQs On Personal Loan</h3>
                                <div class="accordion accordion-flush" id="accordionFAQ">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-heading17">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse17" aria-expanded="true" aria-controls="flush-collapse17">
                                                <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                                                1. How much is the average rate of interest on personal loans?
                                            </button>
                                        </h2>
                                        <div id="flush-collapse17" class="accordion-collapse collapse show" aria-labelledby="flush-heading17" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">Usually, most banks and NBFCs offer personal loans at an interest rate ranging from 10.50% to 24.00% per annum. However, this might vary with the various factors that affect the interest rates. In order to get the actual personal loan interest rate, you should contact with your lender and enquire about the same with them. </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-heading18">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse18" aria-expanded="false" aria-controls="flush-collapse18">
                                                <span><i class="fa fa-circle" aria-hidden="true"></i> </span>
                                                2. What happens if I fail to repay one EMI for a personal loan?
                                            </button>
                                        </h2>
                                        <div id="flush-collapse18" class="accordion-collapse collapse" aria-labelledby="flush-heading18" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">Even the slightest delay in repaying the monthly instalment will negatively affect your credit score. This will indicate poor repayment behaviour, reducing the chances of loan approvals in the long run. In order to reduce these complications, it is best to set a reminder and keep the money ready to pay before the EMI payment date.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-heading19">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse19" aria-expanded="false" aria-controls="flush-collapse19">
                                                <span><i class="fa fa-circle" aria-hidden="true"></i> </span>
                                                3. Which is better, fixed or floating personal loan interest rate?
                                            </button>
                                        </h2>
                                        <div id="flush-collapse19" class="accordion-collapse collapse" aria-labelledby="flush-heading19" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">The rate of interest remains fixed throughout the repayment tenure in case of a fixed rate. On the other hand, the rate of interest keeps changing with the fluctuations in the market in the case of a floating interest rate. Willing borrowers should keep this thing in mind and choose the option that best suits their needs. </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php include('footer.php'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.min.js"></script>
    <script>
        var P, R, N, pie, line;
        var loan_amt_slider = document.getElementById("loan-amount");
        var int_rate_slider = document.getElementById("interest-rate");
        var loan_period_slider = document.getElementById("loan-period");

        // update loan amount
        loan_amt_slider.addEventListener("input", (self) => {
            document.querySelector("#loan-amt-text").innerHTML =
                parseInt(self.target.value).toLocaleString("en-US") + "<span class='calc_rupee'>₹</span>";
            P = parseFloat(self.target.value);
            displayDetails();
        });

        // update Rate of Interest
        int_rate_slider.addEventListener("input", (self) => {
            document.querySelector("#interest-rate-text").innerHTML =
                self.target.value + "<span class='calc_rupee'>%</span>";
            R = parseFloat(self.target.value);
            displayDetails();
        });

        // update loan period
        loan_period_slider.addEventListener("input", (self) => {
            document.querySelector("#loan-period-text").innerHTML =
                self.target.value + " <span class='calc_rupee'>years</span>";
            N = parseFloat(self.target.value);
            displayDetails();
        });

        // calculate total Interest payable
        function calculateLoanDetails(p, r, emi) {
            /*
                p: principal
                r: rate of interest
                emi: monthly emi
            */
            let totalInterest = 0;
            let yearlyInterest = [];
            let yearPrincipal = [];
            let years = [];
            let year = 1;
            let [counter, principal, interes] = [0, 0, 0];
            while (p > 0) {
                let interest = parseFloat(p) * parseFloat(r);
                p = parseFloat(p) - (parseFloat(emi) - interest);
                totalInterest += interest;
                principal += parseFloat(emi) - interest;
                interes += interest;
                if (++counter == 12) {
                    years.push(year++);
                    yearlyInterest.push(parseInt(interes));
                    yearPrincipal.push(parseInt(principal));
                    counter = 0;
                }
            }
            line.data.datasets[0].data = yearPrincipal;
            line.data.datasets[1].data = yearlyInterest;
            line.data.labels = years;
            return totalInterest;
        }

        // calculate details
        function displayDetails() {
            let r = parseFloat(R) / 1200;
            let n = parseFloat(N) * 12;

            let num = parseFloat(P) * r * Math.pow(1 + r, n);
            let denom = Math.pow(1 + r, n) - 1;
            let emi = parseFloat(num) / parseFloat(denom);

            let payabaleInterest = calculateLoanDetails(P, r, emi);

            let opts = '{style: "decimal", currency: "US"}';

            document.querySelector("#cp").innerHTML =
                parseFloat(P).toLocaleString("en-US", opts) + "<span class='calc_rupee'>₹</span>";

            document.querySelector("#ci").innerHTML =
                parseFloat(payabaleInterest).toLocaleString("en-US", opts) + "<span class='calc_rupee'>₹</span>";

            document.querySelector("#ct").innerHTML =
                parseFloat(parseFloat(P) + parseFloat(payabaleInterest)).toLocaleString(
                    "en-US",
                    opts
                ) + "<span class='calc_rupee'>₹</span>";

            document.querySelector("#price").innerHTML =
                parseFloat(emi).toLocaleString("en-US", opts) + "<span class='calc_rupee'>₹</span>";

            pie.data.datasets[0].data[0] = P;
            pie.data.datasets[0].data[1] = payabaleInterest;
            pie.update();
            line.update();
        }

        // Initialize everything
        function initialize() {
            document.querySelector("#loan-amt-text").innerHTML =
                parseInt(loan_amt_slider.value).toLocaleString("en-US") + "<span class='calc_rupee'>₹</span>";
            P = parseFloat(document.getElementById("loan-amount").value);

            document.querySelector("#interest-rate-text").innerHTML =
                int_rate_slider.value + "<span class='calc_rupee'>%</span>";
            R = parseFloat(document.getElementById("interest-rate").value);

            document.querySelector("#loan-period-text").innerHTML =
                loan_period_slider.value + " <span class='calc_rupee'>years</span>";
            N = parseFloat(document.getElementById("loan-period").value);

            

            line = new Chart(document.getElementById("lineChart"), {
                data: {
                    datasets: [{
                            type: "line",
                            label: "Yearly Principal paid",
                            borderColor: "#5AB56B",
                            data: []
                        },
                        {
                            type: "line",
                            label: "Yearly Interest paid",
                            borderColor: "rgb(255, 99, 132)",
                            data: []
                        }
                    ],
                    labels: []
                },
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: "Yearly Payment Breakdown"
                        }
                    },
                    scales: {
                        x: {
                            title: {
                                color: "grey",
                                display: true,
                                text: "Years Passed"
                            }
                        },
                        y: {
                            title: {
                                color: "grey",
                                display: true,
                                text: "Money in Rs."
                            }
                        }
                    }
                }
            });



            pie = new Chart(document.getElementById("pieChart"), {
                type: "doughnut",
                data: {
                    labels: [
                        "Principal", "Interest",
                    ],
                    datasets: [{
                        label: "Loan Details",
                        data: [0, 0],
                        backgroundColor: ["#2B364A", "#5AB56B"],
                        hoverOffset: 4,
                        borderWidth: 0,
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: false,
                            text: "Payment Breakup"
                        },
                        legend: {
                            labels: {
                                color: "white",
                                fontSize: 18,
                                
                            },
                            
                        },
                        padding: 20
                    }
                }
            });
            displayDetails();
        }
        initialize();
    </script>
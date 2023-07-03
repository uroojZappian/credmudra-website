<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package credmudra_theme
 */
session_start();
if (isset($_REQUEST['utm_source'])) {
    $_SESSION["utm_source"] = $_REQUEST['utm_source'];
}
if (isset($_REQUEST['utm_medium'])) {
    $_SESSION["utm_medium"] = $_REQUEST['utm_medium'];
}
if (isset($_REQUEST['utm_campaign'])) {
    $_SESSION["utm_campaign"] = $_REQUEST['utm_campaign'];
}
if (isset($_REQUEST['utm_id'])) {
    $_SESSION["utm_id"] = $_REQUEST['utm_id'];
}
if (isset($_REQUEST['utm_term'])) {
    $_SESSION["utm_term"] = $_REQUEST['utm_term'];
}
if (isset($_REQUEST['utm_content'])) {
    $_SESSION["utm_content"] = $_REQUEST['utm_content'];
}
?>
<!doctype html>
<html>

<head>
    <meta>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="icon" type="image/x-icon" href="assets/images/fav.ico">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/core/style.css">
    <link rel="stylesheet" href="assets/css/core/theme_style.css">
    <link rel="stylesheet" href="assets/css/core/personal_loan.css">
    <link rel="stylesheet" href="assets/css/core/responsive.css">
    <link rel="stylesheet" href="assets/css/core/swiper.min.css">
    <link rel="stylesheet" href="assets/css/core/style.css">
    <!-- <link rel="stylesheet" href="assets/css/core/navigation.css">
    <link rel="stylesheet" href="assets/css/core/navigation.css"> -->
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js?ver=3.4.1' id='jquery-js'></script>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-575MTJQ');
    </script>
    <!-- End Google Tag Manager -->

    <meta name="google-site-verification" content="ISOBq5Aq58FHB6ykrtE3ngH79BPLviKHmyVM7y-3Nb4" />
    <script id='_webengage_script_tag' type='text/javascript'>
        var webengage;
        ! function(w, e, b, n, g) {
            function o(e, t) {
                e[t[t.length - 1]] = function() {
                    r.__queue.push([t.join("."),
                        arguments
                    ])
                }
            }
            var i, s, r = w[b],
                z = " ",
                l = "init options track screen onReady".split(z),
                a = "webPersonalization feedback survey notification notificationInbox".split(z),
                c = "options render clear abort".split(z),
                p = "Prepare Render Open Close Submit Complete View Click".split(z),
                u = "identify login logout setAttribute".split(z);
            if (!r || !r.__v) {
                for (w[b] = r = {
                        __queue: [],
                        __v: "6.0",
                        user: {}
                    }, i = 0; i < l.length; i++) o(r, [l[i]]);
                for (i = 0; i < a.length; i++) {
                    for (r[a[i]] = {}, s = 0; s < c.length; s++) o(r[a[i]], [a[i], c[s]]);
                    for (s = 0; s < p.length; s++) o(r[a[i]], [a[i], "on" + p[s]])
                }
                for (i = 0; i < u.length; i++) o(r.user, ["user", u[i]]);
                setTimeout(function() {
                    var f = e.createElement("script"),
                        d = e.getElementById("_webengage_script_tag");
                    f.type = "text/javascript", f.async = !0, f.src = ("https:" == e.location.protocol ? "https://widgets.in.webengage.com" : "http://widgets.in.webengage.com") + "/js/webengage-min-v-6.0.js", d.parentNode.insertBefore(f, d)
                })
            }
        }(window, document, "webengage");
        webengage.init("in~11b564299");
    </script> 
    <script type="text/javascript">
    (function(c,l,a,r,i,t,y){
        c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
        t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
        y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
    })(window, document, "clarity", "script", "gprc2uwdxg");
</script>  
<script>	
  (function (w, d, s, l, i) {
      w['scSdkId'] = i;
      w[l] = w[l] || []
      w.scq = function (eventName, eventType, p) {
      var props = p || {}
        w[l].push({ eventName: eventName, eventType: eventType, meta: props, eventFireTs: Date.now() })
      };
      w.scq("PAGE_VIEW", "AUTO", {
        pageUrl: w.location.href
      });
      var scr = d.createElement(s);
      scr.type = 'text/javascript';
      scr.async = true;
      scr.src = 'https://sc-events-sdk.sharechat.com/web-sdk.js';
      var x = d.getElementsByTagName(s)[0];
      x.parentNode.insertBefore(scr, x);
    })(window, document, "script", "scLayer", "lZZ0P04itM");
</script>
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-575MTJQ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#primary"></a>
        <header class="sticky-header credmudra_header">
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                   <a href="index.php" class="custom-logo-link" rel="home" aria-current="page">
                        <img width="215" height="39" src="assets/images/credmudra_logo.png" class="custom-logo" alt="Credmudra" decoding="async">
                    </a>

                   
                      
                    
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="main_nav">
                            <ul class="navbar-nav ms-auto">
                                <!--                             <li class="nav-item active"> <a class="nav-link" href="/about-us/">About Us </a> </li> -->
                                <li class="nav-item"><a class="nav-link" href="business-loan.php"> Business Loan </a></li>


                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Personal Loan
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="/personal-loan.php">Personal Loan </a>
                                        <a class="dropdown-item" href="/personal-loan-eligibility.php">Personal Loan Eligibility</a>
                                        <a class="dropdown-item" href="/personal-loan-interest-rate.php">Personal Loan Interest Rate</a>
                                        <a class="dropdown-item" href="/personal-loan-emi-calculator.php">Personal Loan EMI Calculator</a>
                                    </div>
                                </li>
                                <!--
                            <li class="nav-item"><a class="nav-link" href="/mudra-mentor"> Mudra Mentors </a></li>
                            <li class="nav-item"><a class="nav-link" href="/credit-score"> Credit Score </a></li>-->
                                <li class="nav-item"><a class="nav-link" href="/blog/"> Blogs </a></li>
                                
                            </ul>
                        </div> <!-- navbar-collapse.// -->
        

                </div> <!-- container-fluid.// -->
            </nav>
            
                <div class="header_notice">
                    <div class="container">
                        <div class="row align-items-md-center">
                            <div class="col-md-9">
                                <div class="header_notice_content">
                                    <p>We are thrilled to announce that Credmudra has been honored with a prestigious certificate of recognition as a startup by the Ministry of Promotion of Industry and Internal Trade, Government of India!</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="header_notice_logo">
                                    <img src="assets/images/startup_india_logo.svg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <i class="fa fa-window-close" id="si_close" aria-hidden="true"></i>
                </div>
            
        </header>
        <script>
            window.addEventListener('scroll', function() {
                var header = document.querySelector('.sticky-header');
                header.classList.toggle('sticky', window.scrollY > 0);
            });
        </script>
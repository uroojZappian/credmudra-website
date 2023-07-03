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

if(isset($_REQUEST['mobile_no'])){
   	
     if(strlen($_REQUEST['mobile_no'])){
     	$mobile=$_REQUEST['mobile_no'];
     }else{
   	$mobile='';
     }
   }else{
   	$mobile='';
   }
   
   function getBrowser() { 
     $u_agent = $_SERVER['HTTP_USER_AGENT'];
     $bname = 'Unknown';
     $platform = 'Unknown';
     $version= "";
   
     //First get the platform?
     if (preg_match('/linux/i', $u_agent)) {
       $platform = 'linux';
     }elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
       $platform = 'mac';
     }elseif (preg_match('/windows|win32/i', $u_agent)) {
       $platform = 'windows';
     }
   
     // Next get the name of the useragent yes seperately and for good reason
     if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)){
       $bname = 'Internet Explorer';
       $ub = "MSIE";
     }elseif(preg_match('/Firefox/i',$u_agent)){
       $bname = 'Mozilla Firefox';
       $ub = "Firefox";
     }elseif(preg_match('/OPR/i',$u_agent)){
       $bname = 'Opera';
       $ub = "Opera";
     }elseif(preg_match('/Chrome/i',$u_agent) && !preg_match('/Edge/i',$u_agent)){
       $bname = 'Google Chrome';
       $ub = "Chrome";
     }elseif(preg_match('/Safari/i',$u_agent) && !preg_match('/Edge/i',$u_agent)){
       $bname = 'Apple Safari';
       $ub = "Safari";
     }elseif(preg_match('/Netscape/i',$u_agent)){
       $bname = 'Netscape';
       $ub = "Netscape";
     }elseif(preg_match('/Edge/i',$u_agent)){
       $bname = 'Edge';
       $ub = "Edge";
     }elseif(preg_match('/Trident/i',$u_agent)){
       $bname = 'Internet Explorer';
       $ub = "MSIE";
     }
   
     // finally get the correct version number
     $known = array('Version', $ub, 'other');
     $pattern = '#(?<browser>' . join('|', $known) .
   ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
     if (!preg_match_all($pattern, $u_agent, $matches)) {
       // we have no matching number just continue
     }
     // see how many we have
     $i = count($matches['browser']);
     if ($i != 1) {
       //we will have two since we are not using 'other' argument yet
       //see if version is before or after the name
       if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
           $version= $matches['version'][0];
       }else {
           $version= $matches['version'][1];
       }
     }else {
       $version= $matches['version'][0];
     }
   
     // check if we have a number
     if ($version==null || $version=="") {$version="?";}
   
     return array(
       'userAgent' => $u_agent,
       'name'      => $bname,
       'version'   => $version,
       'platform'  => $platform,
       'pattern'    => $pattern
     );
   }
   function get_client_ip()
   {
       $ipaddress = '';
       if (isset($_SERVER['HTTP_CLIENT_IP'])) {
           $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
       } else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
           $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
       } else if (isset($_SERVER['HTTP_X_FORWARDED'])) {
           $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
       } else if (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
           $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
       } else if (isset($_SERVER['HTTP_FORWARDED'])) {
           $ipaddress = $_SERVER['HTTP_FORWARDED'];
       } else if (isset($_SERVER['REMOTE_ADDR'])) {
           $ipaddress = $_SERVER['REMOTE_ADDR'];
       } else {
           $ipaddress = 'UNKNOWN';
       }
   
       return $ipaddress;
   }
   
   $PublicIP = get_client_ip();
   $json     = file_get_contents("http://ipinfo.io/$PublicIP/geo");
   $json     = json_decode($json, true);
   if(isset($json['country'])){$country  = $json['country'];}else{$country  = '';}
   if(isset($json['region'])){$region  = $json['region'];}else{$region  = '';}
   if(isset($json['city'])){$city  = $json['city'];}else{$city  = '';}
   
   $mybrowser = getBrowser();
   $useragent = $mybrowser['userAgent'];
   $browser = $mybrowser['name'].' '.$mybrowser['version'];
   $os = $mybrowser['platform'];


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
    <link rel="stylesheet" href="./../assets/css/core/style.css">
    <link rel="stylesheet" href="./../assets/css/core/theme_style.css">
    <link rel="stylesheet" href="./../assets/css/core/personal_loan.css">
    <link rel="stylesheet" href="./../assets/css/core/responsive.css">
    <link rel="stylesheet" href="./../assets/css/core/swiper.min.css">
    <link rel="stylesheet" href="./../assets/css/core/style.css">
    <!-- <link rel="stylesheet" href="assets/css/core/navigation.css">
    <link rel="stylesheet" href="assets/css/core/navigation.css"> -->

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

<link rel="stylesheet" href="./../assets/css/core/welcome_form.css"
   />
<link
   rel="stylesheet"
   href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
   integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
   crossorigin="anonymous"
   referrerpolicy="no-referrer"
   />
<link
   rel="stylesheet"
   href="./../assets/css/core/datepicker.css"
   />
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="./../assets/css/core/bootstrap-select.css">
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js?ver=3.4.1' id='jquery-js'></script>
<style>
	.resendOtp{
   display:none;
   }
   .timerBtn{
   font-size: 0.8rem;
   border-radius: 10px;
   border-top-right-radius: 10px!important;
   border-bottom-right-radius: 10px!important;
   }
   .form-check {
   min-height: 1.5rem;
   padding-left: 1.5em;
   margin-bottom: 0.125rem;
   display: flex;
   align-items: center;
   }
</style>

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
                    <a href="./../index.php" class="custom-logo-link" rel="home"><img width="215" height="39" src="./../assets/images/credmudra_logo.png" class="custom-logo" alt="Credmudra" decoding="async" /></a>
                                        <style>
                        .navbar-expand-lg{
                            flex-wrap: nowrap;
                        }
                    </style>
                      <div class=" form_nav_div ">
                        <div class="form_nav_inner">                      
                            <p>Recognition as a startup by <br> Government of India</p> 
                            <img src="./../assets/images/startup_india_logo.svg" alt="">
                            </div>
                        </div>
                    
                </div> <!-- container-fluid.// -->
            </nav>
        </header>
        <script>
            window.addEventListener('scroll', function() {
                var header = document.querySelector('.sticky-header');
                header.classList.toggle('sticky', window.scrollY > 0);
            });
        </script>
<?php session_start(); 

if (isset($_SERVER['QUERY_STRING']) && is_numeric($_SERVER['QUERY_STRING'])){
	$invno = $_SERVER['QUERY_STRING'];
} else {
	$invno = 0;
	}
				
$_SESSION['track_invoice_no'] = $invno;

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
    <title>Mega Laundry Khalifa City Abu Dhabi</title>
<meta name="description" content="Mega Laundry Abu Dhabi">
<meta name="description" content="Mega Laundry & Dry Clean Abu Dhabi">
<meta name="keywords" content="Laundry Abu Dhabi">
<meta name="keywords" content="Laundry Khalifa City">
<meta name="keywords" content="Laundry Pickup Online Abu Dhabi">
<meta name="keywords" content="Laundry & Dry Clean AbuDhabi">
<meta name="keywords" content="Dry Clean Abu Dhabi">

<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<!-- 
Tamarillo Template 
http://www.templatemo.com/preview/megalaundry_399_tamarillo 
-->
<meta name="author" content="" />
<!-- favicons -->
<link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
<link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />
<!-- bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet" />
<!-- fancybox CSS -->
<link href="css/jquery.lightbox.css" rel="stylesheet" />
<!-- flex slider CSS -->
<link href="css/flexslider.css" rel="stylesheet" />
<!-- custom styles for this template -->
<link href="css/megalaundry_style.css" rel="stylesheet" />
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
</head>
<body>
<!--
over lay for future using
<div class="simple_overlay" id="mies1">
<h3 align="center">Invoice Sample Mega Laudnry</h3>

<img src="images/megalaundry_invoice.jpg" width="350" height="489">
  </div>  
  $(document).ready(function() {
      $("a[rel]").overlay();
	      });
          -->
          
          <?php 
if(is_numeric($invno) && $invno > 0)
	{
	echo '<script type="text/javascript">
location.replace(\'http://goo.gl/2sRdNL\');
</script>';
	}
?>
<header>
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-md-push-1 col-sm-6">
                <a href="#" id="megalaundry_logo"><img src="images/megalaundry_logo_2.png" alt="tamarillo"></a>
            </div>
            <div class="col-md-3 hidden-xs"></div>
            <div class="col-xs-3 col-xs-offset-20 visible-xs">
                <a href="#" id="mobile_menu"><span class="glyphicon glyphicon-align-justify"></span></a>
            </div>
            <div class="col-xs-24 visible-xs" id="mobile_menu_list">
                <ul>
                    <li><a href="#megalaundry_slideshow">Home</a></li>
                    <li><a href="#megalaundry_about">About</a></li>
                    <li><a href="#megalaundry_services">Services</a></li>
                    <li><a href="#megalaundr_track">Track</a></li>
                    <li><a href="#megalaundry_gallery">Gallery</a></li>
                    <li><a href="#megalaundry_contact">Contact</a></li>
                </ul>
            </div>
            <div class="col-md-16 col-sm-18 hidden-xs" id="templatemo-nav-bar">
                <ul class="nav navbar-right">
                    <li><a href="#megalaundry_slideshow">Home</a></li>
                    <li><a href="#megalaundry_about">About</a></li>
                    <li><a href="#megalaundry_services">Services</a></li>
                    <li><a href="#megalaundr_track">Track</a></li>
                    <li><a href="#megalaundry_gallery">Gallery</a></li>
                    <li><a href="#megalaundry_contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
</header><!-- end of megalaundry_header -->
<section id="megalaundry_slideshow">
    <div class="container">
        <div id="main-slider" class="flexslider">
        <ul class="slides">
            <li class="row">
                <img src="images/megalaundry_banner_image_1.jpg" alt="slider image 1" />
                <div class="flex-caption col-md-5 col-md-push-1 hidden-xs">
                    <h3>Track Your Order</h3> 
                    <p>We are proudly presetnting online tracking for laundry service orders via QR Code on the Invoice OR visit <a target="_blank"  href="http://megalaundryae.com/track/">Online Tracking Section</a></p> 
                </div>
                <div class="flex-button"><a href="#megalaundr_track">Track Your Order</a></div>
            </li>
            <li class="row">
                <img src="images/megalaundry_banner_image_2.jpg" alt="slider image 2" />
                <div class="flex-caption col-md-5 col-md-push-1 hidden-xs">
                    <h3>Quatation Request</h3> 
                    <p>Request a quation for your industry or your monthly orders. Visit <a target="_blank" href="#megalaundry_contact> </a></p> 
                </div>
                <div class="flex-button"><a href="#megalaundry_contact">Request a quat</a></div>
            </li>
            <li class="row">
                <img src="images/megalaundry_banner_image_3.jpg" alt="slider image 3" />
                <div class="flex-caption col-md-5 col-md-push-1 hidden-xs">
                    <h3>Pickup &amp; Delivery</h3> 
                    <p>We are feeling to happy to pickup your laundry and delivery to your door step. To Pickup &amp; Deliver Please <a href="#megalaundry_contact">PContact Mega Laundry</a></p> 
                </div>
                <div class="flex-button"><a href="#megalaundry_contact">Pickup &amp; Delivery</a></div>
            </li>
                    </ul>
        </div><!-- end of main-slider -->
    </div>	
</section><!-- end of megalaundry_slideshow -->
<section id="megalaundry_about">
    <div class="container">
        <div class="row">
            <h1>About Mega Laundry</h1>
        </div>
        <div class="row">
            <div class="col-md-1"></div>	
            <div class="col-md-5 col-sm-7 col-xs-24">
                <img src="images/megalaundry_image_1.jpg" alt="image 1"/>
            </div>
            <div class="col-md-1"></div>	
            <div class="col-md-16">
                <h2>Our Way</h2>
                <p>Mega Laundry is the smart laundry solution to all your laundry woes. We provide affordable laundry service that is designed around YOU and YOUR needs.

Our story started in 1997 when a stay-at-home , We had an idea. We noticed that while everyone needs clean clothes, most people either hate doing the laundry or simply don’t have the time or energy to do it. Wash & fold services were ok in a pinch but they never seemed to get it right.....</p>

</p>
<p id="about_section_1st"> We knew there was a need for something different, something Better. A laundry service that gets the laundry done just the way you like it without all the time and hassle.
<br /><br />
Today, Mega Laundry’s unique personalized laundry experience is available in Khalifa City. Our clients love the quality, reliability and flexibility of our personalized laundry service over the regular, old wash & fold model available. Why spend valuable time doing the laundry when Mega Laundry can do it for you-just the way you like?</p>
                <a class="btn btn-default" id="about_1st_show">read more</a>
            </div>
        </div><!-- end of row -->
        <div class="clear"></div>
        <div class="row">
            <div class="col-md-1"></div>	
            <div class="col-md-5 col-sm-7 col-xs-24">
                <img src="images/megalaundry_image_3.jpg" alt="image 3"/>
            </div>
            <div class="col-md-1"></div>	
            <div class="col-md-16">
                <h2>Our Service For You</h2>
                <p>Mega Laundry is your premiere wash and fold service provider, offering FREE pick up and delivery!. Our network of laundry professionals will give your clothes the personal care and attention you won’t find anywhere else.</p><br />

                <p id="about_section_2nd">
Whether you just don’t have the time, ability, or desire to do your own laundry or you’re a business that doesn’t have the capacity to handle your laundry on site, our professionals will meet and exceed your every expectation and make sure your laundry receives the utmost care and attention.<br /><br />
Mega Laundry believes in providing the highest quality laundry service available..</p>	
                <a id="about_2nd_show" class="btn btn-default">read more</a>
            </div>
        </div><!-- end of row -->
        <div class="clear"></div>
        <div class="row">
            <div class="col-md-1"></div>	
            <div class="col-md-5 col-sm-7 col-xs-24">
            <img src="images/megalaundry_image_2.jpg" alt="image 2"/>
            </div>
            <div class="col-md-1"></div>	
            <div class="col-md-16">
                <h2>Why Should YOU Choose Mega Laundry?</h2>
                <p>Unlike other laundry services, Mega Laundry offers the personalized, quality service you want with the reliability and flexibility you NEED, all at an affordable price. Simply tell us your laundry and garment care preferences and your personal Laundress returns it, as requested, right to your door in 48 hours. Getting the laundry done has never been so easy! Take a load off, while we take Care of the Laundry! Go to our Pickup &amp; Delivery page to schedule a pick-up.
                </p>	
                            </div>
        </div><!-- end of row -->
        
    </div> 
</section><!-- end of megalaundry_about -->
<div class="container">
    <div class="solidline"></div>
</div><!-- solid line -->
<section id="megalaundry_services">
    <div class="container">
        <div class="row">
            <h1>Services</h1>
        </div>
        <div class="row">
            <div class="col-sm-5">	
                <img class="img-responsive" src="images/megalaundry_image_4.jpg" alt="image 4" />	
            </div>
            <div class="col-sm-6">
                <h2>Washing</h2>
                <p>Washing of clothing and linens. Free Pickup and Delivery Available</p>
            </div>	
            <div class="col-sm-1"></div>
            <div class="col-sm-5">
                <img class="img-responsive" src="images/megalaundry_image_5.jpg" alt="image 5" />
            </div>
            <div class="col-sm-6">
                <h2>Dry Cleaning</h2>
                <p>Dry cleaning is any cleaning process for clothing and textiles using a chemical solvent other than water. Free Pickup &amp; Delivery Available</p>
            </div>
        </div><!-- end of row -->
        <div class="row">
            <div class="col-md-5 col-sm-5 col-xs-24">	
                <img class="img-responsive" src="images/megalaundry_image_6.jpg" alt="image 6" />	
            </div>
            <div class="col-sm-6">
                <h2>Ironing</h2>
                <p>Ironing is the use of a heated tool to remove wrinkles from cloth. The heating is commonly done to a temperature of 180–220 °C, depending on the Cloth. Free Pickup &amp; Delivery Available</p>
            </div>
            <div class="col-md-1 col-sm-1"></div>
            <div class="col-md-5 col-sm-5 col-xs-24">
                <img class="img-responsive" src="images/megalaundry_image_7.jpg" alt="image 7" />
            </div>
            <div class="col-sm-6">
                <h2>Chlorin Bleach</h2>
                <p>Chlorin Bleach is remove colour, whiten or disinfect, from the cloth. Free Pickup &amp; Delivery Available</p>
            </div>
        </div><!-- end of row -->
        <div class="row">
            <div class="col-md-5 col-sm-5 col-xs-24">	
                <img class="img-responsive" src="images/megalaundry_image_8.jpg" alt="image 8" />	
            </div>
            <div class="col-sm-6">
                <h2>Tumble Drying</h2>
                <p>A clothes dryer, tumble dryer, or drying machine is used to remove moisture from a load of clothing and other textiles.</p>
            </div>
            <div class="col-sm-1"></div>
            <div class="col-sm-5">
                <img class="img-responsive" src="images/megalaundry_image_9.jpg" alt="image 9" />
            </div>
            <div class="col-sm-6">
                <h2>One Hour Service</h2>
                <p>One Hour Servie available from Mega Laundry of selected serices only. Please contact with shop</p>
            </div>
        </div><!-- end of row -->
    </div>
</section> <!-- end of megalaundry_services -->
<!-- solid line -->
<div class="container">
    <div class="solidline"></div>
</div>
<section id="megalaundr_track">
    <div class="container">
        <div class="row">
            <h1>Order Track</h1>
        </div>
        <div class="row">
            <div class="col-sm-9">
                <img class="img-responsive" src="images/megalaundry_image_10.jpg" alt="image 10" />
            </div>
            <div class="col-sm-15">
            <div id="status_tracking">
                              <!--  <p>
                    <span class="glyphicon glyphicon-tag"></span> Inv No:253655 &nbsp;&nbsp;
                    <span class="glyphicon glyphicon-user"></span> Martin &nbsp;&nbsp;
                    <span class="glyphicon glyphicon-calendar"></span> 02-12-2015 &nbsp;&nbsp;
                                                       </p>
                <p><strong style="color:#900">Status : Your Laundry Is Ready To Collect</strong><br />
                <br>
<p>
                    <span class="glyphicon glyphicon-tag"></span> Inv No:253655 &nbsp;&nbsp;
                    <span class="glyphicon glyphicon-user"></span> Martin &nbsp;&nbsp;
                    <span class="glyphicon glyphicon-calendar"></span> 02-12-2015 &nbsp;&nbsp;
                                                       </p>
                <p><strong style="color:#900">Status : Your Laundry Is Ready To Collect</strong><br /> -->
                </div><br />

                For More Information Please <a href="#megalaundry_contact">Contact</a> &nbsp;&nbsp;&nbsp; Tel : 02- 55 611 75 </p>
                <fieldset><legend>Tracking Laundry Service</legend>
                <p>
                Please type your invoice number or mobile number * <br />
                Invoice No:* &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text"  onkeypress="return checkItndstopEntrRKey(event, 'track_mobile_mega')"  id="track_invoice_mega" name="track_no_mega" class="track_input" value="" placeholder="Track No" /> Or  <br />

Mobile Number: <input type="text" id="track_mobile_mega" onkeypress="return checkItndstopEntrRKey(event, 'track_invoice_mega')"  name="track_no_mega" value="" class="track_input" maxlength="10" placeholder="Mobile, 050xxxxxxx" /> <!-- <a>What is this? </a> --><br />

                    <a class="btn btn-default margin_top" onClick="check_value_found()">Track Now</a>
                </p>
                </fieldset>
            </div>
        </div><!-- end of row -->

        
    </div>
</section> <!-- end of megalaundr_track -->
<!-- solid line -->
<div class="container">
    <div class="solidline"></div>
</div>
<section id="megalaundry_gallery">
    <div id="gallery" class="container">
        <div class="row">
            <h1>Gallery</h1>
        </div>
        <ul class="thumbs row">
            <li class="col-sm-1 hidden-xs"></li>
            <li class="item-thumbs col-sm-6 col-xs-8">
                <div>
                    <a 
                        class="overlay" 
                        data-lightbox="gallery" 
                        data-caption="A View from Khalifa city branch" 
                        href="images/megalaundry_thumb_image_1.jpg">
                        <span class="glyphicon glyphicon-zoom-in"></span>
                    </a>
                    <img src="images/megalaundry_gallery_image_1.jpg" alt="image 1" />	
                </div>
            </li>
            <li class="col-sm-2 hidden-xs"></li>
            <li class="item-thumbs col-sm-6 col-xs-8">
                <div>
                    <a 
                        class="overlay" 
                        data-lightbox="gallery" 
                        data-caption="Our Laundry VAN No.1." 
                        href="images/megalaundry_thumb_image_2.jpg">
                        <span class="glyphicon glyphicon-zoom-in"></span>
                    </a>
                    <img src="images/megalaundry_gallery_image_2.jpg" alt="image 2" />
                </div>
            </li>
            <li class="col-sm-2 hidden-xs"></li>
            <li class="item-thumbs col-sm-6 col-xs-8">
            <div>
                <a 
                    class="overlay" 
                    data-lightbox="gallery" 
                    data-caption="Mega Laundry." 
                    href="images/megalaundry_thumb_image_3.jpg" >
                    <span class="glyphicon glyphicon-zoom-in"></span>
                </a>
                <img src="images/megalaundry_gallery_image_3.jpg" alt="image 3" />
            </div>
            </li>
            <li class="col-md-1 col-sm-1 hidden-xs"></li>
        </ul>
        <ul class="thumbs row">
            <li class="col-sm-1 hidden-xs"></li>
            <li class="item-thumbs col-sm-6 col-xs-8">
                <div>
                    <a 
                        class="overlay" 
                        data-lightbox="gallery" 
                        data-caption="Carpet And Blanket." 
                        href="images/megalaundry_thumb_image_4.jpg">
                        <span class="glyphicon glyphicon-zoom-in"></span>
                    </a>
                    <img src="images/megalaundry_gallery_image_4.jpg" alt="image 4" />
                </div>
            </li>
            <li class="col-sm-2 hidden-xs"></li>
            <li class="item-thumbs col-sm-6 col-xs-8">
                <div>
                    <a 
                        class="overlay" 
                        data-lightbox="gallery" 
                        data-caption="A view from the work area." 
                        href="images/megalaundry_thumb_image_5.jpg">
                        <span class="glyphicon glyphicon-zoom-in"></span>
                    </a>
                    <img src="images/megalaundry_gallery_image_5.jpg" alt="image 5" />
                </div>
            </li>
            <li class="col-sm-2 hidden-xs"></li>
            <li class="item-thumbs col-sm-6 col-xs-8">
                <div>
                    <a 
                        class="overlay" 
                        data-lightbox="gallery" 
                        data-caption="Finishing Works." 
                        href="images/megalaundry_thumb_image_6.jpg">
                        <span class="glyphicon glyphicon-zoom-in"></span>
                    </a>
                    <img src="images/megalaundry_gallery_image_6.jpg" alt="image 6" />
                </div>
            </li>
            <li class="col-md-1"></li>
        </ul>
        <ul class="thumbs row">
            <li class="col-sm-1 hidden-xs"></li>
            <li class="item-thumbs col-sm-6 col-xs-8">
                <div>
                    <a 
                        class="overlay" 
                        data-lightbox="gallery" 
                        data-caption="Dry Cleaning Machine." 
                        href="images/megalaundry_thumb_image_7.jpg">
                        <span class="glyphicon glyphicon-zoom-in"></span>
                    </a>
                    <img src="images/megalaundry_gallery_image_7.jpg" alt="image 7" />
                </div>
            </li>
            <li class="col-sm-2 hidden-xs"></li>
            <li class="item-thumbs col-sm-6 col-xs-8">
                <div>
                    <a 
                        class="overlay" 
                        data-lightbox="gallery" 
                        data-caption="Washing...." 
                        href="images/megalaundry_thumb_image_8.jpg">
                        <span class="glyphicon glyphicon-zoom-in"></span>
                    </a>
                    <img src="images/megalaundry_gallery_image_8.jpg" alt="image 8" />
                </div>
            </li>
            <li class="col-sm-2 hidden-xs"></li>
            <li class="item-thumbs col-sm-6 col-xs-8">
            <div>
                <a 
                    class="overlay" 
                    data-lightbox="gallery" 
                    data-caption="Marker Machine." 
                    href="images/megalaundry_thumb_image_9.jpg">
                    <span class="glyphicon glyphicon-zoom-in"></span>
                </a>
                <img src="images/megalaundry_gallery_image_9.jpg" alt="image 9" />
            </div>
            </li>
        </ul>
    </div>
</section> <!-- end of megalaundry_gallery -->
<section id="megalaundry_contact">
    <div class="container">
        <div class="row" id="megalaundry_contact_gray_wap">
            <div class="col-md-24 col-sm-24">
                <h1 class="margin_top">Contact</h1>
            </div>
            <div class="col-md-24 col-sm-24">
                <div id="map-canvas"></div>
            </div>
            <div class="col-md-9 col-sm-18 col-sm-push-3">
                <p>
                    <span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp; Khalifa City A, <br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Municipality Building (Pink Building)<br />
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; C8-1, PO.Box: 112152<br />

                    <span class="glyphicon glyphicon-phone-alt"></span>&nbsp;&nbsp; Tel: (+971) 02- 55 611 75<br />
                       <span class="glyphicon glyphicon-phone-alt"></span>&nbsp;&nbsp; Mobile: (+971) 52 6010 826<br />
<span class="glyphicon glyphicon-phone-alt"></span>&nbsp;&nbsp; Mobile: (+971) 55 877 87 32<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Please send your location by WhatsApp<br />
                    <span class="glyphicon glyphicon-envelope"></span>&nbsp;&nbsp; Email: info@megalaundryae.com<br />
                    <span class="glyphicon glyphicon-globe"></span>&nbsp;&nbsp; Website: www.megalaundryae.com
                </p>
                <ul class="icon">
                    <li><a target="_blank" href="https://plus.google.com/103147535334668264190/posts"><img src="images/megalaundry_icon_2.png" alt="Google+" /></a></li>
                    <li><a href="#"><img src="images/megalaundry_icon_3.png" alt="Instagram" /></a></li>
                </ul>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-9  col-sm-18 col-sm-push-3">
           <div id="email_result"></div>

                <form id="contact-form" name="contact-form" method="post">
                    <label>
                        <span>Name</span>
                        <input name="name" type="text" id="name" maxlength="40" />
                  </label>
                    <label>
                        <span>Email</span>
                        <input name="email" type="text" id="email" maxlength="40" />
                  </label>
                    <label>
                        <span>Subject</span>
                        <input name="subject" type="text" id="subject" maxlength="100" />
                  </label>
                    <label>
                        <span>Message</span>
                        <textarea name="message" id="message"></textarea>
                    </label>
                    <label>
                        <button name="submit" onClick="SubmitForm_contact()" type="button">Send</button>
                    </label>
                </form>
            </div>	
        </div> <!-- end of row -->
        <div class="row" id="megalaundry_footer">
            <div class="col-md-24" >
                <p>Website Designing &amp; Job Tracking is Powered By: <a target="_blank" style="color:#03F;" href="http://itsmagnus.com">Magnus World IT Solution, Abu Dhabi</a></p>
            </div>
        </div><!-- end of megalaundry_footer -->
    </div>	
    <a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
</section><!-- end of megalaundry_contact -->
<script>
function empty_check_input(id){
	$("#email_result").hide(500);
	var border_er = 'solid 2px #FF0000';
	var border_norml = 'solid 1px #C7C7C7';
var value = document.getElementById(id).value;
if (value == '' || value == ' '){document.getElementById(id).style["border"] = border_er; return 'error';} else {
			document.getElementById(id).style["border"] = border_norml; return 'ok'; }
	}

function SubmitForm_contact() {
	var name = $("#name").val();				error_rpt = empty_check_input('name');
	var email = $("#email").val();				error_rpt = empty_check_input('email');
	var subject = $("#subject").val();				error_rpt = empty_check_input('subject');
	var message = $("#message").val();				error_rpt = empty_check_input('message');


	
	if (error_rpt == 'ok'){		
//alert("Data Loaded: "+name+"\n"+email+"\n"+phone+"\nAll Data Submitted Sucessfully!");
$.post("sendemailcontact_submit.php", { name:name, email:email, subject:subject, message:message },
   function(data) {
	   
	    document.getElementById("email_result").innerHTML = data;
		$("#email_result").show(500);
	   document.getElementById("contact-form").reset();
    //alert(data);
   
   });
   }
}




</script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
<script src="js/jquery.min.js"></script>
<script src="js/jquery.scrollto.min.js"></script>
<script src="js/jquery.easing.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.lightbox.min.js"></script>
<script src="js/jquery.flexslider.js"></script>
<script src="js/jquery.singlePageNav.min.js"></script>
<script src="js/megalaundry_script.js"></script>
</body>
</html>
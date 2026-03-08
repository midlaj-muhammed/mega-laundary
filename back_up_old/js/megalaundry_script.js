/* Credit: http://www.templatemo.com */

jQuery(document).ready(function()
{
    //mobile menu show hide
    jQuery("header #mobile_menu_list ul").hide();
    jQuery("#mobile_menu").click(function(){
        jQuery("header #mobile_menu_list ul").slideToggle();
        return false;
    });
    jQuery("header #mobile_menu_list ul li a").click(function(){
        jQuery("header #mobile_menu_list ul").slideUp();
    });
    //single page nav
    jQuery("header ul").singlePageNav({offset: jQuery('header').outerHeight()});
    //open scroll function
    jQuery("html, body").animate({ scrollTop: 50 }, 0, function(){
        jQuery(this).animate({ scrollTop: 0 },1000);
    });
    //call flex slider function
    jQuery('#main-slider').flexslider();
    //scroll to top
    jQuery(window).scroll(function(){
        if(jQuery(this).scrollTop() > 100){
            jQuery('.scrollup').fadeIn();
        } else {
            jQuery('.scrollup').fadeOut();
        }
    });
    jQuery('.scrollup').click(function(){
        jQuery("html, body").animate({ scrollTop: 0 }, 1000);
        return false;
    });
    //lightbox
    jQuery('a.overlay').lightbox(); 
    //google map
    function initialize() {
        //define map
        var map;
        //Lat lng
        myLatlng = new google.maps.LatLng(24.409181, 54.569866)
        //define style
        var styles = [
            {
                //set all color
                featureType: "all",
                stylers: [{ 
                    hue: "#9e2630",
                    saturation: -100 ,
                    lightnsess: -100 
                }]
            }
        ];
        //map options
        var mapOptions = {
            zoom: 15,
            center: myLatlng ,
            mapTypeControlOptions: {mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']} ,
            panControl: false , //hide panControl
            zoomControl: false , //hide zoomControl
            mapTypeControl: false , //hide mapTypeControl
            scaleControl: false , //hide scaleControl
            streetViewControl: false , //hide streetViewControl
            overviewMapControl: false , //hide overviewMapControl
        }
        //adding attribute value
        map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
        var styledMap = new google.maps.StyledMapType(styles,{name: "Styled Map"});
        map.mapTypes.set('map_style', styledMap);
        map.setMapTypeId('map_style');
        //add marker
        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            title: 'Mega Laundry!'
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize);
});






function checkItndstopEntrRKey(evt, id_) {
	document.getElementById(id_).value = '';
	 
  var evt = (evt) ? evt : ((event) ? event : null); 
  var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null); 
  if ((evt.keyCode == 13) && (node.type=="text"))  { check_value_found();} 
  
  evt = (evt) ? evt : window.event
       var charCode = (evt.which) ? evt.which : evt.keyCode
       if (charCode > 31 && (charCode < 46 || charCode > 57)) {
           status = "This field accepts numbers only."
           return false
       }
	   
       status = ""
       return true
} 

function check_value_found() {
 var inv_number = $("#track_invoice_mega").val();
 var mobile_number = $("#track_mobile_mega").val();
 var value_toget = '';
 if (inv_number != '') { 
 value_toget = 'invoice='+inv_number;
 	} else if(mobile_number != '') {  value_toget = 'mobile='+mobile_number;}
  
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
	  
var status = xmlhttp.responseText;	  
				//if value not found
	document.getElementById('status_tracking').innerHTML=status;
		$(document).ready(function(){
	 	$("#status_tracking").show(500);
  									});	
										
    }
  }
  xmlhttp.open("GET","echo.php?"+value_toget,true);
  xmlhttp.send();
}






 //showing and hiding jquiry
 $(document).ready(function(){
	 	$("#status_tracking").hide(500);

	 
//first hinding para input spare parts	 
$("#about_section_1st").hide(500); $("#about_section_2nd").hide(500);

  $("#about_1st_show").click(function(){
  $("#about_section_1st").show(500);
  $("#about_1st_show").hide(500);
  });
  
  $("#about_2nd_show").click(function(){
  $("#about_section_2nd").show(500);
  $("#about_2nd_show").hide(500);
  });
  
});
 
 $(document).ready(function(){
    document.addEventListener('contextmenu', event => event.preventDefault());

    $('form[id="register_form"]').validate({
        rules:{
            mobile: {
                required : true,
                digits: true,
                minlength: 10,
                maxlength: 10
            }
        },
        messages:{
            mobile: {
                required : "Mobile Number Required",
                digits : "Only Numbers are allowed",
                minlength: "Mobile Number Require 10 digits",
                maxlength: "Mobile Number Require 10 digits"
            }
        },
        submitHandler: function(form) {
          //form.submit();
              var mob=$('#mobile').val();
              $.ajax({

                type:"post",
                url:"https://megalaundry.aipsoft.com/laundro_orderapp/verify.php", 
                datatype:"json",
                data:$("#register_form").serialize(),
                success:function(data){
                    var code=jQuery.parseJSON(data);
                    window.dotp=code.verfycode;
                    window.mobi=code.mobile;
                    if (code.status==1) {
                        /* if the mobile number is not in database go for registration process
                        alert("Sorry, Your Number is not registered with us.please Complete One step registartion process.");
                        $('#reg1').css({
                            'visibility': 'visible',
                            'opacity': 1
                        }); 
                        $('#login-box').css({
                            'height': '503px'
                        });
                         $('.left').css({
                            'height': '503px'
                        });
                        $('.left').css('background-image', 'url("images/bg.jpg")');
                        $('.right').css('background', 'none');
                        $('#mobile1').replaceWith($('#social'));*/
                        $('#otp').css({
                            'visibility': 'visible',
                            'opacity': 1
                        });
                        $('#mobile1').replaceWith($('#otp'));

                    }
                    else
                    {
                        // if the mobile number is in database go for otp verification
                        alert("Error!! Please Check with the entered number");
                    }
                }   
            })
        }
    });

     //function to verify otp

    $('form[id="otp_form"]').validate({
        rules:{
            otp:{
                required:true
            }
        },

        messages:{
            required: "Enter otp for Verification"
        },

        submitHandler:function(form){

            var otp=$('#onetime').val();
            var dbotp=window.dotp;
            var umob=window.mobi;
            if(otp==dbotp)
            {
                $.ajax({
                    type:"post",
                    url:"https://megalaundry.aipsoft.com/laundro_orderapp/verify.php",
                    datatype:"json",
                    data:({ver:umob}),
                    success:function(data)
                    {
                        //console.log(data)
                        var code=jQuery.parseJSON(data);
                        if(code.user_id!='null')
                        {
                            window.user_id=code.user_id;
                           $('#login-box').css({
                                'height': '597px',
                                'width': '629px'
                            });
                            $('.left').css({
                                'height': '597px'
                            });
                            $('.left').css('background-image', 'url("images/order_img1.jpg")');
                            $('.right').css('background', 'none');
                            $('.left').css({
                                'background-size': 'cover',
                                'background-position': 'center'
                            })
                            $('#order_form').css({
                                'visibility': 'visible',
                                'opacity': 1
                            })
                            $('.right').css({
                                'height': '550px',
                                'width': '350px'
                            })
                            
                            $('#reg1').replaceWith($('#order_form'));
                            $('#otp').replaceWith($('#social'));
                        }
                        else
                        {
                            alert("Sorry, Your Number is not registered with us.please Complete One step registartion process.");
                            $('#reg1').css({
                                'visibility': 'visible',
                                'opacity': 1
                            }); 
                            $('#login-box').css({
                                'height': '503px'
                            });
                             $('.left').css({
                                'height': '503px'
                            });
                            $('.left').css('background-image', 'url("images/bg.jpg")');
                            $('.right').css('background', 'none');
                            $('#otp').replaceWith($('#social'));
                            $('#order_form').replaceWith($('#social'));
                        }
                       

                    }

                })
            }
            else
            {
                $("#error_otp").css({
                    'visibility' : 'visible'
                });
            }
        }
    });

    //function to register user into database
    jQuery.validator.addMethod("lettersonly", function(value, element) {
        return this.optional(element) || /^[a-z]+$/i.test(value);
    }, "Letters only please"); 
    $('form[id="register"]').validate({
       rules:{
            name:{
                required: true,
                lettersonly : true
            },
            mobile:{
                required : true,
                digits: true,
                minlength: 10,
                maxlength: 10
            },
            email:{
                required : true,
                email: true
            },
            password:{
                required : true,
                minlength:8,
                maxlength:15
            }
        },
        messages:{
                name:{
                    required : "Name Required",
                    lettersonly : "Name Contains only letters"
                },
                mobile: {
                    required : "Mobile Number Required",
                    digits : "Only Numbers are allowed",
                    minlength: "Mobile Number Require 10 digits",
                    maxlength: "Mobile Number Require 10 digits"
                },
                email:{
                    required : "Email id Required",
                    email: "Incorrect email format"
                },
                password:{
                    required : "Password Required",
                    minlength: "Password Require Atleast 8 Characters",
                    maxlength: "Password Maximum Contains 15 Characters"
                }

        },
        submitHandler:function(form){
            $.ajax({
                type:"post",
                url:"https://megalaundry.aipsoft.com/laundro_orderapp/cust_registr.php",
                datatype:"json",
                data:$("#register").serialize(),
                success:function(data){
                    //console.log(data)
                    var code=jQuery.parseJSON(data);
                    window.user_id=code.user_id;
                    if (code.userid!='null') {
                        $('#reg1').replaceWith($('#order_form'));
                        $('input[name=uid]').val(code.user_id);
                        $('#login-box').css({
                                'height': '597px',
                                'width': '629px'
                            });
                        $('.left').css({
                            'height': '526px'
                        });
                        $('.left').css('background-image', 'url("images/order_img1.jpg")');
                        $('.left').css({
                            'background-size': 'cover',
                            'background-position': 'center'
                        })
                        $('#order_form').css({
                            'visibility': 'visible',
                            'opacity': 1
                        });
                    }
                    else{
                        alert('Registration failed!! Try Again');
                    }
                    
                }
            })
        }
    });

   
    //function to insert order details

    $('form[id="order_for"]').validate({
        rules:{
            pic_date :{
                required : true
            },
            pic_time:{
                required : true
            },
            drop_date:{
                required : true
            },
            drop_time:{
                required : true
            }
        },
        messages:{
                pic_date:{
                    required : "Pickup date is Required"
                },
                pic_time: {
                    required : "Pickup time is required"
                },
                drop_date:{
                    required : "Dropdate is required"
                },
                drop_time:{
                    required : "Droptime is required"
                }
        },
        submitHandler:function(data){

            var uid=window.user_id;
            var desc=$("#desc").val();
            var pdate=$("#pic_date").val();
            var ptime=$("#pic_time").val();
            var ddate=$("#drop_date").val();
            var dtime=$("#drop_time").val();
            var e=0;
            var lat=0;
            var lon=0;
            var gcode=0;
            var parray={"user_id":uid,"description":desc,"latitude":lat,"longitude":lon,"gift_code":gcode,
                        "pickup_date":pdate,"delivery_date":ddate,"pickup_time":ptime,"delivery_time":dtime,
                        "emie":e}
            $.ajax({
                type:"post",
                url:"https://megalaundry.aipsoft.com/laundro_orderapp/order.php",
                datatype:"json",
                data:parray,
                success:function(data){
                    var code=jQuery.parseJSON(data);
                    if(code.status==1)
                    {
                        alert(code.message);
                        window.location= "schedule_pickup.html";
                    }
                }
            })
        }

    })

    $('#myform').submit(function(e){
       // console.log('submitted')
        e.preventDefault();

        $.ajax({
            type:"post",
            url :"process.php",
            datatype:"json",
            data:$("#myform").serialize(),
            success:function(data){
                var code=jQuery.parseJSON(data);
                if (code.userid=='null') {

                    $('#form2').css({
                        'visibility': 'visible',
                        'opacity': 1
                    });
                    $('#form1').css({
                        'visibility': 'hidden'
                    });
                }
                else
                {
                    $('#form3').css({
                        'visibility': 'visible'
                    });
                    $('#form1').replaceWith($('#form3'));
                }
            }
        })

    })


    // code for tracking the order


      $('form[id="track_order"]').validate({
        rules:{
            mobile: {
                required : true,
                digits: true,
                minlength: 10,
                maxlength: 10
            }
        },
        messages:{
            mobile: {
                required : "Mobile Number Required",
                digits : "Only Numbers are allowed",
                minlength: "Mobile Number Require 10 digits",
                maxlength: "Mobile Number Require 10 digits"
            }
        },
        submitHandler: function(form) {
          //form.submit();
              var mob=$('#mobile').val();
              $.ajax({

                type:"post",
                url:"process.php", 
                datatype:"json",
                data:$("#track_order").serialize(),
                success:function(data){
                    var code=jQuery.parseJSON(data);
                    if (code.status==1) {
                       

                    }
                    else
                    {
                        // if the mobile number is in database go for otp verification
                        alert("Error!! Please Check with the entered number");
                    }
                }   
            })
        }
    });

 })

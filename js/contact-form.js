
 $(document).ready(function(){ 

	$('#contactForm').validate({

						rules: {
							name: {
								required: true,
								lettersonly : true
							},
							phone: {
								required : true,
				                digits: true,
				                minlength: 10,
				                maxlength: 10
							},
							message: {
								required: true,
								minlength: 20
							},
							email: {
								required: true,
								email: true
							}

						},
						messages: {
							name: {
								required: "Please enter your name",
								lettersonly: "Your name must be in letters"
							},
							phone: {
								required: "Please enter message",
								digits: "Please enter only digits",
								minlength: "Mobile Number Require 10 digits",
                    			maxlength: "Mobile Number Require 10 digits"
							},
							email: {
								required: "Please enter your email",
								email:"Enter valid email address"
							},
							message: {
								required: "Please enter Message",
								email:"Message Contains atleast 20 characters"
							}
						},
						submitHandler: function submitHandler(form) {
							$(form).ajaxSubmit({
								type: "POST",
								data: $(form).serialize(),
								url: "form/process-contact.php",
								success: function success() {
									$('.successform', $contactform).fadeIn();
									$orderForm.get(0).reset();
								},
								error: function error() {
									$('.errorform', $contactform).fadeIn();
								}
							});
						}
					});

});
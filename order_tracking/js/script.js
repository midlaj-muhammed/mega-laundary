 
 $(document).ready(function(){
    document.addEventListener('contextmenu', event => event.preventDefault());

    $('form[id="tracking"]').validate({
        rules:{
            inv: {
                required : true,
                digits: true,
                maxlength: 10
            }
        },
        messages:{
            inv: {
                required : "Invoice Number Required",
                digits : "Only Numbers are allowed",
                maxlength: "Invoice Number Maximum 10 Digits"
            }
        },
        submitHandler: function(form) {
          //form.submit();
              var ino=$('#inv').val();
              $.ajax({

                url:"https://megalaundry.aipsoft.com/order_track.php",
                type:"get",
                data: {
                    inv: ino
                },                
                success:function(data){
                    var code=jQuery.parseJSON(data);
                    if (code.status==1) {
                        $('.right').css('background', 'none');
                        var out = "<h4>Status</h4>"+code.message+
                        "<h4>Details</h4>"+code.InvoiceHistory+
                        "<h4>Total Amount</h4>"+code.TotalAmount+
                        "<h4>Paid Amount</h4>"+code.Paid+
                        "<h4>Balance Amount</h4>"+code.Balance+
                        "<h4>Invoice Date</h4>"+code.InvoiceDate
                        console.log(out)
                        document.getElementById("response").innerHTML = out;
                    }
                    else{
                        alert("You entered invalid invoice number. Try with correct one")
                    }
                }   
            })
        }
    });

 })

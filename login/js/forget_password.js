window.addEventListener("load",()=>{
    let emailForm=document.getElementById("forgetEmail");
    emailForm.addEventListener("submit",forgetEmail,false);

    function change(){
        // alert("clicked");
        var mail_Form=document.getElementById('mail_form');
        var otp_Form=document.getElementById('otp_form');
        mail_Form.style.display="none";
        otp_Form.style.display="block";
    }

    function forgetEmail(e){
        e.preventDefault();
        let email=document.getElementById("femail").value;
        let emailError=document.getElementById("femailError");
        // emailError.innerHTML=email + "<b> is not matched</b>";
        // emailEemailErrorrror.style.color="red";
        function ajaxFun() {
            var xhttp = new XMLHttpRequest();
            let url="femail="+email;
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if(this.responseText !="ok"){
                        emailError.innerHTML = "matched not found in database";
                    }else{
                        change();
                    }
                    
               }
            };
            xhttp.open("POST", "../ajaxFile/forget_password.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send(url);
        }
        ajaxFun();

    }
    
    
},false);


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
        let emailError1=document.getElementById("femailError1");
        // emailError.innerHTML=email + "<b> is not matched</b>";
        // emailEemailErrorrror.style.color="red";
        function ajaxFun() {
            var xhttp = new XMLHttpRequest();
            let url="femail="+email;
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if(this.responseText =="ok"){
                        change();
                        emailError1.innerHTML = "メール確認のためOTPをメールで送信しました。";
                        emailError1.innerHTML =this.responseText;
                    }else if(this.responseText =="notok"){
                        emailError.innerHTML = "mail send failed";
                        emailError1.innerHTML =this.responseText;
                    }
                    else if(this.responseText =="bad"){
                        emailError.innerHTML = "matched not found in database";
                        emailError1.innerHTML =this.responseText;
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


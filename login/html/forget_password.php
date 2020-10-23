
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>sms Login</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
</head>

<body>
    <div class="wrapper">
        <!-- email form -->
        <div id="mail_form">
            <form action="" method="post">
                <div class="email_form">
                    <label for="email">メールアドレス ：</label><br>
                    <input type="email" class="form_input" name="email" id="email" placeholder="メールアドレスを入力してください。">
                </div>
                <div class="error">
                        <p> <p>
                </div>
                <div class="email_btn">
                <input type="button" class="form_btn" value="検索" id="search_btn" onclick="change()">
                </div>
            </form>
        </div>
        <!-- email form ends here -->
        <!-- otp form starts here -->
        <div id="otp_form">
            <form action="change_password.php" method="post">
                <div class="email_form" >
                    <label for="otp">確認コード ：</label><br>
                    <input type="text" class="form_input" name="otp" id="otp" placeholder="確認コードを入力してください。">
                </div>
                <div class="error">
                        <p> <p>
                </div>
                <div class="email_btn">
                <input type="submit" class="form_btn" value="次" id="next_btn">
                </div>
            </form>
        </div>
        <!-- otp forms ends here -->
    </div>
<script>
    function change(){
        // alert("clicked");
        var email=document.getElementById('mail_form');
        var otp=document.getElementById('otp_form');
        console.log(email);
        email.style.display="none";
        otp.style.display="block";
    }
</script>
 

</body>

</html>
</body>
</html>
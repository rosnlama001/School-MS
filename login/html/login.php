<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Responsive Login Page</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
</head>

<body>

    <!--form area start-->
    <div class="form">
        <!--login form start-->
        <form class="login-form" action="" method="post">
            <i class="fas fa-user-circle"></i>
            <input class="user-input" type="text" name="eMail" placeholder="Email" required>
            <input class="user-input" type="password" name="pass" placeholder="Password" required>
            <div class="options-01">
                <label class="remember-me"><input type="checkbox" name="">Remember me</label>
                <a href="#">Forgot your password?</a>
            </div>
            <input class="btn" type="submit" name="log" value="LOGIN">
            <div class="options-02">
                <p>Not Registered? <a href="#">Create an Account</a></p>
            </div>
        </form>
        <!--login form end-->
        <!--signup form start-->
        <form class="signup-form" action="../php/register.php" method="post">
            <i class="fas fa-user-plus"></i>
            <input class="user-input" type="text" name="userName" placeholder="Username" required>
            <input class="user-input" type="email" name="regeMail" placeholder="Email Address" required>
            <input class="user-input" type="password" name="regpass" placeholder="Password" required>
            <input class="btn" type="submit" name="reg" value="SIGN UP">
            <div class="options-02">
                <p>Already Registered? <a href="#">Sign In</a></p>
            </div>
        </form>
        <!--signup form end-->
    </div>
    <!--form area end-->

    <script type="text/javascript">
    $('.options-02 a').click(function() {
        $('form').animate({
            height: "toggle",
            opacity: "toggle"
        }, "slow");
    });
    </script>

</body>

</html>
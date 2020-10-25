
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>School Management system</title>
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <header>
        <nav>
            <div class="logo">
                <img src="asset/image/logo_school.png" alt="" srcset="" width="40px" height="40px">
            </div>
            <div class="logo_content">School Management system</div>
            <div class="contact_btn"><i class="fas fa-user-circle"></i> <a href=""> contact</a></div>
        </nav>
        <section>
            <h3>
                <marquee behavior="" direction="">click the click me button to log in to your panel</marquee>
            </h3>
            <div class="card_box">

                <div class="card">
                    <h4 class="card_header">Panel</h4>
                    <h1 class="card_body">Admin</h1>
                    <p class="card_footer"><a href="login/php/process.php?status=admin&&">Click me</a></p>
                </div>
                <div class="card">
                    <h4 class="card_header">Panel</h4>
                    <h1 class="card_body">teacher</h1>
                    <p class="card_footer"><a href="login/php/process.php?status=teacher&&">Click me</a></p>
                </div>
                <div class="card">
                    <h4 class="card_header">Panel</h4>
                    <h1 class="card_body">student</h1>
                    <p class="card_footer"><a href="login/php/process.php?status=student&&">Click me</a></p>
                </div>

            </div>
        </section>
    </header>
</body>
</html>
    <?php 
        if(isset($_GET['red'])){
    ?>
                <script>
                var err="<?php  echo $_GET['red'] ?>";
                console.log(err);
                if(err =="ok"){
                    
                        swal({
                    title: "Good Job!",
                    text: "succcessful",
                    icon: "success",
                    button: "Try again",
                            });
                    }
                    else{
                        swal({
                    title: "DANGER !",
                    text: "something wrong",
                    icon: "error",
                    button: "Try again",
                            });
                    }
            </script>
    <?php 
        } 
    ?>
         
                

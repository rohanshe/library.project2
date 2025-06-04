<?php
            ob_start();
            $con = mysqli_connect('localhost', 'root', '', 'library_registration');
            if (isset($_POST['login'])) {
                $pass = $_POST['pass'];
                $query = "SELECT * FROM admin_table WHERE admin_pass='$pass'";
                // $execute=mysqli_query($con,$query);
                $result = mysqli_query($con, $query);
                $users = mysqli_fetch_array($result, MYSQLI_ASSOC);
                //             if (!$pass) {
                //                 echo " <div class=' css_1 text-center alert alert-warning alert-dismissible fade show'role='alert'>
                //      <strong>warning!</strong> Incorrect password.
                //      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                //    </div>";
                //             }
                
                if ($users) {
                    header("location: admin_headqouter.php");
                    die();
                }
                ob_end_flush();
                if (!$pass) {
                    echo " <div class=' css_1 text-center alert alert-warning alert-dismissible fade show'role='alert'>
         <strong>warning!</strong> Incorrect password.
         <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
       </div>";
                }
                 else {
                    // echo " <div class=' css_1 text-center alert alert-warning alert-dismissible fade show'role='alert'>
                    //        <strong>warning!</strong> password Does not match.
                    //        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    //      </div>";
                    echo " <p class='text-danger'> password Does not match</p>";
                }
            }
            ?>




<!DOCTYPE html>
<html lang="en">



    <head>
        <!-- Design by foolishdeveloper.com -->
        <title>ADMIN PLACE</title>

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <!-- Stylesheet-->
        <style media="screen">
            *,
            *:before,
            *:after {
                padding: 0;
                margin: 0;
                box-sizing: border-box;
            }

            body {
                background-color: #080710;
            }

            .background {
                width: 430px;
                height: 520px;
                position: absolute;
                transform: translate(-50%, -50%);
                left: 50%;
                top: 50%;
            }

            .background .shape {
                height: 200px;
                width: 200px;
                position: absolute;
                border-radius: 50%;
            }

            .shape:first-child {
                background: linear-gradient(#1845ad,
                        #23a2f6);
                left: -80px;
                top: -80px;
            }

            .shape:last-child {
                background: linear-gradient(to right,
                        #ff512f,
                        #f09819);
                right: -30px;
                bottom: -80px;
            }

            form {
                height: 520px;
                width: 400px;
                background-color: rgba(255, 255, 255, 0.13);
                position: absolute;
                transform: translate(-50%, -50%);
                top: 50%;
                left: 50%;
                border-radius: 10px;
                backdrop-filter: blur(10px);
                border: 2px solid rgba(255, 255, 255, 0.1);
                box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
                padding: 50px 35px;
            }

            form * {
                font-family: 'Poppins', sans-serif;
                color: #ffffff;
                letter-spacing: 0.5px;
                outline: none;
                border: none;
            }

            form h3 {
                font-size: 32px;
                font-weight: 500;
                line-height: 42px;
                password-align: center;
            }

            label {
                display: block;
                margin-top: 30px;
                font-size: 16px;
                font-weight: 500;
            }

            input {
                display: block;
                height: 50px;
                width: 100%;
                background-color: rgba(255, 255, 255, 0.07);
                border-radius: 3px;
                padding: 0 10px;
                margin-top: 8px;
                font-size: 14px;
                font-weight: 300;
            }

            ::placeholder {
                color: #e5e5e5;
            }

            button {
                margin-top: 50px;
                width: 100%;
                background-color: #ffffff;
                color: #080710;
                padding: 15px 0;
                font-size: 18px;
                font-weight: 600;
                border-radius: 5px;
                cursor: pointer;
            }

            .social {
                margin-top: 30px;
                display: flex;
            }

            .social div {
                background: red;
                width: 150px;
                border-radius: 3px;
                padding: 5px 10px 10px 5px;
                background-color: rgba(255, 255, 255, 0.27);
                color: #eaf0fb;
                password-align: center;
            }

            .social div:hover {
                background-color: rgba(255, 255, 255, 0.47);
            }

            .social .fb {
                margin-left: 25px;
            }

            .social i {
                margin-right: 4px;
            }
        </style>
    </head>

    <body>
        <div class="background">
            <div class="shape"></div>
            <div class="shape"></div>
        </div>
        <form method="Post">

           
            <h3>Login Here</h3>

            <label for="username">Password</label>

            <input type="password" name="pass" placeholder="Enter Password" id="username">
 


            <button name="login">Log In</button>
            <div class="social">
                <a href="Register.php">
                    <div class="go"> Register</div>
                </a>
                <a href="loginform2.php">
                    <div class="fb"> login</div>
                </a>
            </div>
        </form>


    </body>

    </html>
    <!-- partial -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>


</body>

</html>
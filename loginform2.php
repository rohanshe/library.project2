<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CodePen - Glassmorphism login Form Tutorial in html css</title>
    <link rel="stylesheet" href="register.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">



</head>

<body>

    <section class="container">
    <?php
     session_start();
        if (isset($_POST['submit'])) {
            $prnnum = $_POST['prnnum'];
           
            require_once "register_db.php";
            $sql = "SELECT * FROM registration_table WHERE prn_no='$prnnum'";
            $result = mysqli_query($con, $sql);
            $users = mysqli_fetch_array($result, MYSQLI_ASSOC);
           
         
           
            $sqlname="SELECT * FROM registration_table WHERE prn_no='$prnnum' ";
            $result = mysqli_query($con, $sql);
            $users = mysqli_fetch_array($result, MYSQLI_ASSOC);
            // $_SESSION['fullname'] = $users['fullname']; // ✅ Actual name from DB

           
            $_SESSION['fullname']=$users['full'];
            if (!$prnnum) {
                echo " <div class=' css_1 text-center alert alert-warning alert-dismissible fade show'role='alert'>
               <strong>warning!</strong> PRN NO must not empty.
               <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
             </div>";
            }
            if ($users) {
                // if(password_verify($prnnum,$users['prn_no'])){ //note this
                header("location: index.php");
                die();
            } else {
                echo " <div class=' css_1 text-center alert alert-warning alert-dismissible fade show'role='alert'>
               <strong>warning!</strong> PRN NO Does not match.
               <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
             </div>";

            }
        }
        ?>


        <header>Login Form</header>
        <form method="post" class="form">



            <div class="input-box">
                <label>PRN Number</label>
                <input type="number" placeholder="Enter PRN number" name="prnnum" />
            </div>



            <!-- <center> If already have account . <a href="loginform2.php">log in</a></center> -->
            <center><a href=" admin.php">Admin</a> login account.</center>
            <center><a href=" register.php">register </a>here .</center>

            <button type="submit" name="submit">Login</button>
        </form>
    </section>



</body>

</html>
<!-- partial -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>


</body>

</html>
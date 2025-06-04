<!DOCTYPE html>
<!---Coding By CodingLab | www.codinglabweb.com--->
<html lang="en">
<link rel="stylesheet" href="register.css">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!--<title>Registration Form in HTML CSS</title>-->
  <!---Custom CSS File--->
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <section class="container">
    <?php
    if (isset($_POST['submit'])) {
      $fullname = $_POST['fullname'];
      $phone = $_POST['phnum'];
      $birth = $_POST['birth'];
      $gender = $_POST['gender'];
      $address = $_POST['address2'];
      $prnnum = $_POST['prnnum'];
      $class = $_POST['class'];

      //session code 
     


      $error = array();

      if (empty($fullname) or empty($phone) or empty($birth) or empty($gender) or empty($address) or empty($prnnum) or empty($class)) {
        array_push($error, "<div class=' css_3  alert  alert-warning alert-dismissible fade show'role='alert'>
                 <strong>warning!</strong>All feild are required.
                 <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
               </div>");

      }
      // if(filter_var($email,FILTER_VALIDATE_EMAIL)){
      //   array_push($error,"email are not valid.");
      // }
      if (strlen($prnnum) < 10) {
        array_push($error, "<div id='css_2' class=' alert alert-warning alert-dismissible fade show'role='alert'>
                 <strong>warning!</strong> PRN NO  must be 10 digit..
                 <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
               </div>");
      }

      require_once "register_db.php";

      // for unique prn 
      $sql = "SELECT * FROM registration_table WHERE prn_no='$prnnum'"; //This creates an SQL query to find a user with the given email.
    
      $result = mysqli_query($con, $sql);// Runs the query on the database.
      $rowcount = mysqli_num_rows($result);//Counts how many rows were found with that email.
      if ($rowcount > 0) {// If email exists, it adds an error message to the $error array.
        array_push($error, "<div class=' css_1  alert alert-warning alert-dismissible fade show'role='alert'>
                 <strong>warning!</strong> PRN NO  already exist.
                 <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
               </div>");
      }



      if (count($error) > 0) {
        foreach ($error as $registration) {
          echo "<div class='alert '>$registration</div>";
        }
      } else {

        $sql = "INSERT INTO registration_table (full,phone_no,birth_date,gender,address,prn_no,class) values (?,?,?,?,?,?,?)";
        $stmt = mysqli_stmt_init($con);
        $prepare_stmt = mysqli_stmt_prepare($stmt, $sql);
        if ($prepare_stmt) {
          mysqli_stmt_bind_param($stmt, 'sisssis', $fullname, $phone, $birth, $gender, $address, $prnnum, $class);
          mysqli_stmt_execute($stmt);
          echo "<div class=' alert alert-success alert-dismissible fade show'role='alert'>
          <strong><a href='loginform2.php'>LOGIN HERE ..</a></strong> YOUR REGISTRATION IS SUCCESSFULLY...
         
        </div>";
        }
      }

    }


    ?>
    <header>Registration Form</header>
    <form method="post" action="register.php" class="form">
      <div class="input-box">
        <label>Full Name</label>
        <input type="text" placeholder="Enter full name" name="fullname" />
      </div>

      <div class="column">
        <div class="input-box">
          <label>phone Number</label>
          <input type="number" placeholder="Enter phone number" name="phnum" />
        </div>
        <div class="input-box">
          <label>Birth Date</label>
          <input type="date" placeholder="Enter birth date" name="birth" />
        </div>
      </div>
      <div class="gender-box">
        <h3>Gender</h3>
        <div class="gender-option">
          <div class="gender">
            <input type="radio" id="check-male" name="gender" value="m" checked />
            <label for="check-male">male</label>
          </div>
          <div class="gender">
            <input type="radio" id="check-female" name="gender" value="f" />
            <label for="check-female">Female</label>
          </div>
        </div>
      </div>
      <div class="input-box address">
        <label>Address</label>
        <input type="text" placeholder="Enter street address" name="address2" />
      </div>
      <div class="input-box">
        <label>PRN Number</label>
        <input type="number" placeholder="Enter PRN number" name="prnnum" />
      </div>

      <div class="input-box">
        <label>Class</label>
        <input type="text" placeholder="Enter Your Class" name="class" />
      </div>
      </div>
      <center> If already have account . <a href="loginform2.php">log in</a></center>
      <center><a href=" admin.php">Admin</a> login account.</center>

      <button type="submit" name="submit">Submit</button>
    </form>
  </section>
  <style>
    .alert {
      margin-bottom: -12px;
    }
  </style>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

</body>

</html>
<?php
session_start();
require_once "register_db.php";

$con = mysqli_connect('localhost', 'root', '', 'library_registration');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if (isset($_POST['borrow_now'])) {
    // Get logged-in user data
    $full_name = $_SESSION['fullname'] ?? 'Unknown';
    $prn_no = $_SESSION['prnnum'] ?? 0;

    // Get book details
    $book_image = $_POST['book_image'];
    $book_name = $_POST['book_name'];
    $author = $_POST['author'];
    $volume = $_POST['volume'];
    $book_code = $_POST['book_code'];

    // Insert into books_requested
    $sql = "INSERT INTO books_requested (full_name, prn_no, book_image, book_name, author, volume, book_code)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_stmt_init($con);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "sisssii", $full_name, $prn_no, $book_image, $book_name, $author, $volume, $book_code);
        mysqli_stmt_execute($stmt);

        echo "<div class='alert alert-success m-3'>Borrow request successfully submitted!</div>";
    } else {
        echo "<div class='alert alert-danger m-3'>Error saving request. Please try again.</div>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin headquouter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">LIBRARY</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href=" admin_headqouter.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href=" admin_registered_users.php">Registered users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin_books_add.php">Add books</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown link
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<center><h1>welcome to admin...</h1></center>

<div class="container py-5">
    <h2 class="mb-4">Requested Books</h2>
    <table class="table table-bordered table-hover bg-white">
        <thead class="table-dark">
            <tr>
                <th>Sr. No</th>
                <th>Full Name</th>
                <th>PRN No</th>
                <th>Book Name</th>
                <th>Author</th>
                <th>Image</th>
                <th>Request Date</th>
            </tr>
        </thead>
        <tbody>
        <?php
        require_once "register_db.php";
        $con = mysqli_connect('localhost', 'root', '', 'library_registration');

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// fetch data from books_requested
$query = "SELECT * FROM books_requested ORDER BY id DESC";
$result = mysqli_query($con, $query);

if (!$result) {
    die("Query Failed: " . mysqli_error($con));
}
     $sr = 1;
     while ($row = mysqli_fetch_assoc($result)) {
         echo "<tr>
                 <td>{$sr}</td>
                 <td>{$row['full_name']}</td>
                 <td>{$row['prn_no']}</td>
                 <td>{$row['book_name']}</td>
                 <td>{$row['author']}</td>
                 <td><img src='images/Books/{$row['book_image']}' width='60' height='80'></td>
                 <td>{$row['requested_date']}</td>
               </tr>";
         $sr++;
     }
       
        ?>
        </tbody>
    </table>
</div>


    
   
 

</body>

</html>
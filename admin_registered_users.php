<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin registered users</title>
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
<div class="container">
    <h1>welcome to admin</h1>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">full name</th>
                <th scope="col">phone no</th>
                <th scope="col">birth date</th>
                <th scope="col">gender</th>
                <th scope="col">address</th>
                <th scope="col">prn no</th>
                <th scope="col">class</th>
                <th scope="col">action</th>

            </tr>
        </thead>
        <tbody class="table-group-divider">


            <?php
            $con = mysqli_connect('localhost', 'root', '', 'library_registration');
            //check connection
            if ($con->connect_error) {
                die("connection failed." . $con->connect_error);//note this
            }
            //read all rows from database
            $sql = "SELECT * FROM registration_table";
            $result = mysqli_query($con, $sql);
            if (!$result) {
                die("invalid query:" . $con->$sql);
            }
            //read datab from each row
            while ($row = $result->fetch_assoc()) {
                echo " <tr>
      <th scope='row'>" . $row["id"] . "</th>
      <td>" . $row["full"] . "</td>
      <td>" . $row["phone_no"] . "</td>
      <td>" . $row["birth_date"] . "</td>
       <td>" . $row["gender"] . "</td>
        <td>" . $row["address"] . "</td>
         <td>" . $row["prn_no"] . "</td>
          <td>" . $row["class"] . "</td>
      <td>
      <a class='btn btn-primary btn-sm' href=''>update</a>
      <a class='btn btn-danger btn-sm' href=''>delete</a>
      </td>
    </tr>";

            }

            ?>


        </tbody>
    </table>
    </div>
</body>
</html>
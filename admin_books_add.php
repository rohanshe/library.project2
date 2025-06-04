<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add books</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">LIBRARY</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
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
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
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
    <h1>Add books</h1>

    <form class="row g-3 needs-validation" method="POST" enctype="multipart/form-data" novalidate>

        <?php

        $con = mysqli_connect('localhost', 'root', '', 'library_registration');
        if (isset($_POST['submit'])) {
            $book_image = $_FILES['book_image']['name'];
            $tempname = $_FILES['book_image']['tmp_name'];
            $book_name = mysqli_real_escape_string($con, $_POST['book_name']);
            $author = mysqli_real_escape_string($con, $_POST['author']);
            $volume_no = $_POST['volume_no'];
            $book_code = $_POST['book_code'];
            $folder = 'images/Books/' . $book_image;
            $query = "INSERT INTO books_table(book_image,Book_name,author ,volume_no,book_code) VALUES('$book_image','$book_name','$author',$volume_no ,$book_code)";
            $result = mysqli_query($con, $query);

            if (move_uploaded_file($tempname, $folder)) {
                echo "<div class=' css_3  alert  alert-success alert-dismissible fade show'role='alert'>
                 <strong>Successful!</strong>Your file uploaded .
                 <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
               </div>";
            } else {
                echo "<div class=' css_3  alert  alert-warning alert-dismissible fade show'role='alert'>
                 <strong>warning!</strong>your file not uploaded.
                 <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
               </div>";
            }
        }
        ?>

        <div class="col-md-4">
            <label for="validationCustom01" class="form-label">Book image</label>
            <input type="file" class="form-control" id="validationCustom01" name="book_image" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationCustom01" class="form-label">Book name</label>
            <input type="text" class="form-control" id="validationCustom01" name="book_name" value="game of throne"
                required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationCustom02" class="form-label">Author name</label>
            <input type="text" class="form-control" id="validationCustom02" name="author" value="geourge R.R. martin"
                required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationCustomUsername" class="form-label">volume no.</label>
            <div class="input-group has-validation">
                <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                <input type="number" class="form-control" name="volume_no" id="validationCustomUsername"
                    aria-describedby="inputGroupPrepend" required>
                <div class="invalid-feedback">
                    Please choose a volume no.
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <label for="validationCustom03" class="form-label">book code</label>
            <input type="number" class="form-control" name="book_code" id="validationCustom03" required>
            <div class="invalid-feedback">
                Please provide a valid city.
            </div>
        </div>
        <!-- <div class="col-md-3">
            <label for="validationCustom04" class="form-label">State</label>
            <select class="form-select" id="validationCustom04" required>
                <option selected disabled value="">Choose...</option>
                <option>...</option>
            </select>
            <div class="invalid-feedback">
                Please select a valid state.
            </div>
        </div> -->
        <!-- <div class="col-md-3">
            <label for="validationCustom05" class="form-label">Zip</label>
            <input type="text" class="form-control" id="validationCustom05" required>
            <div class="invalid-feedback">
                Please provide a valid zip.
            </div>
        </div>
        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                <label class="form-check-label" for="invalidCheck">
                    Agree to terms and conditions
                </label>
                <div class="invalid-feedback">
                    You must agree before submitting.
                </div>
            </div>
        </div> -->
        <div class="col-12">
            <button class="btn btn-primary" name="submit" type="submit">Add book</button>
        </div>
    </form>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>

</body>

</html>
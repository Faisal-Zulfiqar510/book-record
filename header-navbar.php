<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-4.0.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-4.0.0-dist/css/bootstrap-grid.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-4.0.0-dist/css/bootstrap.min.css.map">
    <link rel="stylesheet" type="text/css" href="bootstrap-4.0.0-dist/css/bootstrap-grid.min.css.map">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="js/jquery-3.4.1.js"></script>
    <script src="bootstrap-4.0.0-dist/js/bootstrap.bundle.js"></script>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


    <style>
        /* Style the buttons */
        .btn1, .btn2 {
            border: none;
            outline: none;
            padding: 10px 16px;
            cursor: pointer;
            font-size: 18px;
            color: #b8daff;
        }

        /* Style the active class, and buttons on mouse-over */
        .active1 {
            background-color: #666;
            color: white;
        }
    </style>
    <script>

        $(document).ready(function () {
            // $('.navbar-header a').click(function () {
            let url = document.location.href;
            console.log(url);
            let index = url.search("table");
            console.log(index);
            if (index >= 0) {
                $('.navbar-header .btn1').removeClass('active1');
                $('.navbar-header .btn2').addClass('active1');
            } else {
                $('.navbar-header .btn2').removeClass('active1');
                $('.navbar-header .btn1').addClass('active1');
            }

            // });
        });
    </script>


</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="btn1 btn-outline-light" href="home.php">Add Record</a>
            <a class="btn2 btn-outline-light" href="table-for-books.php">Show List</a>
            <!--<button class="btn1  " style="border: none; " onclick="location.href='home.php';">Add Record</button>
            <button class="btn1 active" style="border: none;" onclick="location.href='table-for-books.php';">Show List</button>-->
        </div>
    </div>

</nav>


</body>
</html>

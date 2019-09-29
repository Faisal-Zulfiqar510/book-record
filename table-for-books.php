<?php
include "header-navbar.php";
include "DDL-DML/select-data.php";

?>

<html lang="en">
<head>


    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <script src="js/js-for-book-record.js"></script>
    <meta charset="utf-8">
    <title>Show Record</title>


</head>
<body>
<div class="mb-3">

    <h1 class="font-weight-bold offset-4 col-3" style="display: inline; text-align: center">Book Record</h1>
    <div class="float-right">
        <label for="searchBox" style="color: #1d2124" class="mr-2">Search</label>
        <input type="text" class="text-dark  mt-2 mr-2" name="searchBox" id="searchBox"
               onKeyUp="setTimeout('chk_me()',3000);"
               value="<?php echo isset($_GET['search_text']) ? $_GET['search_text'] : ''; ?>">
    </div>

</div>


<div class="table-responsive">
    <table id="ipInfoTable" class="table table-striped table-bordered table-hover table-condensed text-center">
        <thead>
        <tr>
            <th>Book Name</th>
            <th>Publisher</th>
            <th>ISBN</th>
            <th>Cover</th>
            <th colspan="2">Action</th>

        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($data as $book) {
            $cover_name = "uploadedPic/" . $book['cover'];
            ?>
            <td><?php echo $book['book_name'] ?></td>
            <td><?php echo $book['publisher'] ?></td>
            <td><?php echo $book['isbn'] ?></td>
            <td><img src="<?php echo $cover_name ?>" height="40" style="cursor: pointer" width="40"
                     onerror="this.src='images/alternative_img.png';  "
                     onclick='window.open("<?php echo $cover_name ?>","_blank");'></td>
            <td>

                <?php echo "<button type='button' name='delete' value=" . $book['id'] . "  class='btn btn-outline-danger' onclick='delRow(this.value)' >Delete Row</button>" ?> </td>
            <td>
                <?php echo "<button type='button' name='edit' value=" . $book['id'] . "  class='btn btn-outline-info' onclick='window.location.replace(\"home.php?edit=\"+this.value);' >Edit Row</button>" ?> </td>

            </tr>
        <?php } ?>
        </tbody>
    </table>
    <div class="text-center">
        <button id="btnPrevious" class="btn-light" onclick="previous();">&laquo; Previous</button>
        <button id="btnNext" class="btn-success" onclick="next();">Next &raquo;</button>
    </div>
    <?php
    if ($page >= $pages) {
        echo "<script> $('#btnNext').attr('disabled' , true); </script>";
    } else {
        echo "<script> $('#btnNext').removeAttr('disabled' , true); </script>";
    }
    if ($page == 1) {
        echo "<script> $('#btnPrevious').attr('disabled' , true); </script>";
    } else {
        echo "<script> $('#btnPrevious').removeAttr('disabled' , true); </script>";
    }
    ?>

</div>
<script>


    function previous() {

        let pre = <?php echo $page - 1; ?>;
        let val = $("#searchBox").val();
        window.location.replace("table-for-books.php?page=" + pre + "&search_text=" + val);

    }

    function next() {
        let n = <?php echo $page + 1; ?>;
        let val = $("#searchBox").val();
        window.location.replace("table-for-books.php?page=" + n + "&search_text=" + val);
    }

    function chk_me() {
        let v = $("#searchBox").val();
        console.log("value", v);
        //if (v!="") {
        console.log("inside if");
        window.location.replace("table-for-books.php?search_text=" + v);
        // }

        // alert("hello");
    }
</script>

</body>
</html>

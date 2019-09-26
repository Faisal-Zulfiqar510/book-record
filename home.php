<?php
session_start();
include "header-navbar.php";
//include "html-design-files/include-files.php";
include "DDL-DML/update-data.php";
include "html-design-files/toast.php";


?>

<html>
<head>
    <title>Home</title>

    <link rel="stylesheet" type="text/css" href="stylesheet.css">

</head>
    <body id="homepage">
<div class="container" id="homepage-container">
    <form >
        <input type="hidden" id="id_field" name="id_row">
        <div class="form-group row ">
            <label for="bookName" class="col-lg-1 col-md-2 col-sm-3 offset-md-1 offset-lg-3 ">Name</label>
            <div class="col-lg-4 col-md-6 col-sm-7">
                <input type="text" name="bookName" id="bookName" class="form-control" placeholder="Enter the book name" required>
            </div>
        </div>
        <div class="form-group row ">
            <label for="publisher" class="col-lg-1 col-md-2 col-sm-3 offset-md-1 offset-lg-3 ">Publisher</label>
            <div class="col-lg-4 col-md-6 col-sm-7">
                <input type="text" name="publisher" id="publisher" class="form-control" placeholder="Enter publisher" required>
            </div>
        </div>
        <div class="form-group row ">
            <label for="ISBN" class="col-lg-1 col-md-2 col-sm-3 offset-md-1 offset-lg-3 ">ISBN</label>
            <div class="col-lg-4 col-md-6 col-sm-7">
                <input type="text" name="ISBN" id="ISBN"  class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 45" placeholder="Enter ISBN" required>
            </div>
        </div>
        <div class="form-group row ">
            <label for="coverImg" class="col-lg-1 col-md-2 col-sm-3 offset-md-1 offset-lg-3 ">Cover Image</label>
            <div class="col-lg-4 col-md-6 col-sm-7">
                <input type="file" name="image" id="image" size="" style="background: transparent; border: none" accept="image/*" onchange="isSelected()" class="form-control"  required>
                <div id = "imgSelect"></div>
            </div>
        </div>
        <div class="btn-toolbar row">
            <button class="btn btn-outline-light offset-5 " type="submit" id="btnSubmit" formaction="DDL-DML/insert-data.php" formmethod="post" formenctype="multipart/form-data" >Submit</button>
            <button class="btn btn-outline-light text-light offset-5" id="btnUpdate" type="submit" name="update" style="display: none" formaction="DDL-DML/update-data.php" formmethod="post" formenctype="multipart/form-data" >Update</button>

        </div>

    </form>

</div>

<script type="text/javascript">

        function isSelected() {
            $(".error").remove();
            let size=$("#image")[0].files[0].size;
            console.log("in selected",size);
            //$(this).removeClass('input-validation-error').next('span').text('');

            if (size > 2621440) {
                $("#image").after('<span class="error" style="color: #b8daff">File size must 2.5mb or below</span>');
               $("#btnSubmit").attr("disabled",true);
            }
            if($("#image").val()!="") {
                console.log("remove");
                $("#myImage").remove();

            }
        }



</script>

<?php

var_dump($_SESSION['msg']);

if ($_SESSION['msg'] == "success") {

    echo "<script>
                //$('.toast .toast-header strong').html('Insert Record');
                $('.toast .toast-body').html('Record Inserted Successfully');
                $('.toast').toast('show');</script>";
    session_unset();
}
else if ($_SESSION['msg'] == "failure") {

    echo "<script>
    $('.toast .toast-body').html('record not inserted');
    $('.toast').toast('show');</script>";
    session_unset();

}

?>



<?php

if($_SESSION['status'] == "yes"){
foreach ($data as $book) {
    $path = "uploadedPic/" . $book['cover'];

    ?>
    <script>
        $("#id_field").val("<?php echo $book['id'] ?>")
        $("#bookName").val("<?php echo $book['book_name'] ?>");
        $("#publisher").val("<?php echo $book['publisher'] ?>");
        $("#ISBN").val("<?php echo $book['isbn'] ?>");

        //$("#image").val("<?php //echo $book['cover'] ?>//");
        $('#btnUpdate').css("display" , "inline-block");
        $('#btnSubmit').css("display" , "none");
        if($("#image").val()==""){
            $("#image").removeAttr("required");

            let img = $('<img />').attr({
                'id': 'myImage',
                'src': "<?php echo $path ?>",
                'alt': "images/alternative_img.png",
                'width': 50,
                'height': 50,
                'style':"cursor:pointer"
            }).appendTo('#imgSelect');
        }

             //console.log("innnn");

    </script>
<?php
session_unset();
}}?>



</body>

</html>

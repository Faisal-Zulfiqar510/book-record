<?php
include "../db-creation/include-files.php";
include "../db-creation/database-connection.php";
?>
<html>
<body>
<!-- Footer -->
<footer class="page-footer font-small special-color-dark pt-4">

    <!-- Footer Elements -->
    <div class="container-fluid">

        <!--Grid row-->
        <div class="row">

            <!--Grid column-->
            <div class="col-md-6 mb-4">

                <?php
                $stmt = $conn->prepare ("select count(*) FROM book_record.book_shelf where row_status = 1");

                $stmt->execute();
                $number_of_rows = $stmt->fetchColumn();
                echo "the count is  " . $number_of_rows;
                $counter = ceil ($number_of_rows/10);
                for ($i = 1; $i<=counter; $i++)
                {
                ?>
               <button type="button" name="pagination" value="<?php echo $i;?>"><?php echo $i;?></button>
                <!-- Form -->
                <?php}?>

            </div>
            <!--Grid column-->

        </div>
        <!--Grid row-->

    </div>
    <!-- Footer Elements -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2018 Copyright:
        <a href="https://mdbootstrap.com/education/bootstrap/"> MDBootstrap.com</a>
    </div>
    <!-- Copyright -->

</footer>
<!-- Footer -->
</body>
</html>

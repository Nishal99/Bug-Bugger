<?php include_once 'header.php';
?>

<div class="search-main-container">
    <div class="search-container">
        <h1 class="hello-user">Hello <?php
            if(isset($_SESSION["username"])){
                echo $_SESSION["username"] . '!';
            } else {
                echo 'User!';
            }
            ?>
        </h1>

        <h1 class="head-buggy">Give us your HTML/CSS bug</h1>
        <input type="text" id="searchInput" placeholder="Enter bug or issue...">
        <button class="search-button" onclick="searchBug()">Search</button>
        <div id="suggestions"></div>
        <div id="answer"></div>
    </div>
</div>
</div>

<!-- Jquery JS-->
<script src="vendor/jquery-3.2.1.min.js"></script>
<!-- Bootstrap JS-->
<script src="vendor/bootstrap-4.1/popper.min.js"></script>
<script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
<!-- Vendor JS       -->
<script src="vendor/slick/slick.min.js">
</script>
<script src="vendor/wow/wow.min.js"></script>
<script src="vendor/animsition/animsition.min.js"></script>
<script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
</script>
<script src="vendor/counter-up/jquery.waypoints.min.js"></script>
<script src="vendor/counter-up/jquery.counterup.min.js">
</script>
<script src="vendor/circle-progress/circle-progress.min.js"></script>
<script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="vendor/chartjs/Chart.bundle.min.js"></script>
<script src="vendor/select2/select2.min.js">
</script>
<script src="script.js"></script>

<script src="hideShow.js"></script>
<!-- Main JS-->



<?php include_once 'footer.php';
?>
<!-- end document-->

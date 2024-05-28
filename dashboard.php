<?php include_once 'header.php';
?>


        <!-- MAIN CONTENT-->
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="overview-wrap">
                            
                                <button class="au-btn au-btn-icon au-btn--blue">Test</button>
                            </div>
                        </div>
                    </div>
                    
                        
                        
                        
                
                    <div class="row">
                        <div class="dash-width" style="width:100% !important;">
                            <h2 class="title-1 m-b-25">User History</h2>
                            <div class="table-responsive table--no-card m-b-40">
                                <table id="clickHistoryTable" class="table table-borderless table-striped table-earning">
                                    <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Question</th>
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                     <!-- Data will be populated here via JavaScript -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                    </div>
                    
                        
                    
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT-->
        <!-- END PAGE CONTAINER-->
    </div>

</div>
<script>
        document.addEventListener("DOMContentLoaded", function() {
            fetch('fetch_click_history.php')
                .then(response => response.json())
                .then(data => {
                    const tableBody = document.querySelector('#clickHistoryTable tbody');
                    data.forEach(click => {
                        const row = document.createElement('tr');
                        const questionCell = document.createElement('td');
                        const timeCell = document.createElement('td');

                        //questionCell.textContent = click.question;
                        //timeCell.textContent = new Date(click.clickeAt).toLocaleString();

                        const questionText = click.question.replace(/<div.*?>|<\/div>/gi, '');
                questionCell.textContent = questionText;

                         // Parse the date string and convert it into a Date object
                const clickDate = new Date(click.clickedAt);
                // Check if the parsed date is valid
                if (!isNaN(clickDate.getTime())) {
                    // If valid, convert it into a localized string
                    timeCell.textContent = clickDate.toLocaleString();
                } else {
                    // If not valid, display 'Invalid Date'
                    timeCell.textContent = 'Invalid Date';
                }
                row.appendChild(timeCell);
                        row.appendChild(questionCell);
                        
                        tableBody.appendChild(row);
                    });
                })
                .catch(error => console.error('Error fetching click history:', error));
        });
    </script>

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
<script src="js/dashboard.js"></script>

<!-- Main JS-->
<script src="js/main.js"></script>

<?php include_once 'footer.php';
?>
<!-- end document-->

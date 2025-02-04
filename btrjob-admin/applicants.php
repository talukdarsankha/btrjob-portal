<?php include("include/head.php");?>
<?php
 if(isset($_SESSION['userType'])){
    if($_SESSION['userType']!='ADMIN' && $_SESSION['userType']!='COUNSELLOR'){
       header("location: 403_error");
       exit();
    }
 }
?>
<!-- datatable link -->
<link rel="stylesheet" href="assets/css/badges.css">
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.dataTables.css">
<!--<link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.0/css/buttons.dataTables.css">-->

<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>-->


<!-- datatable link -->


<body class="bg-light">

     <!-- Preloader -->
        <?php include("include/preloader.php");?>


    <!-- Default Nav -->
    <?php include("include/header.php");?>

    <?php include("include/horizontal-navbar.php");?>

    <?php include("include/sidebar.php");?>


    <!-- Main Wrapper-->
    <main class="main-wrapper">

        <div class="container">
    
        </div>


        <div class="container-fluid">
            <div class="inner-contents">
                <div class="page-header d-flex align-items-center justify-content-between mr-bottom-30">
                    <div class="left-part">
                        <h2 class="text-dark">All Applicants</h2>
                        <p class="text-gray mb-0"> all applicants,  in this portal .</p>
                    </div>

                </div>

            </div>
        
            <div class="row">

                <div class="col-lg-12">
                    <!-- Table Two  -->
                    <div class="card border-0 p-5">
                        <div
                            class="card-header pb-5 bg-transparent border-0 d-flex align-items-center justify-content-between gap-3">
                            <h4 class="mb-0">Applicants Info</h4>
                            <div class="ms-auto d-flex align-items-center gap-3">
                                <div class="dropdown">
                                    <a href="#" data-bs-toggle="dropdown" class="fs-24 text-gray">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </a>
                                    
                                </div>
                            </div>
                        </div>
                        
                        <div class="card-body p-0">
                            <div class="table-responsive">
                               
                                <!-- datatable -->
                                <table id="example" class="display nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Sl no.</th>
                                            <th>Applicant Name</th>                                           
                                            <th>Applicant Email</th>
                                            <th>Applicant Phone</th>
                                            <th>KYC status</th>
                                            <th>Info</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $readapplicant = $crud->Read("applicant", "1 order by `id` desc");
                                            if ($readapplicant) {
                                            $n = 0; 
                                            foreach ($readapplicant as $applicant) {
                                                $status=$applicant['status'];
                                               
                                        ?>                                                
                                                <tr>
                                                    <td style="background-color:none"><?php echo ++$n; ?></td>
                                                    <td>
                                                        <?php
                                                            if($applicant['name'] == '') {
                                                          
                                                                echo '<span class="custom-badge-pending">KYC not submitted</span>';


                                                            } else {
                                                                echo $applicant['name'];
                                                            }
                                                        ?>
                                                    </td>

                                                    <td><?php echo $applicant['email'];?></td>
                                                    <td><?php echo $applicant['phone'];?></td>
                                                    <td>
                                                    <?php
                                                        if ($status == 0) {
                                                            echo '<span class="custom-badge-pending">KYC not submitted</span>';


                                                        } elseif ($status ==1) {
                                                            echo '<span class="custom-badge-interview">KYC not verified</span>';
                                                            // echo'<button class=btn btn-primary>KYC not verified</button>';
                                                        } elseif ($status == 2) {
                                                            // echo "KYC accepted";
                                                            echo "<span class=\"custom-badge-hire\">KYC accepted</span>";
                                                        }
                                                        elseif ($status == 3) {
                                                           echo "<span class=\"custom-badge-reject\">KYC rejected</span>";
                                                        }else {
                                                            // Handle other status values if needed
                                                            echo "Unknown status";
                                                        }
                                                    ?>
                                                    </td>

                                                    <td>

                                                      <?php
                                                            if($applicant['name'] == '') {
                                                          
                                                               


                                                            } else { ?>
                                                             <a href="applicant-more-details?applicant_id=<?php echo $applicant['id'] ?>"><?php echo '<span class="custom-badge-pending">More Details</span>  </a>'; ?>
                                                           
                                                          <?php  }
                                                        ?>
                                                    </td>

                                                       

                                                </tr>

                                        <?php
                                                
                                                }
                                            }
                                            else{
                                                echo '<h3 class="text-danger text-center">No details found.</h3>';
                                                }
                                        
                                        ?>
                                        
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                           <th>Sl no.</th>
                                            <th>Applicant Name</th>                                           
                                            <th>Applicant Email</th>
                                            <th>Applicant Phone</th>
                                            <th>KYC status</th>
                                            <th>Info</th>

                                        </tr>
                                    </tfoot>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
          
        </div>
    </main>
<style type="text/css">
    .apply{
        float: left;
  width: 100%;
  padding-right: 20px;
  padding-left: 20px;
  height: 30px;
  line-height: 30px;
  text-align: center;
  background: linear-gradient(135deg,#21db84,#5197d0);
  color: #ffffff;
  font-size: 14px;
  text-transform: uppercase;
  -webkit-border-radius: 10px;
  -moz-border-radius: 10px;
  border-radius: 5px;
  box-shadow: 3px 3px #eeb407;
  font-weight: 700;
}
</style>

    <?php include("include/footer.php") ?>


    <!-- data table -->
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.0/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.print.min.js"></script>
    <script>
        new DataTable('#example', {
            layout: {
                topStart: {
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
                }
            }
        });
    </script>
   <!-- data table -->

</body>

</html>
<?php

include_once("../../sessions.php");




?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>

    <!-- Favicons -->
    <link href="../../assets/img/favicon-32x32.png" rel="icon">
    <link href="../../assets/img/apple-icon-180x180.png" rel="apple-touch-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../../assets/vendor/boxicons/css/boxicons.css">
    <link rel="stylesheet" href="../../assets/vendor/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="../../assets/vendor/boxicons/css/animations.css">
    <link rel="stylesheet" href="../../assets/vendor/boxicons/css/transformations.css">



    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!--fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="stylesheet" href="../../assets/css/UserDash.css">
    <style>
        @media only screen and (min-width:992px) {
            #credit {
                display: block;
                box-sizing: border-box;
                height: 181px;
                width: 363px;
            }
        }
    </style>

</head>

<body>

    <?php 


 
    

    include "header.php";

    $user = $_SESSION['uname'];
    $role = $_SESSION['urole'];
    
    ?>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid px-lg-4">
        <div class="row">
            <div class="col-md-12 mt-lg-4 mt-4">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>
                        Generate Report</a> -->
                </div>
            </div>
                    </div>
                </div>
            </div>


        </div>

    </div>

    <?php include "footer.php" ?>
    <!-- Wraper Ends Here -->





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.2.1/dist/chart.min.js"></script>
    <script src="../UserData/js/profileInfo.js"></script>
    <script src="../UserData/js/dashboard.js"></script>


    <script>
        $('#bar').click(function() {
            $(this).toggleClass('open');
            $('#page-content-wrapper ,#sidebar-wrapper').toggleClass('toggled');

        });
    </script>

    <script>
        var ctx = document.getElementById('Credit').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?php echo json_encode($date); ?>,
                datasets: [{
                        label: '# Credited',
                        data: <?php echo json_encode($credit); ?>,

                        // We Have to compare array two array i.e Debit data and data for expected result
                        backgroundColor: [
                            'rgba(0, 179, 3, 0.2)',

                        ],
                        borderColor: 'rgb(0, 179, 3)',
                        borderWidth: 2
                    },
                    {
                        label: '# Debited',
                        data: <?php echo json_encode($debit); ?>,
                        backgroundColor: [
                            'rgba(245, 7, 31, 0.2)',

                        ],
                        borderColor: 'rgb(245, 7, 31)',
                        borderWidth: 2
                    }
                ]
            },

            options: {

                // responsive: false,

            }
        });


        var ctx = document.getElementById('Balance').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Credit', 'Debit'],
                datasets: [{
                        label: 'Cash Flow Chart',
                        data: [<?php echo $CreditTotal ?>, <?php echo abs($DebitTotal) ?>],
                        backgroundColor: [
                            'rgba(0, 179, 3, 0.6)',
                            'rgba(245, 7, 31, 0.6)',

                        ],
                        borderColor: [
                            'rgba(0, 179, 3)',
                            'rgba(245, 7, 31)',
                        ],

                        borderWidth: 2,
                        barThickness: 70
                    }

                ]
            },

            options: {

                // responsive: false,
            }
        });


        // Send Bar Chart
    </script>





</body>

</html>
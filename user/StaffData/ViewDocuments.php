<?php




?>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Cards</title>

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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <link rel="stylesheet" href="../../assets/css/UserDash.css">
    <link rel="stylesheet" href="../UserData/css/cards.css">

</head>

<body>
    <?php include "header.php" ?>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class=" begin container-fluid px-lg-4">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>
                        Generate Report</a> -->
                </div>


            </div>
        </div>



                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="text-center mb-4 ">View Documents</h1>

                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p>Document ID</p>
                                        <p>Document Name</p>
                                        <p>Document Type</p>
                                        <p>Document Criticality</p>
                                        <p>Owner ID</p>
                                        <p>Creation Date Time</p>
                                        <p>File Location</p>
                                    </div>

                                    <div>
                                        <p>:</p>
                                        <p>:</p>
                                        <p>:</p>
                                        <p>:</p>
                                        <p>:</p>
                                        <p>:</p>
                                        <p>:</p>
                                    </div>

                                    <div>
                                        <p><?php echo "-" ?></p>
                                        <p><?php echo "-" ?></p>
                                        <p><?php echo "-" ?></p>
                                        <p><?php echo "-" ?></p>
                                        <p><?php echo "-" ?></p>
                                        <p><?php echo "-" ?></p>
                                        <p><?php echo "-" ?></p>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>


    </div>

    </div>
    <!-- End of Page Content -->

    <?php include "footer.php" ?>
    <!-- Wraper Ends Here -->



    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../UserData/js/profileInfo.js"></script>

    <script src="../UserData/js/cards.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $('#bar').click(function() {
            $(this).toggleClass('open');
            $('#page-content-wrapper ,#sidebar-wrapper').toggleClass('toggled');
            $("#debitCard-col").toggleClass("col-sm-10");
            $("#OnCardToggle").toggleClass("onfip-posion-toogle");

        });

        $("#Cards").addClass("active");

        $("#bankBrand").addClass("mt-4");

        $("#close").click(function(e) {

            $("#EditProfileModal").modal('hide');
            e.preventDefault();

        });
    </script>

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>


</body>

</html>
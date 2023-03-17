<?php

function getDocuments ()
{
    /*$db = new SQLITE3('C:\\xampp\\BankAXY Database\\BankAXY.db');
    $sql = "SELECT * FROM Documents";
    $stmt = $db->prepare($sql);
    $result = $stmt->execute();

    while ($row = $result->fetchArray()){ 
        $arrayResult [] = $row; 
    }
    return $arrayResult;*/
    
    $host = 'EMILYSPC\MSSQLSERVER1';
    $dbname = 'BankAXY';

    $pdo = new PDO("sqlsrv:Server=$host;Database=$dbname");

    $stmt = $pdo->prepare('SELECT * FROM Documents');
    $stmt->bindParam(':Document_ID', $_POST['Document_ID'], PDO::PARAM_STR);
    $stmt->bindParam(':Document_Name', $_POST['Document_Name'], PDO::PARAM_STR);
    $stmt->bindParam(':Document_Type', $_POST['Document_Type'], PDO::PARAM_STR);
    $stmt->bindParam(':Document_Criticality', $_POST['Document_Criticality'], PDO::PARAM_STR);
    $stmt->bindParam(':Owner_ID', $_POST['Document_Name'], PDO::PARAM_STR);
    $stmt->bindParam(':Document_Name', $_POST['Document_Name'], PDO::PARAM_STR);
    $stmt->bindParam(':Document_Name', $_POST['Document_Name'], PDO::PARAM_STR);

    $result = $stmt->execute();

    $rows_array = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $rows_array[] = $row;
    }

    return $rows_array;
}

$documents = getDocuments();


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
                    <div class="col-sm-8">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="text-center mb-4 ">View Documents</h1>

                                
                                <table class="table table-striped">
                                    <thead class="table-light">
                                        <td>Document ID</td>
                                        <td>Document Name</td>
                                        <td>Document Type</td>
                                        <td>Document Criticality</td>
                                        <td>Owner ID</td>
                                        <td>Creation Date Time</td>
                                        <td>File Location</td>
                                    </thead>

                                    <?php
                                        for ($i=0; $i<count($user); $i++):
                                    ?>
                                    <tr>
                                        <td><?php echo $documents[$i]['Document_ID']?></td>
                                        <td><?php echo $documents[$i]['Document_Name']?></td>
                                        <td><?php echo $documents[$i]['Document_Type']?></td>
                                        <td><?php echo $documents[$i]['Document_Criticality']?></td>
                                        <td><?php echo $documents[$i]['Owner_ID']?></td>
                                        <td><?php echo $documents[$i]['Creation_Date_Time']?></td>
                                        <td><?php echo $documents[$i]['File_Location']?></td>
                                    </tr>
                                    <?php endfor;?>

                        
                                </table> 

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
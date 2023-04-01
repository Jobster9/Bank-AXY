<?php
include("header.php");
include("GetChartDocs.php");
$latest_creation_date_time = getLatestCreationDateTime();
$monthlydocuments = monthlydocuments();
$lowdocuments = lowdocuments();
$mediumdocuments = mediumdocuments();
$highdocuments = highdocuments();
?>
<script>
document.addEventListener('contextmenu', event => event.preventDefault());
</script>
<!doctype html>
<html lang="en">
<head>

    <title>Dashboard</title>
    <!--  CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/UserDash.css">
    <link rel="stylesheet" href="../../assets/css/StaffStyle.css">
</head>
<body>

    <div class="container-fluid px-lg-4">
        <div class="row">
            <div class="col-md-12 mt-lg-4 mt-4">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                </div>
            </div>
 
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-4 ">Latest Document Creation</h5>
                                <h1 id="CreditDisplay" class="display-5 mt-1 mb-3 text-success"></h1>
                                <div class="mb-1">
                                    <span id="CreditLastM" class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i></span>
                                    <span class="text-muted"><?php echo $latest_creation_date_time ?></span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-4">Documents Created this Month</h5>
                                <h1 id="Admin" class="display-5 mt-1 mb-3 text-danger"></h1>
                                <div class="mb-1">
                                    <span id="Admin" class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> </span>
                                    <span class="text-muted"><?php echo $monthlydocuments ?></span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
                    <div class="col-md-12 mt-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-4">Documents Created this Month According to Criticality</h5>
                                <h1 id="Admin" class="display-5 mt-1 mb-3 text-danger"></h1>


<style>
    #chartContainer {
        background-color: rgba(0,0,0,0);    
        position: relative;
    }
    canvas {
        position: absolute;
        top: 170px;
        left: 50%;
        transform: translate(-50%, -50%);
    }
</style>


<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  <script>
        var low = <?php echo $lowdocuments; ?>;
        var medium = <?php echo $mediumdocuments; ?>;
        var high = <?php echo $highdocuments; ?>;
    window.onload = function () {
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        backgroundColor: "rgba(0,0,0,0)",
        data: [{
            type: "doughnut",
            startAngle: 60,
            indexLabelFontSize: 17,
            indexLabel: "{label} - {y}",
            toolTipContent: "<b>{label}:</b> {y}",
    dataPoints: [
      { y: low, label: "Low", color: "#010066" },
      { y: medium, label: "Medium", color: "#FFCC00" },
      { y: high, label: "High", color: "#CC0001" },
    ]

        }]
    });
    chart.render();
    }
    </script>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>                                
                                <div class="mb-1">
                                    <span id="chart" class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> </span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
         

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


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

</body>

</html>
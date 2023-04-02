<?php include "header.php";
include "GetAuditTrails.php";
$auditTrail = GetAuditTrails();
$branch = getBranch();
?>
<script>
document.addEventListener('contextmenu', event => event.preventDefault());
</script>
<!DOCTYPE html>
<html lang="en">

<head>


    <title>Audit Trails</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="../../assets/css/UserDash.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <style>
        .btn-pay {
            background-image: linear-gradient(to right, #010066 0%, #CC0001 100%);
            color: #fdfdfd;
            font-weight: bold;
            box-shadow: 0 0 0.875rem 0 rgb(33 37 41 / 5%);
            border-radius: 30px;
        }

        .btn-pay:hover {
            background-image: linear-gradient(to right, #0b2b58 0%, #cc0000 100%);

        }

        .card {
            background-image: radial-gradient(circle farthest-corner at 48.9% 4.2%, rgba(216,216,220,255) 0%, rgba(255,255,255,255) 100.2%);
        }
.card h3 {
  font-size: 22px;
  font-weight: 600;
  
}
        /* The Modal (background) */
        .customodal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.9);
            /* Black w/ opacity */
        }

        /* Modal Content (Image) */
        .customodal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
        }

        /* Caption of Modal Image (Image Text) - Same Width as the Image */
        #caption {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            text-align: center;
            color: #ccc;
            padding: 10px 0;
            height: 150px;
        }

        /* Add Animation - Zoom in the Modal */
        .customodal-content,
        #caption {
            animation-name: zoom;
            animation-duration: 0.6s;
        }

        @keyframes zoom {
            from {
                transform: scale(0)
            }

            to {
                transform: scale(1)
            }
        }

        /* The Close Button */
        .closebtn {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        .closebtn:hover,
        .closebtn:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        /* 100% Image Width on Smaller Screens */
        @media only screen and (max-width: 700px) {
            .modal-content {
                width: 100%;
            }
        }

        .loadingModal {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20%;
        }

.drop_box {
  margin: 10px 0;
  padding: 30px;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  border: 3px dotted #a3a3a3;
  border-radius: 5px;
}
.drop_box h4 {
  font-size: 16px;
  font-weight: 400;
  color: #2e2e2e;
}

.drop_box p {
  margin-top: 10px;
  margin-bottom: 20px;
  font-size: 12px;
  color: #a3a3a3;
}

.btn {
  text-decoration: none;
  background-color: #cc0000;
  color: #ffffff;
  padding: 10px 20px;
  border: none;
  outline: none;
  transition: 0.3s;
}

.btn:hover{
  text-decoration: none;
  background-color: #ffffff;
  color: #005af0;
  padding: 10px 20px;
  border: none;
  outline: 1px solid #010101;
}
.form input {
  margin: 10px 0;
  width: 100%;
  background-color: #e2e2e2;
  border: none;
  outline: none;
  padding: 12px 20px;
  border-radius: 4px;
}

.styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}





.styled-table thead tr {
    background-color: #0032A0;
    color: #ffffff;
    text-align: left;
}

.styled-table th,
.styled-table td {
    padding: 12px 15px;
}


.styled-table tbody tr {
    border-bottom: 1px solid #0032A0;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: white;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #0032A0;
}

.styled-table tbody tr.active-row {
    font-weight: bold;
    color: black;
}
.styled-table {
    margin: 25px auto;
}
    </style>


</head>

<body>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid px-lg-4 dark_bg light">
        <div class="row">
            <div class="col-md-12 mt-lg-4 mt-4">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center mb-4" style="justify-content:center;">
                    <h1 class="h3 mb-0 light" style="text-align: center;">View Audit Trails here for <?php echo $branch ?>:</h1>


                </div>
            </div>








            <div class="col-md-12">
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title light mb-4 "></h5>

                       
                                <div class="container" style="width: 50%;">
                Select Number of Rows
                <div class="form-group"> 	<!--		Show Numbers Of Rows 		-->
                     <select class  ="form-control" name="state" id="maxRows">
                         <option value="<?php echo count($auditTrail) ?>">Show All Rows</option>
                         <option value="5">5</option>
                         <option value="10">10</option>
                         <option value="15">15</option>
                         <option value="20">20</option>
                         <option value="50">50</option>
                         <option value="100">100</option>
                        </select>
                     
</div>
</div>


<table class="styled-table" id="table-id">
    <thead>
        <tr>
            <th>Audit ID</th>
            <th>User ID</th>
            <th>Document ID</th>
            <th>Date & Time</th>
            <th>Action</th>         
        </tr>
    </thead>
    <tbody>
<?php for ($i = 0; $i < count($auditTrail); $i++): ?>
                <tr class="active-row">
                    <td><?php echo $auditTrail[$i]['Audit_ID'] ?></td>
                    <td><?php echo $auditTrail[$i]['User_ID'] ?></td>
                    <td><?php echo $auditTrail[$i]['Document_Name'] ?></td>
                    <td><?php echo $auditTrail[$i]['Audit_Date_Time'] ?></td>
                    <td><?php echo $auditTrail[$i]['Audit_Action'] ?></td>
                </tr>
<?php endfor; ?>
    </tbody>
</table>



<div class='pagination-container' style="margin: 0px 155px;">
        <nav>
            <ul class="pagination">
            
            <li data-page="prev" >
            <span> < <span class="sr-only">(current)</span></span>
             </li>

            <li data-page="next" id="prev">
                <span> > <span class="sr-only">(current)</span></span>
            </li>
         </ul>
    </nav>
</div>

</div> 

<style>
    .pagination {
  display: flex;
  justify-content: center;
  margin-top: 20px;
}

.pagination li {
  cursor: pointer;
  display: inline-block;
  margin: 0 5px;
  padding: 5px 10px;
  background-color: #f2f2f2;
  border: 1px solid #ddd;
  border-radius: 4px;
}

.pagination li:hover {
  background-color: #ddd;
}

.pagination li.active {
  background-color: darkred;
  color: white;
}

.pagination [data-page="prev"],
.pagination [data-page="next"] {
  font-weight: bold;
}

.pagination [data-page="prev"]:before {
  content: "";
}

.pagination [data-page="next"]:after {
  content: "";
}

.pagination .sr-only {
  position: absolute;
  left: -9999px;
}



</style>
<script>
    
    getPagination('#table-id');
         

function getPagination(table) {
  var lastPage = 1;

  $('#maxRows')
    .on('change', function(evt) {

     lastPage = 1;
      $('.pagination')
        .find('li')
        .slice(1, -1)
        .remove();
      var trnum = 0; 
      var maxRows = parseInt($(this).val()); 

      if (maxRows == 5000) {
        $('.pagination').hide();
      } else {
        $('.pagination').show();
      }

      var totalRows = $(table + ' tbody tr').length; 
      $(table + ' tr:gt(0)').each(function() {
        trnum++;
        if (trnum > maxRows) {

          $(this).hide(); 
        }
        if (trnum <= maxRows) {
          $(this).show();
        } 
      }); 
      if (totalRows > maxRows) {
        var pagenum = Math.ceil(totalRows / maxRows); 
        for (var i = 1; i <= pagenum; ) {
          $('.pagination #prev')
            .before(
              '<li data-page="' +
                i +
                '">\
                                  <span>' +
                i++ +
                '<span class="sr-only">(current)</span></span>\
                                </li>'
            )
            .show();
        }
      }
      $('.pagination [data-page="1"]').addClass('active');
      $('.pagination li').on('click', function(evt) {
        evt.stopImmediatePropagation();
        evt.preventDefault();
        var pageNum = $(this).attr('data-page'); 

        var maxRows = parseInt($('#maxRows').val());

        if (pageNum == 'prev') {
          if (lastPage == 1) {
            return;
          }
          pageNum = --lastPage;
        }
        if (pageNum == 'next') {
          if (lastPage == $('.pagination li').length - 2) {
            return;
          }
          pageNum = ++lastPage;
        }

        lastPage = pageNum;
        var trIndex = 0; 
        $('.pagination li').removeClass('active'); 
        $('.pagination [data-page="' + lastPage + '"]').addClass('active'); 
          limitPagging();
        $(table + ' tr:gt(0)').each(function() {
          trIndex++;
          if (
            trIndex > maxRows * pageNum ||
            trIndex <= maxRows * pageNum - maxRows
          ) {
            $(this).hide();
          } else {
            $(this).show();
          } 
        }); 
      });
      limitPagging();
    })
    .val(5)
    .change();
}

function limitPagging(){

    if($('.pagination li').length > 7 ){
            if( $('.pagination li.active').attr('data-page') <= 3 ){
            $('.pagination li:gt(5)').hide();
            $('.pagination li:lt(5)').show();
            $('.pagination [data-page="next"]').show();
        }if ($('.pagination li.active').attr('data-page') > 3){
            $('.pagination li:gt(0)').hide();
            $('.pagination [data-page="next"]').show();
            for( let i = ( parseInt($('.pagination li.active').attr('data-page'))  -2 )  ; i <= ( parseInt($('.pagination li.active').attr('data-page'))  + 2 ) ; i++ ){
                $('.pagination [data-page="'+i+'"]').show();

            }

        }
    }
}

$(function() {
  // Just to append id number for each row
  $('table tr:eq(0)').prepend('<th> ID </th>');

  var id = 0;

  $('table tr:gt(0)').each(function() {
    id++;
    $(this).prepend('<td>' + id + '</td>');
  });
});


</script>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2"></div>



                </div>


            </div>

        </div>

        <div class="modal fade bd-example-modal-lg" data-backdrop="static" data-keyboard="false" tabindex="-1">
            <div class="modal-dialog loadingModal modal-lg">
                <div class="modal-content" style="width: 50px; height:50px; background: transparent;">
                    <span class="fas fa-spinner fa-pulse fa-3x" style="color:white"></span>
                </div>
            </div>
        </div>

    </div>
    <!-- End of Page Content -->




    <!-- Wraper Ends Here -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../UserData/js/profileInfo.js"></script>
    <script src="../UserData/js/transfer.js"></script>


    <script>
        $('#bar').click(function() {
            $(this).toggleClass('open');
            $('#page-content-wrapper ,#sidebar-wrapper').toggleClass('toggled');

        });
    </script>

</body>

</html>



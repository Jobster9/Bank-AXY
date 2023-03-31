<?php include "header.php";
include "GetDocuments.php";
include "AccessControl.php";

$user = getDocuments();

$document = "";


?>
<script>
document.addEventListener('contextmenu', event => event.preventDefault());
</script>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>View Documents</title>

    <!-- Favicons -->
    <link href="../../assets/img/favicon-32x32.png" rel="icon">
    <link href="../../assets/img/apple-icon-180x180.png" rel="apple-touch-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


    <link rel="stylesheet" href="../../assets/vendor/boxicons/css/boxicons.css">
    <link rel="stylesheet" href="../../assets/vendor/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="../../assets/vendor/boxicons/css/animations.css">
    <link rel="stylesheet" href="../../assets/vendor/boxicons/css/transformations.css">


    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!--fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../../assets/css/UserDash.css">
    <link rel="stylesheet" href="../../assets/css/StaffStyle.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    


</head>

<body>

    <div class="container-fluid px-lg-4 dark_bg light">
        <div class="row">
            <div class="col-md-12 mt-lg-4 mt-4">
                <div class="d-sm-flex align-items-center mb-4" style="justify-content:center;">
                    <h1 class="h3 mb-0 light" style="text-align: center;">View Document here:</h1>
                </div>
            </div>
            

            <div class="search-filter-container">
                <div class="Search" id="Search"><input type="text" id="myInput" onkeyup="nameFilter()" placeholder="Search By Name" title="type in a document">



                </div>

                <div class="dropdown">
                    <button class="btn dropbtn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Filter
</button>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                        <button class="dropdown-item"  onclick="searchByName()" style="width:100%">Name</button>
                        <button class="dropdown-item"  onclick="searchByType()" style="width:100%">Type</button>
                        <button class="dropdown-item" onclick="searchByCriticality()" style="width:100%">Criticality</button>
                    </div>
                </div>
            </div>




            <div class="col-md-12">
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title light mb-4 "></h5>




<?php if (isset($_GET['updated'])): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="font-weight: bold;">
                    The document has been successfully updated.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
<?php endif; ?>

<?php if (isset($_GET['deleted'])): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="font-weight: bold;">
                    The document has been deleted.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
<?php endif; ?> 
<div class="container" style="width: 50%;">
		        Select Number of Rows
				<div class="form-group"> 	<!--		Show Numbers Of Rows 		-->
			 		<select class  ="form-control" name="state" id="maxRows">
						 <option value="<?php echo count($user) ?>">Show All Rows</option>
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
    </div>
        <tr>
            <th>Document Name</th>
            <th>Document Type</th>
            <th>Document Criticality</th>
            <th>Owner ID</th>
            <th>Creation Date & Time</th>
            <th>Update</th>            
            <th>Delete</th>            
            <th>View</th>  

        </tr>
</div>
    </thead>
    <tbody>
<?php
for ($i = 0; $i < count($user); $i++):
$ownerID = $user[$i]['Owner_ID'];
    ?>
                <tr class="active-row">
                    <td><?php echo $user[$i]['Document_Name'] ?></td>
                    <td><?php echo $user[$i]['Document_Type'] ?></td>
                    <td><?php echo $user[$i]['Document_Criticality'] ?></td>
                    <td><?php echo $user[$i]['Owner_ID'] ?></td>
                    <td><?php echo $user[$i]['Creation_Date_Time'] ?></td>
                    <td><a href="UpdateDocument.php?File_Location=<?php echo $i ?>&Document_ID=<?php echo $user[$i]['Document_ID'] ?>"> Update</a></td>

                    <?php
                    $userID = GetUserID();
                $RequestAccess = GetRequestDeletion($userID, $user[$i]['Document_Name']);
                if ($RequestAccess != null) {
                    ?>
                        <td><a href="RequestDeletion.php?File_Location=Requested">Delete</a></td>

                    <?php } else { ?>

                            <td><a href="RequestDeletion.php?File_Location=<?php echo $i ?>">Delete</a></td>

                    <?php } ?>
                    

                <?php
                    $userID = GetUserID();
                $Access = GetAccessControl($userID, $user[$i]['Document_Name']);
                $RequestAccess = GetRequestAccessControl($userID, $user[$i]['Document_Name']);
                if ($RequestAccess != null) {
                    ?>
                        <td><a href="RequestAccess.php?File_Location=Requested">View</a>
                                </tr>
                <?php } else if ($Access != null) {
                    ?>
                        <td><a href="ViewFile.php?File_Location=<?php echo $i ?>" target="_blank" rel="noopener noreferrer"> View</a></td>

                    <?php } else { ?>

                            <td><a href="RequestAccess.php?File_Location=<?php echo $i ?>">View</a></td>
                            </tr>

                    <?php } ?>
                

<?php endfor; ?>

    </tbody>
</table>
<div class='pagination-container' style="margin: 0px 155px;">
		<nav>
			<ul class="pagination">
            
            <li data-page="prev" >
			<span> < <span class="sr-only">(current)</span></span>
			 </li>
				   <!--	Here the JS Function Will Add the Rows -->
            <li data-page="next" id="prev">
				<span> > <span class="sr-only">(current)</span></span>
			</li>
		 </ul>
	</nav>
</div>

</div> 

<script>
    // This pagination function is inspired by the the function used here: https://codepen.io/yasser-mas/pen/pyWPJd
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

    <?php include "footer.php" ?>

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

        function alert (i){
                $('.alert').show();
        };



    //search bar script
        function nameFilter() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("table-id");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
                }       
            }
        }
        function typeFilter() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("table-id");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[2];
                if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
                }       
            }
        }
        function critFilter() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("table-id");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[3];
                if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
                }       
            }
        }
    </script>


<?php


if (isset($_POST["submit"])) {
    include("../../DB config.php");
    $str = $_POST["search"];
    $sth = $pdo->prepare("SELECT * FROM `search` WHERE Document_Name = '$str'");

    $sth->setFetchMode(PDO::FETCH_OBJ);
    $sth->execute();

    if ($docs = $sth->fetch()) {
        ?>
                                    <br><br><br>
                                    <table class="styled-table">
                                        <tr>
                                            <th>Document Name</th>
                                            <th>Document Type</th>
                                            <th>Document Criticality</th>
                                            <th>Owner ID</th>
                                            <th>Creation Date & Time</th>
                                            <th>Update</th>
                                            <th>Delete</th>
                                            <th>View</th>
                                        </tr>
                                        <tr>
                                            <td><?php echo $docs->Document_Name; ?></td>
                                            <td><?php echo $docs->Document_Type; ?></td>
                                            <td><?php echo $docs->Document_Criticality; ?></td>
                                            <td><?php echo $docs->Owner_ID; ?></td>
                                            <td><?php echo $docs->Creation_Date_Time; ?></td>
                                            <td><a href="UpdateDocument.php?File_Location=<?php echo $i ?>"> Update</a></td>
                                            <td><a href="ViewFile.php?File_Location=<?php echo $i ?>" target="_blank" rel="noopener noreferrer"> View</a></td>
                                        </tr>
                                    </table>
                                <?php
    } else {
        echo "Document does not exist";
    }

}
?>

    <script>
        function searchByName() {
            document.getElementById("Search").innerHTML = '<input type="text" id="myInput" onkeyup="nameFilter()" placeholder="Search By Name" title="type in a document">';
        }
    </script>
    <script>
        function searchByType() {
            document.getElementById("Search").innerHTML = '<input type="text" id="myInput" onkeyup="typeFilter()" placeholder="Search By Type" title="type in a document">';
        }
    </script>
    <script>
        function searchByCriticality() {
            document.getElementById("Search").innerHTML = '<input type="text" id="myInput" onkeyup="critFilter()" placeholder="Search By Criticality" title="type in a document">';
        }
    </script>

</body>

</html>


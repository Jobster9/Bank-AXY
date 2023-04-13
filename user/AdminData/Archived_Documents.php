<?php include "header.php";
include "Get_Archived_Documents.php";
$user = Archived_Documents();
?>

<script>
document.addEventListener('contextmenu', event => event.preventDefault());
</script>
<!DOCTYPE html>
<html lang="en">

<head>



    <title>View Archived Documents</title>



    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/UserDash.css">
    <link rel="stylesheet" href="../../assets/css/StaffStyle.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid px-lg-4 dark_bg light">
        <div class="row">
            <div class="col-md-12 mt-lg-4 mt-4">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center mb-4" style="justify-content:center;">
                    <h1 class="h3 mb-0 light" style="text-align: center;">View Archived Documents here:</h1>
                </div>
            </div>







            <div class="col-md-12">
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title light mb-4 "></h5>


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
        <th>Document ID</th>
            <th>Document Name</th>
            <th>Document Type</th>
            <th>Document Criticality</th>
            <th>Owner ID</th>
            <th>Creation Date Time</th>            
            <th>Archive Date</th>   
            <th>Restore Document</th>             

        </tr>
</div>
    </thead>
    <tbody>
<?php
for ($i = 0; $i < count($user); $i++):

  ?>
  <tr class="active-row">
      <td><?php echo $user[$i]['Document_ID'] ?></td>
      <td><?php echo $user[$i]['Document_Name'] ?></td>
      <td><?php echo $user[$i]['Document_Type'] ?></td>
      <td><?php echo $user[$i]['Document_Criticality'] ?></td>
      <td><?php echo $user[$i]['Owner_ID'] ?></td>
      <td><?php echo $user[$i]['Creation_Date_Time'] ?></td>
      <td><?php echo $user[$i]['Archive_Date'] ?></td>
      <td><a href="RestoreDocument.php?Document_ID=<?php echo $user[$i]['Document_ID']; ?> &Document_Name=<?php echo $user[$i]['Document_Name']; ?>">Restore</a></td>        


  </tr>




<?php endfor; ?>
        <!-- and so on... -->
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
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        $('#bar').click(function() {
            $(this).toggleClass('open');
            $('#page-content-wrapper ,#sidebar-wrapper').toggleClass('toggled');

        });
    </script>

</body>

</html>
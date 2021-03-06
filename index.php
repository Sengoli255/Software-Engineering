<?php
	include("functions.php");

  

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <link rel="stylesheet" type = "text/css" href ="staff/css/foodlist.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Customer Order</title>

    <!-- Bootstrap core CSS-->
    <link href="staff/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="staff/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="staff/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="admin/css/sb-admin.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav style="display:flex; justify-content:space-between;"class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="index.php"> Restaurant</a>

      <!-- <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button> -->

      <a href="login.php" style="text-decoration:none; color:white;" value="login" >Login</a>
      <!-- Navbar -->


    </nav>

    <div id="wrapper">

    


   


      <div id="content-wrapper">


        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Order</li>
          </ol>








          <!-- Page Content -->
          <h1>Welcome dear customer</h1>
          <hr>
          <p>Please make your order below.</p>



          <div class="row">


          <div class="col-lg-12">
    <?php

 require 'dbconnection.php';
//$conn = Connect();

$sql = "SELECT * FROM tbl_menuitem  ORDER BY itemID";
$result = mysqli_query($sqlconnection, $sql);

if (mysqli_num_rows($result) > 0)
{
  $count=0;

  while($row = mysqli_fetch_assoc($result)){
    if ($count == 0)
      echo "<div class='row'>";

?>
<div class="col-md-3">

<form action="staff/insertorder.php" method="POST">
<div class="mypanel" align="center";>
<img src='image/<?php echo $row["image"]; ?>'' height="250" width="200" >
<h4 class="text-dark"><?php echo $row["menuItemName"]; ?></h4>
<h5 class="text-danger">Tsh <?php echo $row["price"]; ?>/-</h5>
<input type="hidden" name="hidden_name" value='<?php echo $row["name"]; ?>'>
<input type="hidden" name="hidden_price" value='<?php echo $row["price"]; ?>'>
<input type="hidden" name="hidden_RID" value='<?php echo $row["R_ID"]; ?>'>
</div>
</form>


</div>

<?php
$count++;
if($count==4)
{
  echo "</div>";
  $count=0;
}
}
?>
</div>
</div>
<?php
}
else
{
  ?>

  <div class="container">
    <div class="jumbotron">
      <center>
         <label style="margin-left: 5px;color: red;"> <h1>Oops! No food is available.</h1> </label>
        <p>Stay Hungry...! :P</p>
      </center>

    </div>
  </div>

  <?php

}

?>

</div>
<div class="row">

            <div class="col-lg-6">
              <div class="card mb-3">
                <div class="card-header">
                  <i class="fas fa-utensils"></i>
                  Take Order</div> 

                <div class="card-body">
                  <table class="table table-bordered text-center" width="100%" cellspacing="0">
                  	<tr>
                  	<?php 
						$menuQuery = "SELECT * FROM tbl_menu";

						if ($menuResult = $sqlconnection->query($menuQuery)) {
							$counter = 0;
							while($menuRow = $menuResult->fetch_array(MYSQLI_ASSOC)) { 
								if ($counter >=3) {
									echo "</tr>";
									$counter = 0;
								}

								if($counter == 0) {
									echo "<tr>";
								} 
								?>
								<td><button style="margin-bottom:4px;white-space: normal;" class="btn btn-primary" onclick="displayItem(<?php echo $menuRow['menuID']?>)"><?php echo $menuRow['menuName']?></button></td>
							<?php

							$counter++;
							}
						}
					?>
					</tr>
                  </table>
                  <table id="tblItem" class="table table-bordered text-center" width="100%" cellspacing="0"></table>

                <div id="qtypanel" hidden="">
        					Quantitiy : <input id="qty" required="required" type="number" min="1" max="50" name="qty" value="1" />
        					<button class="btn btn-info" onclick = "insertItem()">Done</button>
        					<br><br>
				</div>

                </div>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="card mb-3">
                <div class="card-header">
                  <i class="fas fa-chart-bar""></i>
                  Order List</div>
                <div class="card-body">
                    <form action="staff/insertorder.php" method="POST">
						<table id="tblOrderList" class="table table-bordered text-center" width="100%" cellspacing="0">
							<tr>
								<th>Name</th>
								<th>Price</th>
								<th>Qty</th>
								<th>Total (TZS)</th>
							</tr>
						</table>
						<input class="btn btn-success" type="submit" name="sentorder" value="Send">
					</form>
                </div>
              </div>
            </div>
          </div>

        </div>

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer " style="width:100%; position: fixed !important; bottom: 0px; left: 0px">
          <div class="container my-auto" >
            <div class="copyright text-center my-auto">
              <span>Restaurant ©2021</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="staff/vendor/jquery/jquery.min.js"></script>
    <script src="staff/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="staff/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="admin/js/sb-admin.min.js"></script>

    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
	<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

	<script>
		var currentItemID = null;

		function displayItem (id) {
			$.ajax({
				url : "staff/displayitem.php",
					type : 'POST',
					data : { btnMenuID : id },

					success : function(output) {
						$("#tblItem").html(output);
					}
				});
		}

		function insertItem () {
			var id = currentItemID;
			var quantity = $("#qty").val();
			$.ajax({
				url : "staff/displayitem.php",
					type : 'POST',
					data : { 
						btnMenuItemID : id,
						qty : quantity 
					},

					success : function(output) {
						$("#tblOrderList").append(output);
						$("#qtypanel").prop('hidden',true);
					}
				});

			$("#qty").val(1);
		}

		function setQty (id) {
			currentItemID = id;
			$("#qtypanel").prop('hidden',false);
		}

		$(document).on('click','.deleteBtn', function(event){
		        event.preventDefault();
		        $(this).closest('tr').remove();
		        return false;
		    });

	</script>

  </body>

</html>
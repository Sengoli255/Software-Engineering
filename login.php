<!DOCTYPE html>
<html>
<head>
    <title>Restaurant</title>
	<style>
		.head2{
		
		  width: 15%;
		  height: 5%;
		  padding: 1%;
		  margin-top: 5%;
		  margin-left: 70%;
		  margin-right: 0.1%;
		  float: left;
		  
		  opacity:0.9;
		}
		.head3{
			width: 15%;
		  height: 10%;
		  padding: 1%;
		  margin-top: 5%;
		  margin-left: 70%;
		  margin-right: 0.1%;
		  float: left;
		  
		  opacity:0.9;
		}
		a{
			color:white;
			font-size:25px;
		}
		a:link {
		  text-decoration: none;
		 
		}
		.btn{
			width: 100%;
		  height: 100%;
		  font-size:25px;
		   border-radius: 25px;
		   background:#eb346b;
		   color:white;
			
		}
		button:hover {
		  background-color:gray ;
		 
		}
		body{
			
			background-image: url("image/p8.jpg");
			background-repeat:no-repeat;
			
		}
		
		.head{
			margin-top: -1%;
			color:white;
			background-color:#eb346b;
		}
	
		
	</style>				
</head>
<body >

<section class="head">
<hr>
<h1 style="text-align:center;">Restaurant</h1>
<hr>
</section>

<div class="head2">
	 <button class="btn" onclick="window.location.href='staff'">Staff Login</button></div>
	<div class="head3">
	 <button class="btn" onclick="window.location.href='admin/login.php'">Admin Login</button>
	</div>
	
</body>
</html>
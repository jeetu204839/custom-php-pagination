<?php
$con = mysqli_connect("localhost","root","","mocktests") or die("connection failed");

$query=mysqli_query($con,"select * from students");
$arr = mysqli_fetch_all($query);

?>

<?php

/*
for($i=0;$i<=100;$i+=5)
{
	echo $i."-"."5"."<br>";
}
*/

?>


<html>
     <head>
         <title>Custom pagination</title>
		 <style>
		 a{  
			border: 2px solid red;
			margin: 5px;
			background-color: black;
			color: white;
			text-decoration: none
	      }
		 </style>
	 </head>
<body>

	<table border="1" align="center" width="50%">
         <tr>
		   <th>Srno</th>
		   <th>First Name</th>
		   <th>Middle Name</th>
		   <th>Last Name</th>
		 </tr>
		 <?php
		   if(isset($_GET['from']))
		   {
			   $from = $_GET['from'];
			   $to = $_GET['to'];
		   }
		   else
		   {
			   $from =0;
			   $to =5;
		   }
		   $count_query = mysqli_query($con,"select * from students");
		   $row = mysqli_num_rows($count_query);
		   $query = mysqli_query($con,"select * from students limit $from , $to");
		   
		   $all   = mysqli_fetch_all($query);
		   
		   $srno = 0;
		   foreach($all as $val)
		   {
			?>
			  <tr>
				 <td><?php echo ++$srno; ?></td>
				 <td> <?php echo $val[2]; ?> </td>
				 <td> <?php echo $val[3]; ?> </td>
				 <td> <?php echo $val[4]; ?> </td>
			 </tr>
			<?php
		   }
		 ?>
		 <tr>
		    <td colspan="4">
			    <?php
				  $page = 1;
				  for($i=0; $i<$row; $i+=5)
				  { 
				   ?>
                      <a href="pagination.php?from=<?php echo $i; ?>&to=5" > <?php echo $page; ?> </a>				   
				   <?php
				   $page ++;
				  }
				?>
			</td>
		 </tr>
	</table>

</body>
</html>
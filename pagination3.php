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
		    if(isset($_GET['page']))
			{
				$page =$_GET['page'];
				$start = $page == 1 ? 0 : $page;
				$actual_start = $start * 10;
					   $to    =10;
			}
			else
			{
				$actual_start = 0;
					   $to    =10;
			}
		   $count_query = mysqli_query($con,"select * from students");
		   $no_of_pages = mysqli_num_rows($count_query) / 10;
		   $query = mysqli_query($con,"select * from students limit $actual_start , $to");
		   
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
			    <a href="">Previous</a>
			    <?php 
			   	    for($page =1; $page <$no_of_pages; $page++)
					{
                     ?>
					   <a href="pagination3.php?page=<?php echo $page; ?>" > <?php echo $page; ?> </a>	
					 <?php
					}
				?>
				<a href="">Next</a>
			</td>
		 </tr>
	</table>

</body>
</html>
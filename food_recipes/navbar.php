<?php
include('classes.php');
  $dbh=new search();
   if(isset($_GET['submit']))
   {
   	$name=$_GET['text'];
    $api_data=$dbh->food($name);  
   }
  
   
   	 $data=$api_data['hits'][0]['recipe'];
   
  
   // echo "<pre>";
   // print_r($data);
   // echo "</pre>";
?>
<!DOCTYPE html>
<html>
<head>
	<title>navbar</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light shadow p-3 mb-5 bg-body rounded">
		<div class="container-fluid">
			<a class="navbar-brand" href="#">Navbar</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">

				<form class="d-flex" method ="get">
					<input class="form-control me-2 " type="search" name="text" placeholder="Search" aria-label="Search">
					<input type="submit" class="btn btn-outline-success" name="submit">
				</form>
			</div>
		</div>
	</nav>
	<article>

		<div class="card shadow-sm p-3 mb-5 bg-body rounded" style="width: 1300px; margin: auto;">
				<div class="card-body" style=" margin: auto;">
				<h3 class="card-title">
					  <?php if($data){
					   $data=$api_data['hits'][0]['recipe']['label'];
					   print_r($data);
				     }?>
				  <h3>
			</div>
			<img src="<?php echo $api_data['hits'][0]['recipe']['image']?>" style="width: 1000px; height: 500px; margin :auto;"class="card-img-top" alt="...">
		
			<div style="margin-top: 10px;">
			   <?php if($data){
					   $data=$api_data['hits'][0]['recipe']['ingredientLines'];
					   $cdata=count($data);
					   for($i=0;$i<$cdata;$i++)
					   {
					   	?>
					   	<ul>
					   	<li class="list-group-item"><?php echo $api_data['hits'][0]['recipe']['ingredientLines'][$i] ?></li>
					   </ul>
					   	<?php
					   }
				     }?>

			</div>
			<div class="card-body">
				<a href="description" class="card-link">More Information..</a>
			</div>
		</div>
	</article>
</body>
</html>
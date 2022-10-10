
<?php
if(isset($_GET['submit']))
{
	$city=$_GET['city'];
	$url='https://api.openweathermap.org/data/2.5/weather?q='.$city.'&appid=8b9a02f68d5caa777b5636f9009d37e5';
	$ch=curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
	$result=curl_exec($ch);
	$data=json_decode($result,true);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>weather</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
	<section class="vh-100">
		<div class="container py-5 h-100">

			<div class="row d-flex justify-content-center align-items-center h-100">
				<div class="col-md-8 col-lg-6 col-xl-4">

					<h2 class="mb-4 pb-2 fw-normal">Check the weather forecast</h2>


					<form>

						<div class="mb-3">
							<label for="exampleInputPassword1" class="form-label">Please search city </label>
							<input type="text" name='city'class="form-control" id="exampleInputPassword1">
						</div>
						<button type="submit" name='submit' class="btn btn-primary">Submit</button>

					</form>
					<div class="card shadow-0 border">
						<div class="card-body p-4">

							<h4 class="mb-1 sfw-normal"><?php echo $data['name']?>,IN</h4>
							<h5><?php $dt = new DateTime(); echo $dt->format('Y-m-d H:i:s');?></h5>
							<p class="mb-2">Current temperature: <strong><?php echo  $data['main']['feels_like']-273?>°C</strong></p>
							<p>Feels like: <strong>4.37°C</strong></p>
							<p>Max: <strong><?php echo  $data['main']['temp_min']-273?>°C</strong>, Min: <strong><?php echo  $data['main']['temp_max']-273?>°C</strong></p>

						 <div class="d-flex flex-row align-items-center">
						<p class="mb-0 me-4">Scattered Clouds : <strong><?php echo  $data['weather'][0]['description']?></strong></p>
						<i class="fa-duotone fa-smog" ></i>
						</div>

</div>
</div>

</div>
</div>

</div>
</section>
</body> 
</html>



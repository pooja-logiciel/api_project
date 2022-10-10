<?php

$curl_handle=curl_init();
curl_setopt($curl_handle, CURLOPT_URL,'https://newsapi.org/v2/top-headlines?country=us&category=business&apiKey=f53ad4d6e0e543b4af058cc297376a22');
curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Your application name');
$query = curl_exec($curl_handle);
$data=json_decode($query,true);
curl_close($curl_handle);
?>
<!DOCTYPE html>
<html>
<head>
	<title>news</title>

</head>
<body>
	<h1 style="text-align: center;"> foreign News</h1>
	<table class="table" width="1033px" align="center">
		<?php
		$i=0;
		foreach($data['articles'] as $values)
		{  
			$author= $data['articles'][$i]['author'];
			$title= $data['articles'][$i]['title'];
			$urlToImage= $data['articles'][$i]['urlToImage'];
			$description= $data['articles'][$i]['description'];
			$publishedAt=$data['articles'][$i]['publishedAt'];
			$content =$data['articles'][$i]['content'];
			$url =$data['articles'][$i]['url'];
			?>
	
				<tr style="background-color: #e6e8f0;">
					<td><img src="<?php echo $urlToImage?>" style="width:200px; height: 200px;"></td>
					<td>
						<div style="padding: 10px;">
						<p><?php echo$author?></p>
						<p><?php echo$title?></p>
						<p><?php echo$description?></p>
						<p><?php echo$publishedAt?></p>
						<p><?php echo $content?></p>
					    <p><a href="<?php  echo $url ?>">Read more description</a></p>
					</div>
					</td>
					
				</tr>
		
			<?php
			$i++;
		}
		?>

	</table>
</body>
</html>
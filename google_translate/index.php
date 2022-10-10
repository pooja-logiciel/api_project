<?php
if(isset($_POST['submit']))
{
    if($_POST['too'])
    {
        $text=$_POST['text'];
        $lang=$_POST['too'];

        print_r($text);
        print_r($lang);

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://google-translate1.p.rapidapi.com/language/translate/v2",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "q=$text&target=$lang",
            CURLOPT_HTTPHEADER => [
                "Accept-Encoding: application/gzip",
                "X-RapidAPI-Host: google-translate1.p.rapidapi.com",
                "X-RapidAPI-Key: 0368e94e0bmshe49796910b6cbd5p1ca0e3jsne6a32c2891ec",
                "content-type: application/x-www-form-urlencoded"
            ],

        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $result=json_decode($response,true);
        $store=$result['data']['translations'][0] ['translatedText'];
        print_r($store);


    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>form</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="inner">

        <form  method="post">
            <h2>Google translation</h2>
            <div class="mb-3">
                <label  class="form-label"><h5>write something</h5></label>
                <input type="text" name="text"class="form-control" >

            </div>
            <div class="mb-3 ">

                <label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
                <select style="width:500px; border-color: grey; height: 30px;" name="too" class="select">
                    <option value="">Choose a Language </option>
                    <option value="ar">Arabic</option>
                    <option value="bn">Bengali</option>
                    <option value="de">German</option>
                    <option value="es">Spanish</option>
                    <option value="en">English</option>
                    <option value="fr">French</option>
                    <option value="hi">Hindi</option>
                    <option value="it">Italian</option>
                    <option value="ja">Japanese</option>
                    <option value="ko">Korean</option>
                    <option value="mr">Marathi</option>
                    <option value="pa">Punjabi</option>
                    <option value="ru">Russian</option>
                    <option value="ta">Tamil</option>
                    <option value="te">Telugu</option>
                    <option value="uk">Ukrainian</option>
                    <option value="tr">Turkish</option>
                </select>
                <div  class="form-text">please select the language</div>
            </div>
            <input type="submit" class="btn btn-primary" name="submit">

            <?php 
            if(!empty($store))
            {
                echo'<div class="alert alert-primary alert" role="alert">'.$store.'</div>';
            }


            ?>

        </form>

    </div>
</body>
</html>
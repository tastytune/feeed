<html lang="en">
<?php
   if (isset($_GET["q"]))
    {
      $term = htmlspecialchars($_GET["q"]);
    }
    else
    {
     $term = "";
    }
     if (isset($_GET["count"]))
      {
        $count = htmlspecialchars($_GET["count"]);
      }
      else
      {
        $count= 10;
      }
      if (isset($_GET["offset"]))
      {
        $offset = htmlspecialchars($_GET["offset"]);
        if ($offset < 0) $offset = 0;
        if ($offset > 10000) $offset = 10000;
        if ($offset%10 != 0) $offset = 0;
      }
      else{
        $offset = 0;

      }
      if (isset($_GET["images"]))
      {
        $images = htmlspecialchars($_GET["images"]);
      }
      else{
        $images = 0;

      }






    //  echo $jsonobj->webPages->webSearchUrl;
?>
<head>
  <meta charset="utf-8">
  <title>Feeeed</title>
  <meta name="description" content="Search Engine that shares the 80% of the income in feeding the infancy">
  <meta name="author" content="Friendas and Enthusiast of emerging eco economies Development ">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="apple-touch-icon" sizes="57x57" href="img/favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="img/favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="img/favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="img/favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="img/favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="img/favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="img/favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="img/favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="img/favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="img/favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
<link rel="manifest" href="img/favicon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="img/favicon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

  <link rel="search" type="application/opensearchdescription+xml" title="feeeed.org" href="http://www.feeeed.org/opensearch.xml">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js" integrity="sha384-pjaaA8dDz/5BgdFUPX6M/9SUZv4d12SUPF0axWc+VRZkx5xU3daN+lYb49+Ax+Tl" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="styles/styles.css">

</head>

<body>
  <div class="container-fluid">

 <!-- <a href="javascript:if(typeof(window.external)=='object'){try{window.external.AddSearchProvider('http://www.feeeed.org/opensearch.xml');}catch(e){alert('Your%20browser%20does%20not%20support%20OpenSearch%21');}};void(0);">Install feeeed.org Search Plugin</a>-->
         
        <div class="device_header">
                  <div class="flex" id="logo">
                    <a href="index.php"><img src="img/feeeed.svg"></a>
                  </div>
       

    
        <div class="flex justify-content-center search_xs">
            <form action="index.php">
                <div class="input-group input-group-lg">
                        <? if ($term== '') {
                        echo '<input class="form-control" id="miBusqueda" name="q" type="text" placeholder="search the web to fight the hunger" aria-label="Search">';
                      }
                      else {
                        echo '<input class="form-control" id="miBusqueda" name="q" type="text" placeholder="'.$term.'" aria-label="Search">';
                      }
                    ?>
                        <div class="input-group-append">
                            <button type="submit" class="btn" id="search"> <img class="search" src="img/icon_search.svg"></button>

                        </div>

                </div>
           </form>
        </div>
  </div>

   <?

   if ($term != '')
   {
   // NOTE: Be sure to uncomment the following line in your php.ini file.
   // ;extension=php_openssl.dll

   // **********************************************
   // *** Update or verify the following values. ***
   // **********************************************

   // Replace the accessKey string value with your valid access key.
      $accessKey = '071eace0a1174e259ce82389fd42c14c';

   // Verify the endpoint URI.  At this writing, only one endpoint is used for Bing
   // search APIs.  In the future, regional endpoints may be available.  If you
   // encounter unexpected authorization errors, double-check this value against
   // the endpoint for your Bing Web search instance in your Azure dashboard.
   $endpoint = 'https://api.cognitive.microsoft.com/bing/v7.0/search';
   //$endpoint1 = 'https://api.cognitive.microsoft.com/bing/v7.0/images/search';
   //$endpoint = 'https://api.cognitive.microsoft.com/bing/v7.0/images/search';
   //$endpoint = 'https://api.cognitive.microsoft.com/bing/v7.0/images/search';


   //$term ="apple";

   function BingWebSearch ($url, $key, $query,$count,$offset) {
       // Prepare HTTP request
       // NOTE: Use the key 'http' even if you are making an HTTPS request. See:
       // http://php.net/manual/en/function.stream-context-create.php
       $headers = "Ocp-Apim-Subscription-Key: $key\r\n";
       $options = array ('http' => array (
                             'header' => $headers,
                              'method' => 'GET'));

       // Perform the Web request and get the JSON response
       $context = stream_context_create($options);


       $result = file_get_contents($url . "?q=" . urlencode($query)."&count=".$count."&offset=".$offset, false, $context);

       // Extract Bing HTTP headers
       $headers = array();
       foreach ($http_response_header as $k => $v) {
           $h = explode(":", $v, 2);
           if (isset($h[1]))
               if (preg_match("/^BingAPIs-/", $h[0]) || preg_match("/^X-MSEdge-/", $h[0]))
                   $headers[trim($h[0])] = trim($h[1]);
       }

       return array($headers, $result);
   }

   if (strlen($accessKey) == 32) {






       list($headers, $json) = BingWebSearch($endpoint, $accessKey, $term,$count,$offset);

     /*  print "\nRelevant Headers:\n\n";
       foreach ($headers as $k => $v) {
           print $k . ": " . $v . "\n";
       }
     */

       //echo  json_encode(json_decode($json), JSON_PRETTY_PRINT);
       //echo('<ul ID="resultList">');
       $jsonobj = json_decode($json);
    //   print '<pre>';
    //print_r($jsonobj);
    //print '</pre>';
    }
   ?>

   <div class="row justify-center">
       
         <div class="col-sm-6 number_served">
             <? if ($term != "")

               {
           echo '<div class="alert alert-primary" role="alert">Searching the web for: '
           . $term .'</div>';
           echo '<span class="float-right"><span class="badge badge-pill badge-dark">'.$jsonobj->webPages->totalEstimatedMatches.'</span> Web served</span>';

           echo '<span class="float-light">Page: <span class="badge badge-pill">'.($offset/10+1).'</span></span>';
         }

         ?>

         </div>
     
    </div>
    <?
    if( $term != "")

      {
    echo '<div class="row justify-center">';
    
      echo'<div>';
      echo'   <ul class="nav justify-content-center">
    <li class="nav-item">
      <a class="nav-link active" href="#">web</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" href="images.php?q='.$term.'">images</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" href="videos.php?q='.$term.'">video</a>
    </li>
    </ul>';
      echo '</div>';
       
    echo '</div>';
  }
    ?>

    <?
    if( $term != "")

      {

    echo '<div class="row justify-center">';
       
            echo'<div>';
            echo '<ul class="nav justify-content-center">';

            echo '<li class="nav-item">';
            echo '<a class="nav-link" href="index.php?q='.$term.'&offset=';
            if (($offset) != 0) {echo ($offset-10);} else {echo ($offset);}
            echo '"><span class="fas fa-arrow-alt-circle-left"><span/></a>';
            echo '</li>';
            $lastpage = $jsonobj->webPages->totalEstimatedMatches;
            if ($offset >= $lastpage)
            {


              $offset = $lastpage-10;
              $offset = $offset /10;
              $offset = round($offset);
              $offset = $offset * 10;
            }

            $start = $offset/10;
            if ($offset <100)
            {
            for( $i = 0;$i<(10);$i=$i+1)
            {
              echo '<li class="nav-item">';
              $salto = $i * 10;
              $page = $i;
              echo '<a class="nav-link ';
              if (($start) != $i) echo 'disabled';
              echo '" href="index.php?q='.$term.'&offset='.$salto.'">'.($salto/10+1).'</a>';
              echo '</li>';

            }
           }
           else {
             for( $i = $start-5;$i<(5+$start);$i=$i+1)
             {
               echo '<li class="nav-item">';
               $salto = $i * 10;
               $page = $i;
               echo '<a class="nav-link ';
              if (($start) != $i) echo 'disabled';
               echo '" href="index.php?q='.$term.'&offset='.$salto.'">'.($salto/10+1).'</a>';
               echo '</li>';

             }
           }
            echo '<li class="nav-item">';

            echo '<a class="nav-link" href="index.php?q='.$term.'&offset='.($offset+10).'"><span class="fas fa-arrow-alt-circle-right"><span/></a>';
            echo '</li>';

            //$lastpage = $jsonobj->webPages->totalEstimatedMatches - 10;

            echo '</li>';
            echo'
              </ul>';
            echo '</div>';
        
    echo '</div>';
  }
    ?>
<div class="row">

  <div class="col-lg-12">

 <?

  if( $term != "")

    {
        echo '<ul class="list-group" style="border: none">';


           foreach($jsonobj->webPages->value as $contenido)
            {


                echo '<li class="list-group-item" style="border: none">';
                echo '<a href="';
                print_r($contenido->url);
                echo '">';
                print_r($contenido->name);

               
                echo '<p class="text-success">';
                print_r($contenido->url);
                echo '</a></p>';
             
                echo '<p class="">';
                print_r($contenido->snippet);
                echo '</a></p>';
                echo '</li>';


            }
            echo '</ul>';
    echo '</div>';

    echo '</div>';

  echo '<div class="row">
         <div class="col-sm-4">

         </div>
         <div class="col-sm-4">

         </div>
         <div class="col-sm-4">
           <a href="index.php"><img style="width:100%" class="logo" src="img/back.png"></img></a>
         </div>

         </div>
  <style>
   #logo{width: 21vw;}
   #logo img {width: 20vw;padding: 0vw;}
   .container-fluid {margin-top: 1vh;}
.justify-center {display: flex;justify-content: center;}
.device_header {flex-flow:row; display:flex; justify-content: flex-start;align-items: center;}
.number_served {display:none;}
@media only screen and (max-device-width:600px) {
.search_xs {width:68vw;}}



  </style>
';


   echo '</div>';  // End of container-fluid
 }
}



?>












</body>
</html>

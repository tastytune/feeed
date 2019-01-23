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
        $count= 20;
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
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js" integrity="sha384-pjaaA8dDz/5BgdFUPX6M/9SUZv4d12SUPF0axWc+VRZkx5xU3daN+lYb49+Ax+Tl" crossorigin="anonymous"></script>
</head>

<body>
  <div class="container-fluid" style="margin-top:5%;">
          <div class="row">
                  <div class="col-sm-4">

                  </div>
                  <div class="col-sm-4">
                    <a href="index.php"><img style="width:100%" class="logo" src="img/feeeed.svg"></img></a>
                  </div>
                  <div class="col-sm-4">

                  </div>
          </div>
  <div class="row">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-6">
            <form action="images.php">
                <div class="input-group input-group-lg">
                        <? if ($term== '') {
                        echo '<input class="form-control" id="miBusqueda" name="q" type="text" placeholder="Search the web while fixxing global issues" aria-label="Search">';
                      }
                      else {
                        echo '<input class="form-control" id="miBusqueda" name="q" type="text" placeholder="'.$term.'" aria-label="Search">';
                      }
                    ?>
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-outline-primary">Feeeed</button>

                        </div>

                </div>
           </form>
        </div>
        <div class="col-sm-3">
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
  // $endpoint = 'https://api.cognitive.microsoft.com/bing/v7.0/search';
   $endpoint = 'https://api.cognitive.microsoft.com/bing/v7.0/videos/search';
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


   ?>

   <div class="row">
         <div class="col-sm-3">
         </div>
         <div class="col-sm-6">
             <? if ($term != "")

               {
           echo '<div class="alert alert-primary" role="alert">Searching the web for: '
           . $term .'</div>';
           echo '<span class="float-right"><span class="badge badge-pill badge-dark">'.$jsonobj->totalEstimatedMatches.'</span> Web served</span>';

           echo '<span class="float-light">Page: <span class="badge badge-pill">'.($offset/10+1).'</span></span>';
         }

         ?>

         </div>
         <div class="col-sm-3">
         </div>
    </div>
    <?
    if( $term != "")

      {
    echo '<div class="row">';
    echo'<div class="col-sm-4">
    </div>';
      echo'<div class="col-sm-4">';
      echo'   <ul class="nav justify-content-center">
    <li class="nav-item">
      <a class="nav-link disabled" href="index.php?q='.$term.'">web</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" href="images.php?q='.$term.'">images</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">video</a>
    </li>
    </ul>';
      echo '</div>';
        echo'<div class="col-sm-4">
        </div>';
    echo '</div>';
  }
    ?>
    <?
    if( $term != "")

      {

    echo '<div class="row">';
          echo'<div class="col-sm-4">
          </div>';
            echo'<div class="col-sm-4">';
            echo '<ul class="nav justify-content-center">';

            echo '<li class="nav-item">';
            echo '<a class="nav-link" href="index.php?q='.$term.'&offset=';
            if (($offset) != 0) {echo ($offset-10);} else {echo ($offset);}
            echo '"><span class="fas fa-arrow-alt-circle-left"><span/></a>';
            echo '</li>';
            $lastpage = $jsonobj->totalEstimatedMatches;
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
              echo '" href="videos.php?q='.$term.'&offset='.$salto.'">'.($salto/10+1).'</a>';
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
               echo '" href="videos.php?q='.$term.'&offset='.$salto.'">'.($salto/10+1).'</a>';
               echo '</li>';

             }
           }
            echo '<li class="nav-item">';

            echo '<a class="nav-link" href="videos.php?q='.$term.'&offset='.($offset+10).'"><span class="fas fa-arrow-alt-circle-right"><span/></a>';
            echo '</li>';

            //$lastpage = $jsonobj->webPages->totalEstimatedMatches - 10;

            echo '</li>';
            echo'
              </ul>';
            echo '</div>';
            echo'<div class="col-sm-4">
            </div>';
    echo '</div>';
  }
    ?>
<div class="row">
  <div class="col-sm-3">
  </div>
  <div class="col-sm-6">

 <?

  if( $term != "")

    {

        echo '<table class="table table-borderless">';
        echo  '<tbody>';




      $cont = 1;


          foreach($jsonobj->value as $contenido)
          {
            if ($cont ==1) {echo '<tr>';}


          echo '<td>';
          echo '<a href="';

          print_r($contenido->hostPageUrl);
          echo '">';
          echo '<img width="150" height="auto" src="';
          print_r($contenido->thumbnailUrl);
          echo '"></img>';
          echo '</a>';
          echo '</td>';



          if ($cont%5 == 0) echo '</tr>';
            if ($cont%5 == 0) echo '<tr>';
          $cont = $cont +1;
         }
         echo '  </tbody>


         </table>';


      /*     foreach($jsonobj->value as $contenido)
            {


                echo '<li class="list-group-item" style="border: none">';
                echo '<img src="';
                print_r($contenido->thumbnailUrl);
                echo '">';
                echo '</img>';




                echo '</li>';


            }
            echo '</ul>'; */
    echo '</div>';
    echo '<div class="col-sm-3">';

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

         </div>';


   echo '</div>';  // End of container-fluid
 }
}

}

?>













</body>
</html>

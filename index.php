<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">

    <title>Feeeed</title>
    <meta name="description" content="Search Engine that shares the 80% of the income in feeding the infancy">
    <meta name="author" content="Friendas and Enthusiast of emerging eco economies Development ">

    <link rel="stylesheet" href="css/styles.css">
    <script src="js/scripts.js"></script>
</head>

<body>
    <div class="flex justify_center column">
        <img class="logo" src="img/feeeed.svg">
        <div class="flex justify_center row">
            <form action="index.php">
                <input type="search" id="miBusqueda" name="q" placeholder="Search the web while fixxing global issues">
                <button>Feeeed</button>
            </form>

        </div>
    </div>


      <?php

      // NOTE: Be sure to uncomment the following line in your php.ini file.
      // ;extension=php_openssl.dll

      // **********************************************
      // *** Update or verify the following values. ***
      // **********************************************

      // Replace the accessKey string value with your valid access key.
      $accessKey = '71019bc107254a84bd103129d6d138d6';

      // Verify the endpoint URI.  At this writing, only one endpoint is used for Bing
      // search APIs.  In the future, regional endpoints may be available.  If you
      // encounter unexpected authorization errors, double-check this value against
      // the endpoint for your Bing Web search instance in your Azure dashboard.
      $endpoint = 'https://api.cognitive.microsoft.com/bing/v7.0/search';

      //$endpoint = 'https://api.cognitive.microsoft.com/bing/v7.0/images/search';

      $term = htmlspecialchars($_GET["q"]);

      if ($term=="")
          $term = "falcon";
      //$term ="apple";

      function BingWebSearch ($url, $key, $query) {
          // Prepare HTTP request
          // NOTE: Use the key 'http' even if you are making an HTTPS request. See:
          // http://php.net/manual/en/function.stream-context-create.php
          $headers = "Ocp-Apim-Subscription-Key: $key\r\n";
          $options = array ('http' => array (
                                'header' => $headers,
                                 'method' => 'GET'));

          // Perform the Web request and get the JSON response
          $context = stream_context_create($options);
          $result = file_get_contents($url . "?q=" . urlencode($query), false, $context);

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

          print "Searching the Web for: " . $term . "\n";

          list($headers, $json) = BingWebSearch($endpoint, $accessKey, $term);

        /*  print "\nRelevant Headers:\n\n";
          foreach ($headers as $k => $v) {
              print $k . ": " . $v . "\n";
          }
        */
          print "<p>JSON Response:</p>";
          //echo  json_encode(json_decode($json), JSON_PRETTY_PRINT);
          //echo('<ul ID="resultList">');
          $jsonobj = json_decode($json);
        //  echo $jsonobj->webPages->webSearchUrl;
        echo "<div class='flex row'>";    
            echo "<div class='flex column response'>";  
         foreach($jsonobj->webPages->value as $contenido)
          {
            
                echo "<p class='flex justify_left column'>";   
                    echo '<a href="';
                    print_r($contenido->url);
                    echo '">';
                    print_r($contenido->name);
                    echo '</a>';
                        echo '</br>';
                    echo '<small><a href="';
                    print_r($contenido->url);
                    echo '">';
                    print_r($contenido->url);
                    echo '</a></small>';
                
                    echo"</label>";
                    print_r($contenido->searchTags);
                    echo "</label>";
                echo "</p>";
           
          
          //  echo '<img src="'.print_r($contenido->thumbnailUrl).'"></img>';
            
            



          }
          echo "</div>";
          echo "<div class='flex row wrap'>"; 
          foreach($jsonobj->images->value as $contenido)
          {
          
          echo '<img  src="';
          print_r($contenido->thumbnailUrl);
          echo '"></img>';
          
          }
          echo "</div>";  

          echo "</div>";
        /*
          foreach($jsonobj->webPages->value as $value)

                  {
                    echo $value;
                    echo "<p>enlace</p>";
                  //  echo('<li class="resultlistitem"><p>'.$value2->name.'</p></br><a href="' . $value2->url . '">');

                  //  echo('<img src="' . $value->Thumbnail->Url. '"></li>');
                  }

                      */


          //echo("</ul>");

        //  var_dump($jsonobj);
          /*
            foreach($jsonobj as $contenido)
            {
              print_r($contenido);
            }*/
      } else {

          print("Invalid Bing Search API subscription key!\n");
          print("Please paste yours into the source code.\n");

      }
      ?>

    </div>
</body>
</html>

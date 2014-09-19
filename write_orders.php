
    <?php  
    

    $name = $_POST['name'];
    $drink = $_POST['drink'];
    

    $filename = "C:/Program Files/Apache Software Foundation/Apache2.2/htdocs/orders";

    $file = fopen( $filename, "r" );

    $filesize = filesize( $filename );

    $filetext = fread( $file, $filesize );

    fclose( $filename);

    $jsonArray = json_decode($filetext);

    $lastId = 0;

    foreach ($jsonArray as $key => $value) {

       $lastId = $key;    
    } 
   
    $lastId++;
    $lastId++;

    $jsonNew = array( "id" => $lastId, "name" => $name , "drink" => $drink);

    array_push( $jsonArray, $jsonNew);

    $fout =  json_encode($jsonArray);


    $newfilename = "C:/Program Files/Apache Software Foundation/Apache2.2/htdocs/orders";

    $newfile = fopen( $newfilename , "w" );

    fwrite( $newfile, $fout );



    ///////// return new order

    $ret = json_encode(array( "id" => $lastId, "name" => $name , "drink" => $drink));

    echo $ret;


   ?> 

    <?php  


    $orderId = $_POST['orderId']  - 1;
    $orderName = $_POST['name'];
    $orderDrink = $_POST['drink'];

    
    //echo $_POST['drink'];


    ////// read the existing order file

    $filename = "C:/Program Files/Apache Software Foundation/Apache2.2/htdocs/orders";

    $file = fopen( $filename, "r" );

    $filesize = filesize( $filename );

    $filetext = fread( $file, $filesize );

    fclose( $filename);



    ///////// write the orders file 
  

    $jsonArray = json_decode($filetext);

    $newIndex = 0;

    $jsonArrayNew = array();
    
     $isChangeOrder = 0;

    
    foreach ($jsonArray as $key => $value) {
       
       //echo "\nindex: $key\n";
       
       $newIndex++;       

       $currentName =  "";
       $currentDrink = "";

       if ($orderId === $key) {
  
           foreach ($value as $k => $val)      
           {
               //echo "   key: $k val: $val\n";
            
               if ($k === 'id') {
                  //echo "      ---> id: key: $k val: $val\n";
               }
            
               if ($k === 'name') {
                  //echo "      ---> name: key: $k val: $val\n";
                  $currentName = $orderName;
               }
            
               if ($k === 'drink') {
                  //echo "      ---> drink: key: $k val: $val\n";
                  $currentDrink  = $orderDrink; 
               }
            }

        } else {

           foreach ($value as $k => $val)      
           {
               //echo "   key: $k val: $val\n";
            
               if ($k === 'id') {
                  //echo "      ---> id: key: $k val: $val\n";
               }
            
               if ($k === 'name') {
                  //echo "      ---> name: key: $k val: $val\n";
                  $currentName = $val;
                  
               }
            
               if ($k === 'drink') {
                  //echo "      ---> drink: key: $k val: $val\n";
                  $currentDrink = $val;
               }
            }
        }
           
        $jsonNew = array( "id" => $newIndex, "name" => $currentName, "drink" => $currentDrink);
        array_push( $jsonArrayNew, $jsonNew);
        
    }


    $fout =  json_encode($jsonArrayNew);

    //echo  $fout;
    echo "Saved!";

    $newfilename = "C:/Program Files/Apache Software Foundation/Apache2.2/htdocs/orders";

    $newfile = fopen( $newfilename , "w" );
  
    ftruncate($newfile, 0);

    fwrite( $newfile, $fout );
    

   ?> 

    <?php  
    
    $filename = "C:/Program Files/Apache Software Foundation/Apache2.2/htdocs/orders";

    $file = fopen( $filename, "rw" );

    $filesize = filesize( $filename );
    $filetext = fread( $file, $filesize );


    echo $filetext;


   ?> 
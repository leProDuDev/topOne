<?php

/*
 * AutoLoad (ADD ALL .PHP for LeftingDev Framework)
 */

function allFile($dir, &$results = array()){
    
    $files = scandir($dir);

    foreach($files as $value){
        
        $path = realpath($dir.DIRECTORY_SEPARATOR.$value);
        
        if(!is_dir($path)) {
            
            $results[] = $path;
            
        } else if($value != "." && $value != "..") {
            
            AllFile($path, $results);
            $results[] = $path;
            
        }
        
    }

    return $results;
}

foreach(allFile(__DIR__)as $file) {

    if(pathinfo($file, PATHINFO_BASENAME) != pathinfo(__FILE__, PATHINFO_BASENAME)){

        if (pathinfo($file, PATHINFO_EXTENSION) == "php") {

            if (pathinfo($file, PATHINFO_FILENAME) != "start-class") {

                require $file;

            }

        }

    }

}

?>
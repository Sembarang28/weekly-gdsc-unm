<?php

//declare indexed array
$size = array("Big","Medium","Short");
$size = ["Big","Medium","Short"];

echo "Size: $size[0], $size[1] and $size[2] <br>";  

//using foreach loop with indexed array 
foreach( $size as $s )  
{  
    echo "Size is: $s <br>";  
}

//declare associative array
$salary = array ("Sonoo"=>"550000", 
    "Vimal"=>"250000", 
    "Ratan"=>"200000"
);

$salary = [
    "Sonoo"=>"550000", 
    "Vimal"=>"250000", 
    "Ratan"=>"200000"
];

//using foreach loop with associative array
foreach($salary as $k => $v) {  
    echo "Key: ".$k." Value: ".$v."<br/>";  
}  
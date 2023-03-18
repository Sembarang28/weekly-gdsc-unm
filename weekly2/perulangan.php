<?php

//for statement
for($i = 1; $i <= 10; $i++){    
    echo "Perulangan ke-$i <br>";    
}

//while statement
$i = 1;
while($i <= 10){
    echo "Perulangan ke-$i <br>";
    $i++;
}

//do while statement
do {    
    echo "Perulangan ke-$i <br>";    
    $i++;    
} while ($i <= 10);

//break
for($i = 1; $i <= 10; $i++){
    if($i === 5){
        break;
    }    
    echo "Perulangan ke-$i <br>";    
}

//continue
for($i = 1; $i <= 10; $i++){
    if($i === 5){
        continue;
    }    
    echo "Perulangan ke-$i <br>";    
}
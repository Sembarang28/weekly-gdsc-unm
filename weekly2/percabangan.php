<?php
$num = 12;

//if statement
if ($num < 100) {
    echo "$num is less than 100 <br>";
}

//if...else statement
if ($num % 2 == 0){  
    echo "$num is even number <br>";  
} else {  
    echo "$num is odd number <br>";  
}

//if..else..if statement
$marks=69;         
if ($marks>=90 && $marks<100) {    
    echo "A grade <br>";    
}    
else if ($marks>=80 && $marks<90) {    
    echo "B grade <br>";   
}    
else if ($marks>=65 && $marks<80) {    
    echo "C grade <br>";   
}    
else if ($marks>=50 && $marks<65) {    
    echo "D grade <br>";    
}  
else if ($marks<50) {    
    echo "E grade <br>";   
}  
else {    
    echo "Invalid input <br>";    
}

//Switch Statement
$num = 90;
switch($num){      
case 10:      
    echo("number is equals to 10 <br>");      
    break;      
case 20:      
    echo("number is equal to 20 <br>");      
    break;      
case 30:      
    echo("number is equal to 30 <br>");      
    break;      
default:      
    echo("number is not equal to 10, 20 or 30 <br>");      
}  
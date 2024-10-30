<?php

//arrays Numeric arrays allow us to store multiple values of d same data type in a single variable without having to 
//create seperate variables fr each value dis value can den be accessed using an index which in case of numeric arrays is a number

//xreatin an empty array
// $empty_array = array();

// //method 1 to create an array
// $my_array1 = ["apple", "banana", "mango", "peach"];

// //method 2 to create an array

// $my_array2[0] = "joe";
// $my_array2[1] = "jonas";
// $my_array2[2] = "nick";

// //displaying output 
// echo $my_array1[0] . "<br>";
// echo $my_array1[1] . "<br>";
// echo $my_array1[2] . "<br>";
// echo $my_array1[3] . "<br>";

// //length of an array can be counted using a built in function COUNT
//  echo COUNT($my_array1);

// '<br />';

// //loop tru d values of an array ussing fr loop
// $subject = ["C", "C#", "JAVA", "PHP", "Java", "C++", "Ruby"];

// for ($i=0; $i < count($subject); $i++){

//     echo $subject[$i].'<br />';

//     }

// //d eg finds d sum of a given array
// $sum = 0;
// $arr = [10, 20, 30, 40, 50];

// for ($i=0; $i < count($arr); $i++) { 
//     # code...
    
// }


// //associative array that use named keys tat u assign to dem

$age = ["Peter"=>"35", "Ben"=>"37", "Joe"=>"43"];

// echo "Peter is " .$age['Peter']. " years old"; 

// echo "Ben is " .$age['Ben']. " years old";

// echo "Joe is " .$age['Joe']. " years old";

foreach($age as $x => $xvalue){
    echo "Key=" . $x . ", Value=" . $xvalue;
    echo "<br>";
}




 ?>
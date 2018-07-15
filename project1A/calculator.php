<!DOCTYPE HTML> 
<html>
<head>
</head>
<body> 

<h1>Calculator</h1>
<p>CS143 Project1A.<br>
Type an expression in the following box (e.g., 10.5+20*3/25).</p>
<form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
   <input type="text" name="exp" value="" size=20 maxlength=20>
   <input type="submit" name="submit" value="Calculate">
   <input type="reset" /> 
</form>
<ul>
  <li>Only numbers and +,-,* and / operators are allowed in the expression. </li>
  <li>The evaluation follows the standard operator precedence.</li>
  <li>The calculator does not support parentheses.</li>
  <li>The calculator handles invalid input "gracefully". It does not output PHP error messages.</li>
</ul>  
<p> Here are some(but not limit to)reasonable test cases:</p >
<ol>
  <li>A basic arithmetic operation: 3+4*5 = 23</li>
  <li>An expression with floating point or negative sign: -3.2+2*4-1/3=4.466666667,3*-2.1*2=-12.6</li>
  <li>Some typos inside operation(e.g. alphabetic letter): Invalid Input Expression! </li>
</ol> 

<?php
$exp = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  $exp = test_input($_GET["exp"]);
  patternmatch($exp);
}
   
function patternmatch($expression) {
  $pattern_1 = "/\/0/";
  $pattern_2 = "/\/0\.0*[1-9]+/";
  $pattern_3 = "/^((-?([1-9]\d*|0))(\\.\\d+)?)([\+\-\*\/]((-?([1-9]\d*|0))(\\.\\d+)?))*$/";
  $result = "";
  if(empty($expression)){
      //check if the expression is empty
      $result = "Input is Empty!";
      echo $result;
      echo "<br>";
   } else if(preg_match($pattern_1, $expression) && !preg_match($pattern_2, $expression)) {
      //check if there is a zero division
      $result = "Error: Division by Zero!";
      echo "<h2>Result:</h2>";
      echo $result;
      echo "<br>";
   } else if(preg_match($pattern_3, $expression)) {
      //check if it is a leagal mathematical expression
      $expx = preg_replace("/-{2}/", "+", $expression); //replace "--" with "+", 
      $result = eval("return $expx;");
      echo "<h2>Result:</h2>";
      echo $expression,' = ',$result;
      echo "<br>";
   } else {
      $result = "Invalid Input!";
      echo "<h2>Result:</h2>";
      echo $result; 
      echo "<br>";
   }
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>

</body>
</html>
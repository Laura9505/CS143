<!DOCTYPE HTML> 
<html>
<head>
<style>
#header {background-color:yellow; color:black; text-align:center; padding:5px;}
#section {width:700px; float:left; padding:10px;}
#footer {background-color:white; color:white; clear:both; text-align:center; padding:5px;}
</style>
</head>

<body>

<div id="header"><h1 style="font-family:verdana">IMDb Movie Mining</h1></div>
<div id="section">
<p>CS143 Project1B<br>
Type an SQL query in the following box (e.g., SELECT * FROM Actor WHERE id < 20):</p>
<form method="get" action="query.php"> 
   <textarea name="query" value="" rows=10 cols=50></textarea>
   <input type="submit" name="submit" value="Submit">
   <input type="reset" />
</form>
</div>
<div id="footer"></div>


<?php

$query = "";
$result = "";
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // establish and check a connection
    $db = new mysqli('localhost', 'cs143', '', 'TEST');
    if ($db->connect_errno > 0) {
        die('Unable to connect to database [' . $db->connect_error . ']');
    } else {
    
    $query = $_GET["query"];

    if(empty($query)) {
      $result = "Input is Empty!";
      echo $result;
      echo "<br>";
    }else if(!($rs = $db->query($query))) {
        $errmsg = $db->error;
        print "Query failed: $errmsg <br />";
        exit(1);
    }else {
        // issuing queries
        $rs = $db->query($query);
        echo "<h2>Result:</h2>";
        echo $result;
        // retrieving results
        echo "<table>";
        while($row = $rs->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $col) {
                echo "<td>" . $col . "</td>";
            }
            echo "<tr>";
        }
        echo "</table>";
        }
    // close connection
    $db->close();
    }
}

?>


</body>
</html>
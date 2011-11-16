<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 

<html>

<head>
 <title>LAMP PHP Test</title>
 <meta http-equiv="Content-type" content="text/html;charset=UTF-8">
</head>
   
<body>

<?php

error_reporting(E_ALL);

include 'config/db.php';

mysql_connect($hostname_DB,$username_DB,$password_DB);
@mysql_select_db($database_DB) or die( "Unable to select database.");
$query = "SELECT * FROM `phptest`;";
$result = mysql_query($query);
$num = mysql_numrows($result);
$fields_num = mysql_num_fields($result);
mysql_close();

echo '<h1 style="text-align:center">';
echo "Database '$database_DB' on <em>$hostname_DB.</em></h1>";
echo "<p style=\"text-align:center\">Number of rows: $num.</p>";

echo "<table style=\"border-collapse:collapse;margin:auto;margin-bottom:1em\" border=\"1\">";
echo "<tr>";
// printing table headers
for($i=0; $i<$fields_num; $i++)
{
    $field = mysql_fetch_field($result);
    echo "<td>{$field->name}</td>";
}
echo "</tr>";
// printing table rows
while($row = mysql_fetch_row($result))
{
   echo "<tr>";
    // $row is array... foreach( .. ) puts every element
    // of $row to $cell variable
   foreach($row as $cell)
     echo "<td>$cell</td>";                           
   echo "</tr>\n";
  }
echo "</table>";
mysql_free_result($result);

echo '<p style="text-align:center"><a href="phpinfo.php">View PHP Info</a>.</p>';

?>

</body>  

</html>
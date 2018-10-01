<?php
include_once 'connect.php';
$sql = "SELECT name FROM test";
$res = mysqli_query($conn,$sql);
$opt = '<select name="users" onchange="showUser(this.value)"><option value="">Select a person:</option>';
while($row = mysqli_fetch_assoc($res)) 
{
  
    $opt .= "<option value='{$row['name']}'>{$row['name']}</option>\n";
}
$opt .= '</select>';
$sql1 = "SELECT * FROM test";
$res2 = mysqli_query($conn,$sql1);
$op = "<table>
<tr>
<th>Name</th>
<th>Phone number</th>
<th>E-Mail</th>
</tr>";
while($row = mysqli_fetch_array($res2))
{

   $f1 = $row[0];
    $f2 = $row[1];
    $f3 = $row[2];
     $op .="<tr>"."<td>" .$f1. "</td>"."<td>" .$f2. "</td>"."<td>" .$f3. "</td>"."</tr>";

}
$op .="</table>";
?>
<!DOCTYPE html>
<html>
<head>
  <style type="text/css">
  table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
}
  </style>
<script>
function showUser(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","getuser.php?q="+str,true);
  xmlhttp.send();
}
</script>
</head>
<body>
  <br><br><br>
<div align="center">
<form>
<?php echo $opt; ?>
</form>
<br><br><br>
</div>
<br>
<div class="container">
<div id="txtHint"><?php echo $op; ?></div>
</div>
</body>
</html>
<?php
//Step1
 $db = mysqli_connect('localhost','root','123','Inventory')
 or die('Error connecting to MySQL server.');
?>

<html>
 <head>Inventory Report Page : </head>
 <body>
<p></p>
<form method="post" action="">

<label >Please Select Warehouse Type</label>

<select name="warehouse">
<option value="W1">W1</option>
<option value="W2">W2</option>
<option value="ALL">ALL</option>
<?php
$warehouseType=$_POST["warehouse"];
?>
</select>

<button type="submit" name="query" >Submit</button>

<p></p>

 <table width="700" border="1">
 <tr>
   <td>Warehouse</td>
   <td>SP No</td>
   <td>On Hand</td>
 </tr>
<p></p>
<?php


//Step2
if($warehouseType != "ALL")
    $query = "SELECT ModelNo,sum(Quantity) As OnHand FROM FGTransaction where Warehouse = '$warehouseType' group by ModelNo";
else
    $query = "SELECT ModelNo,sum(Quantity) As OnHand FROM FGTransaction group by ModelNo"; 

$result = mysqli_query($db, $query);

if(isset($_POST['query'])){
for($i=1;$i<=mysqli_num_rows($result);$i++){
$rs=mysqli_fetch_row($result);
?>
  <tr>
    <td><?php echo $warehouseType?></td>
    <td><?php echo $rs[0]?></td>
    <td><?php echo $rs[1]?></td>
  </tr>
<?php
}
}
?>
</form>
</form>


</body>
</html>

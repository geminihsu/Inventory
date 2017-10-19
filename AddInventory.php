<?php
//Step1
 $db = mysqli_connect('localhost','root','123','Inventory')
 or die('Error connecting to MySQL server.');
?>

<html>
 <head>
 Inventory Entry Page : 
 </head>
 <body>
<p></p>
 <form id="form1" name="form1" method="post" action="">
 <p>Warehouse：
   <input name="warehouse" type="text"/>
 </p>
 <p>ModelNo:
 <input name="modelno" type="text"/>
</p>
<p>SN:
 <input name="sn" type="text"/>
</p>
<p>Quantity:
 <input name="quantity" type="text"/>
</p>
<form name="form" method="post">
<input type="submit" name="insert" value="Insert Item" /> 
</form></p>
</form>
<p></p>


<?php

if(isset($_POST['insert'])){
 $warehouse 	= $_POST['warehouse'];
 $modelno = $_POST['modelno'];
 $sn = $_POST['sn'];
 $quantity = $_POST['quantity'];
 
 $sql = "insert into FGTransaction (warehouse, modelno, sn, quantity) values ('".$warehouse."', '".$modelno."', '".$sn."', '".$quantity."')";
 
 
 $result = mysqli_query($db, $sql);
 if($result)
 {
     echo "Item has been saved successfully";
     //header("Location:Inventory.php");
 }else
     echo "Unable to insert item";
 
}
 ?>
</body>
</html>

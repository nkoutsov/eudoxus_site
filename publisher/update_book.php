<?php
include_once '../Config.php';
?>
<link href="../css/publisher.css" rel="stylesheet">
<link href="../css/app.css" rel="stylesheet">

<?php

$result=0;
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$query="SELECT * FROM suggrammata WHERE id='$id'";
	$res = mysqli_query($db,$query);
	$row= mysqli_fetch_array($res);
}
if(isset($_POST['newisbn'])){
	$newisbn= $_POST['newisbn'];
	$id=$_POST['id'];
	$query="UPDATE suggrammata SET isbn='$newisbn' WHERE id='$id'";
	$result = mysqli_query($db,$query);
}
if(isset($_POST['newtitle'])){
	$newtitle= $_POST['newtitle'];
	$id=$_POST['id'];
	$query="UPDATE suggrammata SET title='$newtitle' WHERE id='$id'";
	$result = mysqli_query($db,$query);
}
if(isset($_POST['newauthor'])){
	$newauthor=$_POST['newauthor'];
	$query="UPDATE suggrammata SET author='$newauthor' WHERE id='$id'";
	$result = mysqli_query($db,$query);
}
if(isset($_POST['newcategory'])){
	$newcategory=$_POST['newcategory'];
	$query="UPDATE suggrammata SET category='$newcategory' WHERE id='$id'";
	$result = mysqli_query($db,$query);
}
if(isset($_POST['newquantity'])){
	$newquantity=$_POST['newquantity'];
	$query="UPDATE suggrammata SET quantity='$newquantity' WHERE id='$id'";
	$result = mysqli_query($db,$query);
}
//echo "<meta http-equiv='refresh' content='0:url=publisher2.php'>";
if($result){
	header("refresh:0; url=publisher2.php");
}

?>
<div class="container_form" >
<form action="update_book.php" class="container_form" method="POST">
Τίτλος: <input type="text" name="newtitle" value="<?php echo $row[1]; ?>"></br>
ISBN: <input type="text" name="newisbn" value="<?php echo $row[2]; ?>"></br>
Συγγραφέας: <input type="text" name="newauthor" value="<?php echo $row[3]; ?>"></br>
Κατηγορία: <input type="text" name="newcategory" value="<?php echo $row[4]; ?>"></br>
Διαθέσιμα αντίτυπα: <input type="text" name="newquantity" value="<?php echo $row[5]; ?>"></br>
<input type="hidden" name="id" value="<?php echo $row[0]; ?>">


<input type="submit" value="Τροποποίηση">
</form>
</div>

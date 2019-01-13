<?php
include_once '../Config.php';
session_start();

if(!isset($_SESSION['login_user'])){
  echo "not set ";
  $_SESSION['prev_loc'] = '/eudoxus_site/publisher/publisher2.php';
  header("location: ../login.php");
}


$username = $_SESSION['login_user'] ;
$query = "SELECT * FROM users WHERE users.username='$username' and category='ekdotis';";
$result = mysqli_query($db,$query);
$resultCheck= mysqli_num_rows($result);
if ($resultCheck <= 0) {
  echo "Πρόσβαση μόνο σε εκδότες";
  header("location: ./error_page.php");
}
include('../partials/header.php');

?>

<link href="../css/publisher.css" rel="stylesheet">

<nav aria-label="breadcrumb">
  <ol class="breadcrumb container">
    <li class="breadcrumb-item"><a href="/eudoxus_site/landing.php">Αρχική</a></li>
    <li class="breadcrumb-item"><a href="publisher.php">Εκδότης</a></li>
    <li class="breadcrumb-item active" aria-current="page">Διαχείρηση Συγγραμμάτων</li>
  </ol>
</nav>




<div class="book_list">
  

  <?php
  $username = $_SESSION['login_user'] ;
  $query="SELECT books.title,books.isbn,books.author,books.category,suggramata_ekdoti.quantinty FROM users,suggramata_ekdoti,books WHERE users.username='$username' and suggramata_ekdoti.isbn=books.isbn and suggramata_ekdoti.username_ekdoti=users.username and users.category='ekdotis' ;"; /*anti gia ekdotis1 to kanoniko username*/
  $result = mysqli_query($db,$query);
  $resultCheck= mysqli_num_rows($result);

  if ($resultCheck > 0) {
    while($row= mysqli_fetch_assoc($result)){
    ?>
   	  <p class="book_container">
   	 <?php

      echo "Τίτλος:". $row['title']; echo "<br>"; 
      echo "ISBN:". $row['isbn']; echo "<br>";
      echo "Συγγραφέας:". $row['author']; echo "<br>";
      echo "Κατηγορία:". $row['category']; echo "<br>";
      echo "Διαθέσιμα Αντίτυπα:". $row['quantinty']; echo "<br>";
      echo "<a href=delete_book.php?isbn=".$row['isbn'].">Αφαίρεση</a>"; echo "<br>";
      echo "<a href=update_book.php?isbn=".$row['isbn'].">Αλλαγή στοιχείων</a>";
      ?>
      </p>
        <?php
      echo "<br>";
       ?>
 <?php
    }
  } 
 
  ?>

</div>


<a href="publisher.php" class="previous2">&#8678;Πίσω</a>
<a href="publisher3.php" class="publisher_add">Προσθήκη συγγράμματος</a>


<?php
   include('../partials/footer.html');
?>

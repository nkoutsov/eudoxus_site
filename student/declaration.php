<?php
    ob_start();
    include_once '../Config.php';
    session_start();
    if(!isset($_SESSION['login_user'])){
         echo "not set ";
         $_SESSION['prev_loc'] = '/eudoxus_site/student/declaration.php';
         header("location: ../login.php");
    }
    include_once('../partials/header.php');



    $username = $_SESSION['login_user'] ;
    $query = "SELECT * FROM users WHERE users.username='$username' and category='Foititis';";
    $result = mysqli_query($db,$query);
    $resultCheck= mysqli_num_rows($result);
    if ($resultCheck <= 0) {
      echo "Πρόσβαση μόνο σε φοιτητές";
      header("location: ./error_page2.php");
    }
    

?>

<link href="../css/student.css" rel="stylesheet">
<link href="../css/declaration.css" rel="stylesheet">





<nav aria-label="breadcrumb">
  <ol class="breadcrumb container">
    <li class="breadcrumb-item"><a href="/eudoxus_site/index.php">Αρχική</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="/eudoxus_site/student/student.php">Φοιτητής</a></li>
    <li class="breadcrumb-item active" aria-current="page">Δήλωση Συγγραμμάτων</li>
        
  </ol>
</nav>
<br>




<div class="container" id="uni">
    <h5> Σε ποιο πανεπιστήμιο ανήκετε; </h5>
    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Πανεπιστήμια
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
          <a class="badge " href="declaration2.php">
              <button class="dropdown-item" type="button">EKΠΑ</button>
          </a>
          <a class="badge " href="declaration2.php">
              <button class="dropdown-item" type="button">ΠΑΠΕΙ</button>
          </a>
          <a class="badge " href="declaration2.php">
              <button class="dropdown-item" type="button">ΑΣΣΟΕ</button>
          </a>
      </div>
    </div>
</div>



<div class="progress" style="height:20px; width:25%; margin-left:50%; ">
  <div class="progress-bar" style="width:25%;height:20px">25%</div>
</div>

<?php
include_once('../partials/footer.html');
?>

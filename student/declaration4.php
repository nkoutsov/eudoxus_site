<?php
session_start();
include_once('../Config.php');
include_once('../partials/header.php');
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


<?php

    if(!empty($_GET['vivlio'])) {
        $name = $_GET['vivlio'];
        $student = $_SESSION['login_user'];
        foreach ($name as $vivlio){
            $data   = preg_split('/\s+/', $vivlio);
            $isbn = $data[0];
            $mathima = substr($vivlio, 2, 100);
            $query="INSERT INTO dhlwseis(foititis,isbn,mathima) VALUES ('$student','$isbn','$mathima');";
            mysqli_query($db,$query);
        }

    }
    else {
        if (headers_sent()) {
            ?>
                <div id = "no_books_selected container" style="width :30%; margin-left:50%;color:red;">
                    <h5> Δεν επιλέξατε κανένα σύγγραμμα </h5>
                    <a class=" btn btn-secondary btn-lg" id="back_to_semester" style="float:center;" href="declaration2.php">
                        <i class="fas fa-long-arrow-alt-left"></i>
                        Πίσω στην Δήλωση
                    </a>
                </div>
            <?php
            die();
        }
    }

?>



<div class="container">
    <div class="jumbotron">
      <h1 class="display-4">Η ΔΗΛΩΣΗ ΣΑΣ ΟΛΟΚΛΗΡΩΘΗΚΕ
          <i class="fas fa-check"></i>
      </h1>
</div>
      <hr class="my-4">
      <p class="lead">
        <a class="btn btn-secondary btn-lg" href="student.php" role="button"><i class="fas fa-long-arrow-alt-left"></i>  Πίσω στον Φοιτητή</a>
      </p>
</div>




<?php
include_once('../partials/footer.html');
?>

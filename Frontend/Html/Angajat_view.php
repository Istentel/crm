<?php
    #GETTING USER DATA
    session_start();
    $fname = $_SESSION["nume"];
    $lname = $_SESSION["prenume"];
    $email = $_SESSION["email"];
    $account_type = $_SESSION["account_type"];

    $angajat_id = $_GET['id'];

    #GET DATA

    #Connect to the database
    require('../../Backend/functions.php');
    #Get angajat data
    $query_angajat = 'SELECT * FROM angajati WHERE id=' . $angajat_id;
    $angajat_data = Io::getData($query_angajat);

    #Get angajat acte
    $query_acte = 'SELECT * FROM acte WHERE id_angajat=' . $angajat_id;
    $acte_data = Io::getData($query_acte);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <title>Angajati</title>
    <link rel="stylesheet"  href="/crm/Frontend/css/Angajati_view.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/f7875d77c3.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script>
        $(document).ready(function(){
          $(".profile .icon_wrap").click(function(){
            $(this).parent().toggleClass("active");
            $(".notifications").removeClass("active");
          });
    
          $(".notifications .icon_wrap").click(function(){
            $(this).parent().toggleClass("active");
            $(".profile").removeClass("active");
          });
    
          $(".show_all .link").click(function(){
            $(".notifications").removeClass("active");
            $(".popup").show();
          });
    
          $(".close").click(function(){
            $(".popup").hide();
          });
        });
    </script>
</head>
<body>

    <!-- Sidebar START -->
    <?php include("../sidebar.html"); ?>
    <!-- Sidebar END -->

    <!-- CONTENT START -->
    <div class="home-section">
        <div class="home-content">
            <i class='bx bx-menu' ></i>
            <span class="text">Angajati</span>
        </div>

        <div class="back_button">
          <a href="/crm/Frontend/Html/Angajati.php" class= "btn btn-info pull left">Back</a>
        </div>

        <div class="edit_button">
          <a href="/crm/Frontend/Html/Angajat_edit.php?id=<?php echo $angajat_id ?>" class= "btn btn-info pull left">Edit</a>
        </div>

        <h1><?php echo $angajat_data[0]['nume'] . ' ' . $angajat_data[0]['prenume']; ?></h1>

        <div class="data-grid">
          <div class="data col1">
            Email: <span><?php echo $angajat_data[0]['email']; ?></span>
          </div>

          <div class="data col2">
            C.N.P: <span><?php echo $acte_data[0]['cnp']; ?></span>
          </div>

          <div class="data col1">
            Telefon: <span><?php echo $angajat_data[0]['telefon']; ?></span>
          </div>

          <div class="data col2">
            Seria: <span><?php echo $acte_data[0]['seria']; ?></span>
          </div>

          <div class="data col1">
            Salariu: <span><?php echo $angajat_data[0]['salariu']; ?></span>
          </div>

          <div class="data col2">
            Nr: <span><?php echo $acte_data[0]['nr']; ?></span>
          </div>

          <div class="data col1">
            Nivel: <span><?php echo $angajat_data[0]['nivel_angajat']; ?></span>
          </div>

          <div class="data col2">
            Sex: <span><?php echo $acte_data[0]['sex']; ?></span>
          </div>

          <div class="data col1">
            Valoare: <span><?php echo $angajat_data[0]['valoare_angajat']; ?></span>
          </div>

          <div class="data col2">
            Cetatenie: <span><?php echo $acte_data[0]['cetatenie']; ?></span>
          </div>

          <div class="data col1">
            Data angajare: <span><?php echo $angajat_data[0]['data_angajare']; ?></span>
          </div>

          <div class="data col2">
            Loc nastere: <span><?php echo $acte_data[0]['loc_nastere']; ?></span>
          </div>

          <div class="data col1">
            Departament: <span><?php echo $angajat_data[0]['departament']; ?></span>
          </div>

          <div class="data col2">
            Adresa: <span><?php echo $acte_data[0]['adresa']; ?></span>
          </div>

        </div>
    </div>
    <!-- CONTENT END -->

    <!-- Navbar START -->
    <?php include("../navbar.php"); ?>
    <!-- Navbar END --> 

    <script>
        let arrow = document.querySelectorAll(".arrow");
        for (var i = 0; i < arrow.length; i++) {
        arrow[i].addEventListener("click", (e)=>{
            let arrowParent = e.target.parentElement.parentElement;
            arrowParent.classList.toggle("showMenu");
            });
        }

        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".bx-menu");
        console.log(sidebarBtn);
        sidebarBtn.addEventListener("click", ()=>{
        sidebar.classList.toggle("close");
        });
    </script>
    
</body>
</html>
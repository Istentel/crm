<?php
    #GETTING USER DATA
    session_start();
    $fname = $_SESSION["nume"];
    $lname = $_SESSION["prenume"];
    $email = $_SESSION["email"];
    $account_type = $_SESSION["account_type"];

    #Connect to the database
    require('../../Backend/connect.php');

    #Get clients names
    #Define the querry
    $query_angajati = 'SELECT * FROM angajati';

    #Prepare statement to execute 
    #This creates a PDOStatement object
    $angajati_statement = $db->prepare($query_angajati);

    #Execute the query
    $angajati_statement->execute();

    #Return an array containing the query results
    $angajati_data = $angajati_statement->fetchAll();

    #Allow new sql statements to execute
    $angajati_statement->closeCursor();

    #COUNTER 
    $angajati_nr = 1;

    #GET DEPARTAMENT DATA
    $query_departament = 'SELECT * FROM departament';
    $departament_statement = $db->prepare($query_departament);
    $departament_statement->execute();
    $departamente = $departament_statement->fetchAll();
    $departament_statement->closeCursor();


  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Angajati</title>
    <link rel="stylesheet"  href="/crm/Frontend/css/Angajati.css">
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

    <div class="search-box">
      <input class="search-txt" type="text" name="" placeholder="Cautare...">
      <a class="search-btn" href="#">
        <i class="fas fa-search"></i>
      </a>
    </div>


    <div class="buttons">
          <a href="/crm/Frontend/Html/Angajat_nou.php" class="btn btn-info pull-left">Adauga angajat</a>
    </div> 

    <table class="content-table">
      <thead>
        <tr>
          <th>Nr</th>
          <th>Nume</th>
          <th>Email</th>
          <th>Telefon</th>
          <th>Activ</th>
          <th>Salariu</th>
          <th>Nivelul angajatului</th>
          <th>Valoare angajat</th>
          <th>Departament</th>
          <th>Data Angajare</th>
          <th>Edits</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($angajati_data as $data) :?>
          <tr class="active-row">
            <td><?php echo $angajati_nr++; ?></td>
            <td><a href="Angajat_view.php?id=<?php echo $data['id']; ?>"><?php echo $data['nume'] . " " . $data['prenume']; ?></a></td>
            <td><?php echo $data['email']; ?></td>
            <td><?php echo $data['telefon']; ?></td>
            <td>
              <div class="toggle">
                <input type="checkbox" id="toggleBtn" onclick="toggleBtn(<?php echo $data['id'] . ', ' . $data['activ']; ?>)" <?php if($data['activ']) echo 'checked';?>>
                <label for="" class="onbtn"></label>
                <label for="" class="ofbtn"></label>
              </div>
            </td>
            <td><?php echo $data['salariu']; ?></td>
            <td><?php echo $data['nivel_angajat']; ?></td>
            
            <td><?php echo $data['valoare_angajat']; ?></td>
            <td><?php echo $data['departament']; ?></td>
            <td><?php echo $data['data_angajare']; ?></td>
            <td> <div class="container"><a href="/crm/Frontend/Html/Angajat_edit.php?id=<?php echo $data['id']; ?>" class="ctn ctn1">Edit</a> </div></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
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

    function toggleBtn(id, activ){
      $.ajax({
        type: "POST",
        url:'../../Backend/angajati/changeActivStatus.php',
        data:{'id': id, 'activ': activ},
        success:function(){}
      });
    }

  </script>
</body>
</html>

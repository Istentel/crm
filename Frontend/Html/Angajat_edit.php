<?php
    session_start();
    $fname = $_SESSION["nume"];
    $lname = $_SESSION["prenume"];
    $email = $_SESSION["email"];
    $account_id = $_SESSION["account_type"];

    $id = $_GET['id'];

    if(!preg_match("/[0-9]{1,5}$/", $id)){
      die("Url invalid!");
    }

    #Connect to the database
    require('../../Backend/connect.php');

    #Get employee data
    #Define the querry
    $query_angajat = 'SELECT * FROM angajati WHERE id=:id';

    #Prepare statement to execute 
    #This creates a PDOStatement object
    $angajat_statement = $db->prepare($query_angajat);

    $angajat_statement->bindValue(":id", $id);

    #Execute the query
    $angajat_statement->execute();

    #Return an array containing the query results
    $angajat_data = $angajat_statement->fetchAll();

    #Allow new sql statements to execute
    $angajat_statement->closeCursor();

    #Get employee act
    $query_act = 'SELECT * FROM acte WHERE id_angajat=:id';
    $act_stm = $db->prepare($query_act);
    $act_stm->bindValue(":id", $id);
    $act_stm->execute();
    $act_data = $act_stm->fetchAll();
    $act_stm->closeCursor();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet"  href="/crm/Frontend/css/Angajat_edit.css">
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

  <!-- CONTENT START-->
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text">Agajat</span>
    </div>

    <div class="back_button">
      <a href="/crm/Frontend/Html/Angajati.php" class= "btn btn-info pull left">Back</a>
    </div>

    <div class="delete_button">
      <a href="/crm/Backend/angajati/delete_angajat.php?id=<?php echo $id ?>" class= "del btn btn-info pull left">Delete</a>
    </div>

    <div id="frm">
      <h1>Editare Angajat </h1>
      
      <form action="/crm/Backend/angajati/update_angajat.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="col-2">
          <label>
            Nume:
            <input type="text" id="nume" name="nume" value="<?php echo $angajat_data[0]['nume'] ?>" tabindex="1">
          </label>
        </div>
        <div class="col-2">
          <label>
            Prenume:
            <input type="text" id="prenume" name="prenume" value="<?php echo $angajat_data[0]['prenume'] ?>" tabindex="2">
          </label>
        </div>
        
        <div class="col-3">
          <label>
            Email:
            <input type="email" id="email" name="email" value="<?php echo $angajat_data[0]['email'] ?>" tabindex="3">
          </label>
        </div>
        <div class="col-3">
          <label>
            Numar de telefon:
            <input type="tel" id="telefon" name="telefon" value="<?php echo $angajat_data[0]['telefon'] ?>" tabindex="4">
          </label>
        </div>
        
        <div class="col-3">
          <label>
            Salariu:
            <input type="number" id="salariu" name="salariu" value="<?php echo $angajat_data[0]['salariu'] ?>" tabindex="5">
          </label>
        </div>

        <div class="col-4">
          <label>
            Valoare Agajat:
            <input type="number" id="valoare_angajat" name="valoare_angajat" value="<?php echo $angajat_data[0]['valoare_angajat'] ?>" tabindex="6">
          </label>
        </div>

        <div class="col-4">
          <label for="nivel"> Nivel: </label>
            
          <select name="nivel_angajat" id="nivel_angajat" tabindex="7">
            <option value="Experimentat"> Experimentat </option>
            <option value="Mediu"> Mediu </option>
            <option value="Incepator"> Incepator </option>
          </select>
        </div>

        <div class="col-4">
          <label for="departament"> Departament: </label>
            
          <select name="departament_angajat" id="departament_angajat" tabindex="8">
            <?php foreach($departamente as $departament) :  ?>
              <option value="<?php echo $departament[0]['id_departament'] ?>"> <?php echo $departament[0]['nume'] ?> </option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="col-4">
            <label>
              Data angajare:
              <input type="date" id="data" name="data" value="<?php echo $angajat_data[0]['data_angajare'] ?>" tabindex="9">
            </label>
        </div>



        <div class="col-2">
          <label>
            C.N.P:
            <input type="text" id="cnp" name="cnp" value="<?php echo $act_data[0]['cnp'] ?>" tabindex="10">
          </label>
        </div>

        <div class="col-2">
          <label>
            Seria:
            <input type="text" id="seria" name="seria" value="<?php echo $act_data[0]['seria'] ?>" tabindex="11">
          </label>
        </div>
        
        <div class="col-3">
          <label>
            N.R:
            <input type="text" id="nr" name="nr" value="<?php echo $act_data[0]['nr'] ?>" tabindex="12">
          </label>
        </div>

        <div class="col-3">
          <label> Sex: </label>
          <select name="sex" id="sex" tabindex="13">
            <option value="m"> Barbat </option>
            <option value="f"> Femeie </option>
          </select>
        </div>
        
        <div class="col-3">
          <label>
            Cetatenie:
            <input type="text" id="cetatenie" name="cetatenie" value="<?php echo $act_data[0]['cetatenie'] ?>" tabindex="14">
          </label>
        </div>

        <div class="col-4">
          <label>
            Loc Nastere:
            <input type="text" id="loc_nastere" name="loc_nastere" value="<?php echo $act_data[0]['loc_nastere'] ?>" tabindex="15">
          </label>
        </div>

        <div class="col-4">
        <label>
            Adresa:
            <input type="text" id="adresa" name="adresa" value="<?php echo $act_data[0]['adresa'] ?>" tabindex="16">
          </label>
        </div>
        
        
        <div class="col-submit">
          <input type="submit" name="submit" class="submitbtn" value="Modifica"></input>
        </div>
      
      </form>
    </div>
  </section>
  <!-- CONTENT END -->

</div>
  <!-- Navbar START -->
  <?php include("../navbar.php"); ?>
  <!-- Navbar END -->

  <script type="text/javascript">
    var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
    
    elems.forEach(function(html) {
      var switchery = new Switchery(html);
    });
  </script>

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
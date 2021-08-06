<?php
    session_start();
    $fname = $_SESSION["nume"];
    $lname = $_SESSION["prenume"];
    $email = $_SESSION["email"];
    $account_id = $_SESSION["account_type"];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Angajat Nou</title>
    <link rel="stylesheet"  href="/crm/Frontend/css/Angajat_nou.css">
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
  <div class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text">Angajat Nou</span>
    </div>

    <div class="back_button">
      <a href="/crm/Frontend/Html/Angajati.php" class= "btn btn-info pull left">Back</a>
    </div>

    <div id="frm">
      <h1>Inregistrare Angajat Nou</h1>
      
      <form action="/crm/Backend/angajati/add_angajat.php" method="post">
        <div class="col-2">
          <label>
            Nume
            <input type="text" id="nume" name="nume" tabindex="1">
          </label>
        </div>
        <div class="col-2">
          <label>
            Prenume
            <input type="text" id="prenume" name="prenume" tabindex="2">
          </label>
        </div>
        
        <div class="col-3">
          <label>
            Email
            <input type="email" id="email" name="email" tabindex="3">
          </label>
        </div>
        <div class="col-3">
          <label>
            Numar de telefon:
            <input type="tel" id="telefon" name="telefon" tabindex="4">
          </label>
        </div>
        
        <div class="col-3">
          <label>
            Salariu
            <input type="number" id="salariu" name="salariu" tabindex="5">
          </label>
        </div>
        <div class="col-4">
          <label for="nivel"> Nivel </label>
            
          <select name="nivel_angajat" id="nivel_angajat" tabindex="6">
            <option value="Experimentat"> Experimentat </option>
            <option value="Mediu"> Mediu </option>
            <option value="Incepator"> Incepator </option>
          </select>
        </div>

        <div class="col-4">
          <label for="departament"> Departament </label>
            
          <select name="departament_angajat" id="departament_angajat" tabindex="7">
            <?php foreach($departamente as $departament) :  ?>
              <option value="<?php echo $departament[0]['id_departament'] ?>"> <?php echo $departament[0]['nume'] ?> </option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="col-4">
            <label>
              Data angajare
              <input type="date" id="data" name="data" tabindex="8">
            </label>
          </div>
        
        
        <div class="col-submit">
          <input type="submit" name="submit" class="submitbtn" value="Inregistrare"></input>
        </div>
      
      </form>
    </div>
  </div>
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
<?php
    session_start();
    $account_id = $_SESSION["account_id"];
    $fname = $_SESSION["fname"];
    $lname = $_SESSION["lname"];
    $email = $_SESSION["email"];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet"  href="/crm/Frontend/css/companie_nou.css">
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
      <span class="text">Inregistrare Firma</span>
    </div>
    

    <div class="back_button">
      <a href="/crm/Frontend/Html/Management Clienti.php" class= "btn btn-info pull left">Back</a>
    </div>
    <div class="frm">
      <h1>Firma Noua</h1>
      
      <form action="/crm/Backend/clienti/add_firma.php" method="post">
        <input type="hidden" name="account_id" value="<?php echo $account_id; ?>">

        <div class="col-2">
          <label>
            Companie
            <input type="text" id="companie" name="companie" tabindex="1">
          </label>
        </div>

        <div class="col-2">
          <label>
            Numar de telefon:
            <input type="tel" id="phone" name="phone" tabindex="2">
          </label>
        </div>

        <div class="col-3">
          <label>
            Grupuri
            <input type="text" id="grup" name="grup" tabindex="3">
          </label>
        </div>
        
        <div class="col-3">
          <label>
            Agent Vanzari
            <input type="text" id="agent" name="agent" tabindex="4">
          </label>
        </div>

        <div class="col-4">
            <label>
              Data angajare
              <input type="date" id="data" name="data" tabindex="5">
            </label>
        </div>
        <div class="col-submit">
          <input type="submit" name="submit" class="submitbtn" value="Inregistrare"></input>
        </div>
      
      </form>
      <hr class="line" ><br>
      <div class="frm">
      <h1>Contact Principal</h1>
      <form action="/crm/Backend/clienti/add_firma.php" method="post">
        <input type="hidden" name="account_id" value="<?php echo $account_id; ?>">

        <div class="col-2">
          <label>
            Nume
            <input type="text" id="companie" name="companie" tabindex="1">
          </label>
        </div>

        <div class="col-2">
          <label>
            Prenume
            <input type="tel" id="phone" name="phone" tabindex="2">
          </label>
        </div>

        <div class="col-3">
          <label>
            Email
            <input type="text" id="grup" name="grup" tabindex="3">
          </label>
        </div>
        
        <div class="col-3">
          <label>
            Nr. de telefon
            <input type="text" id="agent" name="agent" tabindex="4">
          </label>
        </div>

        <div class="col-4">
            <label>
              Pozitie
              <input type="date" id="data" name="data" tabindex="5">
            </label>
        </div>
        <div class="col-submit">
          <input type="submit" name="submit" class="submitbtn" value="Confirmare"></input>
        </div>
     
      
        </form>
        </div>
  </div>
    </div>
  </div>
  <!-- CONTENT END -->

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
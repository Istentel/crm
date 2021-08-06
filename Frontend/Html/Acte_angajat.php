<?php
    session_start();
    $id = $_GET['id'];
    $fname = $_SESSION["nume"];
    $lname = $_SESSION["prenume"];
    $email = $_SESSION["email"];
    $account_type = $_SESSION["account_type"];

    if(!preg_match("/[0-9]$/", $id)){
      $err_msg = "id invalid<br>";
      include('/crm/backend/error.php');
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Acte angajat</title>
    <link rel="stylesheet"  href="/crm/Frontend/css/Acte_angajat.css">
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
      <span class="text">Acte angajat</span>
    </div>

    <div class="back_button">
      <a href="/crm/Frontend/Html/Angajat_nou.php" class= "btn btn-info pull left">Back</a>
    </div>

    <div id="frm">
      <h1>Acte Angajat</h1>
      
      <form action="/crm/Backend/angajati/add_acte.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <div class="col-2">
          <label>
            C.N.P:
            <input type="text" id="cnp" name="cnp" tabindex="1">
          </label>
        </div>

        <div class="col-2">
          <label>
            Seria:
            <input type="text" id="seria" name="seria" tabindex="2">
          </label>
        </div>
        
        <div class="col-3">
          <label>
            N.R:
            <input type="text" id="nr" name="nr" tabindex="3">
          </label>
        </div>

        <div class="col-3">
          <label> Sex: </label>
          <select name="sex" id="sex" tabindex="4">
            <option value="m"> Barbat </option>
            <option value="f"> Femeie </option>
          </select>
        </div>
        
        <div class="col-3">
          <label>
            Cetatenie:
            <input type="text" id="cetatenie" name="cetatenie" tabindex="5">
          </label>
        </div>

        <div class="col-4">
          <label>
            Loc Nastere:
            <input type="text" id="loc_nastere" name="loc_nastere" tabindex="6">
          </label>
        </div>

        <div class="col-4">
        <label>
            Adresa:
            <input type="text" id="adresa" name="adresa" tabindex="6">
          </label>
        </div>
        
        <div class="col-submit">
          <input type="submit" name="submit" class="submitbtn" value="Adauga"></input>
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
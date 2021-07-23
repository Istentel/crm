<?php
  #GETTING USER DATA
  session_start();
  $fname = $_SESSION["fname"];
  $lname = $_SESSION["lname"];
  $email = $_SESSION["email"];
  $account_id = $_SESSION["account_id"];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet"  href="/crm/Frontend/css/management_clienti.css">
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
      <span class="text">Management clienti</span>
    </div>
    <table class="content-table">
      <thead>
        <tr>
          <th>Nume</th>
          <th>Prenume</th>
          <th>Email</th>
          <th>Telefon</th>
          <th>Firme asociate</th>
          <th>Grupuri</th>
          <th>Activ</th>
          
          <th>Nr.Produse Vandute</th>
          <th>Data Angajare</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>test</td>
          <td>Cristi</td>
          <td>Cristipas@yahoo.com</td>
          <td>0757014485</td>
          <td>QFort</td>
          <td>da</td>
          <td> <div class="toggle">
            <input type="checkbox">
            <label for="" class="onbtn"></label>
            <label for="" class="ofbtn"></label>
          </div></td>
          <td>22332</td>
          <td>2021-07-14/12:55:22</td>
          
        </tr>
        <tr class="active-row">
          <td>test1</td>
          <td>Theo</td>
          <td>theovale@gmail.com</td>
          <td>075701433</td>
          <td>QFort</td>
          <td>da</td>
          <td>  <div class="toggle">
            <input type="checkbox">
            <label for="" class="onbtn"></label>
            <label for="" class="ofbtn"></label>
          </div></td>
          <td>333332</td>
          <td>2020-02-12/16:45:12</td>
          
        </tr>
        <tr>
          <td>test2</td>
          <td>Eugen</td>
          <td>StaicuEugen@yahoo.com</td>
          <td>074118145</td>
          <td>QFort</td>
          <td>da</td>
          <td><div class="toggleBox">
           
            <div class="toggle">
              <input type="checkbox">
              <label for="" class="onbtn"></label>
              <label for="" class="ofbtn"></label>
            </div>
          </div></td>
          <td>333332</td>
          <td>2020-02-12/16:45:12</td>
        </tr>
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
  </script>
</body>
</html>

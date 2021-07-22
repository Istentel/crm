<?php
    session_start();
    $account_id = $_SESSION["account_id"];
    $fname = $_SESSION["fname"];
    $lname = $_SESSION["lname"];
    $email = $_SESSION["email"];

    $id = $_GET['id'];

    #Connect to the database
    require('../../Backend/connect.php');

    #Get clients names
    #Define the querry
    $qurty_agent = 'SELECT * FROM sellersagent WHERE account_id=:account_id AND id=:id';

    #Prepare statement to execute 
    #This creates a PDOStatement object
    $agenti_statement = $db->prepare($qurty_agent);

    $agenti_statement->bindValue(":account_id", $account_id);
    $agenti_statement->bindValue(":id", $id);

    #Execute the query
    $agenti_statement->execute();

    #Return an array containing the query results
    $agent_data = $agenti_statement->fetchAll();

    #Allow new sql statements to execute
    $agenti_statement->closeCursor();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet"  href="/crm/Frontend/css/Agent_nou.css">
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
      <span class="text">Agent Vanzari</span>
    </div>
    <div class="back_button">
      
  <a href="/crm/Frontend/Html/AgentVanzari.php" class= "btn btn-info pull left">Back</a>
    </div>
    <div id="frm">
      <h1>Editare Agent </h1>
      
      <form action="/crm/Backend/sellers_agent/update_agent.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="hidden" name="account_id" value="<?php echo $account_id; ?>">
        <div class="col-2">
          <label>
            Nume
            <input type="text" id="name" name="name" value="<?php echo $agent_data[0]['first_name'] ?>" tabindex="1">
          </label>
        </div>
        <div class="col-2">
          <label>
            Prenume
            <input type="text" id="prenume" name="prenume" value="<?php echo $agent_data[0]['last_name'] ?>" tabindex="2">
          </label>
        </div>
        
        <div class="col-3">
          <label>
            Email
            <input type="email" id="email" name="email" value="<?php echo $agent_data[0]['email'] ?>" tabindex="3">
          </label>
        </div>
        <div class="col-3">
          <label>
            Numar de telefon:
            <input type="tel" id="phone" name="phone" value="<?php echo $agent_data[0]['phone'] ?>" tabindex="4">
          </label>
        </div>
        <div class="col-3">
          <label>
            Companie
            <input type="text" id="companie" name="companie" value="<?php echo $agent_data[0]['firme_asociate'] ?>" tabindex="5">
          </label>
        </div>
        
        <div class="col-4">
          <label>
            Grupuri
            <input type="text" id="grup" name="grup" value="<?php echo $agent_data[0]['grupuri'] ?>" tabindex="6">
          </label>
        </div>
        <div class="col-4">
          <label>
            Nr.Produse Vandute
            <input type="number" id="prod_vandute" name="prod_vandute" value="<?php echo $agent_data[0]['prod_vandute'] ?>" tabindex="7">
          </label>
        </div>
        <div class="col-4">
            <label>
              Data angajare
              <input type="date" id="data" name="data" value="<?php echo $agent_data[0]['data_angajare'] ?>" tabindex="8">
            </label>
          </div>
        
        
        <div class="col-submit">
          <input type="submit" name="submit" class="submitbtn">Salveaza Modificarile</button>
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
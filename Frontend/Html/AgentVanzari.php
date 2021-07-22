<?php
    #GETTING USER DATA
    session_start();
    $fname = $_SESSION["fname"];
    $lname = $_SESSION["lname"];
    $email = $_SESSION["email"];
    $account_id = $_SESSION["account_id"];

    #Connect to the database
    require('../../Backend/connect.php');

    #Get clients names
    #Define the querry
    $query_agenti = 'SELECT * FROM sellersagent WHERE account_id=:account_id';

    #Prepare statement to execute 
    #This creates a PDOStatement object
    $agenti_statement = $db->prepare($query_agenti);

    $agenti_statement->bindValue(":account_id", $account_id);

    #Execute the query
    $agenti_statement->execute();

    #Return an array containing the query results
    $agenti_data = $agenti_statement->fetchAll();

    #Allow new sql statements to execute
    $agenti_statement->closeCursor();

    
  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet"  href="/crm/Frontend/css/AgentVanzari.css">
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
      <span class="text">Agent Vanzari</span>
    </div>
  


    <div class="buttons">
          <a href="/crm/Frontend/Html/Agent_nou.php" class="btn btn-info pull-left">Agent Nou</a>
          <a href="/crm/Frontend/Html/Agent_import.html" class="btn btn-info pull-left">Agent Import</a>
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
          <th>Edits</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($agenti_data as $data) :?>
          <tr class="active-row">
            <td><?php echo $data['first_name']; ?></td>
            <td><?php echo $data['last_name']; ?></td>
            <td><?php echo $data['email']; ?></td>
            <td><?php echo $data['phone']; ?></td>
            <td><?php echo $data['firme_asociate']; ?></td>
            <td><?php echo $data['grupuri']; ?></td>
            <td> <div class="toggle">
              <input type="checkbox" id="toggleBtn" onclick="toggleBtn(<?php echo $data['account_id'] . ', ' . $data['id'] . ', ' . $data['activ']; ?>)" <?php if($data['activ']) echo 'checked';?>>
              <label for="" class="onbtn"></label>
              <label for="" class="ofbtn"></label>
            </div></td>
            <td><?php echo $data['prod_vandute']; ?></td>
            <td><?php echo $data['data_angajare']; ?></td>
            <td> <div class="container"><a href="/crm/Frontend/Html/Agent_Edit.php?id=<?php echo $data['id']; ?>" class="ctn ctn1">Edit</a>  <br> <a href="/crm/Backend/sellers_agent/delete_agent.php?id=<?php echo $data['id'];; ?>" class="ctn ctn2">Delete</a> </div></td>
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

    function toggleBtn(account_id, id, activ){
      $.ajax({
        type: "POST",
        url:'../../Backend/sellers_agent/changeActivStatus.php',
        data:{'account_id': account_id, 'id': id, 'activ': activ},
        success:function(){}
      });
    }
  </script>
</body>
</html>

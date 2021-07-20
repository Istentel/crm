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
    <link rel="stylesheet"  href="/crm/Frontend/css/Style.css">
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
  <div class="wrapper">
    <div class="navbar">
      <div class="navbar_left">
        <div class="logo">
          
        </div>
      </div>
  
      <div class="navbar_right">
        <div class="notifications">
          <div class="icon_wrap"><i class="far fa-bell"></i></div>
          
          <div class="notification_dd">
              <ul class="notification_ul">
                  <li class="starbucks success">
                      <div class="notify_icon">
                          <span class="icon"></span>  
                      </div>
                      <div class="notify_data">
                          <div class="title">
                              Vanzare.  
                          </div>
                          <div class="sub_title">
                            Produsul tau a fost vandut pe suma dorita.
                        </div>
                      </div>
                      <div class="notify_status">
                          <p>Success</p>  
                      </div>
                  </li>  
                  <li class="baskin_robbins failed">
                      <div class="notify_icon">
                          <span class="icon"></span>  
                      </div>
                      <div class="notify_data">
                          <div class="title">
                              Lorem, ipsum dolor.  
                          </div>
                          <div class="sub_title">
                            Lorem ipsum dolor sit amet consectetur.
                        </div>
                      </div>
                      <div class="notify_status">
                          <p>Failed</p>  
                      </div>
                  </li> 
                  <li class="mcd success">
                      <div class="notify_icon">
                          <span class="icon"></span>  
                      </div>
                      <div class="notify_data">
                          <div class="title">
                              Lorem, ipsum dolor.  
                          </div>
                          <div class="sub_title">
                            Lorem ipsum dolor sit amet consectetur.
                        </div>
                      </div>
                      <div class="notify_status">
                          <p>Success</p>  
                      </div>
                  </li>  
                  <li class="pizzahut failed">
                      <div class="notify_icon">
                          <span class="icon"></span>  
                      </div>
                      <div class="notify_data">
                          <div class="title">
                              Lorem, ipsum dolor.  
                          </div>
                          <div class="sub_title">
                            Lorem ipsum dolor sit amet consectetur.
                        </div>
                      </div>
                      <div class="notify_status">
                          <p>Failed</p>  
                      </div>
                  </li> 
                  <li class="kfc success">
                      <div class="notify_icon">
                          <span class="icon"></span>  
                      </div>
                      <div class="notify_data">
                          <div class="title">
                              Lorem, ipsum dolor.  
                          </div>
                          <div class="sub_title">
                            Lorem ipsum dolor sit amet consectetur.
                        </div>
                      </div>
                      <div class="notify_status">
                          <p>Success</p>  
                      </div>
                  </li> 
                  <li class="show_all">
                      <p class="link">Show All Activities</p>
                  </li> 
              </ul>
          </div>
          
        </div>
        <div class="profile">
          <div class="icon_wrap">
            <img src="/crm/Frontend/Imagini/profile_pic.png" alt="profile_pic">
            <span class="name"><?php echo $fname . " " . $lname; ?></span>
            <i class="fas fa-chevron-down"></i>
          </div>
  
          <div class="profile_dd">
            <ul class="profile_ul">
              <li class="profile_li"><a class="profile" href="#"><span class="picon"><i class="fas fa-user-alt"></i></span>Profile</a>
              </li>
              <li><a class="address" href="#"><span class="picon"><i class="fas fa-map-marker"></i></span>Address</a></li>
              <li><a class="settings" href="#"><span class="picon"><i class="fas fa-cog"></i></span>Settings</a></li>
              <li><a class="logout" href="/crm/Frontend/Login.html"><span class="picon"><i class="fas fa-sign-out-alt"></i></span>Logout</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    
    <div class="popup">
      <div class="shadow"></div>
      <div class="inner_popup">
          <div class="notification_dd">
              <ul class="notification_ul">
                  <li class="title">
                      <p>All Notifications</p>
                      <p class="close"><i class="fas fa-times" aria-hidden="true"></i></p>
                  </li> 
                  <li class="starbucks success">
                      <div class="notify_icon">
                          <span class="icon"></span>  
                      </div>
                      <div class="notify_data">
                          <div class="title">
                              Lorem, ipsum dolor.  
                          </div>
                          <div class="sub_title">
                            Lorem ipsum dolor sit amet consectetur.
                        </div>
                      </div>
                      <div class="notify_status">
                          <p>Success</p>  
                      </div>
                  </li>  
                  <li class="baskin_robbins failed">
                      <div class="notify_icon">
                          <span class="icon"></span>  
                      </div>
                      <div class="notify_data">
                          <div class="title">
                              Lorem, ipsum dolor.  
                          </div>
                          <div class="sub_title">
                            Lorem ipsum dolor sit amet consectetur.
                        </div>
                      </div>
                      <div class="notify_status">
                          <p>Failed</p>  
                      </div>
                  </li> 
                  <li class="mcd success">
                      <div class="notify_icon">
                          <span class="icon"></span>  
                      </div>
                      <div class="notify_data">
                          <div class="title">
                              Lorem, ipsum dolor.  
                          </div>
                          <div class="sub_title">
                            Lorem ipsum dolor sit amet consectetur.
                        </div>
                      </div>
                      <div class="notify_status">
                          <p>Success</p>  
                      </div>
                  </li>  
                  <li class="baskin_robbins failed">
                      <div class="notify_icon">
                          <span class="icon"></span>  
                      </div>
                      <div class="notify_data">
                          <div class="title">
                              Lorem, ipsum dolor.  
                          </div>
                          <div class="sub_title">
                            Lorem ipsum dolor sit amet consectetur.
                        </div>
                      </div>
                      <div class="notify_status">
                          <p>Failed</p>  
                      </div>
                  </li> 
                  <li class="pizzahut failed">
                      <div class="notify_icon">
                          <span class="icon"></span>  
                      </div>
                      <div class="notify_data">
                          <div class="title">
                              Lorem, ipsum dolor.  
                          </div>
                          <div class="sub_title">
                            Lorem ipsum dolor sit amet consectetur.
                        </div>
                      </div>
                      <div class="notify_status">
                          <p>Failed</p>  
                      </div>
                  </li> 
                  <li class="kfc success">
                      <div class="notify_icon">
                          <span class="icon"></span>  
                      </div>
                      <div class="notify_data">
                          <div class="title">
                              Lorem, ipsum dolor.  
                          </div>
                          <div class="sub_title">
                            Lorem ipsum dolor sit amet consectetur.
                        </div>
                      </div>
                      <div class="notify_status">
                          <p>Success</p>  
                      </div>
                  </li>
              </ul>
          </div>
      </div>
    </div>
    
  </div>
  <div class="sidebar">
    <div class="logo-details">
      
      <span class="logo_name">Platforma</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="index.php">
            <i class="fas fa-home"></i>
          <span class="link_name">Home</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Home</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="/crm/Frontend/Html/AgentVanzari.php">
            <i class="fas fa-user-tie"></i>
            <span class="link_name">Agent Vanzari</span>
          </a>
         
        </div>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="/crm/Frontend/Html/AgentVanzari.php">Agent Vanzari</a></li>
         
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="/Frontend/Html/Management Clienti.html">
            <i class="fas fa-user-tag"></i>
            <span class="link_name">Management Clienti</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href=/Frontend/Html/Management Clienti.html">Management Clienti</a></li>
          <li><a href="#">Facturi</a></li>
          <li><a href="#">Contacte</a></li>          
        </ul>
      </li>
      <li>
        <a href="/Frontend/Html/Management Utilizatori.html">
            <i class="fas fa-users"></i>
          <span class="link_name">Management Utilizatori</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="/Frontend/Html/Management Utilizatori.html">Management Utilizatori</a></li>
        </ul>
      </li>
      <li>
        <a href="/Frontend/Html/Distribuie Materiale.html">
            <i class="fas fa-share-square"></i>
          <span class="link_name">Distribuire Materiale</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href=/Frontend/Html/Distribuie Materiale.html">Distribuire Materiale</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="/Frontend/Html/Oferte.html">
            <i class="fas fa-tags"></i>
            <span class="link_name">Oferte</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="/Frontend/Html/Oferte.html">Oferte</a></li>
          <li><a href="#">Discount-uri</a></li>
          <li><a href="#">Oferte vechi</a></li>
          <li><a href="#">Cele mai noi oferte</a></li>
        </ul>
      </li>
      <li>
        <a href="/Frontend/Html/Produse_servicii.html">
            <i class="fab fa-product-hunt"></i>
          <span class="link_name">Produse/Servicii</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="/Frontend/Html/Produse_servicii.html">Produse/servicii</a></li>
        </ul>
      </li>
      <li>
        <a href="/Frontend/Html/Facturare.html">
            <i class="fas fa-clipboard-list"></i>
          <span class="link_name">Facturare</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="/Frontend/Html/Facturare.html">Facturare</a></li>
        </ul>
      </li>
      <li>
        <a href="/Frontend/Html/Rapoarte.html">
          <i class='bx bx-cog' ></i>
          <span class="link_name">Rapoarte</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href=/Frontend/Html/Rapoarte.html">Rapoarte</a></li>
        </ul>
      </li>
      <li>
    <div class="profile-details">
      <div class="profile-content">
        
      </div>
      <div class="name-job">
        <div class="profile_name">Intoarcere</div>
        <div class="job">Pagina</div>
      </div>
      <i class='bx bx-log-out' ></i>
    </div>
  </li>
</ul>
  </div>
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text">Platforma Management al Afacerii Tale</span>
    </div>
  
  </section>

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
<!-- Home  Section-->
    <section class="home" id="home">
        <div class="home-text">
            <h1>FoodManage</h1>
            <h2>Restaurants <br> Commandes <br> Livraisons</h2>
            <a href="#services" class="btn">En savoir plus</a>
        </div>
        <div class=" home-img">
            <img src="<?php echo base_url()?>assets/img/home_view/images/home.jpg" alt="">
        </div>
    </section>
    <hr>
    <!-- About -->
    <section class="about" id="about">
        <div class="about-img">
            <img src="<?php echo base_url()?>assets/img/home_view/images/about.svg" alt="">
        </div>
        <div class="about-text">
            <h2>Gérez votre restaurant </h2>
            <p>Food Manage vous offre la possibilité de publier des menus de votre restaurant et vous aide à gérer vos commandes !</p>
            <a href="#" class="btn">Voir les restaurants inscrits chez nous !</a>
        </div>
    </section>
    <hr>
    <!-- Menu -->
    <section class="menu" id="menu">
        <div class="heading">
            <span>Nos Menus</span>
            <h2>Les derniers menus publiés</h2>
        </div>
        <div class="menu-container">
            <!-- Box 1 -->
            <?php 
               foreach($menus->result() as $row)
               {
            ?>
            
              <div class="box">
                  <div class="box-img">
                      <img src="<?php echo base_url().'assets/img/manager_dashboard/upload/'.$row->imagemenu ?>" alt="<?= $row->menuname?>">
                  </div>
                  <h2><?= $row->menuname?></h2>
                  <h3><?= $row->menudescription?></h3>
                  <span style="color: #f57c0b; font-size:20px; text-decoration:none"><?= $row->price?> FCFA</span> 
                  <span> publié par <a href="#" title="restaurant <?= $row->name?>" style="color: #f57c0b; text-decoration:none"><span><?= $row->name?></span></a> </span>
              </div>
            <?php 
               }
            ?>
        </div><br><br>
              <div style='display:flex; justify-content:center'>
                <div><a href="menu" class="btn">Passer une commande</a></div>
            </div>    
    </section>
   <hr>
    <!-- Service -->

        <div class="heading" style="margin-top:100px">
            <span>Notre Solution</span>
            <h2>Avec FoodManage tout ce fait grace au numérique !</h2>
        </div>
    <section class="services" id="services">

        <div class="servives-container">
            <!-- Box 1 -->
            <div class="s-box">
                <img src="<?php echo base_url()?>assets/img/home_view/images/order.png" alt="">
                <h3> Passez une commande</h3>
                <p>Faites le choix de votre menus et commandez. vous avez la possibilité de payer votre commande via orange money ou 
                  Mtn mobile Money
                </p>
            </div>
            <!-- Box 2 -->
            <div class="s-box">
                <img src="<?php echo base_url()?>assets/img/home_view/images/delivery-truck.png" alt="">
                <h3>Ajoutez votre restaurant</h3>
                <p> Avec Food manage vous avez la possibilité de créer un compte gérant vous permettant de créer votre restaurant, gérer vos menus et vos commandes !</p>
            </div>
            <!-- Box 3 -->
            <div class="s-box">
                <img src="<?php echo base_url()?>assets/img/home_view/images/shipping.png" alt="">
                <h3>Livrez des commandes</h3>
                <p>Créer un compte livreur, visualisez les commandes en attente de livraison et postulez comme livreur de ces commandes !</p>
            </div>
        </div>
    </section>
   
    <!-- Connect -->
    <?php 
      if($this->session->userdata('pseudo') == '')
      {?>
        <section class="connect">
          <div class="connect-text">
            <span>Créez un compte et profitez de l'application</span><br>
            <h2>joignez vous à nous</h2>
          </div>
          <a href="connect" class="btn">Créez un compte</a>
        </section>
      <?php
      }
    ?>
   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Manage</title>
    <link href="<?php echo base_url()?>/assets/css/home_view/bootstrap.min.css" rel="stylesheet" >
    <!-- Box Icons -->
    <link rel="stylesheet"
  href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  <!-- Link To CSS -->
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/home_view/style.css">
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/home_view/popup.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
   
</head>
<body>
  <div class="loader">
    <div></div>
  </div>
  <div class = "content">
    <!-- Navbar -->
    <header>
        <a href="home" class="logo">FoodManage</a>
        <div class="bx bx-menu" id="menu-icon"></div>
        
        <ul class="navbar">
            <li><a href="home">Acceuil</a></li>
            <li><a href="menu">Menu</a></li>
            <li><a <?php if($name == 'order_view'){?>href="home#services"<?php }else{?>href="#services" <?php } ?>>Nos Service</a></li>
            <?php
            		if($this->session->userdata('role') == 'custom' && $this->session->userdata('pseudo') != '')
                {?>
                  <li><a href='dashboard_customer'>Tableau de bord</a></li>
                  <li><a href="#" data-toggle="modal" data-target="#logoutModal" style="color:#f57c0b">deconnexion</a></li>
                <?php
                }
                elseif($this->session->userdata('role') == 'manager' && $this->session->userdata('pseudo') != '')
                {?>
                  <li><a href='dashboard_manager'>Tableau de bord</a></li>
                  <li><a href="#" data-toggle="modal" data-target="#logoutModal" style="color:#f57c0b">deconnexion</a></li>
                <?php
                }
                elseif($this->session->userdata('role') == 'delivery_person' && $this->session->userdata('pseudo') != '')
                {?>
                  <li><a href='dashboard_delivery_person'>Tableau de bord</a></li>
                  <li><a href="#" data-toggle="modal" data-target="#logoutModal" style="color:#f57c0b">deconnexion</a></li>
                <?php
                }
                else
                {?>
                  <li><a href='connect'>Se connecter</a></li>
                <?php
                }
                ?>
                <li><a href=""  style="color:color=black"class="cart" data-toggle="modal" data-target ="#cartModal"><i class="fas fa-shopping-cart"></i><sub id="panier"><?= $panier ?></sub></a></li>
            <!-- Dark Mode -->
            <div class="bx bx-moon" id="darkmode"></div>  
        </ul>
    </header>
    <?php 
            if($name == 'home')
            {
                include('home_content_view.php');
            }
            elseif($name == 'order_view')
            {
                include('order_view.php');
            }
            elseif($name == 'checkout')
            {
                include('checkout.php');
            }
            elseif($name == 'payment')
            {
                include('payment_view.php');
            }
            ?>

            
    <footer>
       <!-- Contact -->
    <section class="contact" id="contact">
        <div class="contact-box">
            <h3>Liens rapide</h3>
            <li><a href="#home">Home</a></li>
            <li><a href="#menu">Menu</a></li>
            <li><a href="#services">Service</a></li>
        </div>
        <div class="contact-box">
            <h3>A propos</h3>
            <li><a href="#Contact">Contact</a></li>
            <li><a href="#Privacy Policy">Politique de confidentialité</a></li>
            <li><a href="#Disclaimer">Localisation</a></li>
        </div>
        <div class="contact-box address">
            <h3>Contact</h3>
            <i class='bx bxs-map' ><span>Yaoundé, Nkoabang</span></i>
            <i class='bx bxs-phone' ><span>+237 696809088</span></i>
            <i class='bx bxs-envelope' ><span>kadjibecker@email.com</span></i>
        </div>
        <div class="contact-box">
            <h3>FoodManage</h3>
            <span>Connectez vous sur nos réseaux</span>
            <div class="social">
                <a href="#"><i class='bx bxl-facebook' ></i></a>
                <a href="#"><i class='bx bxl-twitter' ></i></a>
                <a href="#"><i class='bx bxl-instagram' ></i></a>
            </div>
        </div>
    </section>
    <!-- Copyright -->
        <div style="text-align:center; color:rgb(114, 111, 111);">&#169; copyright tout droit réservé 2021.</div>
    </footer>
  </div>
    
   


    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #858796">
                    <h5 class="modal-title" id="exampleModalLabel">Voulez-vous vraiment vous déconnecter?</h5>
                    <button class="close" type="button" style='background-color: #f57c0b;color:white; width:20px' data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">cliquez sur "Se deconnecter" si vous voulez fermer votre session.</div>
                <div class="modal-footer" style="background-color: white">
                    <button type="button" style="background-color: #858796; border-radius: 5px; color:white; border:none; padding: 7px 7px" data-dismiss="modal">annuler</button>
                    <a style="background-color: #FFAE63;text-decoration: none; border-radius: 5px; color:white; border:none; padding: 7px 7px" href="<?php echo base_url()?>users/logout">Se deconnecter</a>
                </div>
            </div>
        </div>
    </div>


    <!-- popup.js -->
   <?php
    if(isset($_GET['erreur'])){
    ?>
      <script src="<?php echo base_url()?>assets/js/home_view/popup.js"></script>
    <?php
    }
    elseif(isset($_GET['message']))
    {
      ?>
      <script src="<?php echo base_url()?>assets/js/home_view/popup.js"></script>
    <?php
    }
   ?>
    
    <!-- Scroll Reveal -->
    <!-- <script src="<?php echo base_url()?>assets/js/home_view/scrollreveal.js"></script> -->
    <!-- Link To JavaScript -->
    <script src="<?php echo base_url()?>assets/vendor/manager_dashboard/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendor/manager_dashboard/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url()?>assets/js/home_view/main.js "></script>
    <script>
      $(document).ready(function(){

        $('#cart_details').load("<?php echo base_url(); ?>Cart/load");

        //retirer un menu du panier
        $(document).on('click', '.remove_inventory', function(){
          var row_id= $(this).attr('id');
          if(confirm('voulez vous rétirer ce menu ?'))
          {
            $.ajax({
              url:"<?php echo base_url()?>Cart/remove",
              method:"POST",
              data:{rowid:row_id},
              success:function(data)
              {
                $('#cart_details').html(data);
                $('#panier').load(' #panier');
              }
            })
            exit();
          }
          else
          {
            return false;
          }
         })

         //vider le panier
         $(document).on('click', '#clear_cart', function(){
              if(confirm(' voulez vous vider le panier ?'))
              {
                $.ajax({
                  url:"<?php echo base_url()?>Cart/clear",
                  success:function(data)
                  {
                    $('#cart_details').html(data);
                    $('#panier').load(' #panier');
                  }
                })
              }
              else
              {
                return false
              }
            })

            //modifier la quantité d'un menu dans le panier
            $(document).on('change', '.itemQty', function(){
              var el= $(this).closest('tr');
              var row_id= $(el).find('#rowid').val();
              var quantity = $(this).val();
                $.ajax({
                  url:"<?php echo base_url()?>Cart/update",
                  method:"POST",
                  data:{rowid:row_id,quantity:quantity},
                  success:function(data)
                  {
                    $('#cart_details').html(data);
                    $('#panier').load(' #panier');
                  }
                })
            })
      })
    </script>

    <!-- loader script -->

    <script>
        $(window).on('load', function(){
          $('.loader').fadeOut(500);
          $('.content').fadeIn(500);
        })
    </script>

    <!-- script pour ajouter un menu au panier -->
    <?php if($name === 'order_view'):?>
    <script>
        $(document).ready(function(){
          $(document).on('click','.add_cart', function(){

                var menu_id = $(this).data('menuid');
                var menu_name = $(this).data('menuname');
                var price = $(this).data('price');
                var restaurant_name = $(this).data('restaurantname');
                var imagemenu = $(this).data('image');
                var quantity = 1;
                var nombremenu = $(this).data('nombremenu');
                
                    $.ajax({
                        url:"<?php echo base_url()?>Cart/add",
                        method:"POST",
                        data:{menuid:menu_id, menuname:menu_name, price:price,
                            restaurantname:restaurant_name, quantity:quantity, imagemenu:imagemenu},
                        beforeSend: function(){
                        /* Show image container */
                          $("#loader").show();
                          $("#menu").attr('style','margin-top:100px; text-align:center; opacity:0.1');   
                        },
                        success:function(data)
                        {   
                            if(nombremenu == 0){
                              $('#submit').removeAttr('disabled');
                            }
                            $('#cart_details').html(data);
                            $('#panier').load(' #panier');
                            $('#' + menu_id).val('');
                        },
                        complete:function(data){
                          /* Hide image container */
                          $("#loader").hide();
                          $("#menu").attr('style','margin-top:100px; text-align:center; opacity:1');
                        }
                    });
            })

            $('#cart_details').load("<?php echo base_url(); ?>Cart/load");
            
            //retirer un menu dans le panier
            $(document).on('click', '.remove_inventory', function(){
              var row_id= $(this).attr('id');
              if(confirm('voulez vous rétirer ce menu ?'))
              {
                $.ajax({
                  url:"<?php echo base_url()?>Cart/remove",
                  method:"POST",
                  data:{rowid:row_id},
                  success:function(data)
                  {
                    $('#cart_details').html(data);
                    $('#panier').load(' #panier');
                  }
                })
              }
              else
              {
                return false;
              }
            })

            //modifier la quantité d'un menu dans le panier
            $(document).on('change', '.itemQty', function(){
              var el= $(this).closest('tr');
              var row_id= $(el).find('#rowid').val();
              var quantity = $(this).val();
                $.ajax({
                  url:"<?php echo base_url()?>Cart/update",
                  method:"POST",
                  data:{rowid:row_id,quantity:quantity},
                  success:function(data)
                  {
                    $('#cart_details').html(data);
                    $('#panier').load(' #panier');
                  }
                })
            })

            //vider le panier
            $(document).on('click', '#clear_cart', function(){
              if(confirm('voulez vous vider le panier ?'))
              {
                $.ajax({
                  url:"<?php echo base_url()?>Cart/clear",
                  success:function(data)
                  {
                    $('#cart_details').html(data);
                    $('#panier').load(' #panier');
                    location.reload();
                  }
                })
                exit();
              }
              else
              {
                return false
              }
            })
        })
    </script>

<?php endif; ?>

<script>
$(document).ready(function(){
  
  $(document).on('click', '#annuler', function(event){
    event.preventDefault();
    var transactionid = $(this).data('transactionid');

    $.ajax({
      url:"<?php echo base_url()?>Cart/abort",
      method:"POST",
      data:{transactionid:transactionid},
      success:function(){
        window.location.href = "home";
      }
    })
    
  })

})
</script>

</body>
</html>
<!-- cart modal -->
<div id ="cartModal" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="display: flex; border-bottom:1px solid black; justify-content: space-between;">
        <div><h3 style="color: #f57c0b" class ='modal-title'>Panier</h3></div>
        <div><i  style="color:#f57c0b; width:40px" class="close fas fa-times" data-dismiss="modal"></i></div>
      </div>
      <div class = "modal-body">
        <div id="cart_details">
          <h3>Votre panier est vide</h3>
        </div>
      </div>
      <div class="modal-footer" style="display: flex; border-top:1px solid black; justify-content: space-between;">
        <div style="width:40%;"><a href="checkout" style="background-color:rgb(40, 192, 108)" class="btn btn-primary mb-3">Commander</a></div>
      </div>
    </div>
  </div>
</div>



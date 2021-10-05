<section class="menu" id="menu" style="margin-top:100px; text-align:center; opacity:1">
        <div class="heading">
            <span>Nos Menus</span>
            <h3>Ajoutez vos choix au panier</h3>
        </div>
        <div >cliquez sur l'icone du panier en haut à droite du menu pour ajouter le menu au panier</div>
        <div class="menu-container">
            <!-- Box 1 -->
            <?php 
               foreach($menu->result() as $row)
               {
            ?>
              <div class="box">
                  <div class="box-img">
                      <img src="<?php echo base_url().'assets/img/manager_dashboard/upload/'.$row->imagemenu ?>" alt="<?= $row->menuname?>">
                  </div>
                  <h2><?= $row->menuname?></h2>
                  <h3><?= $row->menudescription?></h3>
                  <span style="color: #f57c0b; font-size:20px; text-decoration:none"><?= $row->price?> FCFA</span> 
                  <span> publié par <a href="" title="restaurant <?= $row->name?>"style="color: #f57c0b; text-decoration:none"><span><?= $row->name?></span></a> </span>
                  <button  type = "button" class="add_cart" name="add_cart" title="ajouter au panier" style="color:black"
                  data-price = "<?= $row->price?>" data-nombremenu="<?= $panier ?>" data-menuid="<?= $row->menuid?>"data-restaurantname="<?= $row->name?>" data-menuname="<?= $row->menuname?>" data-image="<?php echo base_url().'assets/img/manager_dashboard/upload/'.$row->imagemenu ?>"><i class='bx bx-cart-alt'><sup>ajouter au panier</sup></i></button>
              </div>
            <?php 
               }
            ?>
        </div> 
        
</section>
<div id="loader" class="loader" style="position:fixed;top:50%;left:45%;display:none"><img src="<?php echo base_url().'assets/img/loader2.gif'?>" alt="loader"width='150px' height='100px'></div>

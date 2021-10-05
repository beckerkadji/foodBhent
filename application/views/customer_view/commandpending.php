 <!-- Page Wrapper -->
 <div id="wrapper">

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cette page vous permet de voir vos commandes qui sont en cours de livraison</h1>
      
    </div>

    <!-- en dessous du titre -->
    <div >
       Commandes en cours de livraison
       <div style="display: flex: justify-content: center">
           <div class="loader" style="text-align:center; display:none; position:fixed;"><img src="<?php echo base_url().'assets/img/loader2.gif'?>" alt="loader"width='150px' height='100px'></div>
        </div>
       
       <table class="tableau" width="100%">
            <tr style="text-align: center;">
                <th style="padding: 15px; color:white;background-color:grey; font-size:25px">Informations sur le livreur</th>
                <th style="padding: 15px; color:white;background-color:grey; font-size:25px">Informations sur la commande</th>
                <th style="padding: 15px; color:white;background-color:grey; font-size:25px" >Operation</th>
            </tr>
            
       <?php
            $i2 = 0;
            $amount2 = array();
            $i = 0; 
            $amount = array();
            foreach($listcommandpending->result() as $row)
            {
                $commandid = $row->commandid;
        ?>
             <tr>
                <td> 
                    <ul>
                        <li>livreur: <?= $row->pseudodeliver ?></li>
                        <li>numéro de téléphone: <?= $row->teldeliver ?> <br></li>
                        <li>adresse email: <?= $row->emaildeliver ?> </li>
                    </ul>
                </td>
                <td>
                    <ul>
                        <li>restaurant: <?= $row->name ?></li>
                        <li>menu: <?= $row->menuname ?></li>
                        <li>image du menu  <img src=" <?= base_url().'assets/img/manager_dashboard/upload/'.$row->imagemenu ?>"
                        class="img-thumbnail" width="50" height="35" /></li>
                        <li>prix: <?= $row->price ?>FCFA</li>
                        <li>quantité: <?= $row->quantity ?></li>
                        <li>total <?= $row->quantity*$row->price ?>FCFA</li>    
                        <li>passé le  <?= date ("d/m/Y à G:i",strtotime($row->commands_date));?></li>  
                        <li>status de la commande :  <span style="color: #ad3c3c;"><?php if($row->commandstatus = 'pending'){ echo 'en cours de livraion';}?></span></li>  
                    </ul>
                </td>
                
                <td style="padding: 15px; color:#f57c0b; font-size:25px">
                    <button data-toggle="modal" data-target="#modaltraitercommande" 
                     id="<?= $commandid ?>" class="btn btn-success btn-xs confirmer">Je confirme que j'ai reçu la commande</button>
                </td>   
            </tr>
            <?php
                $amount[$i] = $row->quantity*$row->price;
                $i++;
                }
            ?>
             <?php
               if (!(empty($listcommandpending2)))
               {
                foreach($listcommandpending2->result() as $row2)
                {
                    $commandid = $row2->commandid;
            ?>   
                <tr>
                <td> 
                    <ul>
                        <li>livreur: <?= $row2->delivername ?></li>
                        <li>numéro de téléphone: <?= $row2->tel ?> <br></li>
                    </ul>
                </td>
                <td>
                    <ul>
                        <li>restaurant: <?= $row2->name ?></li>
                        <li>menu: <?= $row2->menuname ?></li>
                        <li>image du menu  <img src=" <?= base_url().'assets/img/manager_dashboard/upload/'.$row2->imagemenu ?>"
                        class="img-thumbnail" width="50" height="35" /></li>
                        <li>prix: <?= $row2->price ?>FCFA</li>
                        <li>quantité: <?= $row2->quantity ?></li>
                        <li>total <?= $row2->quantity*$row2->price ?>FCFA</li>    
                        <li>passé le  <?= date ("d/m/Y à G:i",strtotime($row2->commands_date));?></li>  
                        <li>status de la commande :  <span style="color: #ad3c3c;"><?php if($row2->commandstatus = 'pending'){ echo 'en cours de livraion';}?></span></li>  
                    </ul>
                </td>
                
                <td style="padding: 15px; color:#f57c0b; font-size:25px">
                    <button data-toggle="modal" data-target="#modaltraitercommande" 
                     id="<?= $commandid ?>" class="btn btn-success btn-xs confirmer">Je confirme que j'ai reçu la commande</button>
                </td>   
            </tr>
            <?php
                $amount2[$i2] = $row2->quantity*$row2->price;
                $i2++;
                }
            ?>

            <?php
               }
            ?>
            <tr style="text-align: center; font-weight: bold">
                <td style="padding: 15px;"colspan='2'>PRIX TOTAL DE VOS COMMANDES</td>
                <td>
                <?php $total = array_sum($amount) + array_sum($amount2); ?>
                <?= $total ?> FCFA
                </td>
            </tr>
        </table>
    </div>

</div>
<!-- End of Main Content -->


</div>
<!-- End of Content Wrapper -->
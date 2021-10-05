
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">traitez vos commandes ici</h1>
              
            </div>

            <!-- en dessous du titre -->
            <div>
                <div style="margin-bottom:15px">
                    cliquez sur ce bouton pour enregistrez un numéro où votre argent sera versé apres livraison 
                    <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#modalnumerovirement"> entrez numéro téléphone</button>
                </div>
                
                <table class="tableau" width="100%"  >
                    <tr style="text-align: center;">
                        <th style="padding: 15px; color:white;background-color:grey; font-size:25px">Informations sur le client</th>
                        <th style="padding: 15px; color:white;background-color:grey; font-size:25px">Informations sur la commande</th>
                        <th style="padding: 15px; color:white;background-color:grey; font-size:25px" >Operation</th>
                    </tr>
                    <?php 
                        $i = 0; 
                        $amount = array();
                        foreach($listcommands->result() as $row)
                        {
                            $commandid = $row->commandid;
                    ?>
                    <?php
                        if($row->commandstatus == 'waiting'){
                    ?>
                       <tr>
                        <td> 
                            <ul>
                                <li>Client: <?= $row->pseudo ?></li>
                                <li>numéro de téléphone: <?= $row->tel ?> <br></li>
                                <li>localisation: <?= $row->localisation ?></li>
                                <li>adresse email: <?= $row->email ?> </li>
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
                                <li >status de la commande :  <span style="color: #ad3c3c;"><?php if($row->commandstatus == 'waiting'): echo 'en attente de livraison'; endif; ?></span></li>   
                            </ul>
                        </td>
                        
                        <td style="padding: 15px; color:#f57c0b; font-size:25px">
                            <button data-toggle="modal" data-target="#modaltraitercommande"  
                             id="<?= $commandid ?>" class="btn btn-success btn-xs traiter">Traiter la commande</button>
                        </td>
                       
                    </tr>
                    <?php
                         $amount[$i] = $row->quantity*$row->price;
                        }
                    ?>
                    <?php
                        $i++;
                        }
                    ?>
                    <tr style="text-align: center; font-weight: bold">
                        <td style="padding: 15px;"colspan='2'>PRIX TOTAL DE VOS COMMANDES</td>
                        <td>
                        <?php $total = array_sum($amount); ?>
                        <?= $total ?> FCFA
                        </td>
                    </tr>
                    
                </table>
                                    
            </div>

        </div>
        <!-- End of Main Content -->


    </div>
    <!-- End of Content Wrapper -->


   

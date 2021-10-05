
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Liste des commandes en attente de livraison</h1>
              
            </div>

            <!-- en dessous du titre -->
            <div>
                <?php
                    $nombrecommande = array();
                    $count = 0;
                    foreach($listcommands->result() as $row)
                    {
                        $nombrecommande[$count] =  $row->commandid ; 
                        $count++;
                    } 
                    $commandedifferente = array_unique($nombrecommande);
                    // echo '<pre>';
                    //     print_r($commandedifferente);
                    // echo '</pre>' ;   
                    // echo count($commandedifferente) ;      
                ?>
                <!-- <?php

                    // if(count($nombrecommande) > 1)
                    // {
                ?> -->


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
                                <li>localisation restaurant: <?= $row->localisationresto ?></li>
                                <li>menu: <?= $row->menuname ?></li>
                                <li>image du menu  <img src=" <?= base_url().'assets/img/manager_dashboard/upload/'.$row->imagemenu ?>"
					            class="img-thumbnail" width="50" height="35" /></li>
                                <li>quantité: <?= $row->quantity ?></li> 
                                <li>status de la commande : <?php if($row->commandstatus == 'waiting'){ echo 'en attente livraison';} ?></li> 
                                <li>passé le  <?= date ("d/m/Y à G:i",strtotime($row->commands_date));?></li> 
                            </ul>
                        </td>
                        
                        <td style="padding: 15px; color:#f57c0b; font-size:25px"><input type="button" data-toggle="modal" data-target="#modalpostuler" name="traiter" value="Postuler comme livreur" class="btn btn-success btn-xs postuler" id="<?= $commandid ?>" /></td>
                        
                    </tr>
                    <?php
                        $amount[$i] = $row->quantity*$row->price;
                        $i++;
                        }
                    ?>
                    
                </table>
                <?php
                    // } 
                // else
                //     {
                // ?>

                <?php
                //     }
                // ?>
                
                    
            </div>

        </div>
        <!-- End of Main Content -->


    </div>
    <!-- End of Content Wrapper -->


   

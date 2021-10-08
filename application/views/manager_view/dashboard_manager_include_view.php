<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Manager - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url()?>assets/vendor/manager_dashboard/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?=base_url()?>assets/css/manager_dashboard/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/manager_dashboard/styletableau.css" rel="stylesheet">
     
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center"
            style="background-color:white; color:#f57c0b; border: 6px solid #f57c0b
" href="<?php echo base_url()?>">
                
                Acceuil
            </a>
            
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php if($name === 'manager_content_view'):?>active<?php endif; ?>">
                <a class="nav-link" href="dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Tableau de bord </span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                commandes & menus
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item <?php if($name === 'command_view' || $name === 'postuler'):?>active<?php endif; ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Gerer commandes</span>
                </a>
                <div id="collapseTwo" class="collapse <?php if($name === 'command_view' || $name === 'postuler'):?>show<?php endif; ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Gerez vos commandes</h6>
                        <a class="collapse-item <?php if($name === 'command_view'):?>active<?php endif; ?>" href="<?php echo base_url()?>manager/listcommands">Commandes</a>
                        <a class="collapse-item <?php if($name === 'postuler'):?>active<?php endif; ?>" href="<?php echo base_url()?>manager/listpostuler">Demandes de livraison</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item <?php if($name === 'addmenus'):?>active<?php endif; ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Gérer Menus</span>
                </a>
                <div id="collapseUtilities" class="collapse <?php if($name === 'addmenus'):?>show<?php endif; ?>" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">personnalisation:</h6>
                        <a class="collapse-item" href="<?php echo base_url()?>manager/menus">ajouter un menu</a>
                        <a class="collapse-item" href="<?php echo base_url()?>manager/menus">suprimmer un menu</a>
                        <a class="collapse-item" href="<?php echo base_url()?>manager/menus">modifier un menu</a>
                        <a class="collapse-item" href="<?php echo base_url()?>manager/menus">voir mes menus</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                vos restaurants
            </div>


            <!-- Nav Item - Charts -->
            <li class="nav-item <?php if($name === 'addrestaurant'):?>active<?php endif; ?>">
                <a class="nav-link" href="<?php echo base_url()?>manager/addrestaurant">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Ajouter un restaurant</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url()?>manager/listcommandepending">
                    <i class="fas fa-fw fa-table"></i>
                    <span>voir mes commandes</span></a>
            </li>

            <li class="nav-item <?php if($name === 'order_view'):?>active<?php endif; ?>">
                <a class="nav-link" href="menu">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>consulter les menus</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="<?php echo base_url()?>assets/img/manager_dashboard/undraw_rocket.svg" alt="...">
                <p class="text-center mb-2"><strong>food manage</strong> est l'application de reference pour vous aider à gérer votre restaurant</p>
                <a class="btn btn-success btn-sm" href="#">créer un compte premium</a>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="<?php echo base_url()?>assets/img/manager_dashboard/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="<?php echo base_url()?>assets/img/manager_dashboard/undraw_profile_2.svg"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="<?php echo base_url()?>assets/img/manager_dashboard/undraw_profile_3.svg"
                                            alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $pseudo ?></span>
                                <img class="img-profile rounded-circle"
                                    src="<?php echo base_url()?>assets/img/manager_dashboard/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Paramettre
                                </a>


                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Se deconnecter
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
            <!-- End of Topbar -->

            
            <?php 
            if($name == 'manager_content_view')
            {
                include('manager_content_view.php');
            }
            elseif($name == 'command_view')
            {
                include('listcommands_view.php');
            }
            elseif($name == 'postuler_view')
            {
                include('listpostuler_view.php');
            }
            elseif($name == 'addrestaurant')
            {
                include('add_estaurant_view.php');
            }
            elseif($name == 'addmenus')
            {
                include('menus_view.php');
            }
            elseif($name == 'commandpending')
            {
                include('commandpending.php');
            }
            ?>


            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; food manage 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Voulez-vous vraiment vous déconnecter?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">cliquez sur "Se deconnecter" si vous voulez fermer votre session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">annuler</button>
                    <a class="btn btn-primary" href="<?php echo base_url()?>users/logout">Se deconnecter</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url()?>assets/vendor/manager_dashboard/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendor/manager_dashboard/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url()?>assets/vendor/manager_dashboard/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url()?>assets/js/manager_dashboard/sb-admin-2.min.js"></script>
</body>

</html>

<?php if($name === 'command_view'):?>
    
    

<!-- Modal Traiter une commande -->
<div id="modaltraitercommande" class="modal fade">
    <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="display: flex; border-bottom:1px solid black; justify-content: space-between;">
                    <div><h4 style="color: #f57c0b" class ='modal-title'> Traiter la commande</h4></div>
                    <div><button type="button" style="color:red"class="close" data-dismiss="modal">&times;</button></div>
                </div>
                    <div class="modal-body">
                        <div class="loader" style="text-align:center; display:none"><img src="<?php echo base_url().'assets/img/loader2.gif'?>" alt="loader"width='150px' height='100px'></div>
                        <div style="width:100%"> 
                            <p style="background-color: #cfcfcd; padding:15px;border-radius:10px; text-align:center">
                            <span style="color: red">Attention⚠</span> <br> cliquez sur le bouton "assigner un livreur" pour voir les personnes ayant postuler comme livreur de cette commande. cliquez sur "j'ai un livreur" si vous avez deja un livreur pour cette commande ! </p>
                        </div>
                    </div>
                    <div class="modal-footer" style="display: flex; border-top:1px solid black; justify-content: space-between;">
                        <div><button class="btn btn-primary mb-3" data-toggle="modal" data-target="#listelivreur" >assigner un livreur</button></div>
                        <div><button type ="submit"   class="btn btn-primary mb-3 havedeliver" data-toggle="modal" data-target="#formdeliver" >j'ai un livreur</button></div>
                    </div>
                    <div style="display: flex; justify-content:flex-end;">
                        <div style="width:40%"><button type="button" class="close" style="color:red; font-size:20px; margin: 10px" data-dismiss="modal">fermer</button></div>
                    </div>
                </div>
            </div>
    </div>
</div>

<!-- ce model permet au gérant de modifier son numéro de téléphone -->
<div id="modalnumerovirement" class="modal fade">
    <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="display: flex; border-bottom:1px solid black; justify-content: space-between;">
                    <div><h4 style="color: #f57c0b" class ='modal-title'> entrez le numéro avec lequel vous souhaitez recevoir l'argent de vos commande ?</h4></div>
                    <div><button type="button" style="color:red"class="close" data-dismiss="modal">&times;</button></div>
                </div>
                    <div class="modal-body">
                    <form  method="post" action ='<?php echo base_url() . 'users/setnumtel'; ?>' style="padding:20px; border-radius: 5px;  box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);" >
    
                        <label for="tel" class="form-label">numéro de téléphone de reception</label>
                        <input type="number" required class="form-control" id="tel" min="1" value="<?= $this->session->userdata('tel')?>" name="tel">
                        <input type="hidden" value="<?= $this->session->userdata('userid')?>" name="userid">
                        <button type="submit" class="btn btn-success sendnumber" data-userid="<?= $this->session->userdata('userid') ?>" style="background-color: rgb(46, 173, 99); width:100%; margin-top:10px">Valider</button>
                    </form>
                    </div>
                    <div class="modal-footer" style="display: flex; border-top:1px solid black; justify-content: space-between;">
                    </div>
                    <div style="display: flex; justify-content:flex-end;">
                        <div style="width:40%"><button type="button" class="close" style="color:red; font-size:20px; margin: 10px" data-dismiss="modal">fermer</button></div>
                    </div>
                </div>
            </div>
    </div>
</div>

<!-- ce modal affiche la liste des livreurs ayant postuler pour une commande -->
<div id="listelivreur" class="modal fade">
    <div class="modal-dialog modal-lg">
        <form method="post" id="traiter_commande">
            <div class="modal-content">
                <div class="modal-header" style="display: flex; border-bottom:1px solid black; justify-content: space-between;">
                    <div><h4 style="color: #f57c0b" class ='modal-title'> Liste des livreur ayant postuler pour cette commande</h4></div>
                    <div><button type="button" style="color:red"class="close" data-dismiss="modal">&times;</button></div>
                </div>
                    <div class="modal-body">
                        <div class="loader" style="text-align:center; display:none"><img src="<?php echo base_url().'assets/img/loader2.gif'?>" alt="loader"width='150px' height='100px'></div>
                        <div style="width:100%; display:flex; justify-content:center" > 
                            <table class="tableau2">
                                <thead>
                                     <tr>
                                    <th>Nom</th>
                                    <th>télephone</th>
                                    <th>email</th>
                                    <th>localisation</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody id="show_data">

                                </tbody> 
                            </table> 
                        </div>
                    </div>
                    <div class="modal-footer" style="display: flex; border-top:1px solid black; justify-content: space-between;">
                        <div style="display: flex; justify-content:flex-end;">
                        <div style="width:40%"><button type="button" class="close" style="color:red; font-size:20px; margin: 10px" data-dismiss="modal">fermer</button></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- ce modal permet d'enregistrer les informations d'un livreur interne-->
<div id="formdeliver" class="modal fade">
    <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="display: flex; border-bottom:1px solid black; justify-content: space-between;">
                    <div><h4 style="color: #f57c0b" class ='modal-title'>entrez les informations du livreur</h4></div>
                    <div><button type="button" style="color:red"class="close" data-dismiss="modal">&times;</button></div>
                </div>
                    <div class="modal-body">
                        <div class="loader" style="text-align:center; display:none"><img src="<?php echo base_url().'assets/img/loader2.gif'?>" alt="loader"width='150px' height='100px'></div>
                        <form  method="post" style="padding:20px; border-radius: 5px;  box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);" >
                            <h3>Entrez les informations du livreur</h3><br>
                            <div class="mb-3">
                                <label for="namedeliver" class="form-label">nom</label>
                                <input type="text" class="form-control"  name="namedeliver" id="namedeliver" required >
                            </div>
                            <div class="mb-3">
                                <label for="tel" class="form-label">Numero de téléphone</label>
                                <input type="number" class="form-control" id="teldeliver" min="1" name="tel" required>
                            </div><br>
                                <button class="btn btn-success sendinterndeliver" style="background-color: rgb(46, 173, 99); width:100%">Envoyer</button>
                        </form>
                    </div>
                    <div class="modal-footer" style="display: flex; border-top:1px solid black; justify-content: space-between;">
                        <div style="display: flex; justify-content:flex-end;">
                        <div style="width:40%"><button type="button" class="close" style="color:red; font-size:20px; margin: 10px" data-dismiss="modal">fermer</button></div>
                    </div>
                </div>
            </div>
    </div>
</div>
<?php endif; ?> 

<?php if($name === 'addmenus'):?>
<!-- Modal ajouter un menu -->
        <div id="menuModal" class="modal fade">
            <div class="modal-dialog">
                <form method="post" id="addMenu_form">
                    <div class="modal-content">
                        <div class="modal-header" style="display: flex; border-bottom:1px solid black; justify-content: space-between;">
                            <div><h4 style="color: #f57c0b" class ='modal-title'> Ajouter un menu</h4></div>
                            <div><button type="button" style="color:red"class="close" data-dismiss="modal">&times;</button></div>
                        </div>
                        <div class="modal-body">
                        <div class="loader" style="text-align:center; display:none"><img src="<?php echo base_url().'assets/img/loader2.gif'?>" alt="loader"width='150px' height='100px'></div>
                            <label>nom du menu</label>
                            <input type="text" name="menuname" id="menuname" class="form-control" /><br>
                            <label>Description</label>
                            <textarea name="menudescription" id="menudescription" class="form-control">
                            </textarea><br>
                            <label>entrez une catégorie pour ce menu</label>
                            <input type="text" name="category" id="category" class="form-control" /><br>
                            <label>prix du menu (FCFA) </label>
                            <input type="number" name="price" id="price" class="form-control" /><br>
                            <label>dans quel de vos restaurants souhaitez vous publier ce menu ?</label>
                            <select style="width: 100%; padding:5px;" name="restaurantid" id="restaurantid">
                               <?php 		
                                foreach($restaurantid->result() as $r){
                                ?>
                                    <option value="<?php echo $r->restaurantid; ?>"><?php echo $r->name; ?></option>
                                <?php
                                }
                                ?>
                            </select><br>
                            <label>importez une image du menu !</label>
                            <input type="file" name="menuimage" id="menuimage" style="padding:5px;margin-top:15px"/>
                            <span id="menu_uploaded_image"></span>   
                        </div>
                        <div class="modal-footer" style="display: flex; border-top:1px solid black; justify-content: space-between;">
                            <input type="hidden" name="menuid" id="menuid"/>
                            <input type="hidden" name="action" id="action" value='Ajouter'/>
                            <div style="width:40%"><input type ="submit" name ="submit" id="submit" value = "Ajouter"  class="btn btn-primary mb-3" /></div>
                            <div style="width:40%"><button type="button" class="close" style="color:red; font-size:20px" data-dismiss="modal">fermer</button></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal modifier un menu -->
        <div id="menuModal2" class="modal fade">
            <div class="modal-dialog">
                <form method="post" id="addMenu_form2">
                    <div class="modal-content">
                        <div class="modal-header" style="display: flex; border-bottom:1px solid black; justify-content: space-between;">
                            <div><h4 style="color: #f57c0b" class ='modal-title'> Modifier le menu</h4></div>
                            <div><button type="button" style="color:red"class="close" data-dismiss="modal">&times;</button></div>
                        </div>
                        <div class="modal-body">
                        <div class="loader" style="text-align:center; display:none"><img src="<?php echo base_url().'assets/img/loader2.gif'?>" alt="loader"width='150px' height='100px'></div>
                            <label>nom du menu</label>
                            <input type="text" name="menuname" id="menuname2" class="form-control" /><br>
                            <label>Description</label>
                            <textarea name="menudescription" id="menudescription2" class="form-control">
                            </textarea><br>
                            <label>entrez une catégorie pour ce menu</label>
                            <input type="text" name="category" id="category2" class="form-control" /><br>
                            <label>prix du menu (FCFA) </label>
                            <input type="number" name="price" id="price2" class="form-control" /><br>
                            <label>dans quel de vos restaurants souhaitez vous publier ce menu ?</label>
                            <select style="width: 100%; padding:5px;" name="restaurantid" id="restaurantid2">
                               <?php 		
                                foreach($restaurantid->result() as $r){
                                ?>
                                    <option value="<?php echo $r->restaurantid; ?>"><?php echo $r->name; ?></option>
                                <?php
                                }
                                ?>
                            </select><br>
                            <label>importez une image du menu !</label>
                            <input type="file" name="menuimage" id="menuimage2" style="padding:5px;margin-top:15px"/>
                            <span id="menu_uploaded_image2"></span>   
                        </div>
                        <div class="modal-footer" style="display: flex; border-top:1px solid black; justify-content: space-between;">
                            <input type="hidden" name="menuid2" id="menuid2"/>
                            <input type="hidden" name="action" id="action2" value='Modifier'/>
                            <div style="width:40%"><input type ="submit" name ="submit" id="submit" value = "Modifier"  class="btn btn-primary mb-3 modifier" /></div>
                            <div style="width:40%"><button type="button" class="close" style="color:red; font-size:20px" data-dismiss="modal">fermer</button></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

<?php endif; ?> 

<?php if($name === 'addrestaurant'):?>
<!-- Modal ajouter un restaurant -->
        <div id="restaurantModal" class="modal fade">
            <div class="modal-dialog">
                <form method="post" id="addRestaurant_form">
                    <div class="modal-content">
                        <div class="modal-header" style="display: flex; border-bottom:1px solid black; justify-content: space-between;">
                            <div><h4 style="color: #f57c0b" class ='modal-title'> Ajouter un restaurant</h4></div>
                            <div><button type="button" style="color:red"class="close" data-dismiss="modal">&times;</button></div>
                        </div>
                        <div class="modal-body">
                        <div class="loader" style="text-align:center; display:none"><img src="<?php echo base_url().'assets/img/loader2.gif'?>" alt="loader"width='150px' height='100px'></div>
                            <label>nom du restaurant</label>
                            <input type="text" name="name" id="name" class="form-control" /><br>
                            <label>description</label>
                            <textarea name="description" id="description" class="form-control">
                            </textarea><br>
                            <label>localisation</label>
                            <input type="text" name="localisation" id="localisation" class="form-control" /><br>
                            <label>importez une image ou logo de votre restaurant !</label>
                            <input type="file" name="logo" id="logo" style="padding:5px;margin-top:15px"/>
                            <span id="logo_uploaded_image"></span>   
                        </div>
                        <div class="modal-footer" style="display: flex; border-top:1px solid black; justify-content: space-between;">
                            <input type="hidden" name="restaurantid" id="restaurantid"/>
                            <input type="hidden" name="action" id="action" value='Ajouter'/>
                            <div style="width:40%"><input type ="submit" name ="submit" id="submit" value = "Ajouter"  class="btn btn-primary mb-3" /></div>
                            <div style="width:40%"><button type="button" class="close" style="color:red; font-size:20px" data-dismiss="modal">fermer</button></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal modifier un restaurant -->
        <div id="restaurantModal2" class="modal fade">
            <div class="modal-dialog">
                <form method="post" id="addRestaurant_form2">
                    <div class="modal-content">
                        <div class="modal-header" style="display: flex; border-bottom:1px solid black; justify-content: space-between;">
                            <div><h4 style="color: #f57c0b" class ='modal-title'> Modifier le restaurant</h4></div>
                            <div><button type="button" style="color:red"class="close" data-dismiss="modal">&times;</button></div>
                        </div>
                        <div class="modal-body">
                        <div class="loader" style="text-align:center; display:none"><img src="<?php echo base_url().'assets/img/loader2.gif'?>" alt="loader"width='150px' height='100px'></div>
                            <label>nom du restaurant</label>
                            <input type="text" name="name" id="name2" class="form-control" /><br>
                            <label>description</label>
                            <textarea name="description" id="description2" class="form-control">
                            </textarea><br>
                            <label>localisation</label>
                            <input type="text" name="localisation" id="localisation2" class="form-control" /><br>
                            <label>importez une image ou logo de votre restaurant !</label>
                            <input type="file" name="logo" id="logo2" style="padding:5px;margin-top:15px"/>
                            <span id="logo_uploaded_image2"></span>   
                        </div>
                        <div class="modal-footer" style="display: flex; border-top:1px solid black; justify-content: space-between;">
                            <input type="hidden" name="restaurantid" id="restaurantid2"/>
                            <input type="hidden" name="action" id="action2" value='Modifier'/>
                            <div style="width:40%"><input type ="submit" name ="submit" id="submit" value = "Modifier"  class="btn btn-primary mb-3 modifier" /></div>
                            <div style="width:40%"><button type="button" class="close" style="color:red; font-size:20px" data-dismiss="modal">fermer</button></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        
<?php endif; ?> 


<?php if($name === 'command_view'):?>

<?php endif; ?>

<?php if($name === 'addrestaurant'):?>
    <!-- script pour la page ajouter un restaurant-->
    <script src="<?php echo base_url()?>assets/js/manager_dashboard/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/manager_dashboard/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/manager_dashboard/dataTables.bootstrap.min.js"></script>

            <!-- Page level plugins -->
    <script src="<?php echo base_url()?>assets/vendor/manager_dashboard/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendor/manager_dashboard/datatables/dataTables.bootstrap4.min.js"></script>


    <!-- Page level custom scripts -->
    <script src="<?php echo base_url()?>assets/js/manager_dashboard/demo/datatables-demo.js"></script>

         <!-- script pour la page ajouter un restaurant-->
         <script type="text/javascript" language="javascript">
            $(document).ready(function(){
                var dataTable = $('#restaurant_data').DataTable({
                    'ajax':{
                        url:'<?php echo base_url() . 'manager/fetch_restaurant'; ?>',
                        type:'GET'
                    },
                });

                $(document).on('submit', '#addRestaurant_form', function(event){
                event.preventDefault();
                var name = $('#name').val();
                var description = $('#description').val();
                var localisation = $('#localisation').val();
                var userid = $('#userid').val();
                var extension = $('#logo').val().split('.').pop().toLowerCase();
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
                {
                    alert("format d'image invalide");
                    $('#logo').val('');
                    return false;
                }

                if(name != '' && description != '' && localisation != '')
                {
                    $.ajax({
                        url:'<?php echo base_url() . 'manager/restaurant_action'; ?>',
                        method:'POST',
                        data: new FormData(this),
                        contentType:false,
                        processData:false,
                        beforeSend: function(){
                            /* Show image container */
                            $(".loader").show();    
                        },
                        success:function(data)
                        {
                            alert('modification effectuée');
                            $('#addRestaurant_form')[0].reset();
                            dataTable.ajax.reload();
                            $('#restaurantModal').modal('hide');  
                        },
                        complete:function(data){
                            /* Hide image container */
                            $(".loader").hide();
                        }
                    })
                }
                else
                {
                    alert('Remplissez tous les champs');
                }
            });

            //script pour modifier un restaurant 
            $(document).on('click', '.update', function(){
                var restaurantid = $(this).attr('id');
                $.ajax({
                    url: '<?php echo base_url(); ?>manager/fetch_single_restaurant',
                    method: "POST",
                    data:{restaurantid:restaurantid},
                    dataType:"json",
                    success:function(data)
                    {
                        $('#name2').val(data.name);
                        $('#description2').val(data.description);
                        $('#localisation2').val(data.localisation);
                        $('#restaurantid2').val(restaurantid);
                        $('#logo_uploaded_image2').html(data.logo);
                            
                        $(document).on('submit', '#addRestaurant_form2', function(event){
                            event.preventDefault();
                            var name2 = $('#name2').val();
                            var description2 =  $('#description2').val();
                            var localisation2 = $('#localisation2').val();
                            var restaurantid2 = restaurantid;
                            var extension2 = $('#logo2').val().split('.').pop().toLowerCase();

                            if(extension2 != '')
                            {
                                if(jQuery.inArray(extension2, ['gif','png','jpg','jpeg']) == -1)
                                {
                                    alert("format d'image invalide");
                                    $('#logo2').val('');
                                    return false;
                                }
                            }
                            
                            if(name2 != '' && description2 != '' && localisation2 != '')
                            {
                                $.ajax({
                                    url:'<?php echo base_url(); ?>manager/restaurant_action',
                                    method:'POST',
                                    data: new FormData(this),
                                    contentType:false,
                                    processData:false,
                                    beforeSend: function(){
                                        /* Show image container */
                                        $(".loader").show();    
                                    },
                                    success:function(data)
                                    {
                                        $('#addRestaurant_form2')[0].reset();
                                        dataTable.ajax.reload();
                                    },
                                    complete:function(data){
                                        /* Hide image container */
                                        $(".loader").hide();
                                        $('#menuModal2').modal('hide'); 
                                    }
                                })
                            }
                            else
                            {
                                alert('Remplissez tous les champs');
                            }
                        });
                    }
                })
            });

            //Script pour supprimer un restaurant
            $(document).on('click','.delete', function(){
                var restaurantids = $(this).attr('id');
                if(confirm("Voulez vraiment supprimer ce restaurant ? vous perdrez tous les menus de ce restaurant"))
                {
                    $.ajax({
                        url:'<?php echo base_url(); ?>manager/delete_single_restaurant',
                        method:'POST',
                        data: {restaurantid:restaurantids},
                        success:function(data)
                        {
                            alert('Restaurant supprimé');
                            dataTable.ajax.reload();
                        }
                    });
                }
                else
                {
                    return false;
                }
            });    

            });
        </script>

<?php endif; ?> 

<?php if($name === 'addmenus'):?>
    <!-- script pour la page ajouter un menu-->  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <script src="<?php echo base_url()?>assets/js/manager_dashboard/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/manager_dashboard/dataTables.bootstrap.min.js"></script>

            <!-- Page level plugins -->
    <script src="<?php echo base_url()?>assets/vendor/manager_dashboard/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendor/manager_dashboard/datatables/dataTables.bootstrap4.min.js"></script>


    <!-- Page level custom scripts -->
    <script src="<?php echo base_url()?>assets/js/manager_dashboard/demo/datatables-demo.js"></script>
    
    <!-- script pour confirmer si l'utilisateur a reçu sa commande -->
    <script src="<?php echo base_url()?>assets/js/confirm.js"></script>

    <!-- script pour la page gestion des menus-->

    <script type="text/javascript" language="javascript">
        $(document).ready(function(){
            var dataTable = $('#menus_data').DataTable({
                'processing': true,
                'ajax':{
                    url:'<?php echo base_url() . 'manager/menus_pages'; ?>',
                    type:'GET',
                },
            });

        // script pour ajouter un menu

            $(document).on('submit', '#addMenu_form', function(event){
                event.preventDefault();
                var menuname = $('#menuname').val();
                var description = $('#description').val();
                var category = $('#category').val();
                var price = $('#price').val();
                var restaurantid = $('#restaurantid').val();
                var extension = $('#menuimage').val().split('.').pop().toLowerCase();
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
                {
                    alert("format d'image invalide");
                    $('#menuimage').val('');
                    return false;
                }

                if(menuname != '' && description != '' && category != '' && price != '')
                {
                    $.ajax({
                        url:'<?php echo base_url() . 'manager/menus_action'; ?>',
                        method:'POST',
                        data: new FormData(this),
                        contentType:false,
                        processData:false,
                        beforeSend: function(){
                            /* Show image container */
                            $(".loader").show();    
                        },
                        success:function(data)
                        {
                            alert('Menu ajouté avec succès');
                            $('#addMenu_form')[0].reset();
                            dataTable.ajax.reload();
                            $('#menuModal').modal('hide');
                            
                        },
                        complete:function(data){
                            /* Hide image container */
                            $(".loader").hide();
                        }
                    })
                }
                else
                {
                    alert('Remplissez tous les champs');
                }
            });

            //script pour modifier un menu

            $(document).on('click', '.update', function(){
                var menuid = $(this).attr('id');
                $.ajax({
                    url: '<?php echo base_url(); ?>manager/fetch_single_menu',
                    method: "POST",
                    data:{menuid:menuid},
                    dataType:"json",
                    success:function(data)
                    {
                        $('#restaurantid2').val(data.restaurantid);
                        $('#name2').val(data.name);
                        $('#menuname2').val(data.menuname);
                        $('#menudescription2').val(data.menudescription);
                        $('#category2').val(data.category);
                        $('#price2').val(data.price);
                        $('#menuid2').val(menuid);
                        $('#menu_uploaded_image2').html(data.imagemenu);
                            
                        $(document).on('submit', '#addMenu_form2', function(event){
                            event.preventDefault();
                            var menuname2 = $('#menuname2').val();
                            var description2 =  $('#menudescription2').val();
                            var category2 = $('#category2').val();
                            var price2 =  $('#price2').val();
                            var menuid2 = menuid;
                            var restaurantid2 = $('#restaurantid2').val();
                            var extension2 = $('#menuimage2').val().split('.').pop().toLowerCase();

                            if(extension2 != '')
                            {
                                if(jQuery.inArray(extension2, ['gif','png','jpg','jpeg']) == -1)
                                {
                                    alert("format d'image invalide");
                                    $('#menuimage2').val('');
                                    return false;
                                }
                            }
                            
                            if(menuname2 != '' && description2 != '' && category2 != '' && price2 != '')
                            {
                                $.ajax({
                                    url:'<?php echo base_url(); ?>manager/menus_action',
                                    method:'POST',
                                    data: new FormData(this),
                                    contentType:false,
                                    processData:false,             
                                    beforeSend: function(){
                                        /* Show image container */
                                        $(".loader").show();    
                                    },
                                    success:function(data)
                                    {
                                        alert('Menu modifié avec succès');
                                        $('#addMenu_form2')[0].reset();
                                        dataTable.ajax.reload();
                                    },
                                    complete:function(data){
                                        /* Hide image container */
                                        $(".loader").hide();
                                    }
                                })
                            }
                            else
                            {
                                alert('Remplissez tous les champs');
                            }
                        });
                    }
                })
            });
            
            //Script pour supprimmer un menus
            $(document).on('click','.delete', function(){
                var menuids = $(this).attr('id');
                if(confirm("Voulez vraiment supprimer ce menus ?"))
                {
                    $.ajax({
                        url:'<?php echo base_url(); ?>manager/delete_single_menu',
                        method:'POST',
                        data: {menuid:menuids},
                        beforeSend: function(){
                            /* Show image container */
                            $(".loader").show();    
                        },
                        success:function(data)
                        {
                            alert('Menu supprimé');
                            dataTable.ajax.reload();
                        },
                        complete:function(data){
                                /* Hide image container */
                                $(".loader").hide();
                        }
                    });
                }
                else
                {
                    return false;
                }
            });    

        });
    </script>       
<?php endif; ?>
<script type="text/javascript" language="javascript">
        $(document).ready(function(){
            $(document).on('click','.traiter',function(){
                commandid= $(this).attr('id');
                $('.sendinterndeliver').attr('id',commandid);
                $.ajax({
                        url:'<?php echo base_url() . 'manager/livreur'; ?>',
                        method:'POST',
                        data:{
                            commandid:commandid,
                        },
                        dataType:"json",
                        success:function(data)
                        {
                            console.log(data);
                            var html = '';
                            var i;
                            for(i=0; i<data.length; i++){
                                html += '<tr>'+
                                            '<td>'+data[i].pseudo+'</td>'+
                                            '<td>'+data[i].tel+'</td>'+
                                            '<td>'+data[i].email+'</td>'+
                                            '<td>'+data[i].localisation+'</td>'+
                                            '<td>'+
                                                '<input type="submit" id="accepter" class="btn btn-primary mb-3 accepter" data-commandid="'+data[i].commandid+'" data-userid="'+data[i].userid+'" value="Accepter"></button>'+' '+
                                                '<input type="submit" id="refuser" class="btn btn-danger mb-3 refuser" data-commandid="'+data[i].commandid+'" data-userid="'+data[i].userid+'" value="Refuser"></button>'+' '+
                                            '</td>'+
                                        '</tr>';
                            }
                            $('#show_data').html(html);
                        }

                    })
                
            })

            $(document).on('click','#accepter', function(event){
                
                event.preventDefault();
                commandid = $(this).data('commandid');
                userid = $(this).data('userid');
                $.ajax({
                    url:'<?php echo base_url() . 'manager/acceptdeliver'; ?>',
                    method:'POST',
                    data:{
                        commandid:commandid,
                        userid:userid
                    },
                    dataType:"json",
                    beforeSend: function(){
                        /* Show image container */
                        $(".loader").show();    
                    },
                    success:function(data){
                       location.reload();
                    },
                    complete:function(data){
                        /* Hide image container */
                        $(".loader").hide();
                    }
                })
            })
            $(document).on('click','.sendinterndeliver', function(event){
                event.preventDefault();
                 commandid = $(this).attr('id');
                 delivername= $('#namedeliver').val();
                 tel = $('#teldeliver').val();
                $.ajax({
                    url:'<?php echo base_url() . 'manager/addinterndeliver'; ?>',
                    method:'POST',
                    data:{
                        commandid:commandid,
                        tel:tel,
                        delivername:delivername
                    },
                    dataType:"json",
                    beforeSend: function(){
                        /* Show image container */
                        $(".loader").show();    
                    },
                    success:function(data){
                        $('.tableau').load(' .tableau');
                    },
                    complete:function(data){
                        /* Hide image container */
                        $(".loader").hide();
                    }
                })
            })
        })
    </script>
    <script type="text/javascript" language="javascript">
    
    $(document).on('click', '.confirmer', function(event) {
    if(confirm("Vous ête sur le point de confirmer que vous avez reçu la commande ! cette action est irréversible"))
    {
        event.preventDefault();
        commandid = $(this).attr('id');
        $.ajax({
            url:'<?php echo base_url() . 'cart/confirm'; ?>',
            method: 'POST',
            data: {
                commandid: commandid
            },
            dataType: "json",
            beforeSend: function(){
                /* Show image container */
                $(".loader").show();    
            },
            success: function(data) {
                $('.tableau').load(' .tableau');
            },
            complete:function(data){
                /* Hide image container */
                $(".loader").hide();
            }
        })
    }
    
})
</script>
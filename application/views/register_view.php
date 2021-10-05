<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In Sign up</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/register.css');?>" />
    
</head>
<body>

    <div class="container">
        <div class="form-container">
            <div class="signin-signup"> 

                <form action="failed_connect" class="sign-in-form" method="post">
                    <h2 class="title">connectez vous</h2>
                    
                    <div class="input-field">
                            <input type="text" placeholder="nom d'utilisateur" name="pseudo">
                    </div>
                    <span class="text-danger" style="color:orange"><?php echo form_error("pseudo") ;?></span>
                    <div class="input-field">
                            <input type="password" placeholder="Mot de passe" name="password">
                    </div>
                    <span class="text-danger" style="color:orange"><?php echo form_error("password") ;?></span>
                    <input type="submit" value="Se connecter" class="btn solid">
                    <span style="color:orange; margin-top:20px">
                        <?php
                            echo $this->session->flashdata('error');
                        ?>   
                    </span>
                </form>

                <form action="<?php echo base_url();?>users/inscription_validation" class="sign-up-form" method="post">
                    <h2 class="title">Inscrivez vous</h2>
                    <div class="select">
                        <select name="role">
                            <option value="0" selected>Choisir un role</option>
                            <option value="custom">Client</option>
                            <option value="manager">gerant de restaurant</option>
                            <option value="delivery_person">livreur</option>
                        </select>
                    </div>
                    <div class="thenames">
                        <div class="input-field">
                            <input type="text" placeholder="nom" required name="firstname">
                            <span clas s="text-danger"><?php echo form_error("firstname") ;?></span>
                        </div> 
                
                        <div class="input-field">
                                <input type="text" placeholder="prenom" required name="lastname">
                                <span class="text-danger"><?php echo form_error("lastname") ;?></span>
                        </div>    
                    </div>
                    
                    <div class="thenames">
                        <div class="input-field">
                            <input type="text" placeholder="nom d'utilisateur"  required name="pseudo">
                            <span class="text-danger"><?php echo form_error("pseudo") ;?></span>
                        </div>
                        
                        <div class="input-field">
                                <input type="email" placeholder="email:example@gmail.com" required name="email">
                                <span class="text-danger"><?php echo form_error("email") ;?></span>
                        </div>
                    </div>
                    
                    <div class="input-field">
                        <input type="number" name="age" required placeholder="age">
                    </div>
                    <span class="text-danger"><?php echo form_error("age") ;?></span>

                    <div>sexe : 
                        <label for="Masculin">Masculin </label>
                        <input type="radio" name="sex" value="m" >
                    
                        <label for="feminin" >feminin </label>
                        <input type="radio" name="sex" value="f"> 
                    </div>
                    <span class="text-danger"><?php echo form_error("sex") ;?></span>
                    
                    <div class="thenames">
                         <div class="input-field">
                        <input type="password" placeholder="Mot de passe" name="password">
                        <span class="text-danger"><?php echo form_error("password") ;?></span>
                        </div>
                    
                        <div class="input-field">
                                <input type="password" placeholder="confirmez le Mot de passe" name="password">
                                <span class="text-danger"><?php echo form_error("password") ;?></span>
                        </div>
                    </div>
                   
                    

                    <input type="submit" value="S'inscrire" class="btn solid">   
                </form>
            </div>
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <div class ="content">
                    <h3>Êtes vous nouveaux ?</h3>
                    <p>Choisissez un role et inscrivez vous !</p>
                    <button class="btn transparent" id="sign-up-btn"> S'inscrire</button>
                </div>

                <img src="<?php echo base_url('assets/img/desk.svg')?>" class="image" alt="">
            </div>
            <div class="panel rigth-panel">
                <div class ="content">
                    <h3>Avez vous un compte ?</h3>
                    <p>Selectionnez un role et connectez vous !</p>
                    <button class="btn transparent" id="sign-in-btn"> Se connecter</button>
                </div>
                
                <img src="<?php echo base_url('assets/img/userinscription.svg')?>" class="image" alt="">
            </div>
        </div>
    </div>

    <script src="<?php echo base_url('assets/js/register.js')?>"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>

</body>
</html>
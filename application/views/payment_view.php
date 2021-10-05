<?php
if(isset($_GET['transactionid'])){
?>

    <div id="checkoutform" style="
        margin-top:17%; 
        display: flex;
        justify-content:center;
        align-items:cente">
        <div><br>
        <?php 
        if($message){
        ?>
            <!-- popup.js -->
            <div class="popup" style="text-align:center;">
                <div class="popuptext" style="background-color:rgb(169, 245, 169); color:green; width:300px" id="myPopup"><?= $message ?></div>
            </div> 
        <?php
            }
        ?>
    
            <form action="executePayment" method="post" style="padding:20px; border-radius: 5px;  box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);" >
            <h3>Validez la transaction</h3><br>

            <div class="mb-3">
            <?php 
        if($erreur){
        ?>
            <!-- popup.js -->
            <div class="popup" style="text-align:center;">
                <div class="popuptext" id="myPopup"><?= $erreur ?></div>
            </div> 
        <?php
            }
        ?>
                <label for="tel" class="form-label">entrez le numéro avec lequel vous souhaitez payer</label>
                <input type="number" class="form-control" id="tel" min="1" value="<?= $this->session->userdata('tel') ?>"name="tel">
                <input type="hidden" name="transactionid" value="<?= $_GET['transactionid'] ?>">
            </div>
                <button type="submit" class="btn btn-success" style="background-color: rgb(46, 173, 99); width:100%">Payer</button><br><br>
                <button class="btn btn-danger annuler" id="annuler" data-transactionid="<?= $_GET['transactionid'] ?>" style="background-color: #f14040; margin-top 10px ; width:100%">Annuler</button>
            </form>

            
        </div>

    </div>




<?php
}else{
    redirect('checkout');
}
?>

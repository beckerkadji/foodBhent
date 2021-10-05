<div id="checkoutform" style="
    margin-top:17%; 
    display: flex;
    justify-content:center;
    align-items:center">
    <div><br>
        <form action="insertcommand" method="post" style="padding:20px; border-radius: 5px;  box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);" >
        <h3>Entrez les informations de livraison</h3><br>
        <div class="mb-3">
            <label for="email" class="form-label">Adresse email</label>
            <input type="email" class="form-control" value="<?= $this->session->userdata('email') ?>" name="email" id="email" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="tel" class="form-label">Numero de téléphone</label>
            <input type="number" class="form-control" id="tel" min="1" value="<?= $this->session->userdata('tel') ?>"name="tel">
        </div>
        <div class="mb-3">
            <label for="localisation" class="form-label">où est ce qu'on viendra livrer votre commande ?</label>
            <input type="text" class="form-control" id="localisation" name = "localisation" value="<?= $this->session->userdata('localisation') ?>">
        </div><br>
            <button type="submit" class="btn btn-success" style="background-color: rgb(46, 173, 99); width:100%">Envoyer</button>
        </form>
    </div>
</div>


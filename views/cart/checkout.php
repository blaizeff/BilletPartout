<head>
    <title>Checkout - BilletPartout</title>
    <link href="<?php echo $_SERVER['basePath'] ?>public/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $_SERVER['basePath'] ?>public/css/checkout.css" rel="stylesheet">
    <style>
        .container {
            max-width: 960px;
        }

        .border-top {
            border-top: 1px solid #e5e5e5;
        }

        .border-bottom {
            border-bottom: 1px solid #e5e5e5;
        }

        .border-top-gray {
            border-top-color: #adb5bd;
        }

        .box-shadow {
            box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);
        }

        body {
            background-color: #f8f9fa !important;
        }
    </style>
</head>

<?php
PageFrame::loadBundle();
PageFrame::header();

?>
<div class="container ">
    <form class="row" style="margin-top:50px" method="POST" action="invoice">
        <div class="col-md-8 ">
            <h3>Adresse de facturations</h3>

            <div class="row">
                <div class="col-md-12 mb-3 form-group">
                    <label for="firstName">Nom Complet</label>
                    <input type="text" class="form-control customInput" id="firstName" required 
                    value="<?php if(isset($_SESSION['user']['nomClient'])){echo $_SESSION['user']['nomClient'];} ?>" >
                </div>

                <!-- <div class="col-md-6 mb-3 form-group">
                    <label for="lastName">Nom</label>
                    <input type="text" class="form-control customInput" id="lastName" required>
                </div> -->

                <div class="col-md-12 mb-3 form-group">
                    <label for="email">Courriel <span class="text-muted">(Optionel)</span></label>
                    <input type="email" class="form-control customInput" id="email" placeholder="vous@exemple.ca"
                    value="<?php if(isset($_SESSION['user']['Courriel'])){echo $_SESSION['user']['Courriel'];} ?>" >
                </div>

                <div class="col-md-12 mb-3 form-group">
                    <label for="address">Addresse</label>
                    <input type="text" class="form-control customInput" id="address" placeholder="Adresse, Boîte postale ou no. Appartement" required>
                </div>

                <div class="col-md-3 mb-3">
                    <label for="zip">Code Postale</label>
                    <input type="text" class="form-control customInput" id="zip" placeholder="A1A 1A1" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="province">Province</label>
                    <select class="custom-select d-block w-100 customSelect custom-select" id="province" required>
                        <option value="AB">Alberta</option>
                        <option value="BC">Colombie Britanique</option>
                        <option value="PE">île du Prince Édouard</option>
                        <option value="NB">Manitoba</option>
                        <option value="NL">Nouveau Brunswick</option>
                        <option value="NS">Nouvelle Écosse</option>
                        <option value="ON">Ontario</option>
                        <option value="QC">Quebec</option>
                        <option value="SK">Saskatchewan</option>
                        <option value="NT">Terre Neuve et Labrador</option>
                        <option value="NU">Nunavut</option>
                        <option value="YT">Yukon</option>
                    </select>
                </div>
            </div>

            <hr>

            <h3>Paiment</h3>

            <div class="row">
                <div class="col-md-6 mb-3 ">
                    <label for="cc-number">Numéro de la carte</label>
                    <input type="text" class="form-control customInput" id="cc-number" pattern="^((4\d{3})|(5[1-5]\d{2})|(6011))-?\d{4}-?\d{4}-?\d{4}|3[4,7]\d{13}$" placeholder="0000-0000-0000-0000" required>
                </div>

                <div class="col-md-3 mb-3">
                    <label for="cc-expiration">Date d'expiration</label>
                    <input type="text" class="form-control customInput" id="cc-expiration" pattern="^\d{2}\/\d{2}$" placeholder="MM/AA" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="cc-expiration">CVV</label>
                    <input type="text" class="form-control customInput" id="cc-cvv" pattern="^[0-9]{3,4}$" placeholder="000 ou 0000" required>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <h4>Vos billets</h4>
            <ul class="list-group mb-3">
                <?php for ($i = 0; $i < $data['nbTickets']; $i++) {
                    echo ('
                    <li class="list-group-item d-flex justify-content-between">
                        <div>
                            <h6>'.$data['section'].'</h6>
                            <small class="text-muted">'.$data['eventName'].'</small>
                        </div>
                        <span class="text-muted">$'.$data['price'].'</span>
                    </li>
                    ');
                } ?>
                


                <hr>

                <li class="list-group-item d-flex justify-content-between">
                    <h6>Sous-Total</h6>
                    <span class="text-muted">$<?php echo $data['subTotal']?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <h6>TPS (5%)</h6>
                    <span class="text-muted">$<?php echo$data['TPS']?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <h6>TVQ (9.975%)</h6>
                    <span class="text-muted">$<?php echo $data['TVQ']?></span>
                </li>

                <hr>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (CAD)</span>
                    <strong>$<?php echo $data['total']?></strong>
                </li>
            </ul>

            <button class="btn btn-lg btn-block green" type="submit">Passer la commande</button>
        </div>
    </form>
</div>
<?php
PageFrame::footer();
?>
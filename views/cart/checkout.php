<head>
    <title>Checkout - BilletPartout</title>
    <link href="<?php echo $_SERVER['basePath']?>public/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $_SERVER['basePath']?>public/css/checkout.css" rel="stylesheet">
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
<div class="container">
    <form class="row" style="padding-top:100px">
        <div class="col-md-8">
            <h3>Adresse de facturations</h3>

            <div class="row">
                <div class="col-md-6 mb-3 form-group">
                    <label for="firstName">Prénom</label>
                    <input type="text" class="form-control" id="firstName" required>
                </div>

                <div class="col-md-6 mb-3 form-group">
                    <label for="lastName">Nom</label>
                    <input type="text" class="form-control" id="lastName" required>
                </div>

                <div class="col-md-12 mb-3 form-group">
                    <label for="email">Courriel <span class="text-muted">(Optionel)</span></label>
                    <input type="email" class="form-control" id="email" placeholder="vous@exemple.ca">
                </div>

                <div class="col-md-12 mb-3 form-group">
                    <label for="address">Addresse</label>
                    <input type="text" class="form-control" id="address" placeholder="Adresse, Boîte postale ou no. Appartement" required>
                </div>

                <div class="col-md-3 mb-3">
                    <label for="zip">Code Postale</label>
                    <input type="text" class="form-control" id="zip" placeholder="A1A 1A1" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="province">Province</label>
                    <select class="custom-select d-block w-100" id="province" required>
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


            <div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="save-info">
                    <label class="custom-control-label" for="save-info">Sauvegarder cette information pour la prochaine fois</label>
                </div>
            </div>

            <hr>

            <h3>Paiment</h3>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="cc-name">Nom sur la carte</label>
                    <input type="text" class="form-control" id="cc-name" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="cc-number">Numéro de la carte</label>
                    <input type="text" class="form-control" id="cc-number" required>
                </div>

                <div class="col-md-3 mb-3">
                    <label for="cc-expiration">Date d'expiration</label>
                    <input type="text" class="form-control" id="cc-expiration" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="cc-expiration">CVV</label>
                    <input type="text" class="form-control" id="cc-cvv" required>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <h4>Vos billets</h4>
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between">
                    <div>
                        <h6>Section A - 12E</h6>
                        <small class="text-muted">Calgary Stampeders</small>
                    </div>
                    <span class="text-muted">$65.00</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <div>
                        <h6>Section A - 12F</h6>
                        <small class="text-muted">Calgary Stampeders</small>
                    </div>
                    <span class="text-muted">$65.00</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <div>
                        <h6>Section A - 12G</h6>
                        <small class="text-muted">Calgary Stampeders</small>
                    </div>
                    <span class="text-muted">$65.00</span>
                </li>

                <hr>

                <li class="list-group-item d-flex justify-content-between">
                    <h6>Sous-Total</h6>
                    <span class="text-muted">$195.00</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <h6>TPS (5%)</h6>
                    <span class="text-muted">$9.75</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <h6>TVQ (9.975%)</h6>
                    <span class="text-muted">$19.45</span>
                </li>

                <hr>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (CAD)</span>
                    <strong>$224.2‬0</strong>
                </li>
            </ul>

            <button class="btn btn-lg btn-block green" type="submit">Passer la commande</button>
        </div>
    </form>
</div>
<?php
PageFrame::footer();
?>
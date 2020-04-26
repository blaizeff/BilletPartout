<?php
PageFrame::loadBundle();
PageFrame::header();

    echo "<h5> PHP List All Session Variables</h5>";
    print_r($_SESSION);

    $currentUser = new User();

    $currentUser->loadUser($_SESSION["user"]["idClient"]); //the session 

    


?>
<style>
    .info {
        background-color: #edeef6 ;
        border-radius: 10px;
        padding: 20px
    }

    body {
        background-color: #f8f9fa;
    }
    hr{
        border: none;
    height: 1px;
    color: #999; 
    background-color: #999;
    margin-bottom: 50px;
    margin-top: 20px
    }
</style>

<div class="container">
    <div class="col-md-12 article" >
        <h2>Profile</h2>

        <form class="row">
            <div class="col-12 col-md-6 form-group">
                <label>Prénom </label>
                <input type="text" class="form-control custominput">
            </div>

            <div class="col-12 col-md-6 form-group">
                <label>Nom</label>
                <input type="text" class="form-control custominput">
            </div>

            <div class="col-12 form-group">
                <label class="mb-1">Adresse courriel</label>
                <input type="email" class="form-control custominput">
            </div>

            <div class="col-12 col-md-6 form-group">
                <label>No. Téléphone</label>
                <input type="text" class="form-control custominput">
            </div>

            <div class="col-12 col-md-6 form-group">
                <label>Date de naissance</label>
                <input type="text" class="form-control custominput">
            </div>

            <div class="col-12 ">
                <button type="submit" class="btn btn-primary green">Mettre à jour</button>
            </div>
        </form>

        <hr >

        <h2>Mot de passe</h2>
        <form class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label>Mot de passe</label>
                    <input type="password" class="form-control custominput">
                </div>

                <div class="form-group">
                    <label>Nouveau mot de passe</label>
                    <input type="password" class="form-control custominput">
                </div>

                <div class="form-group">
                    <label>Confirmer votre mot de passe</label>
                    <input type="password" class="form-control custominput">
                </div>
                <button type="submit" class="btn btn-primary green">Mettre à jour</button>
            </div>

            <div class="col-12 col-md-6">
                <div class="info">
                    <p>Complexité pour votre mot de passe</p>
                    <p class="small">Pour modifier votre mot de passe, vous devez respectez les critères suivants:</p>

                    <ul class="small">
                        <li>Doit avoir au moins 8 caractères</li>
                        <li>Doit avoir un caractère spéciaux</li>
                        <li>Doit avoir au moins un chiffre</li>
                    </ul>
                </div>
            </div>
        </form>

        <hr>

        <h2>Paiement</h2>
        <form class="row col-md-12">
            <div class="row">
                <div class="col-md-6 mb-3 form-group ">
                    <label for="firstName">Prénom</label>
                    <input type="text" class="form-control custominput" id="firstName" required>
                </div>

                <div class="col-md-6 mb-3 form-group">
                    <label for="lastName">Nom</label>
                    <input type="text" class="form-control custominput" id="lastName" required>
                </div>


                <div class="col-md-12 mb-3 form-group">
                    <label for="address">Addresse</label>
                    <input type="text" class="form-control custominput" id="address" placeholder="Adresse, Boîte postale ou no. Appartement" required>
                </div>

                <div class="col-md-3 mb-3">
                    <label for="zip">Code Postale</label>
                    <input type="text" class="form-control custominput" id="zip" placeholder="A1A 1A1" required>
                </div>

            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="cc-name">Nom sur la carte</label>
                    <input type="text" class="form-control custominput" id="cc-name" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="cc-number">Numéro de la carte</label>
                    <input type="text" class="form-control custominput" id="cc-number" required>
                </div>

                <div class="col-md-3 mb-3">
                    <label for="cc-expiration">Date d'expiration</label>
                    <input type="text" class="form-control custominput" id="cc-expiration" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="cc-expiration">CVV</label>
                    <input type="text" class="form-control custominput" id="cc-cvv" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary green">Mettre à jour</button>
        </form>
        
        <hr>
        <h2>Historique d'achat</h2>


        <form class="row">
            <div class="col-12">

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No. de Confirmation</th>
                            <th scope="col">Nom du billet</th>
                            <th scope="col">Date d'achat</th>
                            <th scope="col">Prix</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>100001</td>
                            <td>Yannick de Martino</td>
                            <td>12/01/2020</td>
                            <td>48$</td>
                        </tr>
                        <tr>
                            <td>100002</td>
                            <td>Céline Dion - World Show</td>
                            <td>11/04/2020</td>
                            <td>160$</td>
                        </tr>
                        <tr>
                            <td>100003</td>
                            <td>Calgary Stampeders - Finals</td>
                            <td>23/05/2020</td>
                            <td>58$</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>

    </div>
</div>
<?php
PageFrame::footer();
?>
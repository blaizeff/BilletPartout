# Fonctionnement de l'application

## Dossiers
1. **controllers:** Contient les controlleurs.
2. **library:**     Code php inclus automatiquement dans chaque page.
3. **models:**      Contients les modèles.
4. **Public:**      Tout les fichiers qui peuvent être accéder publiquement. Contient les images,CSS,Js,Font.
5. **Views:**       Contients les vues.




## MVC 
1. **Routing:** 
le fichier */.htacess* s'occupe de rediriger tous les requêtes du serveur à index.php 
sauf si l'URL commence par Public. Donc les fichiers dans public ne sont pas affecté 
par les requêtes.

Le fichier /Routes.php s'occupe créer un liens entre l'URL et une controlleur.
```                
Route::set('cart/checkout',function() { CartController::View('checkout'); });
                 ^                        ^            ^ 
            Nom de l'url     Nom du controlleur   Nom de la méthode appelé
```

2. **Controllers:**
Une fois que la route a été créer, il faut rajouté le controllers.Le controllers s'occupe 
de toutes les opérations et calculs pour une vue. Il s'occupe aussi de fairele liens entre 
la BD et la vue. les controllers sont dans le dossier controllers. Par défault la méthode view retourne la 
vue du nom passé en paramètre.


3. **Models:** 
les modèles s'occupent de faire la connexion à la BD. 
Note: tout les fetch, update, delete, ... doivent être dans des méthodes dans les Modèles.


4. **Vues:**
Les vues s'occupent d'afficher le code HTMl. 
Il devrait avoir le moins de calculs possible. 
si la vue est dans un sous répertoire de */Views*, c'est le rôle du controlleur de faire 
la bonne redirection.

## Composantes 
Si on réutilise des composantes PHP=>HTML comme afficher une liste à partir d'une querry SQL, 
on peut les mettre dans HTMLHelper et le call avec **HTML:List(...)**


## PageFrame 
Le pageFrame est similaire à HTMLHelper. La différence est qu'elle contient des parties 
d'une page et des bundles de scripts. 
Surtout utilisé pour des le Header,Footer 

## En résumé 
Si vous voulez créer une page, 
1. Créer le liens entre l'url et le controller dans /Routes.php
2. Créer le controller dans **Controllers/leController.php**
3. (Si nécésssaire) Écrivez les requètes néccéssaire à la BD dans **Models/LeModèle.php**
4. Créer la vue dans Views/laVue
5. Le Header et le Footer sont accessible avec PageFrame::Header();
6. Pour les styles et le Js, mettez le dans **public/css** et **public/js**.

# Auteurs
* Max-Antoine Clément
* Blaize Flowers-Fontaine
* Coralie Girard
* Mathieu Labelle
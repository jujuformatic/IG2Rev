Projet commencé avec HTeophile comme mini projet web à l'IG2I.
Le site n'est pas encore fonctionnel.

# Cahier des charges

Le but de ce projet est de concevoir une application web aidant les étudiants de l'IG2I à retenir leurs leçons sur le long terme.
Pour cela elle leur permet de:
-constituer des fiches de synthèse de chaque cours ordonnées par matières et chapitres
-créer des jeux de questions/réponses leur permettant de s'entraîner et de se tester sur les connaissances enregistrées
-fournir un tableau de bord à l'étudiant pour planifier ses révisions et tester ses compétences sur le long terme
L'application présente une interface permettant d'accéder à ces différentes fonctions (le menu).
L'application sera programmée pour utiliser une base de données sur serveur qui sera alimentée par les utilisateurs. Les fiches et questions/réponses peuvent être à usage personnel ou mises en commun dans des groupes d'utilisateurs.
L'application sera utilisable via un ordinateur seulement. Il n'est pas envisagé d'interface téléphone, tablette ou autre.


# Organisation des fichiers
Les données interagissant avec les utilisateurs sont uniquement les fiches, chapitres, matières et leurs propriétés, toutes ces données sont stockées dans la base de données.
Le mode sombre (si présent à temps) serait enregistré dans les cookies du navigateur.

Pour ce qui est des fichiers du site web, ils seront répartis en un dossier principal et 5 sous-dossiers:
Index et contrôleur directement dans le principal
Templates/ pour les différentes vues
Ressources/ pour les images présentes sur le site
Libs/ pour toutes les fonctions PHP et le lien avec la base de données
js/ pour le code javascript de la page
css/ pour les feuilles css (thèmes clair et sombre) de la page

# Installation

Pour l'installation, veuillez suivre les consignes dans le docuent suivant:
https://docs.google.com/document/d/1-Qk0V7nhQHltNy3PhwThvOUucjfOEo7oAXkCMpghkbM/edit

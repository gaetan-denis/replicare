# Guide d'utilisation

## Installation

Afin d’assurer le bon fonctionnement de Replicare, il est primordial de respecter les consignes suivantes : 

* Ouvrez votre invite de commande dans le dossier www de votre Wamperserver et utiliser la commande suivante `git clone https://github.com/gaetan-denis/replicare.git `

* Utilisez la commande  `CD replicare` suivie de la commande `composer install` et attendez que la mise à jour s'effectue

* Renommez ensuite le fichier `.env.example` en `.env`. Prétez une attention toute particulière aux lignes suivantes que vous devrez configurez suivant votre propres réglages afin que l'application fonctionne sans bugs : 
>DB_CONNECTION=mysql
 >
>DB_HOST=127.0.0.1
>
>DB_PORT=3306
>
>DB_DATABASE=test
>
>DB_USERNAME=root
>
>DB_PASSWORD=

* Une fois ces réglâges effectuées, saisissez la commande dans votre invite de commande la ligne suivante `php artisan key:generate`

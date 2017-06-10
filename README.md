# authchallenge
Authorisation Challenge

## Van tevoren
- is composer geinstalleerd?  http://www.getcomposer.org  (open een console en type `composer`; je moet nu de helptekst van composer zien)   *ik gebruik composer 1.2.2 2016-11-03 op een macbook pro met macos sierra 10.12.5*
- is het pad naar php.exe toegevoegd aan het systeempad?  (type in je console: `php -v`; je moet nu zien welke PHP versie je gebruikt)   *ik gebruik php 5.6.0*
- is er een commandline versie van git geinstalleerd?   (type in je console: `git --version`; je moet nu de versie van Git zien)  *ik gebruik git version 2.11.0 (Apple Git-81)*
- heb je een github account en ben je daarmee ingelogd op de website?
- is MySQL running?  (start wamp/xampp of je eigen stack)
- is PHPMyAdmin geinstalleerd en running?  (probeer via PHPMyAdmin je databases te bekijken)

## Installatie
- maak op http://github.com een nieuwe repo `authchallenge` aan voor dit project. Kopieer de link van de nieuwe repo (bijvoorbeeld `https://github.com/*jouwnaam*/authchallenge.git`);
- open PHPMyAdmin en maak een nieuwe database gebruiker `authchallenge` met wachtwoord `authchallenge` en zet het vinkje bij de optie om een database met dezelfde naam `authchallenge` te maken;
- maak een nieuwe map `authchallenge` in de webroot  *ik gebruik `~/Sites/authchallenge`, als je WAMP gebruikt `c:/wamp/www/authchallenge` en bij XAMPP `c:/xamp/htdocs/authchallenge`*
- initialiseer een nieuwe git repo  (in je console ga je naar de nieuwe map, type: `git init`)
- maak verbinding met de davinci-ao repo voor framework-php  (`git remote add dvc https://github.com/davinci-ao/framework-php.git`
- haal de laatste versie van de master-branche binnen (`git pull dvc master`)
- nu heb je alle bestanden van het framework-php in jouw lokale map staan
- koppel je map nu aan de nieuw gemaakte eigen repo (`git remote add origin https://github.com/petersnoek/authchallenge.git`)

## Configuratie
- open PHPMyAdmin, selecteer database `authchallenge` en run het script `framework.sql` (behalve de eerste twee regels want je hebt al een database gemaakt)
- pas het bestand `core/config.php` aan om je database te kunnen gebruiken:  
```php
define('DB_NAME', 'authchallenge');
define('DB_USER', 'authchallenge');
define('DB_PASS', 'authchallenge');
```
- pas het bestand `view/templates/header.php` aan; op regel 13 moet de url zijn `student/index`;
- test nu het geinstalleerde framework via http://localhost/authchallenge. Maak een student aan, bewerk deze, en verwijder 'm.'

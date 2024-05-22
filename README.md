# Basis webshop voor lessen webshop bouwen

## Starten van applicatie

In de **database** map staan een __backup.sql__

Zorg dat je je eigen database backup in deze map zet.

Maak een database naam aan en zet in het bestand **core/db_connect.php**

## Mappenstructuur

- ***admin*** 
    - Is het mapje waar het CMS (Content Management System) of Admin panel komt van de webshop.
- ***assets*** 
    - Hierin staan de css, js en images.
    - Ook staan hier de upload images die geupload worden vanuit het CMS
- ***core***
    - In dit mapje staat de database connectie.
    - De header en de footer van de HTML voorkant.
    - **admin/core** bevat nog een checklogin function file. 
- ***functions***
    - Hier komen de _functions_ van de webshop in te staan. Denk hierbij aan het ophalen van producten of het plaatsen van een bestelling.

## Login CMS
link: http://localhost/module-4-1-crud-wdv-chris071607/admin/
email: test@test.nl
pass: test123

## Database
database/webshop.sql

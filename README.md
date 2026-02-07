# Realisateion_php
# PROJET : LIVRE D'OR (GUESTBOOK)

**AUTEUR :** Kikout Salma  
**DATE :** Février 2026  

---

## DESCRIPTION
Ceci est une application simple de Livre d'or développée en PHP natif (sans Framework).
Elle permet aux utilisateurs de laisser des commentaires (Nom, Email, Message).
Les données sont stockées localement dans un fichier texte, sans base de données SQL.

## FONCTIONNALITÉS
1. **Enregistrement** : Les avis sont sauvegardés dans `avis.txt`.
2. **Format** : Les données respectent le format strict : `<<Nom|Email|Date|Message>>`.
3. **Affichage** : Affichage des 5 derniers messages postés (LIFO).
4. **Sécurité** : Protection simple contre les champs vides.
5. **Design** : Interface stylisée en CSS intégré.

## FICHIERS DU PROJET
* `livredor.php` : Code source principal (PHP + HTML + CSS).
* `README.md` : Ce fichier de documentation.
* `avis.txt` : Fichier de stockage (généré automatiquement).

## INSTALLATION
1. Placer le dossier du projet dans le répertoire racine du serveur (`www` ou `htdocs`).
2. Démarrer le serveur local (WAMP, XAMPP, etc.).
3. Accéder via le navigateur : `http://localhost/dossier/livredor.php`

## CONTRAINTES RESPECTÉES
* Pas de POO (Programmation Procédurale).
* 100% Local (Pas de MySQL).
* Stockage fichier texte.
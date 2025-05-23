# 🚀 Projet PHP – Initiation & Fondamentaux

Bienvenue dans ce projet de découverte du langage **PHP procédural**, réalisé dans le cadre de la formation *DAA#2 - PHP & BDD* (mai 2025).

## 🎯 Objectifs du projet

- Comprendre les bases de PHP : variables, boucles, fonctions, tableaux…
- Apprendre à récupérer et traiter des données via un formulaire
- Implémenter des sessions utilisateur
- Structurer un site web avec `header.php`, `footer.php` et pages de contenu
- Mettre en place un **Front Controller** pour centraliser la gestion des pages
- Vérifier et sécuriser les données envoyées par les utilisateurs
- Enregistrer les informations dans un fichier `.txt`

## 🗓️ Durée

📅 Du 19 au 23 mai 2025  
⏱️ 35 heures de code, de sueur et d’apprentissage

## 🧱 Structure du projet

- `index.php` : Point d’entrée unique (Front Controller)
- `pages/` : Contient les fichiers comme `contact.php`, `hobby.php`, etc.
- `includes/` : Contient `header.php` et `footer.php`
- `storage/` : Dossier où sont stockés les fichiers uploadés (non versionnés)
- `form-handler.php` : Vérification des champs, enregistrement dans un fichier

## 📄 Fonctionnalités principales

- Système de routing simple avec `?page=...`
- Formulaire de contact avec :
  - Civilité, Nom, Prénom
  - Email
  - Raison du contact (radio)
  - Message (minimum 5 caractères)
  - Upload de fichier
- Gestion des erreurs avec affichage des messages et conservation des champs
- Sauvegarde dans un fichier `.txt`

## 🔒 Sécurité & Bonnes pratiques

- Données validées en PHP, pas de validation HTML5 (évite les triches avec l'inspecteur)
- Filtres avec `filter_has_var()` et `filter_input()`
- Usage des `$_SESSION` pour garder les données

## 📚 Ressources utilisées

- [Manuel PHP](https://www.php.net/manual/fr/)
- [OpenClassrooms – PHP & MySQL](https://openclassrooms.com/fr/courses/918836-concevez-votre-site-web-avec-php-et-mysql)
- [Stack Overflow – Front Controller](https://stackoverflow.com/questions/6890200/what-is-a-front-controller-and-how-is-it-implemented-in-php)

## 🧠 Ce que j'ai appris

> "Chaque ligne de code est un pas de plus vers la clarté du web. Et chaque bug est un maître déguisé."

Ce projet m’a permis de comprendre le lien entre client, serveur, et développeur. D’apprendre à construire des structures robustes. Et surtout, à faire confiance à mes capacités d’apprentissage.

---

✨ *Merci à mes formateurs Henri LARGET et Vincent VERGES. Ce projet marque le début d’un long chemin dans l’univers du développement.*  
*– Sarah Popelier*

[🇬🇧 English](README.md) | [🇫🇷 Français](README.fr.md)

# Gallery Morpher

**Nom du plugin**: Gallery Morpher  
**Description**: Plugin permettant de choisir et exécuter des fonctions de migration.  
**Version**: 1.0  
**Autheur**: Cyprien Siaud  

## Description

Gallery Morpher est un outil simple qui permet aux administrateurs WordPress d'exécuter des fonctions de migration personnalisées depuis l'interface d'administration. Il inclut deux sélecteurs pour choisir les fonctions et un bouton "MIGRER" pour déclencher les actions.

## Fonctionnalités

- Interface d'administration conviviale.
- Possibilité de choisir deux fonctions de migration.
- Bouton unique pour exécuter les migrations.
- Système de mise à jour intégré pour garder le plugin à jour.
- Prise en charge de la traduction via des fichiers `.po` et `.mo`.

## Installation

1. Téléchargez le plugin.
2. Uploadez-le dans le dossier `/wp-content/plugins/` de votre site WordPress.
3. Activez le plugin via le menu "Extensions" dans l'administration WordPress.

## Utilisation

1. Accédez à "Migration Tool" dans le menu d'administration.
2. Sélectionnez les fonctions de migration dans les listes déroulantes.
3. Cliquez sur "MIGRER" pour exécuter les actions.

## Mise à jour

Ce plugin prend en charge les mises à jour automatiques via GitHub. Assurez-vous d'avoir la dernière version pour bénéficier des nouvelles fonctionnalités et des correctifs.

## Développement

Pour contribuer ou signaler des problèmes, visitez [le dépôt GitHub](https://github.com/votre-utilisateur/votre-repo).  

### Structure du code
- **Fichiers principaux**:
  - `migration-tool-plugin.php`: Fichier principal du plugin.
  - `languages/`: Dossier pour les fichiers de traduction.
  - `update-checker/`: Dossier pour la gestion des mises à jour (fourni par Plugin Update Checker).

## Journal des modifications

### Version 1.0
- Première version du plugin avec :
  - Deux sélecteurs pour les fonctions.
  - Bouton de migration.
  - Prise en charge des traductions.
  - Configuration en DB pour les fonctions.

## Licence

Ce plugin est distribué sous la licence [GPL v2 ou supérieure](https://www.gnu.org/licenses/gpl-2.0.html).

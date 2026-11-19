# Modernisation du site — notes pour l'équipe

## Ce qui a changé
- **Nouveau design** pour tout le site public : une seule feuille de style (`css/site.css`) et un seul script (`js/site.js`). Les 10 anciens fichiers CSS publics ont été supprimés.
- **En-tête et pied de page communs** (`includes/header.php`, `includes/footer.php`). Le menu mobile, le menu déroulant des paroisses, le bandeau défilant des actualités et les animations fonctionnent sans bibliothèque externe.
- **Pages réécrites** : accueil, à propos, programmes, actualités, événements, galerie, médiathèque, paroisses, page paroisse, contact, don, recherche, connexion, inscription, 404.
- **La page paroisse** (`cathederal.php?id=…`) affiche maintenant les vrais champs saisis dans l'admin (histoire, vie paroissiale, conseil, commissions, groupes, organisation, horaires, carte, réseaux sociaux). Les chiffres et les membres du conseil d'exemple (identiques pour toutes les paroisses) ont été retirés.
- **La recherche fonctionne** (`search.php?q=…`) : actualités, événements, paroisses, programmes et galerie.
- **L'admin** a un nouveau style (`Admin/Admin_Css/admin-modern.css`) et une barre latérale avec la page active surlignée. La logique des pages admin n'a pas changé.

## Corrections
- Requêtes SQL protégées contre l'injection SQL (actualités, événements, connexion, inscription, contact, don…) via `includes/db.php`.
- Le formulaire de don n'envoyait jamais le montant : corrigé. Les montants proposés correspondent maintenant à ce qui est affiché (50 €, 100 €, 2 000 €, 5 000 €).
- Après l'envoi, le formulaire de contact redirige correctement vers un message de confirmation. Le formulaire de l'accueil (qui n'envoyait rien) est maintenant branché.
- Le lien « Retour à la galerie » pointait vers une page inexistante.
- `search.php` incluait l'en-tête avec un chemin cassé.
- Dans l'admin, l'appel au pied de page avait un chemin cassé (`'../include/footer.php'`).

## À faire de votre côté
- **Base de données** : toutes les pages utilisent `includes/config.php`. Pour déployer, copiez `.env.example` vers `.env`, puis renseignez les identifiants MySQL de l'hébergeur. Le fichier `.env` local n'est pas suivi par Git et son accès HTTP est bloqué. Importez `arch_vicariat_comores.sql` dans la base avant d'ouvrir le site.
- **Coordonnées et réseaux sociaux** : renseignez la table `settings` (Admin → Settings). Le site utilise ces valeurs et prend les coordonnées actuelles par défaut. Les icônes sociales n'apparaissent que si une URL est saisie.
- **Version de PHP** : `.htaccess` force PHP 5.6 (cPanel). Le code reste compatible, mais passez à PHP 8.x dans cPanel → « MultiPHP Manager » dès que possible.
- **Moyens de paiement** : MTN Mobile Money et Airtel Money ont été conservés. Vérifiez qu'ils correspondent aux opérateurs que vous acceptez.
- **Polices** : Fraunces et Inter sont chargées depuis Google Fonts, et les icônes depuis Font Awesome (CDN).

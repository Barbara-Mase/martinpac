# MartinPAC

Ce site vitrine présente l'entreprise fictive MartinPAC spécialisée dans les pompes à chaleur. Ce projet est issu de ma formation "Développeur web et web mobile" au sein de la 3W Academy

##Stack technique
PHP 8.3
Scss
HTML/CSS

##Structure

Front :  
- layout.phtml : contient les balises head, header et footer
- home.phtml : contient le contenu de la page d'accueil présentant l'entreprise
- contact.phtml : contient le formulaire de contact
- style.scss : fichier sass ayant permis de générer la feuille de style
- style.css : fichier généré par sass

Back : 
- Router.php : permet de diriger les requêtes issues du front vers la bonne route
- AbstractController.php : contient la fonction render(string $template, array $data). Ses paramètres permettent de charger le template adapté.
- RenderController.php : contient les fonctions home() et contact() qui utilise la fonction render() précédemment citée et permettent d'afficher les erreurs éventuelles. 
- Mailer.php : fichier permettant de transmettre les informations issues du formulaire de contact vers la boite mail de l'entreprise. Ce fichier est présent à titre d'exemple et ne contient
pas ni adresse mail ni mot de passe permettant cette fonctionnalité à titre de confidentialité. Cependant, le formulaire de contact est fonctionnel une fois ces informations intégrées dans le mailer. Ce programme est issu du repository PHPMailer disposible sur Github et a été modifié pour s'adapter à MartinPAC. Le lien vers ce repository : https://github.com/PHPMailer/PHPMailer/tree/master


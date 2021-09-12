Le journal de bord de Quentin MIMAULT


1er jour :

	- Création du projet, petit moment de panique concernant le framework front Nuxt car je n'en ai jamais fait mais ce n'est pas
	pour autant que je vais déjà baisser les bras puisque j'ai une grande confiance en mon developpement Symfony
	- Le gros problème que je vois c'est pour l'authentification : j'ai jamais connecté un framework front avec Symfony. Lets go
	- Au final nuxt est assez facile a prendre en main après quelques tuto, mais bon je ne comprends toujours pas comment marche
	l'authentification, côté back petit problème avec api platform, jamais utilisé donc je télécharge une autre librairie d'api
	"nelmioApiDocBundle".
	- Comment je fais pour l'authentification ? il faut que je check les logs user cote back pour que je renvoie un token unique JWT,
	on verra ca demain


2eme jour :

	- installation d'une librairie JWT sur le back : encode et decode a JWT token, c'est parfait cote back j'ai tout ce qu'il faut
	- cote front, je ne comprends pas comment je renvoie le fameux token dans le /user après avoir envoyé les logs de connexion
	- Eureka, le token s'envoie dans le Headers Authorization.
	- Une fois compris ça, mon plus gros problème est fini place aux requêtes basiques, création de toutes les pages du front
	- Comment importer les .csv du project ? application en ligne permettant de convertir un .csv en .sql + traductions des champs fr->eng
	- Quand je renvois le User dans le /me, dans user.applicant j'ai "/api/applicants/1", mais je ne veux pas la route qui mène vers l'api
	je veux directement les donnees alors comment je fais ? Je renvois un tableau user[userData, user.applicantData]


3eme jour :

	- Comment réaliser l'algo de matching ? Typiquement quand on renseigne le champ domaine d'activité quand on est une companie, il faudrait
	que l'utilisateur puisse choisir une réponse parmi plusieurs et pas qu'il puisse insérer une réponse aléatoire, ça rendrait notre
	algo trop difficile a creer
	- Petit soucis sur l'algo de matching, les % obtenus à la fin du calcul sont faussés, debug algorithme
	- Rendre propre la fonction de calcul + la rendre évolutive : création d'un service pour transporter la methode de calcul pour
	un paramètre spécifique ailleurs. + possibilité de créer d'autres méthodes pour d'autres paramètres très intuitivement et très
	facilement : il suffit d'ajouter comme variable global un pourcentage du parametre/100 puis de copier-coller une des fonctions deja
	créée, de la modifier en fonction du paramètre puis d'ajouter ce pourcentage dans le calcul de la moyenne a la fin du calcul +
	Possibilité d'ajouter un coefficient au paramètre.


4eme jour :

	- Relecture du code, création de plusieurs stats à mettre sur la homepage


Ce que je j'aurais aimé faire de plus :

	- créer un vrai système de sécurité cote api, ici je passe juste le token de l'app, c'est déjà une petite sécurité du fait que personne
	pourra communiquer avec notre api, mais cela reste facile a contourner. Générer un token unique toutes les heures, ajouter un timestamp
	À notre token, etc.
	- créer un token propre a l'utilisateur, de sorte que ça soit que lui dans les requêtes api (typiquement dans l'update de ses
	informations) qu'il y ai que lui qui puisse les modifier
	- de manière générale, les méthodes api ne sont quasiment pas assez sécurisé, avec plus de temps il aurait été possible de créer un
	vrai rempart de securité.
	- finir de prendre en compte tous les paramètres dans l'algorithme de matching,
	- De trouver une autre méthode de récupérer d'envoyer les info dans le /me, car avec toutes les relations de l'entity User
	on trouve une circular reference, donc impossible d'envoyer simplement le user. Je sais absolument pas si c'est la bonne pratique
	en tout cas ca me semble correct.
	- créer la partie admin, cela aurait été plutot facile, il me manquait juste du temps pour la réaliser sachant que la partie CRUD
	backend était déjà faite.
	- créer une partie tchat dans un match 
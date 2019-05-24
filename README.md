Application de blog simple en PHP et avec une base de données MySQL. Interface frontend (lecture des billets) et interface backend (administration des billets pour l'écriture). On y retrouve les éléments d'un CRUD :

- Create : création de billets
- Read : lecture de billets
- Update : mise à jour de billets
- Delete : suppression de billets

Chaque billet permet l'ajout de commentaires, qui peuvent être modérés dans l'interface d'administration au besoin.
Les lecteurs peuvent "signaler" les commentaires pour que ceux-ci remontent plus facilement dans l'interface d'administration pour être modérés.

L'interface d'administration est protégée par un mot de passe. La rédaction de billets est fait dans une interface WYSIWYG basée sur TinyMCE.

Aucun framework utilisé, programmé en Orienté Object, structure MVC.

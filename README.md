Si votre le materiel et le logiciel est déjà installée et configurée, vous avez juste à lancer le script 'home.py' dans le répertoire `museoface`. Vous pouvez alors :

- Choisir le pseudo
- Prendre la photo avec un clique gauche
- Recommencer avec un clique droit
- Doucle-clique pour valider et envoyer la photo vers la galerie (si le visiteur a fait le parcours complet)

Utilisation avancée
===================

Préambule
---------

Ceci un est prototype de preuve d'un concepte, il n'est pas destinnée à être opérationnel sans une assistance technique présente sur place.

L'application à besoin d'une système avec acces à internet et une webcam. L'application utilise python avec openCV, vérifiez que ces paquets soient bien installés.

Les images de fonds doivent être tous nommées `fond_ZZZZ.jpg` où ZZZZ est un code à quatre chiffres correcpondant à l'oeuvre representée par l'image. Ces fichiers d'images doivent être dans le même repertoire que le script `./capture2.py`. Vous pouvez télécharger un jeu d'image à cet adresse : http://museoface.site/misc/img.tar 

Préparation
-----------

Vérifiez que vous être bien connecté à Internet en lancant un navigatuer web. Bien vous identifier si le wifi du musée vous le demande (par exemple en en entrant une adresse mail).

Réglage
-------

Ouvrir un terminal. Rentrer dans le repertoire "museoface" : `cd museoface`.

Lancer l'application de capture : `./capture2.py un_pseudo`. Trois fenêtre s'ouvre :

- Le résultat ('result')  : L'oeuvre de fond associé au pseudo s'affiche. Si le pseudo est inconnu, une oeuvre par défaut s'affiche (le chien).
- Object Detection : avec les différents réglages essayez de replacer le fond vert par l'oeuvre tout en voyant les personnes devant le fond vert sur l'image.
- Video Capture : L'image original non transformée et capturée.

Pour changer l'oeuvre par défaut (quand le pseud n'est pas reconnu), remplacer le fichier `fond.jpg` par une image de votre choix. 

Utilisation
-----------

Sur la fenetre de résultat vous avec plusieurs action possibles :
- Clique gauche de la souris : Figer la photo.
- Clique droit : Recommencer.
- Doucle clique : Enregistre le photo et l'envoie vers la gallerie en ligne. L'application quitte.

Si le pseudo n'est pas reconnu, la photo ne sera pas incluse dans la gallerie, mais elle est enregistré dans `result.jpg`, que vous pouvez copier sur une clé usb par exemple.

Resitution
----------

Le visteur doit faire le parcours avec l'application web pour pouvoir associer son pseudo à l'oeuvre de fond choisi. Une fois la photo prise et envoyée comme indiqué ci-dessus, le visiteur peut voir son portrait sur la gallerie à cette adresse : http://museoface.site/index.php/welcome/gallery

Uilisation autonome
-------------------

Pour que le visiteur puisse être autonome, quelques réglage s'impose. D'abord fait le réglage précedement pour trouver les bonne valeurs. Ensuite dans le fichier `capture2.py`, modifiez ces lignes en début de fichier :

```
low_H = 0
low_S = 0
low_V = 0
high_H = max_value_H
high_S = max_value
high_V = max_value
```

En remplaçant les 6 valeurs par celles trouvées par le réglage effectué précédement.

Enregistrez et fermé le fichier. Maintenant lancez une autre application `./home.py`. Une fenêtre s'ouvre. Le visiteur peut rentrer lui même son pseudo, puis prendre la photo et la valider comme décrit ci-dessus. Une fois validée et envoyée, la fenêtre pour recommencer ou rentrer un nouveau pseudo s'ouvre de nouveau. Si le pseudo n'est pas reconnu, une image par défaut est affichée.

Auteurs
-------
L'équipe Les perchés Museomix Nord 2018
Contact Technique : Florent Kaisser  <florent@kaisser.name>
 

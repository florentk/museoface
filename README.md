Préambule
---------

Ceci un est prototype de preuve d'un concepte, il n'est pas destinnée à être opérationnel sans une assistance technique présente sur place.

L'application à besoin d'une système avec acces à internet et une webcam. L'application utilise python avec openCV, vérifiez que ces paquets soient bien installés.

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

Utilisation
-----------

Sur la fenetre de résultat vous avec plusieurs action possibles :
- Clique gauche de la souris : Figer la photo.
- Clique droit : Recommencer.
- Doucle clique : Enregistre le photo et l'envoie vers la gallerie en ligne. L'application quitte.


Resitution
----------

Le visteur doit faire le parcours avec l'application web pour pouvoir associer son pseudo à l'oeuvre de fond choisi. Une fois la photo prise et envoyée comme indiqué ci-dessus, le visiteur peut voir son portrait sur la gallerie à cette adresse : http://museoface.site/index.php/welcome/gallery

Auteurs
-------
L'équipe Les perchés Museomix Nord 2018
Contact Technique : Florent Kaisser  <florent@kaisser.name>
 

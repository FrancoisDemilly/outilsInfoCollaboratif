
<?php
//host: localhost
//base: oiseaux_form
//login: root
//pwd: "" or root

//connexion to database

try{
  $db = new PDO('mysql:host=localhost;dbname=oiseaux_form;charset=utf8', 'root', '');
} catch(Exception $e) {
  die('erreur: '.$e->getMessage());
}
//ajouter un commentaire
//vérifier que les champs du formulaire existent
if(isset($_POST['fname']) && isset($_POST['username'])
  && isset($_POST['age']) && isset($_POST['job'])
  && isset($_POST['email']) && isset($_POST['comments'])
//vérifier que les champs du formulaire soient remplis
  && !empty($_POST['fname']) && !empty($_POST['username'])
  && !empty($_POST['age']) && !empty($_POST['job'])  
  && !empty($_POST['email']) && !empty($_POST['comments']) ){
    //declaration des variables
    $fname = $_POST['fname'];
    $username = $_POST['username'];
    $age = $_POST['age'];
    $job = $_POST['job'];
    $email = $_POST['email'];
    $comments = $_POST['comments'];
   
//préparation de la requete selon ma methode PDO
$request = $db->prepare('INSERT INTO commentaires(fname, username, age, job, email, comments) 
                VALUES(?, ?, ?, ?, ?, ?)') or die(print_r($db->errorInfo()));

//execution de la requete selon methode PDO
$request->execute(array($fname, $username, $age, $job, $email, $comments));

//redirection de la page pour eviter d'envoyer plusieurs le formulaire lorsque l'on clique envoie
header('direction: ../');
       
}

?>




<!DOCTYPE html>
<html lang="fr" class="has-navbar-fixed-top">
	<head>
    <title>Les oiseaux les plus colorés de France</title>
    <!-- responsive viewport meta tag -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- je n'ai pas ajouté de conten-type pour le moment-->
    <!-- Content-Type: multipart/form-data; boundary=something -->      
    <meta name="author" content="François Demilly">
    <meta name="description" content="Les oiseaux les plus colorés de France">
    <meta name="keyword" content="oiseaux, france, couleurs, 
    Loriot d'Europe, Rollier d'Europe, Guêpier d'Europe, Martin-pêcheur d'Europe,
    Gorgebleue à miroir,  Panure à moustaches, Huppe fasciée, Héron pourpré, 
    Bergeronnette printanière, Bouvreuil pivoine "> 
    <script type="application/ld+json">
      {
        "@context": "http://schema.org",
        "@type": "page web",
        "author": "françois Demilly",
        "description": "Les oiseaux les plus colorés de France",
        "oiseaux":{
          {"name":"Loriot d'Europe",
           "@id": "https://fr.wikipedia.org/wiki/Loriot_d%27Europe"},
           {"name":"Rollier d'Europe",
           "@id": "https://fr.wikipedia.org/wiki/Rollier_d%27Europe"},
           {"name":"Guêpier d'Europe",
           "@id": "https://fr.wikipedia.org/wiki/Gu%C3%AApier_d%27Europe"},
           {"name":"Martin-pêcheur d'Europe",
           "@id": "https://fr.wikipedia.org/wiki/Martin-p%C3%AAcheur_d%27Europe"},
           {"name":"Gorgebleue à miroir",
           "@id": "https://fr.wikipedia.org/wiki/Gorgebleue_%C3%A0_miroir"},
           {"name":"Panure à moustaches",
           "@id": "https://fr.wikipedia.org/wiki/Panure_%C3%A0_moustaches"},
           {"name":"Huppe fasciée",
           "@id": "https://fr.wikipedia.org/wiki/Huppe_fasci%C3%A9e"},
           {"name":"Héron pourpré",
           "@id": "https://fr.wikipedia.org/wiki/H%C3%A9ron_pourpr%C3%A9"},
           {"name":"Bergeronnette printanière",
           "@id": "https://fr.wikipedia.org/wiki/Bergeronnette_printani%C3%A8re"},
           {"name":"Bouvreuil pivoine",
           "@id": "https://fr.wikipedia.org/wiki/Bouvreuil_pivoine"},
        }
      }
    </script>
    <!-- utilisation de la framework css bulma https://bulma.io/ 
    option pour le cdn afin de simplifier l'usage au maximum-->
    <link rel="stylesheet" 
    href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma-rtl.min.css">
    <!-- fichier css pour quelques customisation de la framework bulma-->
    <link rel="stylesheet" type="text/css"  href="style.css">                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
  </head>
	<body>
    
    <!-- Animated Navbar -->
  <nav class="navbar is-fixed-top is-light" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <!--J'ai gardé une structure très simple qui correspond a un site de présentation-->
    <!-- pour passer du site stylé au site non stylé -->
    <button class="button"><a href="index.html">Page sans style</a></button>
    <button class="button"><a href="indexStyled.php">Page avec style sans JS</a></button>

    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <div class="navbar-item has-dropdown is-hoverable">
          <a class="navbar-link" onclick="myscroll('title')">
            Oiseaux
          </a>

          <div class="navbar-dropdown">
            <a class="navbar-item" onclick="myscroll('loriot');">
              Loriot d'Europe
            </a>
            <a class="navbar-item" onclick="myscroll('rollier');">
              Rollier d'Europe
            </a>
            <a class="navbar-item" onclick="myscroll('guepier');">
              Guêpier d'Europe
            </a>
            <a class="navbar-item" onclick="myscroll('martin');">
              Martin-pêcheur d'Europe
            </a>
            <a class="navbar-item" onclick="myscroll('gorgebleue');">
              Gorgebleue à miroir
            </a>
            <a class="navbar-item" onclick="myscroll('panure');">
             Panure à moustaches
            </a>
            <a class="navbar-item" onclick="myscroll('huppe');">
              Huppe fasciée
            </a>
            <a class="navbar-item" onclick="myscroll('heron');">
              Héron pourpré
            </a>
            <a class="navbar-item" onclick="myscroll('bergeronnette');">
              Bergeronnette printanière
            </a>
            <a class="navbar-item" onclick="myscroll('bouvreuil');">
              Bouvreuil pivoine
            </a>
          </div>
        </div>
      <a class="navbar-item" onclick="myscroll('video');">
        Vidéo
      </a>

      <a class="navbar-item"  onclick="myscroll('contact');">
        Contact
      </a>
      <a class="navbar-item"  onclick="myscroll('ambassade');">
        Ambassades
      </a>
      <a class="navbar-item" id="secretLink">
        Secret
      </a>

      
    </div>
  </div>
</nav>
    <!-- End Animated Navbar -->
    <!--titre --> 
    <div class="content">
      <h1 class="has-text-centered" id="title">Les oiseaux les plus colorés de France</h1>
      <span id="secret"></span>
    </div>
    <!--permet de centrer horizontalement-->
    <div class="container">
    <!--la section permet de divider la page en une section pour toutes les images-->
    <div class="section">
    <!--columns permet de disposer les items de façon responsif grace à flexbox,
      l'option is-multilne permet d'avoir plusieurs lignes d'items-->
    <div class="columns is-multiline" >  
      <!-- column is-half permet de définir la taille d'une item comme la moitié 
      de l'espace disponible-->   
      <div class="column is-half">
        <!--card permet de créer des items polyvalentes et flexibles
        à partir de sous-éléments-->
        <div class="card" id="loriot">
          <!--card-header créé une barre horizontale avec une ombre -->
          <div class="card-header">
            <!-- card-header-title un texte en gras aligné à gauche-->
            <div class="card-header-title">
              <!--subtitle appartient au composant title et permet d'ajouter
                de la profondeur à votre page-->
              <h3 class="subtitle">Loriot d'Europe</h3>
            </div>
          </div>
          <!--card-content un contenant polyvalent pour tout autre élément-->
          <div class="card-content">
            <!-- lettrine , class additionel pour gérer la lettrine, 
            voir fichier style.css-->
            <p><span class="lettrine">D</span>e la taille d'un merle et doté d'un chant extrêmement flputé, 
              le Loriot d'Europe surprend d'emblée par son magnifique plumage 
              d'un jaune très vif !
              Pourtant, cet oiseau de la famille des Oriolidés sait pourtant se 
              faire très discret. Il apprécie les forêts de feuillus de toute
              la France,mais ne s'établit pas dans des régions comme la Bretagne, 
              la Corse ou le Cotentin (désolés !)
            </p>
          </div>
          <!--pas de dimensions prédéfinis on été déterminé pour ce container
          ce qui peux deformer le layout le temps que l'image charge-->
          <div>
            <!-- figure et img gère les image avec is-4by3 comme ratio-->
            <figure class="image is-4by3"> 
              <img  src="./img/loriot.jpg" alt="Loriot d'Europe">
            </figure>
          </div>
        </div> <!-- end of top card--> 
          <div class="card">
            <div class="card-header">
              <h4 class="card-header-title">Information</h4>
            </div>
            <div class="card-content">
              <ul>
                <li><span>Nom</span> : Oriolus oriolus</span></li>
                <li><span>Taille</span> : 25 cm</li>
                <li><span>Envergure</span> : - </li>
                <li><span>Poids</span> : 65 &agrave; 78 g</li>
                <li><span>Longévité</span> : 8 ans</li>         
              </ul>
            </div>
            <!--card-footer créé une liste horizontale de contrôles-->
            <div class="card-footer">
              <p>Pour en savoir plus...
                <a href="https://www.oiseaux.net/oiseaux/loriot.d.europe.html" target="_blank">
                  Oiseaux.net
                </a>
                et 
                <a href="https://fr.wikipedia.org/wiki/Loriot_d%27Europe" target="_blank">
                  Wikipedia
                </a>
              </p>
            </div>
        </div> <!--end of card-->
      </div> <!-- end of column is-half -->
      <div class="column is-half">
        <div class="card" id="rollier">
          <div class="card-header">
            <div class="card-header-title">    
              <h3 class="subtitle">Rollier d'Europe</h3>
            </div>
          </div>
          <div class="card-content">
            <p><span class="lettrine">A</span>près le jaune, que diriez-vous de passer au bleu ? Voire au
              bleu turquoise ? Car c'est bien là la couleur du magnifique Rollier 
              d'Europe, un oiseau trapu qui vit principalement dans le sud de 
              la France. Cette espèce est très présente en Provence et en Languedoc,
              où il se nourrit de gros insectes comme les sauterelles, les grillons
              ou les mantes religieuses.
            </p>
          </div>
          <div >
            <figure class="image is-4by3"> 
              <img  src="./img/rollier.jpg" alt="Rollier d'Europe" >
            </figure>
          </div>
        </div> <!-- end of top card-->     
          <div class="card">
            <div class="card-header">
              <h4 class="card-header-title">Information</h4>
            </div>
            <div class="card-content">
              <ul>
                <li><span>Nom</span> : Coracias garrulus</li>
                <li><span>Taille</span> : 32 cm</li>
                <li><span>Envergure</span> : 66 &agrave; 73 cm</li>
                <li><span>Poids</span> : 110 &agrave; 155 g</li>
                <li><span>Longévité</span> : 9 ans</li>
              </ul>
            </div>
            <div class="card-footer">
            <p>Pour en savoir plus...
              <a href="https://www.oiseaux.net/oiseaux/rollier.d.europe.html" target="_blank">
                Oiseaux.net
              </a>
              et 
              <a href="https://fr.wikipedia.org/wiki/Rollier_d%27Europe" target="_blank">
                Wikipedia
              </a>
            </p>
            </div>
          </div>
      </div> <!-- end of column -->
      <div class="column is-half">
        <div class="card" id="guepier">
          <div class="card-header">
            <div class="card-header-title">  
              <h3 class="subtitle">Guêpier d'Europe</h3>
            </div>
          </div>
          <div class="card-content">
            <p><span class="lettrine">I</span>l y a encore quelques décennies inféodé aux régions les plus au 
              sud de l'Hexagone, le Guêpier d'Europe est peu à peu remonté vers
              le nord, à la faveur du changement climatique. À tel point qu'
              aujourd'hui, on	peut même le croiser en région Île de France !
              Comme son nom l'indique, il raffole des hyménoptères (guêpe,
              abeille, bourdon, frelon...)
            </p>
          </div>
          <div>
            <figure class="image is-4by3"> 
              <img src="./img/guepier.jpg" alt="Guêpier d'Europe">
            </figure>
          </div>
      </div> <!-- end of top card--> 
        <div class="card">
          <div class="card-header">
            <h4 class="card-header-title">Information</h4>
          </div>
          <div class="card-content">
            <ul>
              <li><span>Nom</span> : Merops apiaster</li>
              <li><span>Taille</span> : 28 cm</li>
              <li><span>Envergure</span> : 44 &agrave; 49 cm</li>
              <li><span>Poids</span> : 44 &agrave; 78 g</li>
              <li><span>Longévité</span> : - </li>
            </ul>
          </div>
          <div class="card-footer">
            <p>Pour en savoir plus...
            <a href="https://www.oiseaux.net/oiseaux/guepier.d.europe.html" target="_blank">
                Oiseaux.net
            </a>
            et 
            <a href="https://fr.wikipedia.org/wiki/Gu%C3%AApier_d%27Europe" target="_blank">
                Wikipedia
            </a>
            </p>
          </div>
        </div>
      </div>

      <div class="column is-half">
        <div class="card" id="martin">
          <div class="card-header">
            <div class="card-header-title">
              <h3 class="subtitle">Martin-pêcheur d'Europe</h3>
            </div>
          </div>
          <div class="card-content">
            <p><span class="lettrine">U</span>n magnifique oiseau malheureusement sur le déclin partout en 
              France, du fait de la raréfaction des zones humides et de la 
              pollution des points d'eau. 
              Le martin-pêcheur a en effet besoin d'une eau très pure pour 
              pouvoir se nourrir correctement. Il pêche des petits poissons
              et parfois des écrevisses (il régule ainsi l'écrevisse de 
              Louisiane, espèce invasive) !
            </p>
          </div>
        <div >
          <figure class="image is-4by3"> 
            <img class="imgsize"  src="./img/martin.jpg" alt="Martin-pêcheur d'Europe" >
          </figure>
        </div>
      </div> <!-- end of top card--> 
        <div class="card">
          <div class="card-header">
            <h4 class="card-header-title">Information</h4>
          </div>
          <div class="card-content">
            <ul>
              <li><span>Nom</span> : Alcedo atthis</li>
              <li><span>Taille</span> : 16cm</li>
              <li><span>Envergure</span> : 24 &agrave; 26 cm</li>
              <li><span>Poids</span> : 30 &agrave; 45 g</li>
              <li><span>Longévité</span> : 15 ans</li>
            </ul>
          </div>
          <div class="card-footer">
            <p>Pour en savoir plus...
              <a href="https://www.oiseaux.net/oiseaux/martin-pecheur.d.europe.html" target="_blank">
                  Oiseaux.net
              </a>
              et 
              <a href="https://fr.wikipedia.org/wiki/Martin-p%C3%AAcheur_d%27Europe" target="_blank">
                  Wikipedia
              </a>
            </p>
          </div>
        </div>
      </div>
      <div class="column is-half"> 
        <div class="card" id="gorgebleue">
          <div class="card-header">
            <div class="card-header-title">
              <h3 class="subtitle">Gorgebleue à miroir</h3>
            </div>
          </div>
          <div class="card-content">
            <p><span class="lettrine">V</span>oilà un migrateur discret qui fait le bonheur des photographes
              animalier, qui adorent immortaliser ses belles couleurs. Ce petit
              passereau au chant puissant rentre en France à partir du mois de
              mars, selon les températures et est inféodé aux roselière épaisses
              dans lesquelles il se nourrit et bâtit un nid douillet pour ses
              oisillons !
            </p>
          </div>
        <div >
          <figure class="image is-4by3"> 
            <img src="./img/gorge.jpg" alt="Gorgebleue à miroir" >
          </figure>
        </div>
      </div> <!-- end of top card--> 
        <div class="card">
          <div class="card-header">
            <h4 class="card-header-title">Information</h4>
          </div>
          <div class="card-content">
            <ul>
              <li><span>Nom</span> : Luscinia svecica</li>
              <li><span>Taille</span> : 15 cm</li>
              <li><span>Envergure</span> : 23 cm</li>
              <li><span>Poids</span> : 15 &agrave; 23 g</li>
              <li><span>Longévité</span> : 8 ans</li>
            </ul>
          </div>
          <div class="card-footer">
            <p>Pour en savoir plus...
              <a href="https://www.oiseaux.net/oiseaux/gorgebleue.a.miroir.html" target="_blank">
                  Oiseaux.net
              </a>
              et 
              <a href="https://fr.wikipedia.org/wiki/Gorgebleue_%C3%A0_miroir" target="_blank">
                Wikipedia
              </a>
            </p>
          </div>
        </div>
      </div>
      <div class="column is-half"> 
        <div class="card" id="panure">
          <div class="card-header">
            <div class="card-header-title">
              <h3 class="subtitle">Panure à moustaches</h3>
            </div>
          </div>
          <div class="card-content">
            <p><span class="lettrine">V</span>oici une autre habitant de nos épaisses roselières en bordure de
              zones humides. La panure à moustaches, de la taille d'une grosse 
              mésange, ne quitte d'ailleurs presque jamais ce milieu puisque ce 
              passereau ne migre pas ! Pour l'observer, il convient d'avoir 
              l'oreille car c'est avant tout et surtout à son chant que l'on
              parvient à la repérer...
            </p>
          </div>
        <div >
          <figure class="image is-4by3">
            <img class="imgsize"  src="./img/panure.jpg" alt="Panure à moustaches" >
          </figure>
        </div>
      </div> <!-- end of top card--> 
        <div class="card">
          <div class="card-header">
            <h4 class="card-header-title">Information</h4>
          </div>
          <div class="card-content">
            <ul>
              <li><span>Nom</span> : Panurus biarmicus</li>
              <li><span>Taille</span> : 17 cm</li>
              <li><span>Envergure</span> : 16 &agrave; 18 cm </li>
              <li><span>Poids</span> : 12 &agrave; 18 g</li>
              <li><span>Longévité</span> : 6 ans</li>
            </ul>
          </div>
          <div class="card-footer">
            <p>Pour en savoir plus...
              <a href="https://www.oiseaux.net/oiseaux/panure.a.moustaches.html" target="_blank">
                  Oiseaux.net
            </a>
              et 
            <a href="https://fr.wikipedia.org/wiki/Panure_%C3%A0_moustaches" target="_blank">
                  Wikipedia
            </a>
            </p>
          </div>
        </div>
      </div>
      <div class="column is-half"> 
        <div class="card" id="huppe">
          <div class="card-header">
            <div class="card-header-title">
              <h3 class="subtitle">Huppe fasciée</h3>
            </div>
          </div>
          <div class="card-content">
            <p><span class="lettrine">U</span>ne belle discrète au bec interminable et au chant qui lui a 
              donné son nom (houp ! houp ! houp !) La huppe fasciée se rencontre 
              principalement au sud de la Loire, où ses effectifs semblent bien 
              se maintenir. Très gourmande, elle se nourrit aussi bien de vers
              que d'insectes qu'elle va chercher directement dans le sol ou dans
              le bois des arbres morts.
            </p>
          </div>
        <div >
          <figure class="image is-4by3"> 
            <img class="imgsize"  src="./img/huppe.jpg" alt="Huppe fasciée" >
          </figure>
        </div>
      </div> <!-- end of top card--> 
        <div class="card">
          <div class="card-header">
            <h4 class="card-header-title">Information</h4>
          </div>
          <div class="card-content">
            <ul>
              <li><span>Nom</span> : Upupa epops</li>
              <li><span>Taille</span> : 32 cm</li>
              <li><span>Envergure</span> : 42 &agrave; 46 cm</li>
              <li><span>Poids</span> : 55 &agrave; 80 g</li>
              <li><span>Longévité</span> : 11 ans</li>
            </ul>
          </div>
          <div class="card-footer">
            <p>Pour en savoir plus...
              <a href="https://www.oiseaux.net/oiseaux/huppe.fasciee.html" target="_blank">
                  Oiseaux.net
              </a>
              et 
              <a href="https://fr.wikipedia.org/wiki/Huppe_fasci%C3%A9e" target="_blank">
                  Wikipedia
              </a>
            </p>
          </div>
        </div>
      </div>
      <div class="column is-half"> 
        <div class="card" id="heron">
          <div class="card-header">
            <div class="card-header-title">
              <h3 class="subtitle">Héron pourpré</h3>
            </div>
          </div>
          <div class="card-content">
            <p ><span class="lettrine">N</span>e cherchez pas le héron pourpré à l'heure où nous publions ces 
              lignes, vous ne le verrez pas puisqu'il se trouve actuellement...
              en Afrique ! 
              Hé oui, le magnifique héron pourpré, aux belles couleurs brique, 
              grises et orange migre pendant la mauvaise saison et ne revient
              coloniser les zones humides de France que pendant la belle saison...
            </p>
          </div>
          <div >
            <figure class="image is-4by3">
              <img src="./img/heron.jpg" alt="Héron pourpré" >
            </figure>
          </div>
        </div> <!-- end of top card--> 
        <div class="card">
          <div class="card-header">
            <h4 class="card-header-title">Information</h4>
          </div>
          <div class="card-content">
            <ul>
              <li><span>Nom</span> : Ardea purpurea</li>
              <li><span>Taille</span> : 90 cm</li>
              <li><span>Envergure</span> : 120 &agrave; 150 cm</li>
              <li><span>Poids</span> : 600 &agrave; 1400 g</li>
              <li><span>Longévité</span> : 25 ans</li>
            </ul>
          </div>
          <div class="card-footer">
            <p>Pour en savoir plus...
              <a href="https://www.oiseaux.net/oiseaux/heron.pourpre.html" target="_blank">
                  Oiseaux.net
              </a>
              et 
              <a href="https://fr.wikipedia.org/wiki/H%C3%A9ron_pourpr%C3%A9" target="_blank">
                  Wikipedia
              </a>
            </p>
          </div>
        </div>
      </div>

      <div class="column is-half">
        <div class="card" id="bergeronnette">
          <div class="card-header">
            <div class="card-header-title">
              <h3 class="subtitle">Bergeronnette printanière</h3>
            </div>
          </div>
          <div class="card-content">
            <p><span class="lettrine">V</span>oici une bergeronnette qui, si on n'a pas un oeil un peu aguerri,
              peut facilement être confondue avec ses cousines la bergeronnette
              des ruisseaux ou encore la bergeronnette citrine ! L'intégralité du
              dessous du corps de ce petit oiseau (famille Motacilla) est 
              entièrement jaune vif tandis qu'en période nuptiale, le mâle arbore
              un large masque noir profond.
            </p>
          </div>
          <div >
            <figure class="image is-4by3"> 
              <img class="imgsize"  src="./img/berge.jpg" alt="Bergeronnette printanière">
            </figure>
          </div>
        </div> <!-- end of top card--> 
        <div class="card">
          <div class="card-header">
            <h4 class="card-header-title">Information</h4>
          </div>
          <div class="card-content">
            <ul>
              <li><span>Nom</span> : Motacilla flava</li>
              <li><span>Taille</span> : 16 cm</li>
              <li><span>Envergure</span> : 28 cm</li>
              <li><span>Poids</span> : - </li>
              <li><span>Longévité</span> : 8 ans</li>
            </ul>
          </div>
          <div class="card-footer">
            <p>Pour en savoir plus...
              <a href="https://www.oiseaux.net/oiseaux/bergeronnette.printaniere.html" target="_blank">
                  Oiseaux.net
              </a>
              et 
              <a href="https://fr.wikipedia.org/wiki/Bergeronnette_printani%C3%A8re" target="_blank">
                  Wikipedia
              </a>
            </p>
          </div>
        </div>
      </div>
      <div class="column is-half">
        <div class="card" id="bouvreuil">
          <div class="card-header">
            <div class="card-header-title">
              <h3 class="subtitle">Bouvreuil pivoine</h3>
            </div>
          </div>
          <div class="card-content">
            <p><span class="lettrine">O</span>n termine cette sélection haute-en-couleurs avec une gros oiseau
              qui, pendant les hivers rigoureux, peut volontiers venir visiter 
              les mangeoires de jardins ! Le bouvreuil pivoine ne peut pas se 
              rater, tant sa silhouette toute ronde et surtout d'une belle 
              couleur rouge-rosée se démarque dans les paysages mornes de 
              l'hiver. Et vous, l'avez-vous déjà vu ?
            </p>
          </div>
          <div >
            <figure class="image is-4by3"> 
              <img src="./img/bouvreuil.jpg" alt="Bouvreuil pivoine" >
            </figure>
          </div>
        </div> <!-- end of top card--> 
        <div class="card">
          <div class="card-header">
            <h4 class="card-header-title">Information</h4>
          </div>
          <div class="card-content">
            <ul>
              <li><span>Nom</span> : Pyrrhula pyrrhula</li>
              <li><span>Taille</span> : 16 cm</li>
              <li><span>Envergure</span> : 28 cm</li>
              <li><span>Poids</span> : 26 &agrave; 38 g</li>
              <li><span>Longévité</span> : 17 ans</li>
            </ul>
          </div>
          <div class="card-footer">
            <p>Pour en savoir plus...
              <a href="https://www.oiseaux.net/oiseaux/bouvreuil.pivoine.html" target="_blank">
                  Oiseaux.net
              </a>
              et 
              <a href="https://fr.wikipedia.org/wiki/Bouvreuil_pivoine" target="_blank">
                  Wikipedia
              </a>
            </p>
          </div>
        </div>
      </div>
      <div class="column is-full">
        <div class="card" id="video">
          <div class="card-header">
            <div class="card-header-title ">
              <h3 class="subtitle">Vidéo d'une Bergeronnette</h3>
            </div>
          </div>
          <figure class="is-flex is-flex-direction-row is-justify-content-center">
            <iframe class="has-ratio" width="640" height="360"
            src="http://localhost/projets/UOR/video/BERGERONNETTE.mp4" type="video/mp4"
            frameborder="0" allowfullscreen>
            </iframe>
          </figure>
        </div> <!-- end of top card--> 
      </div> <!--end of column-->
     
      <form method="post" action="indexStyled.php" class="column is-full">
        <div class="card" id="contact">
          <div class="card-header">
            <div class="card-header-title ">
              <h3 class="subtitle">Laisser votre avis avec MYSQL</h3>
            </div>
          </div>
            <div class="card-content">
              <div class="field">
                <label class="label">Nom</label>
                <div class="control">
                  <input name="fname" class="input" type="text" placeholder="Text input">
                </div>
              </div>
              
              <div class="field">
                <label class="label">Nom d'utilisateur</label>
                <div class="control">
                  <input name="username" class="input" type="text" placeholder="Text input">
                </div>
              </div>

              <div class="field">
                <label class="label">Age</label>
                <div class="control">
                  <input name="age" class="input" type="number" min="0" step="1"  placeholder="Text input" maxlength="2" >
                </div>
              </div>

              <div class="field">
                <label class="label">Profession</label>
                <div class="control">
                  <input name="job" class="input" type="text" placeholder="Text input" maxlength="50" >
                </div>
              </div>

              <div class="field">
                <label class="label">Email</label>
                <div class="control">
                  <input name="email" class="input" type="email" placeholder="Email input">
                </div>
              </div>
              
              <div class="field">
                <label class="label">Message</label>
                <div class="control">
                  <input name="comments" class="input" type="text" placeholder="Max 50 caractères" maxlength="50" >
                </div>
              </div>
              
              <div class="field is-grouped">
                <div class="control">
                  <button type="submit" name="submit" value="Submit" class="button is-link">Envoi</button>
                </div>
              </div>
            </div> <!-- end of class content-->
        </div> <!-- end of top card--> 
      </form> <!--end of form-->
    </div> <!--end of class columns-->

    <!-- display data from data base -->
    <table class="table">
      <thead>
        <tr>
          <th>Nom</th>
          <th>Nom d'utilisateur</th>
          <th>Age</th>
          <th>Profession</th>
          <th>Email</th>
          <th>Commentaire</th>
        </tr>
      </thead>
      <?php
      //read data 
      $request = $db->query('SELECT * FROM commentaires ORDER BY id DESC');

      //display data 
      while($data = $request->fetch()){
        echo '<tr>
                <td>'.$data['fname'].'</td>
                <td>'.$data['username'].'</td>
                <td>'.$data['age'].'</td>
                <td>'.$data['job'].'</td>
                <td>'.$data['email'].'</td>
                <td>'.$data['comments'].'</td>
              </tr>';
      }
      //close request
      $request->closeCursor();
      ?>
    </table>

    <!-- partie concernant le bonus du chapitre 6 -->
    <div class="card" id="ambassade">
      <div class="card-header">
        <h4 class="card-header-title">Liste des Ambassades de France</h4>
      </div>
      <div class="card-content">
        <p>
          Si vous souhaitez voyager dans le monde entier pour observer les oiseaux,
          je vous recommande de noter les coordonnées de l'Ambassade de France du pays que vous visiterez.
        </p>
        <div>
          <input class="input" id="recherche" type="text" placeholder="Pays de destination">
          <input class="button" id="recherbtn" type="submit" value="Rechercher">
        </div>
        <table class="table">
          <thead>
            <tr>
              <th>Pays</th>
              <th>Ville</th>
              <th>Téléphone</th>
              <th>Lien</th>
              <th>Nom</th>
            </tr>
          </thead>
          <tbody id="myData">
          </tbody>
        </table>
      </div> <!-- end of class content-->
    </div> <!-- end of top card-->
      <!-- end of displaying data -->
    <footer class="footer" >
      <div class="content has-text-centered">
        <p>
            Merci, j'espère que cette page vous aura intéressé autant que moi!
        </p>
      </div>
    </footer>
  </div> <!-- end of class section-->
  </div> <!-- end of class container -->
  <!-- 1ere façon d'ajouter du javascript grace à un fichier .js -->
  <script type="text/javascript" src='script.js'></script>
  <!-- 2eme façon d'ajouter du javascript grace a des balises script dans le fichier .html ou .php -->
  <script>
  var linkToSecret = document.getElementById('secretLink')
  linkToSecret.addEventListener("click", function() {
    document.getElementById('secret').innerHTML +=
     `<div class="content has-text-centered">
        <h5>
          Si votre ramage - Se rapporte à votre plumage, - Vous êtes le phénix des hôtes de ces bois.
        </h5>
      </div>`
    }); 

//script conernant la partie bonus du chapitre 6

//declaration de la variable pour stocker le mot clef de
//la recherche en tant que string vide
var recherval = ""

//obtenir la valeur entrée dans le champ input grace à un event listener
//placé sur le button "rechercher"
//déclenche la fonction qui gére le filtre et l'insertion dans le DOM
document.getElementById("recherbtn").addEventListener("click", function() {
  recherval = document.getElementById("recherche").value
  displayJson(recherval)
})

//fonction qui gére le filtre et l'insertion de html dans le DOM
function displayJson(recherval) {
  //mainContainer est l'ancre où insérer le code html dans le DOM
  var mainContainer = document.getElementById("myData");
  //remise à zero du DOM au niveau de l'ancre 
  mainContainer.innerHTML = "";
  //extraction des donnée du fichier diplomatie.json grâce la
  fetch('diplomatie.json')
  //méthode fetch qui retourne une réponse sous forme de promesse
  //https://developer.mozilla.org/fr/docs/Web/API/Fetch_API
    .then(function (response) {
      //https://developer.mozilla.org/en-US/docs/Web/API/Response/json
  //la méthode .json() prend JSON comme entrant et produit un objet Javascript 
      return response.json();
    })
    .then(function (data) {
  //lecture de l'objet retourner par .json() et appelé ici data, 
  //lecture séquencielle des couples clé:value de l'Object Literals
      for (item in data) {
  //si il y a un mot clé
        if(recherval){
          //comparer le mot clé représentant le pays avec le pays de l 'objet javascript
          if(JSON.stringify(recherval).toUpperCase() === 
          JSON.stringify(data[item][0]['pays']).toUpperCase()) {
            //si l'égalité est vrai, appelé la fonction qqui inset du html dans le DOM
            //cela n 'insert que l'objet
            appendData(data, mainContainer)
          }
        } else {
        //appéle la fonction qu écrit dans le DOM
        //a chaque item (couple clé:valeur) de l'object literals
        appendData(data, mainContainer)
        }
    }})
    //en cas d'erreur retourner par la promesse
    .catch(function (err) {
      console.log('error: ' + err);
    });
  }

  

    //fonction insérant du code html dans le DOM
    //arguments sont l'item (couple clé:valeur), et l'ancre
    //où insérer le code
      function appendData(data, mainContainer) {
      //la méthode createElement crée un élément spécifié par le tagName  
      //https://developer.mozilla.org/en-US/docs/Web/API/Document/createElement
        let div = document.createElement("tr");
      //permet insérer une string représentat des balises html
      //ici on utilise un gabarit ``, les espaces reservés aux expressions
      //sont indiqués par ${expression} 
        div.innerHTML = `
          <td>${data[item][0]['pays']}</td>
          <td>${data[item][0]['ville']}</td>
          <td>${data[item][0]['téléphone']}</td>
          <td>${data[item][0]['url']}</td>
          <td>${data[item][0]['nom']}</td>`
      //appendChild ajoute un nœud à la fin de la liste des enfants d'un nœud parent spécifié.
        mainContainer.appendChild(div)
      }
  
//invocation de la fonction chargeant liste lorsque
//la fenêtre du navigateur charge
window.onload = function(){
  displayJson(recherval);
}
    
</script>

<script>
  //global config object pour parmétrer le bot
  var botmanWidget = {
    frameEndpoint: './chat.html',
    introMessage: 'Bienvenue sur le chatbot UOR',
    chatServer : './chat.php', 
    title: 'UOR ChatBot', 
    mainColor: '#f5f5f5',
    bubbleBackground: '#485fc7',
    aboutText: '',
    bubbleAvatarUrl: '',
    placeholderText: 'Envoyer un message...'
    }; 
</script>
<script 
  src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'>
</script>

	</body>
</html>



      
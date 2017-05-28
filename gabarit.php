<!-- Fichier ajoutant la structure à chaque page du site ainsi que le CSS -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo($titre); ?></title>
    <link rel="icon" type="image/x-icon" href="views/ressources/logos/main_logo.png" />
    <link rel="stylesheet" href="views/styles/structure.css">



<?php
    /***************************************CAROUSSEL_HEAD*******************************/
?>

        <script type="text/javascript">

            //ok , it's working , we are done , if you want to add imgs you have to :

            //1 - add an img tag with id : Img++; ex:  <img id="Img4" src="IMG/1.jpg"/>
            //2 - add an li tag  with id : S++;   ex:  <li id="S4"></li>
            //3 - add an p tag with id : SP++;    ex:  <p id="SP4"></p>
            //4 - change the value of nrImg

            var nrImg = 3;  //the number of img , I only have 3
            var IntSeconds = 4;     //the seconds between the imgs

            function Load()
            {
                nrShown = 0;    //the img visible
                Vect = new Array(nrImg + 10);
                Vect[0] = document.getElementById("Img1");
                Vect[0].style.visibility = "visible";

                document.getElementById("S" + 0).style.visibility = "visible";

                for (var i = 1; i < nrImg; i++)
                {
                    Vect[i] = document.getElementById("Img" + (i + 1));
                    document.getElementById("S" + i).style.visibility = "visible";
                }

                document.getElementById("S" + 0).style.backgroundColor = "rgba(255, 255, 255, 0.90)";
                document.getElementById("SP" + nrShown).style.visibility = "visible";

                mytime = setInterval(Timer, IntSeconds * 1000);
            }

            function Timer()
            {
                nrShown++;
                if (nrShown == nrImg)
                    nrShown = 0;
                Effect();
            }

            //next img
            function next()
            {
                nrShown++;
                if (nrShown == nrImg)
                    nrShown = 0;
                Effect();

                clearInterval(mytime);
                mytime = setInterval(Timer, IntSeconds * 1000);
            }

            function prev()
            {
                nrShown--;
                if (nrShown == -1)
                    nrShown = nrImg -1;
                Effect();

                clearInterval(mytime);
                mytime = setInterval(Timer, IntSeconds * 1000);
            }

            //here changes the img + effect
            function Effect()
            {
                for (var i = 0; i < nrImg; i++)
                {
                    Vect[i].style.opacity = "0";   //to add the fade effect
                    Vect[i].style.visibility = "hidden";

                    document.getElementById("S" + i).style.backgroundColor = "rgba(0, 0, 0, 0.70)";
                    document.getElementById("SP" + i).style.visibility = "hidden";
                }
                Vect[nrShown].style.opacity = "1";
                Vect[nrShown].style.visibility = "visible";
                document.getElementById("S" + nrShown).style.backgroundColor = "rgba(255, 255, 255, 0.90)";
                document.getElementById("SP" + nrShown).style.visibility = "visible";
            }

        </script>

<?php
        /**************************************FIN_CAROUSSEL_HEAD*******************************/
?>

  </head>

  <body onload="Load()">
      <nav>
        <?php echo $menu;?>
      </nav>

      <div id="content">
        <?php echo($contenu); ?>
      </div>

      <footer>
        <?php echo($footer); ?>
      </footer>


<?php
      /******************************************CAROUSSEL_BODY************************************/

      /* voir dans le fichier commun la fonction "caroussel_home"  */

      /******************************************FIN_CAROUSSEL_BODY************************************/
?>


  </body>
</html>

        <!-- définire une fonction qui affiche les tables de multiplication pour un nombre entier passera en paramètre( s'il en à, sinon on affiche la table de multiplication de 5) le tous afficher dans un tableau html  -->
    <?php
    function table($a)
    {
        for ($i = 1; $i <= 10; $i++) {
            echo $a . " x " . $i . " = " . $a * $i . "<br>";
        }
    }
    table(5);
   ?>

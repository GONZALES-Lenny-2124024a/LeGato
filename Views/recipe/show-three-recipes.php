<?php

echo '<link rel="stylesheet" type="text/css" href="../../static/styles/show-three-recipes.css">';
echo '<h2>Faites de nouvelles découvertes culinaires !</h2>';
echo '<div id="recipesContainer">';
foreach ($A_view as $recipe){
    echo '<div class="recipe">';
    echo "<img src='" . $recipe['picture'] . "'>";
    echo "<p>".$recipe['name']."</p>";
    echo '</div>';
}
echo '</div>';
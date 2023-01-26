<?php

final class UpdaterecipeController
{
    public function showAction(Array $A_parametres = null, Array $A_postParams = null) : void{
        $S_id = $A_parametres[0];
        if(!Recipe::selectById($S_id)) {
            header('Location: /errors/error404');
        }

        View::show("recipe/update-recipe",
        array(
            'isUpdate' => true,
            'recipe' => Recipe::selectById($S_id),
            'ingredients' => Ingredients::selectAllByRecipeId($S_id),
            'utensils' => Utensils::selectAllByRecipeId($S_id),
            'particularities' => Particularities::selectAllByRecipeId($S_id)));
    }

    public function updateAction(Array $A_parametres = null, Array $A_postParams = null) : void{
        $A_postParams['picture'] = Recipe::updateRecipePicture($A_postParams);
        Recipe::updateRecipe($A_postParams);
        header('Location: /recipe/show/' . $A_postParams['id']);
    }
}
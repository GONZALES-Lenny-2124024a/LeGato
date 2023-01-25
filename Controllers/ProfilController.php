<?php

final class ProfilController
{
    function defaultAction() {
        View::show("profil/profil", Users::selectById(Session::getSession()['id']));
        View::show("recipe/recipes", Recipe::selectRecipeByUser(Session::getSession()));
        View::show("appreciation/appreciation", Appreciation::selectAppreciationByUser(Session::getSession()));
    }
}
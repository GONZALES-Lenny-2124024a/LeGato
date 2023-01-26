<?php

class RetrievepwdController
{
    public function defaultAction() {
        View::show("retrieve_pwd/form-change-pwd");
    }

    public function updateAction(Array $A_parametres = null, Array $A_postParams = null) {
        $A_retrieveTable =  Retrieve_Pwd::selectById($A_postParams["id"]);

        if ($A_retrieveTable["token"] != $A_postParams["token"]){
            //Token doesnt exists
            header("Location: /retrievepwd");
            exit;
        }

        if ($A_postParams["password"] != $A_postParams["password_confirmation"]){
            //Passwords do not match
            header("Location: /retrievepwd");
            exit;
        }

        unset($A_postParams["password_confirmation"]);
        unset($A_postParams["token"]);

        $A_postParams['password'] = hash('sha512', $A_postParams['password']);
        Users::updateById($A_postParams,$A_postParams["id"]);

        Retrieve_Pwd::deleteByID($A_postParams["id"]);

        header("Location: /signin");
        exit;
    }
}
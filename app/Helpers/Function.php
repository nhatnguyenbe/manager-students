<?php
if(!function_exists("isRole")){
    function isRole($dataArr, $modelName, $role) {
        if(!empty($dataArr[$modelName])){
            $roleArr = $dataArr[$modelName];
            if(!empty($roleArr) && in_array($role, $roleArr)) 
            {
                return true;
            }
            return false;
        }
    }
}
<?php

    function userName($name) {
        if($name=="axay") {
            return "ak";
        } else {
            return "j";

        }
    }

    function userId($uid){
        $uid = '{{Auth::user()->f_name}}';

        return $uid;
    }

?>
<?php

namespace App;
class notice
{
    var $admin;
    var $nameevent;
    var $idevent;

    function set($name,$event,$id)
    {
        $this->admin=$name;
        $this->nameevent=$event;
        $this->idevent=$id;
    }
}
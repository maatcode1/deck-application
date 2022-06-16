<?php

namespace Deck\Application\Module;

class AbstractClass
{
    public function setProps(array $array){
        foreach ($array as $key => $value){
            if ( property_exists ( $this , $key ) ){
                $this->{$key} = $value;
            }
        }
    }
}
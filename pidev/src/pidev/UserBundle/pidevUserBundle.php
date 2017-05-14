<?php

namespace pidev\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class pidevUserBundle extends Bundle
{
    public function getParent(){
        return 'FOSUserBundle';
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: Darius
 * Date: 10/1/2018
 * Time: 6:48 PM
 */

namespace AppBundle\Factory;


use AppBundle\Entity\Chief;
use AppBundle\Entity\User;

class ChiefFactory
{
    /**
     * @return Chief
     */
    public function create()
    {
        $chief = new Chief();

        $chief->setVerified(false);
        $chief->setVerifyRequested(true);
        $chief->setEnabled(true);
        $chief->setVisitRadius(15);

        return $chief;
    }
}
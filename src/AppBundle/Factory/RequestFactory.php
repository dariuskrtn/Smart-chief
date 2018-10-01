<?php
/**
 * Created by PhpStorm.
 * User: Darius
 * Date: 10/1/2018
 * Time: 6:46 PM
 */

namespace AppBundle\Factory;


use AppBundle\Entity\Request;
use AppBundle\Entity\User;
use AppBundle\Enum\RequestStatus;
use AppBundle\Enum\RequestType;

class RequestFactory
{

    /**
     * @param User $user
     * @return Request
     */
    public function create(User $user)
    {
        $request = new Request();
        $request->setClient($user);

        $request->setStatus(RequestStatus::PENDING);
        $request->setRequestType(RequestType::ASAP);

        return $request;
    }
}
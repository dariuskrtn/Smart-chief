<?php
/**
 * Created by PhpStorm.
 * User: Darius
 * Date: 10/1/2018
 * Time: 6:46 PM
 */

namespace AppBundle\Factory;


use AppBundle\Entity\Chief;
use AppBundle\Entity\Request;
use AppBundle\Entity\User;
use AppBundle\Enum\RequestStatus;
use AppBundle\Enum\RequestType;
use AppBundle\Form\ReviewType;

class RequestFactory
{

    /**
     * @param User $user
     * @param Chief $chief
     * @return Request
     */
    public function create(User $user, Chief $chief)
    {
        $request = new Request();
        $request->setClient($user);
        $request->setDescription("");

        $request->setStatus(RequestStatus::PENDING);

        $request->setRequestType($chief == null ? RequestType::ASAP : RequestType::SPECIFIC);

        return $request;
    }
}
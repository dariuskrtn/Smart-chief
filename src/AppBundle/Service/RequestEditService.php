<?php
/**
 * Created by PhpStorm.
 * User: Darius
 * Date: 10/6/2018
 * Time: 11:15 AM
 */

namespace AppBundle\Service;


use AppBundle\Entity\Request;
use AppBundle\Enum\RequestStatus;

class RequestEditService
{

    /**
     * @param Request $request
     * @param int $status
     */
    public function changeRequestStatus(Request $request, $status)
    {
        switch ($status) {
            case RequestStatus::ACCEPTED:
                if ($request->getStatus() == RequestStatus::PENDING) $request->setStatus($status);
                break;
            case RequestStatus::IN_PROGRESS:
                if ($request->getStatus() == RequestStatus::ACCEPTED) $request->setStatus($status);
                break;
            case RequestStatus::COMPLETED:
                if ($request->getStatus() == RequestStatus::IN_PROGRESS) $request->setStatus($status);
                break;
            case RequestStatus::CANCELED:
                if ($request->getStatus() == RequestStatus::PENDING ||
                    $request->getStatus() == RequestStatus::ACCEPTED ) $request->setStatus($status);
                break;
        }
    }

    /**
     * @param Request $request
     */
    public function cancelRequest(Request $request)
    {
        if ($request->getStatus() == RequestStatus::PENDING ||
            $request->getStatus() == RequestStatus::ACCEPTED) {
            $request->setStatus(RequestStatus::CANCELED);
        }
    }


}
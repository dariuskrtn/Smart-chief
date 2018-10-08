<?php
/**
 * Created by PhpStorm.
 * User: Darius
 * Date: 9/30/2018
 * Time: 9:59 PM
 */

namespace AppBundle\Enum;


class RequestStatus
{
    private static $statuses = ['', "Completed", "Canceled", "In Progress", "Pending", "Accepted"];
    const ACCEPTED = 5;
    const PENDING = 4;
    const IN_PROGRESS = 3;
    const CANCELED = 2;
    const COMPLETED = 1;

    public static function intToStatus($statusId)
    {
        return RequestStatus::$statuses[$statusId];
    }

}
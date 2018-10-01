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
    const ACCEPTED = 5;
    const PENDING = 4;
    const IN_PROGRESS = 3;
    const CANCELED = 2;
    const COMPLETED = 1;
}
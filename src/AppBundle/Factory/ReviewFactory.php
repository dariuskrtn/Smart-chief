<?php
/**
 * Created by PhpStorm.
 * User: Darius
 * Date: 10/1/2018
 * Time: 6:48 PM
 */

namespace AppBundle\Factory;


use AppBundle\Entity\Request;
use AppBundle\Entity\Review;

class ReviewFactory
{
    /**
     * @param Request $request
     * @return Review
     */
    public function create(Request $request)
    {
        $review = new Review();

        $review->setRequest($request);
        $review->setChief($request->getChief());
        $review->setUser($request->getClient());
        $review->setStars(5);

        return $review;
    }
}
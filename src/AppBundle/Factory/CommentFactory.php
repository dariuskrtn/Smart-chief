<?php

namespace AppBundle\Factory;


use AppBundle\Entity\Chief;
use AppBundle\Entity\Comment;
use AppBundle\Entity\Request;
use AppBundle\Entity\User;

class CommentFactory
{
    /**
     * @param Request $request
     * @param User $user
     * @return Comment
     */
    public function create(Request $request, User $user)
    {
        $comment = new Comment();
        $comment->setUser($user);
        $comment->setRequest($request);
        return $comment;
    }
}
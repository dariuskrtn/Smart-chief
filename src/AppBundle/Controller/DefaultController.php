<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Comment;
use AppBundle\Form\CommentType;
use AppBundle\Form\RequestType;
use AppBundle\Form\ReviewType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $user = $this->getUser();
        if ($user != null && $user->isChiefUser() && $user->getChief() == null) {
            return $this->redirectToRoute('chief.register');
        }

        return $this->render('default/index.html.twig', []);
    }

    public function createRequestAction(Request $request, $chiefId)
    {
        $m = $this->getDoctrine()->getManager();

        $chief = $m->find('AppBundle:Chief', $chiefId);

        $chiefRequest = $this->get('request_factory')->create($this->getUser(), $chief);

        $form = $this->createForm(RequestType::class, $chiefRequest);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $m->persist($chiefRequest);
            $m->flush();

            return $this->redirectToRoute('app.viewRequest', ['requestId' => $chiefRequest->getId()]);
        }

        return $this->render('form/requestForm.html.twig', [
            'form' => $form->createView(),
            'chief' => $chief
        ]);
    }

    public function cancelRequestAction($requestId)
    {
        $m = $this->getDoctrine()->getManager();
        $request = $m->find('AppBundle:Request', $requestId);
        $requestEditService = $this->get('request_edit_service');

        if ($request != null) {
            $requestEditService->cancelRequest($request);
            $m->persist($request);
            $m->flush();
        }
        return $this->redirectToRoute('app.index');
    }

    public function commentRequestAction(Request $request, $requestId)
    {
        $m = $this->getDoctrine()->getManager();

        $chiefRequest = $m->find('AppBundle:Request', $requestId);

        if ($chiefRequest != null) {
            $comment = $this->get('comment_factory')->create($chiefRequest, $this->getUser());

            $form = $this->createForm(CommentType::class, $comment);
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $m->persist($comment);
                $m->flush();

                return $this->redirectToRoute('app.viewRequest', ['requestId' => $chiefRequest->getId()]);
            }
            return $this->render('form/commentForm.html.twig', [
                'form' => $form->createView()
            ]);
        }
        return $this->redirectToRoute('app.index');
    }

    public function createReviewAction(Request $request, $requestId)
    {
        $m = $this->getDoctrine()->getManager();
        $chiefRequest = $m->find('AppBundle:Request', $requestId);

        if ($chiefRequest != null) {
            $review = $this->get('review_factory')->create($chiefRequest);

            $form = $this->createForm(ReviewType::class, $review);
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $m->persist($review);
                $m->flush();

                return $this->redirectToRoute('app.viewRequest', ['requestId' => $chiefRequest->getId()]);
            }
            return $this->render('form/reviewForm.html.twig', [
                'form' => $form->createView()
            ]);
        }
        return $this->redirectToRoute('app.index');
    }

    public function viewRequestAction($requestId)
    {
        $request = $this->getDoctrine()->getManager()->find('AppBundle:Request', $requestId);

        if ($request != null) {
            $isAdmin = false;
            $isChief = false;
            if ($request->getChief() != null) $isChief = ($this->getUser()->getChief()->getId() == $request->getChief()->getId());

            return $this->render('default/viewRequest.html.twig', [
                'request' => $request,
                'isAdmin' => $isAdmin,
                'isChief' => $isChief
            ]);
        }
        return $this->redirectToRoute('app.index');
    }

    public function viewChiefAction($chiefId)
    {
        $chief = $this->getDoctrine()->getManager()->find('AppBundle:Chief', $chiefId);

        $isAdmin = false;
        $isChief = false;
        if ($this->getUser()->getChief() != null && $chief->getId() == $this->getUser()->getChief()->getId()) $isChief = true;


        if ($chief != null) {
            return $this->render('default/viewChief.html.twig', [
                'chief' => $chief,
                'isAdmin' => $isAdmin,
                'isChief' => $isChief
            ]);
        }
        return $this->redirectToRoute('app.index');
    }

    public function viewChiefListAction($page)
    {
        $m = $this->getDoctrine()->getManager();
        $chiefList = $m->getRepository('AppBundle:Chief')->findBy([], [], 12, ($page-1)*$this->getParameter('chiefs_per_page'));

        return $this->render('default/viewChiefList.html.twig', [
            'chiefList' => $chiefList,
        ]);
    }

    public function viewRequestHistoryAction()
    {
        $requests = $this->getUser()->getRequests();

        return $this->render('default/viewRequestHistory.html.twig', [
            'requestList' => $requests,
        ]);
    }


}

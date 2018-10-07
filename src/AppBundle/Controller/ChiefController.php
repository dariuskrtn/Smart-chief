<?php

namespace AppBundle\Controller;

use AppBundle\Form\ChiefType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\Request;

class ChiefController extends Controller
{
    public function createChiefAction(Request $request)
    {
        $m = $this->getDoctrine()->getManager();
        $chief = $this->get('chief_factory')->create();
        $user = $this->getUser();

        $form = $this->createForm(ChiefType::class, $chief);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user->setChief($chief);
            $m->persist($chief);
            $m->persist($user);
            $m->flush();
            return $this->redirectToRoute('app.index');
        }

        return $this->render('form/chiefForm.html.twig', [
            'form' => $form->createView()
        ]);

    }

    public function requestChiefVerificationAction($chiefId)
    {
        $m = $this->getDoctrine()->getManager();

        $chief = $m->find('AppBundle:Chief', $chiefId);

        if ($chief != null) {
            $chief->setVerifyRequested(true);
            $m->persist($chief);
            $m->flush();
        }
        return $this->redirectToRoute('app.index');
    }

    public function changeRequestStatusAction($requestId, $statusId)
    {
        $m = $this->getDoctrine()->getManager();
        $request = $m->find('AppBundle:Request', $requestId);

        $requestService = $this->get('request_edit_service');
        if ($request != null) {
            $requestService->changeRequestStatus($request, $statusId);
            $m->persist($request);
            $m->flush();
        }

        return $this->redirectToRoute('app.viewRequest', ['requestId' => $request->getId()]);
    }

    public function viewRequestHistoryAction($chiefId)
    {
        $m = $this->getDoctrine()->getManager();
        $chief = $m->find('AppBundle:Chief', $chiefId);

        $requests = [];

        if ($chief) $requests = $chief->getChiefRequests();

        return $this->render('default/viewRequestHistory.html.twig', [
            'requestList' => $requests,
        ]);
    }

}

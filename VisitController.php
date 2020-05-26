<?php


namespace App\Controller;


use App\Entity\Visit;
use App\Form\VisitFormType;
use App\Repository\VisitRepository;
use Doctrine\ORM\EntityManagerInterface;
use http\Env\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

class VisitController extends AbstractController
{
    /**
     * @Route("/add-visit")
     * @return Response
     */
    public function addVisit(): Response
    {
        $visit = new Visit();
        $visitForm = $this->createForm(VisitFormType::class, $visit);
        return $this->render('visit/add.html.twig', ['visitForm' => $visitForm->createView()]);

    }

    /**
     * @Route("list-visit")
     * @param VisitRepository $visitRepository
     * @return Response
     */
    public function listVisit(VisitRepository $visitRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_PATIENT');
        $visits = $visitRepository->findByPatient($this->getUser());
        return $this->render('visit/list.html.twig', ['visits'=>$visits]);
    }
}

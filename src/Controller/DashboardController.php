<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Utilisateurs;
/* use App\Entity\Avancement;
use App\Repository\AvancementRepository;
use App\Repository\DashboardRepository;

use App\Repository\OrdreMissionRepository;
use App\Repository\CongeRepository;
use App\Repository\AutorisationRepository;
use App\Repository\FicheheureRepository; */

use App\Form\ProfileUserType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Security\Core\Security as secure;


    /**
     *
     * @Security("is_granted('ROLE_USER') ")
     */
class DashboardController extends AbstractController
{
    #[Route(path: '/dashboard', name: 'app_dashboard')]
    public function index(/* AvancementRepository $avancementRepository  , OrdreMissionRepository $ordremissionRepository ,AutorisationRepository $autorisationRepository , CongeRepository $congeRepository, FicheheureRepository $ficheheureRepository, secure $security */ ): Response
    {
        /* $ordremission = 0 ;
        $autorisation = 0;
        $conge = 0;
        $ficheheures = 0 ;
       if(in_array("ROLE_FONC",$security->getUser()->getRoles())){
        $ordremission = count($ordremissionRepository->searchDemandesByAnnee($security->getUser()->getPersonnel()->getId() , Date("Y")));
        $autorisation = count($autorisationRepository->searchDemandesByAnnee($security->getUser()->getPersonnel()->getId() , Date("Y")));
        $conge =        count($congeRepository->searchDemandesByAnnee($security->getUser()->getPersonnel()->getId() , Date("Y")));
      
       }
       if(in_array("ROLE_PROF",$security->getUser()->getRoles())){
        $ordremission = count($ordremissionRepository->searchDemandesByAnnee($security->getUser()->getPersonnel()->getId() , Date("Y")));
        $ficheheures =  count($ficheheureRepository->searchDemandesByAnnee($security->getUser()->getPersonnel()->getId() , Date("Y")));
       }
       
        $avancements =  $avancementRepository->findBy(['personnel'=>$security->getUser()->getPersonnel()->getId()]);

if(in_array("ROLE_ADMIN",$security->getUser()->getRoles())){
    return new RedirectResponse($this->generateUrl('app_stats_personnel_index'));
}else{
    return $this->render('dashboard/dashboard.html.twig', [
        'avancements' => $avancements,
        'ordremission' => $ordremission,
        'autorisation' => $autorisation,
        'ficheheures' => $ficheheures,
        'conge' => $conge,
    ]);  */
    return $this->render('dashboard/index.html.twig');
     

    }


    #[Route(path: '/', name: 'app_home')]
    public function index_home()
    {
        return new RedirectResponse($this->generateUrl('app_dashboard'));
    }
   

   
}

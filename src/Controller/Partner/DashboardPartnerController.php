<?php

namespace App\Controller\Partner;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/partner")
 */

class DashboardPartnerController extends AbstractController
{
    /**
     * @Route("/dashboard", name="dashboard_partner")
     */
    public function index()
    {
        return $this->render('partner/dashboard.html.twig', [
            'controller_name' => 'DashboardPartnerController',
        ]);
    }
}

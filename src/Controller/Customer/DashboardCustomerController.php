<?php

namespace App\Controller\Customer;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;



/**
 * @Route("/customer")
 */

class DashboardCustomerController extends AbstractController
{
    /**
     * @Route("/dashboard", name="dashboard_customer")
     */
    public function index()
    {
        return $this->render('customer/dashboard.html.twig', [
            'controller_name' => 'DashboardCustomerController',
        ]);
    }
}

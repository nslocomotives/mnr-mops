<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }
    
    /**
    * @Route("/tickets", name="tickets")
    */
    public function showTickets(Request $request)
	{
    	$repository = $this->container->get('sylius.repository.product');
    	$tickets = $repository->findAll(); // Load all the products!
    	return $this->render('default/tickets.html.twig', array('ticketList' => $tickets));
	}
    
    /**
    * @Route("/tickets/add", name="add_tickets")
    */
	public function createTicket(Request $request)
    {
        $form = $this->get('form.factory')->create('sylius_product');
        
        return $this->render('default/add_ticket.html.twig', array(
            'form' => $form->createView(),
            ));
    }
    
    public function addTicket(Request $request)
	{
    	$repository = $this->container->get('sylius.repository.product');
    	$ticket = $repository->createNew();
	}
}

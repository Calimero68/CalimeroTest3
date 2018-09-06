<?php

namespace Calimero\userBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use Calimero\userBundle\Entity\Utilisateurs;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;

class DefaultController extends Controller
{
	/**
     * @Route("/", name="test")
     */
    public function indexAction()
    {
        return $this->render('@Calimerouser/Default/index.html.twig');
    }
	
	/**
     * @Route("connect", name="creationCompte")
     */
	public function formulaireAction()
	{
		return $this->render('@Calimerouser/Default/index.html.twig');
	}
	
	/**
     * @Route("blabla", name="creationCompteAuto")
     */
	public function creationAction()
	{
		$entityManager = $this->getDoctrine()->getManager();
		
		$utilisateurs = new Utilisateurs();
		$utilisateurs->setUtilisateur('Admin');
		$utilisateurs->setNewsletter(true);
		$utilisateurs->setDateCreation();
		
		// tells Doctrine you want to (eventually) save the Product (no queries yet)
		$entityManager->persist($utilisateurs);

		// actually executes the queries (i.e. the INSERT query)
		$entityManager->flush();
		
		return new Response('Saved new users with id '.$utilisateurs->getId());
	}
	
		
	/**
     * @Route("blabli/{userId}", name="afficheCompte")
     */
	public function showAction($userId)
	{
		$utilisateurs = $this->getDoctrine()
			->getRepository(Utilisateurs::class)
			->find($userId);

		if (!$utilisateurs) {
			throw $this->createNotFoundException(
				'No user found for id '.$userId);
        };
		
		return new Response('Username for id '. $userId .' : '.$utilisateurs->getUtilisateur());
	}
}

	
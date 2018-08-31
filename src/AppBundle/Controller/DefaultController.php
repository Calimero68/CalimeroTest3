<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use AppBundle\Entity\Task;
use AppBundle\Form\TaskType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        // replace this example code with whatever you need
        // return $this->render('default/index.html.twig', [
            // 'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        // ]);

        return $this->render('home/homepage.html.twig');
    }


	/**
     * @Route("test", name="testForm")
     */
	public function formulaireAction(Request $request)
	{
		$task = new Task();
		$task->setTask('Write a blog post');
		$task->setDueDate(new \DateTime('tomorrow'));
		
		// creation du formulaire à partir du fichier Form/TaskType (flexible et réutilisable)
		$form = $this->createForm(TaskType::class, $task);
		
		// creation du formulaire directement dans le controller
		// $form = $this->createFormBuilder($task)
			// ->add('task')
			// ->add('dueDate')
			// ->add('save', SubmitType::class, array('label' => 'Create Task'))
			// ->getForm();
			
		//on récupère la requête en cours
		$form->handleRequest($request);
		
		// s'il y a eu un submit valide, on redirige vers une autre page, sinon on affiche le formulaire
		if ($form->isSubmitted() && $form->isValid()) 
		{
			$task = $form->getData();
			$agree = $form->get('agreeTerms')->getData(); // pour récupérer les données d'un champ non mappé
			//$form->get('agreeTerms')->setData(true); // pour mettre à jour un champ non mappé
			
			return $this->redirectToRoute('homepage');
		}
			
		return $this->render('default/new.html.twig', array('form' => $form->createView()));
	}
}	
<?php
// src/AppBundle/Controller/LuckyController.php
namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LuckyController extends Controller
{
    /**
	 * Matches /lucky/test/ exactly
     * @Route("/lucky/test/", name="numberNoParam")
     */
    public function numberAction()
    {
        $number = random_int(0, 100);

        return $this->render('lucky/number.html.twig', array(
            'number' => $number,
			));
    }

	/**
	 * Matches /lucky/number/*
	 * @Route("/lucky/number/{test}", name="numberParam", requirements={"test"="\d+"})
     */
    public function numberAction2($test = 10)
    {
        $number = random_int(0, $test);

        return $this->render('lucky/number.html.twig', array(
            'number' => $number,
			));
    }
}

?>
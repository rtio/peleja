<?php
/**
 * Created by PhpStorm.
 * User: rtio
 * Date: 21/05/18
 * Time: 23:18
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function homePage()
    {
        return $this->render('home.html.twig');
    }
}
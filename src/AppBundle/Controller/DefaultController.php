<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use AppBundle\Entity\categoria;

use Symfony\Component\Form\Extension\Core\Type\TextType;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig');
    }
    /**
     * @Route("/quienesSomos", name="quienesSomos")
     */
    public function quienesSomosAction(Request $request)
    {
        return $this->render('front/quienesSomos.html.twig');
    }
    /**
     * @Route("/contacto", name="contacto")
     */
    public function contactoAction(Request $request)
    {
        return $this->render('front/contacto.html.twig');
    }
    /**
     * @Route("/categoria/", name="categoria")
     */
    public function categoriaAction(Request $request)
    {   
        $categoria = $this->getDoctrine()->getRepository(categoria::class)->findAll();
        return $this->render('front/categoria.html.twig',array('categoria'=>$categoria));
    }
    /**
     * @Route("/form/", name="form")
     */
    public function formAction(Request $request)
    {
        // creates a task and gives it some dummy data for this example
        $task = new categoria();
        var_dump($task);

        $form = $this->createFormBuilder($task)
            ->add('nombre', TextType::class)
            ->add('descripcion', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Create categoria'))
            ->getForm();

        return $this->render('form/formCategoria.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}

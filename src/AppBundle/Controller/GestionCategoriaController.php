<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use AppBundle\Entity\categoria;

/**
* @Route("/gestionCategoria")
*/
class GestionCategoriaController extends Controller
{
    /**
     * @Route("/nuevaCategoria", name="nuevaCategoria")
     */
    public function nuevaCategoriaAction(Request $request)
    {
        //El $this->getDoctrine()->getManager() obtiene el objeto 
        //del administrador de entidades de Doctrine , que es el objeto 
        //más importante en Doctrine. Es responsable de guardar objetos 
        //y obtener objetos de la base de datos.
        $entityManager = $this->getDoctrine()->getManager();
        //En esta sección, crea una instancia y trabaja con el objeto categoria 
        //como cualquier otro objeto PHP normal.
        $categoria = new categoria();
        $categoria->setNombre('Producto 4');
        $categoria->setDescripcion('Descripción del producto 4');
        $categoria->setImagen('imagen4.jpg');
        $categoria->setHabilitado(0);

        //persist($product) le dice a Doctrine que "administre" el objeto 
        //$categoria. Esto no causa que se haga una consulta a la base de datos.
        $entityManager->persist($categoria);

        // Cuando se llama al método flush(), Doctrine examina todos los objetos
        //que está gestionando para ver si necesitan persistir en la base de datos.
        //En este ejemplo, los $productdatos del objeto no existen en la base de 
        //datos, por lo que el administrador de entidades ejecuta una consulta INSERT, 
        //creando una nueva fila en la tabla categoria.
        $entityManager->flush();

        return new Response('Saved new product with id '.$categoria->getId());
        //return $this->render('form/formCategoria.html.twig');
    }
    
}

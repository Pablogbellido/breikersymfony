<?php

namespace blogBundle\Controller;

use blogBundle\blogBundle;
use blogBundle\Form\ComentarioType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BlogController extends Controller
{
    public function indexAction()
    {

            $em = $this->getDoctrine()
                ->getManager();

            $mensaje = $em->getRepository('blogBundle:Mensaje')
                ->findAllOrderedByName();

        $categorias = $em->getRepository('blogBundle:Categoria')
            ->findAll();
            return $this->render('blogBundle:Blog:index.html.twig', array('mensajes'=> $mensaje, 'categoria'=>$categorias));

    }

    public function categoriaAction($id){

        $em = $this->getDoctrine()
            ->getManager();

        $smsCategoria = $em->getRepository('blogBundle:Categoria')
            ->busquedaPorCategoria($id);

        $categorias = $em->getRepository('blogBundle:Categoria')
            ->findAll();

        $selectCat = $em->getRepository('blogBundle:Categoria')
            ->find($id);


        return $this->render('blogBundle:Blog:categorias.html.twig', array('smsCat'=>$smsCategoria, 'categoria' =>$categorias, 'selCat'=> $selectCat));
    }

    public function entradaAction($id)
    {
        $form=$this->createForm(new ComentarioType());

        $em = $this->getDoctrine()->getManager();
        $entrada = $em->getRepository('blogBundle:Mensaje', 'blogBundle:Usuario', 'blogBundle:Categoria')
            ->entrada($id);

        $categorias = $em->getRepository('blogBundle:Categoria')
            ->findAll();

        $comentarios = $em->getRepository('blogBundle:Comentario', 'blogBundle:Mensaje', 'blogBundle:Usuario')
            ->buscaComentarios($id);

        return $this->render('blogBundle:Blog:entradas.html.twig', array('formCom'=>$form->createView(),'datos'=>$entrada,  'categoria' =>$categorias, 'comentarios'=>$comentarios));

    }
}

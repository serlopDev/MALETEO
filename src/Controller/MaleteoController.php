<?php

namespace App\Controller;

use App\Entity\Comentarios;
use App\Entity\SolicitudDemo;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MaleteoController extends AbstractController
{
    /**
     * @Route("/", name= "homepage")
     */

    public function homepage(Request $request, EntityManagerInterface $em)
    {
        $nombre = $request->get('Nombre');
        $apellidos = $request->get('Apellidos');
        $email = $request->get('Email');
        $ciudad = $request->get('Ciudad');
        $privacidad = $request->get('privacidad');
        $comentario = $request->get('Comentarios');
        $nombreComentario = $request->get('Nombre-Comentario');
        $botonComentario = $request->get('AlEnviar');

        if ($privacidad == 1) {
            $solicitudDemo = new SolicitudDemo();

            $solicitudDemo->setNombre($nombre);
            $solicitudDemo->setApellidos($apellidos);
            $solicitudDemo->setEmail($email);
            $solicitudDemo->setCiudad($ciudad);
 
            // Guardamos en Base de Datos, la variable em equivale a entity manager.

            $em->persist($solicitudDemo);
            $em->flush();
        }
        if($botonComentario){
            $enviarComentario = new Comentarios();
            $enviarComentario->setNombre($nombreComentario);
            $enviarComentario->setComentario($comentario);

            $em->persist($enviarComentario);
            $em->flush();
        }

        $repositiorio = $em->getRepository(Comentarios::class);
        $comentario = $repositiorio->findAll();
        $clavesAleatorias = array_rand($comentario,3);
        $misComentariosAleatorios = [];
        for($i=0; $i < 3; $i++){
            // AHORA HACEMOS UN PUSH AL ARRAY
            $misComentariosAleatorios[] = $comentario[$clavesAleatorias[$i]];
        }
          // Redirigimos a la Homepage
        return $this->render('maleteo.html.twig',["comentarios" => $misComentariosAleatorios]);
    }
}

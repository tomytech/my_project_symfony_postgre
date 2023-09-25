<?php

namespace App\Controller;

use App\Entity\Adresses;
use App\Entity\Users;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class UsersAdressesController extends AbstractController
{
    #[Route('/users/adresses', name: 'app_users_adresses')]
    public function index(EntityManagerInterface $entityManager): Response
    // public function index(): Response
    {
        // entityManager = $this->getDoctrine()->getManager();
        // Requête SQL de Joiture entre la table "users" et la table "adresses"
        // $query = $entityManager->createQuery("SELECT u.email, a.adresse, a.cp, a.ville FROM App\Entity\Users u INNER JOIN App\Entity\Adresses a ON u.id = a.idu GROUP BY u.email, a.adresse, a.cp, a.ville");
        // $query = $entityManager->createQuery("SELECT u.email, a.adresse, a.cp, a.ville FROM App\Entity\Users u, App\Entity\Adresses a WHERE u.id = a.idu");
        // $result = $query->getResult();
        // Pas besoin de faire une requête SQL brut, plutôt utiliser Doctrine ORM

        $query = $entityManager->createQueryBuilder();

        // Solution proposée (ne fonctionne pas) :
        $result = $query
            ->select('u', 'a')
            ->from(Users::class, 'u')
            ->join(Adresses::class, 'a')
            ->getQuery()
            ->getResult();

        // $req = $query->getQuery();
        // $sql = $req->getSQL();

        return $this->render('users_adresses/index.html.twig', [
            'controller_name' => 'UsersAdressesController',
            'result' => $query,
        ]);
    }
}

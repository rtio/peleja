<?php
/**
 * Created by PhpStorm.
 * User: rtio
 * Date: 21/05/18
 * Time: 23:18
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends AbstractController
{
    public function test()
    {
        return new JsonResponse(json_encode(["status" => true, "code" => JsonResponse::HTTP_OK]),
            JsonResponse::HTTP_OK, [], true);
    }
}
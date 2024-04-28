<?php

namespace App\Controller;

use App\Dtos\ProjectArray;
use App\Dtos\ProjectArray2;
use App\Dtos\ProjectData;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\SerializerInterface;

class SerializerBugReproducerController extends AbstractController
{
    public function __construct(
       private SerializerInterface $serializer
    ) {
        
    }
    #[Route('/', name: 'app_serializer_bug_reproducer')]
    public function test(): Response
    {
        /**
         * First case
         */

        $data = new ProjectArray();
        $data->addProjectsDto(new ProjectData(123));
        $data->addProjectsDto(new ProjectData(456));
        $ser1 = $this->serializer->serialize(
            $data,
            JsonEncoder::FORMAT
        );
        $object1 = $this->serializer->deserialize(
            $ser1,
            ProjectArray::class,
            JsonEncoder::FORMAT
        );

        /**
         * Second case
         */
        $data = new ProjectArray2();
        $data->addProjectsData(new ProjectData(123));
        $data->addProjectsData(new ProjectData(456));

        $ser2 = $this->serializer->serialize(
            $data,
            JsonEncoder::FORMAT
        );

        $object2 = $this->serializer->deserialize(
            $ser2,
            ProjectArray2::class,
            JsonEncoder::FORMAT
        );


        /**
         * Printing results
         */
        dump($ser1, $object1, $ser2, $object2);


        /**
         * Return empty reposponse to avoid return value error
         */
        return new Response();
    }
}

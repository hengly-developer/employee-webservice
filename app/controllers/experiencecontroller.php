<?php

    namespace app\controllers;

    use app\models\experience;
    use app\models\employees;
    use Psr\Http\Message\ServerRequestInterface as Request;
    use Psr\Http\Message\ResponseInterface as Response;
    use Ramsey\Uuid\Uuid;
    use Firebase\JWT\JWT;
    use Tuupola\Base62;
    use \Datetime;

    class ExperienceController extends Controller{

        //Get All Experience
        public function getExperience(Request $request, Response $response, array $args){


        }

        //Get All Single Experience
        public function getsingleExperience(Request $request, Response $response, array $args){


        }

        //Create Experience
        public function createExperience(Request $request, Response $response, array $args){


        }

        //Update Experience
        public function updateExperience(Request $request, Response $response, array $args){


        }

        //delete Experience
        public function deleteExperience(Request $request, Response $response, array $args){


        }


    }
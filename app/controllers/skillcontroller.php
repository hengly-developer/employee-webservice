<?php

    namespace app\controllers;

    use app\models\skill;
    use app\models\employees;
    use Psr\Http\Message\ServerRequestInterface as Request;
    use Psr\Http\Message\ResponseInterface as Response;
    use Ramsey\Uuid\Uuid;
    use Firebase\JWT\JWT;
    use Tuupola\Base62;
    use \Datetime;

    class SkillController extends Controller{

        //Get All Skill
        public function getSkill(Request $request, Response $response, array $args){


        }

        //Get All Single Skill
        public function getsingleSkill(Request $request, Response $response, array $args){


        }

        //Create Skill
        public function createSkill(Request $request, Response $response, array $args){


        }

        //Update Skill
        public function updateSkill(Request $request, Response $response, array $args){


        }

        //delete Skill
        public function deleteSkill(Request $request, Response $response, array $args){


        }


    }
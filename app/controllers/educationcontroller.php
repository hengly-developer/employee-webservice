<?php

    namespace app\controllers;

    use app\models\education;
    use app\models\employees;
    use Psr\Http\Message\ServerRequestInterface as Request;
    use Psr\Http\Message\ResponseInterface as Response;
    use Ramsey\Uuid\Uuid;
    use Firebase\JWT\JWT;
    use Tuupola\Base62;
    use \Datetime;

    class EducationController extends Controller{

        //Get All Education
        public function getEducation(Request $request, Response $response, array $args){

            $education = $request->getParsedBody();

            $employee_id = Employees::select('id')->where('fullname', $education['employee_id'])->first();
            $data = Education::create([
                'name' => $education['name'],
                'subject' => $education['subject'],
                'startdate' => $education['startdate'],
                'description' => $education['description'],
                'employee_id' => $employee_id->id,
            ]);

            $response = $response->withJson(['Message' => 'Education Created']);

            return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(200);

        }

        //Get All Single Education
        public function getsingleEducation(Request $request, Response $response, array $args){


        }

        //Create Education
        public function createEducation(Request $request, Response $response, array $args){


        }

        //Update Education
        public function updateEducation(Request $request, Response $response, array $args){


        }

        //delete Education
        public function deleteEducation(Request $request, Response $response, array $args){


        }


    }
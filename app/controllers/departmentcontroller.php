<?php

    namespace app\controllers;
    use app\models\department;
    use src\middleware;
    use Psr\Http\Message\ServerRequestInterface as Request;
    use Psr\Http\Message\ResponseInterface as Response;
    use Ramsey\Uuid\Uuid;
    use Firebase\JWT\JWT;
    use Tuupola\Base62;
    use \Datetime;

    class DepartmentController extends Controller{
        
        //Create Branch
        public function createDepartment(Request $request, Response $response, array $args){

            $department = $request->getParsedBody();

            $data = Department::create([
                'name' => $department['name']
            ]);

            $response = $response->withJson(['Message' => 'Department Created']);

            return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(200);
        }

        //Get Single Branch
        public function singleDepartment(Request $request, Response $response, array $args){

            $department = Department::find($args['id']);

            $response_data = array();
            $response_data['departments'] = $department;
            $response->write(json_encode($response_data));

            return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(200);
        }


        //Get All Branch
        public function getallDepartment(Request $request, Response $response, array $args){

            $department = Department::all();

            $response_data = array();
            $response_data['departments'] = $department;
            $response->write(json_encode($response_data));

            return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(200);
        }

        //Update Branch
        public function updateDepartment(Request $request, Response $response, array $args){

            $department = $request->getParsedBody();
            $data = Department::where('id', $args['id'])->update([
                'name' => $department['name']
            ]);

            $response = $response->withJson(['Message' => 'Department Updated']);

            return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(200);
        }

        //Delete Branch
        public function deleteDepartment(Request $request, Response $response, array $args){

            $department = Department::destroy($args['id']);
            
            $response = $response->withJson(['Message' => 'Department Deleted']);

            return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(200);
        }

    }
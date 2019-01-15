<?php

    namespace app\controllers;

    use app\models\role;
    use Psr\Http\Message\ServerRequestInterface as Request;
    use Psr\Http\Message\ResponseInterface as Response;
    use Ramsey\Uuid\Uuid;
    use Firebase\JWT\JWT;
    use Tuupola\Base62;
    use \Datetime;

    class RoleController extends Controller {

        //Create Role
        public function createRole(Request $request, Response $response){

            $role = $request->getParsedBody();

            $data = Role::create([
                'name' => $role['name']
            ]);

            $response = $response->withJson(['Message' => 'Role Created']);

            return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(200);
        }

        //Get All Role
        public function getRole(Request $request, Response $response){

            $roles = Role::all();

            $response_data = array();
            $response_data['roles'] = $roles;
            $response->write(json_encode($response_data));

            return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(200);
        }

        //Get Single Role
        public function getsingleRole(Request $request, Response $response){

            $role = Role::find($args['id']);

            $response_data = array();
            $response_data['role'] = $role;
            $response->write(json_encode($response_data));

            return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(200);
        }

        //Delete Role
        public function deleteRole(Request $request, Response $response){


        }

        //Update Role
        public function updateRole(Request $request, Response $response){


        }
    }


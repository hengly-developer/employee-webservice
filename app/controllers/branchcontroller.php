<?php

    namespace app\controllers;
    use app\models\branch;
    use src\middleware;
    use Psr\Http\Message\ServerRequestInterface as Request;
    use Psr\Http\Message\ResponseInterface as Response;
    use Ramsey\Uuid\Uuid;
    use Firebase\JWT\JWT;
    use Tuupola\Base62;
    use \Datetime;

    class BranchController extends Controller{

        //Create Branch
        public function create(Request $request, Response $response, array $args){

            $branch = $request->getParsedBody();

            $data = Branch::create([
                'name' => $branch['name']
            ]);

            $response = $response->withJson(['Message' => 'Branch Created']);

            return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(200);
        }

        //Get Single Branch
        public function singlebranch(Request $request, Response $response, array $args){

            $branch = Branch::find($args['id']);

            $response_data = array();
            $response_data['branchs'] = $branch;
            $response->write(json_encode($response_data));

            return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(200);
        }


        //Get All Branch
        public function getallbranch(Request $request, Response $response, array $args){

            $branch = Branch::all();

            $response_data = array();
            $response_data['branchs'] = $branch;
            $response->write(json_encode($response_data));

            return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(200);
        }

        //Update Branch
        public function updateBranch(Request $request, Response $response, array $args){

            $branch = $request->getParsedBody();
            $data = Branch::where('id', $args['id'])->update([
                'name' => $branch['name']
            ]);

            $response = $response->withJson(['Message' => 'Branch Updated']);

            return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(200);
        }

        //Delete Branch
        public function deleteBranch(Request $request, Response $response, array $args){

            $branch = Branch::destroy($args['id']);
            
            $response = $response->withJson(['Message' => 'Branch Deleted']);

            return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(200);
        }

    }
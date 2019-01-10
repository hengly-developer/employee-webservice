<?php

    namespace app\controllers;

    use app\models\user;
    use Psr\Http\Message\ServerRequestInterface as Request;
    use Psr\Http\Message\ResponseInterface as Response;
    use Ramsey\Uuid\Uuid;
    use Firebase\JWT\JWT;
    use Tuupola\Base62;
    use \Datetime;

    class UserController extends Controller {

        //Get All User
        public function allusers(Request $request, Response $response, array $args) {

            $users = User::all();

            $response_data = array();
            $response_data['users'] = $users;
            $response->write(json_encode($response_data));

            return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(200);            
        }

        //Get Single User
        public function singleuser(Request $resquest, Response $response, array $args) {

            $users = User::find($args['id']);

            $response_data = array();
            $response_data['users'] = $users;
            $response->write(json_encode($response_data));

            return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(200);
        }

        //Create User
        public function create(Request $request, Response $response, array $args) {
      
            $users = $request->getParsedBody();
            $u = User::where('email', $users['email']);
            if($u->count() == 0){

                $datas = User::create([
                    'username' => $users['username'],
                    'email' => $users['email'],
                    'password' => password_hash($users['password'], PASSWORD_BCRYPT),
                    'position' => $users['position'],
                    'phone' => $users['phone']
                ]);
                print_r($datas->id);

                $now = new DateTime();
                $future = new DateTime("now +2 hours");
                $server = $request->getServerParams();
                $jti = (new Base62)->encode(random_bytes(16));
                $payload = [
                    "iat" => $now->getTimeStamp(),
                    "exp" => $future->getTimeStamp(),
                    "jti" => $jti
                ];
                $secret = getenv("JWT_SECRET");
                $token = JWT::encode($payload, $secret, "HS256");
                $data["expires"] = $future->getTimeStamp();

                return $this->response->withJson(['token' => $token]);

            }else{

               $response = $response->withJson(['Message' => 'Your Email has Already Exists. Please find another emial...!']);
            }
            
            return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(200);
        }

        //Update User
        public function update(Request $request, Response $response, array $args) {

            $user = $request->getParsedBody();
            $users = User::where('id', $args['id'])->update([
                'username' => $user['username'],
                'email' => $user['email'],
                'position' => $user['position'],
                'phone' => $user['phone']
            ]);

            $response = $response->withJson(['Message' => 'User Updated']);

            return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(200);
        }

        //Delete User
        public function delete(Request $request, Response $response, array $args) {

            $user = User::destroy($args['id']);
            
            $response = $response->withJson(['Message' => 'User Deleted']);

            return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(200);
        }
    }


























    
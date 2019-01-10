<?php

    namespace app\controllers;
    use app\models\user;
    use src\middleware;
    use Psr\Http\Message\ServerRequestInterface as Request;
    use Psr\Http\Message\ResponseInterface as Response;
    use Ramsey\Uuid\Uuid;
    use Firebase\JWT\JWT;
    use Tuupola\Base62;
    use \Datetime;

    class LoginController extends Controller{

        //User Login
        public function login(Request $request, Response $response, array $args){

            var_dump($post = $request->getBody()->getContents());
            $post = json_decode($post);
     
            $email = $post->email;
            $password = $post->password;

            $userEmail = User::where('email', $email)->first();
            
            //if Email Exists
            if ($userEmail) {

                $acct = User::where('email', $email)->first();
                //Verify Hash Password
                if (password_verify($password, $acct->password)) {
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

                } else {

                    $response_data = array();

                    $response_data['error'] = true;
                    $response_data['message'] = 'Password not match';
                    $response->write(json_encode($response_data));

                    return $response
                            ->withHeader('Content-Type', 'application/json')
                            ->withStatus(200);
                }
                
            }else {

                $response_data = array();

                $response_data['error'] = true;
                $response_data['message'] = 'Login Failed';
                $response->write(json_encode($response_data));

                return $response
                        ->withHeader('Content-Type', 'application/json')
                        ->withStatus(200);
            }
        }
    }
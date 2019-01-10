<?php

    namespace app\controllers;
    use app\models\post;
    use app\models\user;
    use src\middleware;
    use Psr\Http\Message\ServerRequestInterface as Request;
    use Psr\Http\Message\ResponseInterface as Response;
    use Illuminate\Database\Capsule\Manager as DB;
    use Ramsey\Uuid\Uuid;
    use Firebase\JWT\JWT;
    use Tuupola\Base62;
    use \Datetime;

    class PostController extends Controller{

        //Create Post
        public function createPost(Request $request, Response $response, array $args){

            $posts = $request->getParsedBody();

            $user = User::select('id')->where('username', $posts['user_id'])->first();
            
            $data = Post::create([
                'title' => $posts['title'],
                'description' => $posts['description'],
                'user_id' => $user->id
            ]);

            $response = $response->withJson(['Message' => 'Post Created']);

            return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(200);
        }

        //Get Single Post
        public function singlePost(Request $request, Response $response, array $args){

            $posts = Post::find($args['id']);

            $response_data = array();
            $response_data['posts'] = $posts;
            $response->write(json_encode($response_data));

            return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(200);
        }

        //Get All Post
        public function getallPost(Request $request, Response $response, array $args){

            $posts = Post::all();

            $response_data = array();
            $response_data['posts'] = $posts;
            $response->write(json_encode($response_data));

            return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(200);
        }

        //Update Post
        public function updatePost(Request $request, Response $response, array $args){

            $posts = $request->getParsedBody();
            $data = Post::where('id', $args['id'])->update([
                'title' => $posts['title'],
                'description' => $posts['description']
            ]);

            $response = $response->withJson(['Message' => 'Post Updated']);

            return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(200);
        }

        //Delete Post
        public function deletePost(Request $request, Response $response, array $args){

            $posts = Post::destroy($args['id']);
            
            $response = $response->withJson(['Message' => 'Post Deleted']);

            return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(200);
        }
    }
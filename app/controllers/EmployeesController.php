<?php

    namespace app\controllers;
    use app\models\department;
    use app\models\user;
    use app\models\branch;
    use app\models\category;
    use app\models\employees;
    use src\middleware;
    use Psr\Http\Message\ServerRequestInterface as Request;
    use Psr\Http\Message\ResponseInterface as Response;
    use Illuminate\Database\Capsule\Manager as DB;
    use Ramsey\Uuid\Uuid;
    use Firebase\JWT\JWT;
    use Tuupola\Base62;
    use \Datetime;

    class EmployeesController extends Controller{

        //Create Post
        public function createEmployee(Request $request, Response $response, array $args){

            $employees = $request->getParsedBody();

            $user = User::select('id')->where('username', $employees['user_id'])->first();
            $branch = Branch::select('id')->where('name', $employees['branch_id'])->first();
            $category = Category::select('id')->where('name', $employees['category_id'])->first();
            $department = Department::select('id')->where('name', $employees['department_id'])->first();

            $data = Employees::create([
                'category_id' => $category->id,
                'department_id' => $department->id,
                'branch_id' => $branch->id,
                'category_id' => $category->id,
                'fullname' => $employees['fullname'],
                'user_id' => $user->id,
                'email' => $employees['email'],
                'address' => $employees['address'],
                'phone' => $employees['phone'],
            ]);

            $response = $response->withJson(['Message' => 'Employee Created']);

            return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(200);
        }

        //Get Single Post
        public function singleEmployee(Request $request, Response $response, array $args){

            $employees = Employees::find($args['id']);

            $response_data = array();
            $response_data['employees'] = $employees;
            $response->write(json_encode($response_data));

            return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(200);
        }

        //Get All Post
        public function getallEmployee(Request $request, Response $response, array $args){

            $employees = Employees::all();

            foreach($employees as $employee){
                $e = $employee->Category->name;
            }

            $response_data = array();
            $response_data['employees'] = $employees;
            $response->write(json_encode($response_data));

            return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(200);
        }

        //Update Post
        public function updateEmployee(Request $request, Response $response, array $args){

            $employees = $request->getParsedBody();
            $data = Employees::where('id', $args['id'])->update([
                'category_id' => $category->id,
                'department_id' => $department->id,
                'branch_id' => $branch->id,
                'category_id' => $category->id,
                'fullname' => $employees['fullname'],
                'user_id' => $user->id,
                'email' => $employees['email'],
                'address' => $employees['address'],
                'phone' => $employees['phone']
            ]);

            $response = $response->withJson(['Message' => 'Employee Updated']);

            return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(200);
        }

        //Delete Post
        public function deleteEmployee(Request $request, Response $response, array $args){

            $employees = Employees::destroy($args['id']);
            
            $response = $response->withJson(['Message' => 'Employee Deleted']);

            return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(200);
        }
    }
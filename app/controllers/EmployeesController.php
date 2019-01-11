<?php

    namespace app\controllers;
    use app\models\department;
    use app\models\user;
    use app\models\branch;
    use app\models\category;
    use app\models\employees;
    use app\models\post;
    use src\middleware;
    use Psr\Http\Message\ServerRequestInterface as Request;
    use Psr\Http\Message\ResponseInterface as Response;
    use Illuminate\Database\Capsule\Manager as DB;
    use \Datetime;

    class EmployeesController extends Controller{

        //Create Employee
        public function createEmployee(Request $request, Response $response, array $args){

            $employees = $request->getParsedBody();

            $user = User::select('id')->where('username', $employees['user_id'])->first();
            $branch = Branch::select('id')->where('name', $employees['branch_id'])->first();
            $department = Department::select('id')->where('name', $employees['department_id'])->first();
            $post = Post::select('id')->where('title', $employees['post_id'])->first();

            $data = Employees::create([
                'department_id' => $department->id,
                'branch_id' => $branch->id,
                'fullname' => $employees['fullname'],
                'user_id' => $user->id,
                'post_id' => $post->id,
                'email' => $employees['email'],
                'address' => $employees['address'],
                'phone' => $employees['phone'],
            ]);

            $response = $response->withJson(['Message' => 'Employee Created']);

            return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(200);
        }

        //Get Single Employee
        public function singleEmployee(Request $request, Response $response, array $args){

            $employees = Employees::find($args['id']);

            $response_data = array();
            $response_data['employees'] = $employees;
            $response->write(json_encode($response_data));

            return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(200);
        }

        //Get All Employee
        public function getallEmployee(Request $request, Response $response, array $args){
            
            $employees = Employees::all();

            // foreach($employees as $employee){
            //     $e = $employee->Category->name;
            // }

            $response_data = array();
            $response_data['employees'] = $employees;
            $response->write(json_encode($response_data));

            return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(200);
        }

        //Update Employee
        public function updateEmployee(Request $request, Response $response, array $args){

            $employees = $request->getParsedBody();

            $user = User::select('username')->where('id', $employees['user_id'])->first();
            $branch = Branch::select('name')->where('id', $employees['branch_id'])->first();
            $department = Department::select('id')->where('name', $employees['department_id'])->first();
            $post = Post::select('title')->where('id', $employees['post_id'])->first();

            $data = Employees::where('id', $args['id'])->update([
                'department_id' =>$employees['department_id'],
                'branch_id' => $employees['branch_id'],
                'fullname' => $employees['fullname'],
                'user_id' =>$employees['user_id'],
                'post_id' => $employees['post_id'],
                'email' => $employees['email'],
                'address' => $employees['address'],
                'phone' => $employees['phone']
            ]);

            $response = $response->withJson(['Message' => 'Employee Updated']);

            return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(200);
        }

        //Delete Employee
        public function deleteEmployee(Request $request, Response $response, array $args){

            $employees = Employees::destroy($args['id']);
            
            $response = $response->withJson(['Message' => 'Employee Deleted']);

            return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(200);
        }
    }
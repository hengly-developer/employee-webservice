<?php

use Slim\Http\Request;
use Slim\Http\Response;
use \Firebase\JWT\JWT;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: authorization, Content-Type, application/json");

// Routes Group
$app->group('/api', function () use ($app){

//Register
$app->get('/allusers', \app\controllers\usercontroller::class . ':allusers');
$app->get('/singleuser/[{id}]', \app\controllers\usercontroller::class . ':singleuser');
$app->post('/createUser', \app\controllers\usercontroller::class . ':create');
$app->put('/updateUser/{id}', \app\controllers\usercontroller::class . ':update');
$app->delete('/deleteDelete/{id}', \app\controllers\usercontroller::class . ':delete');

//Department Routes
$app->post('/createDepartment', \app\controllers\departmentcontroller::class . ':createDepartment');
$app->get('/getDepartment', \app\controllers\departmentcontroller::class . ':getallDepartment');
$app->get('/singleDepartment/[{id}]', \app\controllers\departmentcontroller::class . ':singleDepartment');
$app->put('/updateDepartment/[{id}]', \app\controllers\departmentcontroller::class . ':updateDepartment');
$app->delete('/deleteDepartment/[{id}]', \app\controllers\departmentcontroller::class . ':deleteDepartment');

//Branch Routes
$app->post('/createBranch', \app\controllers\branchcontroller::class . ':create');
$app->get('/getbranch', \app\controllers\branchcontroller::class . ':getallbranch');
$app->get('/singleBranch/[{id}]', \app\controllers\branchcontroller::class . ':singlebranch');
$app->put('/updateBranch/[{id}]', \app\controllers\branchcontroller::class . ':updateBranch');
$app->delete('/deleteBranch/[{id}]', \app\controllers\branchcontroller::class . ':deleteBranch');

//Posts Routes
$app->post('/createPost', \app\controllers\postcontroller::class . ':createPost');
$app->get('/getPost', \app\controllers\postcontroller::class . ':getallPost');
$app->get('/singlePost/[{id}]', \app\controllers\postcontroller::class . ':singlePost');
$app->put('/updatePost/[{id}]', \app\controllers\postcontroller::class . ':updatePost');
$app->delete('/deletePost/[{id}]', \app\controllers\postcontroller::class . ':deletePost');

//LogIn
$app->post('/login', \app\controllers\logincontroller::class . ':login');

});
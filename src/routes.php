<?php

use Slim\Http\Request;
use Slim\Http\Response;
use \Firebase\JWT\JWT;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: authorization, Content-Type, application/json");

// Routes Group
$app->group('/api', function () use ($app){

    //Register
    $app->get('/getUser', \app\controllers\usercontroller::class . ':allusers');
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
    $app->get('/getBranch', \app\controllers\branchcontroller::class . ':getallbranch');
    $app->get('/singleBranch/[{id}]', \app\controllers\branchcontroller::class . ':singlebranch');
    $app->put('/updateBranch/[{id}]', \app\controllers\branchcontroller::class . ':updateBranch');
    $app->delete('/deleteBranch/[{id}]', \app\controllers\branchcontroller::class . ':deleteBranch');

    //Posts Routes
    $app->post('/createPost', \app\controllers\postcontroller::class . ':createPost');
    $app->get('/getPost', \app\controllers\postcontroller::class . ':getallPost');
    $app->get('/singlePost/[{id}]', \app\controllers\postcontroller::class . ':singlePost');
    $app->put('/updatePost/[{id}]', \app\controllers\postcontroller::class . ':updatePost');
    $app->delete('/deletePost/[{id}]', \app\controllers\postcontroller::class . ':deletePost');

    //Employee Routes
    $app->post('/createEmployee', \app\controllers\employeescontroller::class . ':createEmployee');
    $app->get('/getEmployee', \app\controllers\employeescontroller::class . ':getallEmployee');
    $app->get('/singleEmployee/[{id}]', \app\controllers\employeescontroller::class . ':singleEmployee');
    $app->put('/updateEmployee/[{id}]', \app\controllers\employeescontroller::class . ':updateEmployee');
    $app->delete('/deleteEmployee/[{id}]', \app\controllers\employeescontroller::class . ':deleteEmployee');

    //Experience Routes
    $app->post('/createExperience', \app\controllers\experiencecontroller::class . ':createExperience');
    $app->get('/getExperience', \app\controllers\experiencecontroller::class . ':getExperience');
    $app->get('/getsingleExperience/[{id}]', \app\controllers\experiencecontroller::class . ':getsingleExperience');
    $app->put('/updateExperience/[{id}]', \app\controllers\experiencecontroller::class . ':updateExperience');
    $app->delete('/deleteExperience/[{id}]', \app\controllers\experiencecontroller::class . ':deleteExperience');

    //Education Routes
    $app->post('/createEducation', \app\controllers\educationcontroller::class . ':createEducation');
    $app->get('/getEducation', \app\controllers\educationcontroller::class . ':getEducation');
    $app->get('/getsingleEducation/[{id}]', \app\controllers\educationcontroller::class . ':getsingleEducation');
    $app->put('/updateEducation/[{id}]', \app\controllers\educationcontroller::class . ':updateEducation');
    $app->delete('/deleteEducation/[{id}]', \app\controllers\educationcontroller::class . ':deleteEducation');


    //Skill Routes
    $app->post('/createSkill', \app\controllers\skillcontroller::class . ':createSkill');
    $app->get('/getSkill', \app\controllers\skillcontroller::class . ':getSkill');
    $app->get('/getsingleSkill/[{id}]', \app\controllers\skillcontroller::class . ':getsingleSkill');
    $app->put('/updateSkill/[{id}]', \app\controllers\skillcontroller::class . ':updateSkill');
    $app->delete('/deleteSkill/[{id}]', \app\controllers\skillcontroller::class . ':deleteSkill');

    //LogIn
    $app->post('/login', \app\controllers\logincontroller::class . ':login');

});
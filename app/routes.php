<?php



use Slim\App;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface as RequestInterface;

return function (App $app){

    $app->get('/app/hello/{name}', function (RequestInterface $request, ResponseInterface $response, array $args) {
        $name = $args['name'];
        $response->getBody()->write("Hello, $name");

        return $response;
    });

    $app->get('/Home',function(RequestInterface $request, ResponseInterface $response, array $args){
        require_once('Home.html');
        return $response;
        });
    $app->get('/Meditation',function(RequestInterface $request, ResponseInterface $response, array $args){
        require_once('meditation.html');
        return $response;
        });
    $app->get('/YogaForBeginner',function(RequestInterface $request, ResponseInterface $response, array $args){
        require_once('Yoga-Beginner.html');
        return $response;
        });
    $app->get('/YogaForIntermediate',function(RequestInterface $request, ResponseInterface $response, array $args){
        require_once('Yoga-intermediate.html');
        return $response;
        });
    $app->get('/YogaForAdvance',function(RequestInterface $request, ResponseInterface $response, array $args){
        require_once('Yoga-Advance.html');
        return $response;
        });
    $app->get('/Login',function(RequestInterface $request, ResponseInterface $response, array $args){
        require_once('loginpage.html');
        return $response;
        });
    $app->get('/Contact',function(RequestInterface $request, ResponseInterface $response, array $args){
        require_once('contactUs.html');
        return $response;
        });
    $app->get('/benefits-of-meditation',function(RequestInterface $request, ResponseInterface $response, array $args){
        require_once('benefits-of-meditation.html');
        return $response;
        });
    $app->get('/ImagePicker',function(RequestInterface $request, ResponseInterface $response, array $args){
        require_once('ImagePicker.html');
        return $response;
        });
    $app->get('/How-to-Meditate',function(RequestInterface $request, ResponseInterface $response, array $args){
        require_once('How-to-Meditate.html');
        return $response;
        });
    $app->get('/Science-of-Meditation',function(RequestInterface $request, ResponseInterface $response, array $args){
        require_once('Science-of-Meditation.html');
        return $response;
        });
        


    $app->get('/user/{name}', function (RequestInterface $request, ResponseInterface $response, array $args) {
        $name = $args['name'];
        $response->getBody()->write("Hello, $name");

        return $response;
    });

    $app->get('/fetchall',function(RequestInterface $request, ResponseInterface $response, array $args){
    require_once('insertingData.php');
    return $response;
    });
    
    $app->post('/api-Insert',function(RequestInterface $request, ResponseInterface $response, array $args){
        require_once('apiInsert.php');
        return $response;
    });
    $app->post('/Insert-Image',function(RequestInterface $request, ResponseInterface $response, array $args){
        require_once('fileUpload.php');
        return $response;
    });
    $app->post('/api-Image',function(RequestInterface $request, ResponseInterface $response, array $args){
        require_once('imageapi.php');
        return $response;
    });
    $app->post('/upload',function(RequestInterface $request, ResponseInterface $response, array $args){
        require_once('upload.php');
        return $response;
    });
    

   $app->put('/api-Update',function(RequestInterface $request, ResponseInterface $response, array $args){
       require_once('apiUpdate.php');
       return $response;
   });
   $app->post('/api-checkmail',function(RequestInterface $request, ResponseInterface $response, array $args){
    require_once('apicheckemail.php');
    return $response;
    });
 
   $app->post('/api-login',function(RequestInterface $request, ResponseInterface $response, array $args){
    require_once('apilogin.php');
    return $response;
    });
    $app->delete('/api-delet',function(RequestInterface $request, ResponseInterface $response, array $args){
        require_once('delete.php');
        return $response;
        });



//         $app->get('/', function (Request $request, Response $response) {
//             $response->getBody()->write('Hello World');
//             return $response;
//         });
        
//         $app->group('/utils', function (RouteCollectorProxy $group) {
//             $group->get('/fetchall', function(RequestInterface $request, ResponseInterface $response, array $args) {
//                 require_once('insertingData.php');
//                 return $response;
//             });
            
            
//             $group->get('/time', function(RequestInterface $request, ResponseInterface $response, array $args) {
//                 $response->getBody()->write((string)time());
//                 return $response;
//             });
//         })->add(function (Request $request, RequestHandler $handler) use ($app) {
            
//             $response = $handler->handle($request);
//             $dateOrTime = (string) $response->getBody();
        
//             $response = $app->getResponseFactory()->createResponse();
//             $response->getBody()->write('It is now ' . $dateOrTime . '. Enjoy!');
        
//             return $response;
//         });
        

// 
};
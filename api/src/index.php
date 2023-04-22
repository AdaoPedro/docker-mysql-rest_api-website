<?php

    require __DIR__ . "/../vendor/autoload.php";

    $app = new FrameworkX\App();

    $credentials = "root:12345678@127.0.0.1:33336/shop";

    $factory = new React\MySQL\Factory();
    $db = $factory->createLazyConnection($credentials);
    
    $app->get("/products", function() use ($db) {
        
        $result = React\Async\await( 
            $db->query("SELECT * FROM products")
        );

        return new React\Http\Message\Response(
            200,
            [ "Content-Type" => "application/json" ],
            json_encode($result->resultRows) 
        );

    });

    $app->run();


    
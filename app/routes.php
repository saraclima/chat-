<?php

$router->get('/', "chat#index");

$router->get('/:sender',"chat#sender");

$router->get('/:sender/:message', "chat#message");

$router->post('/:sender/:receiver/:content', "chat#send");

$router->post('/:login/:password', "login#login");
<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/V1/store/storeConfigs',
    function (Request $request, Response $response) {
        $response->getBody()->write('<?xml version="1.0"?>
        <response>
          <item>
            <id>33</id>
            <code>nl</code>
            <name>NL</name>
            <website_id>32</website_id>
            <store_group_id>32</store_group_id>
            <is_active>1</is_active>
          </item>
          <item>
            <id>0</id>
            <code>admin</code>
            <name>Admin</name>
            <website_id>0</website_id>
            <store_group_id>0</store_group_id>
            <is_active>1</is_active>
          </item>
          <item>
            <id>29</id>
            <code>wholesale</code>
            <name>wholesale</name>
            <website_id>29</website_id>
            <store_group_id>29</store_group_id>
            <is_active>1</is_active>
          </item>
          <item>
            <id>34</id>
            <code>en</code>
            <name>EN</name>
            <website_id>32</website_id>
            <store_group_id>32</store_group_id>
            <is_active>1</is_active>
          </item>
          <item>
            <id>35</id>
            <code>fr</code>
            <name>FR</name>
            <website_id>32</website_id>
            <store_group_id>32</store_group_id>
            <is_active>1</is_active>
          </item>
        </response>
        ');
        return $response->withHeader("content-type", "application/xml")
                        ->withStatus(200);
    }
);
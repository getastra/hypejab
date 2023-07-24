<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/cockroachdbSecure',
    function (Request $request, Response $response) {
        $header = $request->getHeaderLine('X-Forwarded-Host');
        $response->getBody()->write('
        <!DOCTYPE html>
<html>
	<head>
		<title>Cockroach Console</title>
		<meta charset="UTF-8">
		<link href="favicon.ico" rel="shortcut icon">
	</head>
	<body>
		<div id="react-layout"></div>

		<script>
			window.dataFromServer = {"ExperimentalUseLogin":true,"LoginEnabled":true,"LoggedInUser":null,"Tag":"v22.1.0-alpha.4-672-gb7b37f417c","Version":"v22.1","NodeID":"1","OIDCAutoLogin":false,"OIDCLoginEnabled":false,"OIDCButtonText":"Login with your OIDC provider"};
		</script>

		<script src="bundle.js" type="text/javascript"></script>
	</body>
</html>

        ');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);

$app->get(
    '/cockroachdbSecureInsecure/_admin/v1/events',
    function (Request $request, Response $response) {
        $header = $request->getHeaderLine('X-Forwarded-Host');
        $response->getBody()->write('
        {
            "events": [
              {
                "timestamp": "2022-04-14T02:41:29.099657Z",
                "eventType": "node_restart",
                "targetId": "1",
                "reportingId": "1",
                "info": "{\"EventType\":\"node_restart\",\"LastUp\":1649904039026382300,\"NodeID\":1,\"StartedAt\":1649904088793330200,\"Timestamp\":1649904089099657000}",
                "uniqueId": "O8dgqFeFS/a16sBdx9WUjQ=="
              },
              {
                "timestamp": "2022-04-14T02:31:23.266402Z",
                "eventType": "node_restart",
                "targetId": "1",
                "reportingId": "1",
                "info": "{\"EventType\":\"node_restart\",\"LastUp\":1649903457882375200,\"NodeID\":1,\"StartedAt\":1649903482980332000,\"Timestamp\":1649903483266402000}",
                "uniqueId": "c1gQzCxGSHiUhbyfrzQDZw=="
              },
              {
                "timestamp": "2022-04-14T02:27:26.930570Z",
                "eventType": "node_restart",
                "targetId": "1",
                "reportingId": "1",
                "info": "{\"EventType\":\"node_restart\",\"LastUp\":1649737616411174100,\"NodeID\":1,\"StartedAt\":1649903246596884200,\"Timestamp\":1649903246930570200}",
                "uniqueId": "G+K4y8dPS6CCnHK8Coh3pg=="
              },
              {
                "timestamp": "2022-04-12T04:08:09.587870Z",
                "eventType": "create_role",
                "targetId": "0",
                "reportingId": "1",
                "info": "{\"ApplicationName\":\"$ cockroach sql\",\"EventType\":\"create_role\",\"RoleName\":\"max\",\"Statement\":\"\\u003chidden\\u003e\",\"Tag\":\"CREATE ROLE\",\"Timestamp\":1649736489587869700,\"User\":\"root\"}",
                "uniqueId": "50UtRBJWS2KOxm8Texe9+w=="
              },
              {
                "timestamp": "2022-04-12T04:03:47.041494Z",
                "eventType": "node_restart",
                "targetId": "1",
                "reportingId": "1",
                "info": "{\"EventType\":\"node_restart\",\"LastUp\":1649736142256655000,\"NodeID\":1,\"StartedAt\":1649736226933321200,\"Timestamp\":1649736227041493800}",
                "uniqueId": "N3yI7GboQGG8e/g/RhyN0Q=="
              },
              {
                "timestamp": "2022-04-12T03:58:16.791475Z",
                "eventType": "node_restart",
                "targetId": "1",
                "reportingId": "1",
                "info": "{\"EventType\":\"node_restart\",\"LastUp\":1649734404285917200,\"NodeID\":1,\"StartedAt\":1649735896639873000,\"Timestamp\":1649735896791475000}",
                "uniqueId": "KmH4vI9bQGOP/66OLmn8VA=="
              },
              {
                "timestamp": "2022-04-12T03:12:19.691237Z",
                "eventType": "node_restart",
                "targetId": "1",
                "reportingId": "1",
                "info": "{\"EventType\":\"node_restart\",\"LastUp\":1649284978642818800,\"NodeID\":1,\"StartedAt\":1649733139516195300,\"Timestamp\":1649733139691237400}",
                "uniqueId": "s5kbwBA/RTaV/OWH09tdIw=="
              },
              {
                "timestamp": "2022-04-06T12:19:53.936630Z",
                "eventType": "node_restart",
                "targetId": "1",
                "reportingId": "1",
                "info": "{\"EventType\":\"node_restart\",\"LastUp\":1649208722745558800,\"NodeID\":1,\"StartedAt\":1649247593551343900,\"Timestamp\":1649247593936630300}",
                "uniqueId": "z/PTc9iaSO6hkWoyx73jaw=="
              },
              {
                "timestamp": "2022-04-05T19:34:15.947954Z",
                "eventType": "create_table",
                "targetId": "106",
                "reportingId": "1",
                "info": "{\"ApplicationName\":\"$ cockroach sql\",\"DescriptorID\":106,\"EventType\":\"create_table\",\"Statement\":\"\\u003chidden\\u003e\",\"TableName\":\"bank.public.accounts\",\"Tag\":\"CREATE TABLE\",\"Timestamp\":1649187255947954000,\"User\":\"root\"}",
                "uniqueId": "bUI8bR+bR9aDtjj5zkBweQ=="
              },
              {
                "timestamp": "2022-04-05T19:34:10.204161Z",
                "eventType": "create_database",
                "targetId": "104",
                "reportingId": "1",
                "info": "{\"ApplicationName\":\"$ cockroach sql\",\"DatabaseName\":\"bank\",\"DescriptorID\":104,\"EventType\":\"create_database\",\"Statement\":\"\\u003chidden\\u003e\",\"Tag\":\"CREATE DATABASE\",\"Timestamp\":1649187250204161000,\"User\":\"root\"}",
                "uniqueId": "eIs0z6nYQIqx0CsNi04cCg=="
              },
              {
                "timestamp": "2022-04-05T19:12:29.556600Z",
                "eventType": "node_join",
                "targetId": "2",
                "reportingId": "2",
                "info": "{\"EventType\":\"node_join\",\"LastUp\":1649185949491164000,\"NodeID\":2,\"StartedAt\":1649185949491164000,\"Timestamp\":1649185949556600300}",
                "uniqueId": "NI5wLlG0RfewUQbYhuviiw=="
              },
              {
                "timestamp": "2022-04-05T19:12:28.891995Z",
                "eventType": "create_database",
                "targetId": "102",
                "reportingId": "1",
                "info": "{\"ApplicationName\":\"$ internal-create-default-DB\",\"DatabaseName\":\"postgres\",\"DescriptorID\":102,\"EventType\":\"create_database\",\"Statement\":\"\\u003chidden\\u003e\",\"Tag\":\"CREATE DATABASE\",\"Timestamp\":1649185948891995000,\"User\":\"root\"}",
                "uniqueId": "MZhBiFEBRYiZZ1C8NuRWzA=="
              },
              {
                "timestamp": "2022-04-05T19:12:28.838272Z",
                "eventType": "create_database",
                "targetId": "100",
                "reportingId": "1",
                "info": "{\"ApplicationName\":\"$ internal-create-default-DB\",\"DatabaseName\":\"defaultdb\",\"DescriptorID\":100,\"EventType\":\"create_database\",\"Statement\":\"\\u003chidden\\u003e\",\"Tag\":\"CREATE DATABASE\",\"Timestamp\":1649185948838272300,\"User\":\"root\"}",
                "uniqueId": "CZ2aXB5eTMyXXmv/lDz6Pg=="
              },
              {
                "timestamp": "2022-04-05T19:12:28.761998Z",
                "eventType": "set_cluster_setting",
                "targetId": "0",
                "reportingId": "1",
                "info": "{\"ApplicationName\":\"$ internal-initializeClusterSecret\",\"EventType\":\"set_cluster_setting\",\"SettingName\":\"cluster.secret\",\"Statement\":\"\\u003chidden\\u003e\",\"Tag\":\"SET CLUSTER SETTING\",\"Timestamp\":1649185948761998300,\"User\":\"root\",\"Value\":\"\\u003chidden\\u003e\"}",
                "uniqueId": "eoQHda5lRZ+EmF/uueoayg=="
              },
              {
                "timestamp": "2022-04-05T19:12:28.561284Z",
                "eventType": "set_cluster_setting",
                "targetId": "0",
                "reportingId": "1",
                "uniqueId": "68J9oremTziruZDmN5SwjQ=="
              },
              {
                "timestamp": "2022-04-05T19:12:28.470422Z",
                "eventType": "set_cluster_setting",
                "targetId": "0",
                "reportingId": "1",
                "info": "{\"ApplicationName\":\"$ internal-optInToDiagnosticsStatReporting\",\"EventType\":\"set_cluster_setting\",\"SettingName\":\"diagnostics.reporting.enabled\",\"Statement\":\"\\u003chidden\\u003e\",\"Tag\":\"SET CLUSTER SETTING\",\"Timestamp\":1649185948470422300,\"User\":\"root\",\"Value\":\"\\u003chidden\\u003e\"}",
                "uniqueId": "DHdYBSdBSN27gra4VOwxTg=="
              },
              {
                "timestamp": "2022-04-05T19:12:28.339287Z",
                "eventType": "node_join",
                "targetId": "1",
                "reportingId": "1",
                "info": "{\"EventType\":\"node_join\",\"LastUp\":1649185948148583700,\"NodeID\":1,\"StartedAt\":1649185948148583700,\"Timestamp\":1649185948339287300}",
                "uniqueId": "AWUuXJj6RfKdpNGgy7QSMA=="
              }
            ]
          }
        ');
        return $response->withHeader("content-type", "application/json")
                        ->withStatus(200);
    }
);
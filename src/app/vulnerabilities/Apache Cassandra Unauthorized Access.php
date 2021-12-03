<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/resources/apache-cassandra-3.11.10/conf/cassandra.yaml',
    function (Request $request, Response $response) {
        require __DIR__ . '/../login/checkSession.php';
        $response->getBody()->write('
# Authentication backend, implementing IAuthenticator; used to identify users
# Out of the box, Cassandra provides org.apache.cassandra.auth.{AllowAllAuthenticator,
# PasswordAuthenticator}.
#
# - AllowAllAuthenticator performs no checks - set it to disable authentication.
# - PasswordAuthenticator relies on username/password pairs to authenticate
#   users. It keeps usernames and hashed passwords in system_auth.roles table.
#   Please increase system_auth keyspace replication factor if you use this authenticator.
#   If using PasswordAuthenticator, CassandraRoleManager must also be used (see below)
authenticator: AllowAllAuthenticator

# Authorization backend, implementing IAuthorizer; used to limit access/provide permissions
# Out of the box, Cassandra provides org.apache.cassandra.auth.{AllowAllAuthorizer,
# CassandraAuthorizer}.
#
# - AllowAllAuthorizer allows any action to any user - set it to disable authorization.
# - CassandraAuthorizer stores permissions in system_auth.role_permissions table. Please
#   increase system_auth keyspace replication factor if you use this authorizer.
authorizer: AllowAllAuthorizer

# Part of the Authentication & Authorization backend, implementing IRoleManager; used
# to maintain grants and memberships between roles.
# Out of the box, Cassandra provides org.apache.cassandra.auth.CassandraRoleManager,
# which stores role information in the system_auth keyspace. Most functions of the
# IRoleManager require an authenticated login, so unless the configured IAuthenticator
# actually implements authentication, most of this functionality will be unavailable.
#
# - CassandraRoleManager stores role data in the system_auth keyspace. Please
#   increase system_auth keyspace replication factor if you use this role manager.
role_manager: CassandraRoleManager

# Validity period for roles cache (fetching granted roles can be an expensive
# operation depending on the role manager, CassandraRoleManager is one example)
# Granted roles are cached for authenticated sessions in AuthenticatedUser and
# after the period specified here, become eligible for (async) reload.
# Defaults to 2000, set to 0 to disable caching entirely.
# Will be disabled automatically for AllowAllAuthenticator.
roles_validity_in_ms: 2000
        ');
        return $response->withHeader("content-type", "text/plain")
                        ->withStatus(200);
    }
); 

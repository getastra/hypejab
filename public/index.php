<?php

use Psr\Http\Message\ServerRequestInterface;
use Psr\Log\LoggerInterface;
use Slim\Factory\AppFactory;
use Slim\Psr7\Response;

require __DIR__.'/../vendor/autoload.php';

$app = AppFactory::create();
$app->addBodyParsingMiddleware();
$app->addRoutingMiddleware();

require __DIR__ . '/../src/app/index.php';
require __DIR__ . '/../src/app/robots.php';
require __DIR__ . '/../src/app/sitemap.php';
require __DIR__ . '/../src/app/login/hypejablogin.php';
require __DIR__ . '/../src/app/login/loginPoll.php';
require __DIR__ . '/../src/app/vulnerabilities/hostHeaderInjection.php';
require __DIR__ . '/../src/app/vulnerabilities/apacheTomcatGhostcatCve20201938.php';
require __DIR__ . '/../src/app/vulnerabilities/hiddenFileSample.php';
require __DIR__ . '/../src/app/vulnerabilities/jspSamplesPage.php';
require __DIR__ . '/../src/app/vulnerabilities/exposedPanelsCrushftp.php';
require __DIR__ . '/../src/app/vulnerabilities/apacheAxis2DefaultLogin.php';
require __DIR__ . '/../src/app/vulnerabilities/unauthenticatedGitlabSsrfCve202122214.php';
require __DIR__ . '/../src/app/vulnerabilities/softwareVersions.php';
require __DIR__ . '/../src/app/vulnerabilities/wordpressUsernameEnumeration.php';
require __DIR__ . '/../src/app/vulnerabilities/drupalUsernameEnumeration.php';
require __DIR__ . '/../src/app/vulnerabilities/magentoCacheleak.php';
require __DIR__ . '/../src/app/vulnerabilities/SSRF.php';
require __DIR__ . '/../src/app/vulnerabilities/magentoConfigFile.php';
require __DIR__ . '/../src/app/vulnerabilities/magentoDownloader.php';
require __DIR__ . '/../src/app/vulnerabilities/swaggerConfigFile.php';
require __DIR__ . '/../src/app/vulnerabilities/awstatsScript.php';
require __DIR__ . '/../src/app/vulnerabilities/apiKeyScanner.php';
require __DIR__ . '/../src/app/vulnerabilities/databaseConnectionString.php';
require __DIR__ . '/../src/app/vulnerabilities/mysqlUsernameDisclosure.php';
require __DIR__ . '/../src/app/vulnerabilities/wpMediaEnum.php';
require __DIR__ . '/../src/app/vulnerabilities/403Bypass.php';
require __DIR__ . '/../src/app/vulnerabilities/firebaseDatabaseUrlDisclosure.php';
require __DIR__ . '/../src/app/vulnerabilities/baseTagHijacking.php';
require __DIR__ . '/../src/app/vulnerabilities/magentoApiAnonymousAccess.php';
require __DIR__ . '/../src/app/vulnerabilities/oobXxe.php';
require __DIR__ . '/../src/app/vulnerabilities/laravelLogFile.php';
require __DIR__ . '/../src/app/vulnerabilities/apacheCassandraUnauthorizedAccess.php';
require __DIR__ . '/../src/app/vulnerabilities/laravelXss.php';
require __DIR__ . '/../src/app/vulnerabilities/s3BucketPubliclyAccessible.php';
require __DIR__ . '/../src/app/vulnerabilities/arbitraryFileReadNextJs.php';
require __DIR__ . '/../src/app/vulnerabilities/chromeLoggerInformationDisclosure.php';
require __DIR__ . '/../src/app/vulnerabilities/apacheTomcatExamplesDirectory.php';
require __DIR__ . '/../src/app/vulnerabilities/merurialRepository.php';
require __DIR__ . '/../src/app/vulnerabilities/drupalBackupMigrate.php';
require __DIR__ . '/../src/app/vulnerabilities/log4jRce.php';
require __DIR__ . '/../src/app/vulnerabilities/xpoweredbyHeader.php';
require __DIR__ . '/../src/app/vulnerabilities/dangerousJsFunctions.php';
require __DIR__ . '/../src/app/vulnerabilities/wpeprivateConfigInfoDisclosure.php';
require __DIR__ . '/../src/app/vulnerabilities/bazaarRepository.php';
require __DIR__ . '/../src/app/vulnerabilities/serverSideTemplateInjection.php';
require __DIR__ . '/../src/app/vulnerabilities/sqliAuthBypass.php';
require __DIR__ . '/../src/app/vulnerabilities/forcedBrowsingAuthBypass.php';
require __DIR__ . '/../src/app/vulnerabilities/contentTypeMismatchToReponseBody.php';
require __DIR__ . '/../src/app/vulnerabilities/parameterModificationAuthBypass.php';
require __DIR__ . '/../src/app/vulnerabilities/sessionIdModificationAuthBypass.php';
require __DIR__ . '/../src/app/vulnerabilities/spring4shell.php';
require __DIR__ . '/../src/app/vulnerabilities/gitCredentialsDisclosure.php';
require __DIR__ . '/../src/app/vulnerabilities/webDAVRoutes.php';
require __DIR__ . '/../src/app/vulnerabilities/cockroachDBBrokenAccess.php';
require __DIR__ . '/../src/app/vulnerabilities/symfonySecretFragment.php';
require __DIR__ . '/../src/app/vulnerabilities/phpMyadminInformationSchemaDisclosure.php';
require __DIR__ . '/../src/app/vulnerabilities/sshAuthorizedKeysDisclosure.php';
require __DIR__ . '/../src/app/vulnerabilities/springActuatorEndpointsExposed.php';
require __DIR__ . '/../src/app/vulnerabilities/githubWorkflowDisclosure.php';
require __DIR__ . '/../src/app/vulnerabilities/wordpressLogsExposed.php';
require __DIR__ . '/../src/app/vulnerabilities/atlassianConfluenceInformationDisclosure.php';
require __DIR__ . '/../src/app/vulnerabilities/nginxMergeSlashesPathTraversal.php';
require __DIR__ . '/../src/app/vulnerabilities/debugModes.php';
require __DIR__ . '/../src/app/vulnerabilities/cve202226134.php';
require __DIR__ . '/../src/app/vulnerabilities/missingApiSecurityHeaders.php';
require __DIR__ . '/../src/app/vulnerabilities/wordpressDatabaseBackup.php';
require __DIR__ . '/../src/app/vulnerabilities/fullServerPathDisclosure.php';
require __DIR__ . '/../src/app/vulnerabilities/magentoUnprotectedDevFiles.php';
require __DIR__ . '/../src/app/vulnerabilities/wordpressXMLRPCEnabled.php';
require __DIR__ . '/../src/app/vulnerabilities/exposedSvnEntries.php';
require __DIR__ . '/../src/app/vulnerabilities/bower.php';
require __DIR__ . '/../src/app/vulnerabilities/dockerfileExample.php';
require __DIR__ . '/../src/app/vulnerabilities/rubyOnRailsSecretKeyDisclosure.php';
require __DIR__ . '/../src/app/vulnerabilities/laravelTelescope.php';
require __DIR__ . '/../src/app/vulnerabilities/404Check.php';
require __DIR__ . '/../src/app/vulnerabilities/404with200statuscode.php';
require __DIR__ . '/../src/app/vulnerabilities/text4shell.php';
require __DIR__ . '/../src/app/vulnerabilities/graphqlIntrospection.php';
require __DIR__ . '/../src/app/vulnerabilities/jsonWebKeySetDisclosure.php';
require __DIR__ . '/../src/app/vulnerabilities/pathTraversalInApiRoute.php';
require __DIR__ . '/../src/app/vulnerabilities/httpVerbTempering.php';
require __DIR__ . '/../src/app/vulnerabilities/fileUpload.php';
require __DIR__ . '/../src/app/vulnerabilities/serializedData.php';
require __DIR__ . '/../src/app/vulnerabilities/oldApiVulnerability.php';
require __DIR__ . '/../src/app/vulnerabilities/brokenLinkFooter.php';
require __DIR__ . '/../src/app/vulnerabilities/unverifiedEmailChange.php';
require __DIR__ . '/../src/app/vulnerabilities/passwordShowedInResponse.php';
require __DIR__ . '/../src/app/vulnerabilities/aiApiKey.php';
require __DIR__ . '/../src/app/vulnerabilities/packageJson.php';
require __DIR__ . '/../src/app/vulnerabilities/forgotpassword.php';
require __DIR__ . '/../src/app/vulnerabilities/docker-registry-and-svn-exposed.php';
require __DIR__ . '/../src/app/vulnerabilities/couchdb.php';
require __DIR__ . '/../src/app/vulnerabilities/json-reflection.php';
require __DIR__ . '/../src/app/vulnerabilities/forFuzzer.php';
require __DIR__ . '/../src/app/vulnerabilities/htmlInjection.php';
require __DIR__ . '/../src/app/vulnerabilities/sleepPayload.php';
require __DIR__ . '/../src/app/vulnerabilities/sessionToken.php';
require __DIR__ . '/../src/app/vulnerabilities/git-exposed.php';
require __DIR__ . '/../src/app/vulnerabilities/emailLeaks.php';
require __DIR__ . '/../src/app/vulnerabilities/IDOR.php';
require __DIR__ . '/../src/app/vulnerabilities/source-disclosure.php';
require __DIR__ . '/../src/app/vulnerabilities/info-disclosure.php';
require __DIR__ . '/../src/app/vulnerabilities/mass-assignment.php';
require __DIR__ . '/../src/app/vulnerabilities/publicEndpoint.php';
require __DIR__ . '/../src/app/vulnerabilities/basicresponsemanipulation.php';


// False positives section
require __DIR__ . '/../src/app/vulnerabilities/FP/xpoweredbyHeader.php';
require __DIR__ . '/../src/app/vulnerabilities/FP/dangerousJsFunctions.php';
require __DIR__ . '/../src/app/vulnerabilities/FP/retrievedFromCache.php';

// False negatives section
require __DIR__ . '/../src/app/vulnerabilities/FN/reflectedXssFalseNegative.php';

// Define Custom Error Handler
$customErrorHandler = function (
    ServerRequestInterface $request,
    Throwable $exception,
    bool $displayErrorDetails,
    bool $logErrors,
    bool $logErrorDetails,
    ?LoggerInterface $logger = null
) use ($app) {
    //$logger->error($exception->getMessage());

    $payload = ['error' => $exception->getMessage()];

    $response = $app->getResponseFactory()->createResponse();
    $response->getBody()->write(
        json_encode($payload, JSON_UNESCAPED_UNICODE)
    );

    if ($exception->getMessage() == 'Not found.') {
        return $response->withHeader("content-type", "application/json")
                        ->withStatus(404);
    }
    return $response->withHeader("content-type", "application/json");
};

// Add Error Middleware
$errorMiddleware = $app->addErrorMiddleware(true, true, true);
$errorMiddleware->setDefaultErrorHandler($customErrorHandler);

$app->run();

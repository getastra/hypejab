<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/.dockerfile',
    function (Request $request, Response $response) {
        $response->getBody()->write('
        FROM centos:7
        MAINTAINER linuxtechlab
        LABEL Remarks="This is a dockerfile example for Centos system"
        
        RUN yum -y update && \
        yum -y install httpd && \
        yum clean all
        
        COPY data/httpd.conf /etc/httpd/conf/httpd.conf
        
        ADD data/html.tar.gz /var/www/html/
        
        EXPOSE 80
        
        ENV HOME /root
        
        WORKDIR /root
        
        ENTRYPOINT ["ping"]
        
        CMD ["google.com"]
        ');
        return $response->withHeader("content-type", "text/plain")
                        ->withStatus(200);
    }
);

$app->get(
    '/.Dockerfile',
    function (Request $request, Response $response) {
        $response->getBody()->write('
        FROM centos:7
        MAINTAINER linuxtechlab
        LABEL Remarks="This is a dockerfile example for Centos system"
        
        RUN yum -y update && \
        yum -y install httpd && \
        yum clean all
        
        COPY data/httpd.conf /etc/httpd/conf/httpd.conf
        
        ADD data/html.tar.gz /var/www/html/
        
        EXPOSE 80
        
        ENV HOME /root
        
        WORKDIR /root
        
        ENTRYPOINT ["ping"]
        
        CMD ["google.com"]
        ');
        return $response->withHeader("content-type", "text/plain")
                        ->withStatus(200);
    }
); 
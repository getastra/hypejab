<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/app/etc/local.xml',
    function (Request $request, Response $response) {
        require __DIR__ . '/../login/checkSession.php';
        $response->getBody()->write('<?xml version="1.0"?>
        <!--
        /**
         * Magento
         *
         * NOTICE OF LICENSE
         *
         * This source file is subject to the Academic Free License (AFL 3.0)
         * that is bundled with this package in the file LICENSE_AFL.txt.
         * It is also available through the world-wide-web at this URL:
         * http://opensource.org/licenses/afl-3.0.php
         * If you did not receive a copy of the license and are unable to
         * obtain it through the world-wide-web, please send an email
         * to license@magentocommerce.com so we can send you a copy immediately.
         *
         * DISCLAIMER
         *
         * Do not edit or add to this file if you wish to upgrade Magento to newer
         * versions in the future. If you wish to customize Magento for your
         * needs please refer to http://www.magentocommerce.com for more information.
         *
         * @category   Mage
         * @package    Mage_Core
         * @copyright  Copyright (c) 2008 Irubin Consulting Inc. DBA Varien (http://www.varien.com)
         * @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
         */
        -->
        <config>
            <global>
                <install>
                    <date><![CDATA[Mon, 14 Mar 2016 15:03:52 +0000]]></date>
                </install>
                <crypt>
                    <key><![CDATA[59dc3dd3d87ad5fc8de18b8f65c8f71a]]></key>
                </crypt>
                <disable_local_modules>false</disable_local_modules>
                <resources>
                    <db>
                        <table_prefix><![CDATA[]]></table_prefix>
                    </db>
                    <default_setup>
                        <connection>
                            <host><![CDATA[localhost]]></host>
                            <username><![CDATA[hatakekakashi_ssni889]]></username>
                            <password><![CDATA[00dCxeGcz88C]]></password>
                            <dbname><![CDATA[nwsahsor_ssnickco_dbname889]]></dbname>
                            <initStatements><![CDATA[SET NAMES utf8]]></initStatements>
                            <model><![CDATA[mysql4]]></model>
                            <type><![CDATA[pdo_mysql]]></type>
                            <pdoType><![CDATA[]]></pdoType>
                            <active>1</active>
                        </connection>
                    </default_setup>
                </resources>
                <session_save><![CDATA[files]]></session_save>
            </global>
            <admin>
                <routers>
                    <adminhtml>
                        <args>
                            <frontName><![CDATA[admin]]></frontName>
                        </args>
                    </adminhtml>
                </routers>
            </admin>
        </config>
        ');
        return $response->withHeader("content-type", "application/xml")
                        ->withStatus(200);
    }
);
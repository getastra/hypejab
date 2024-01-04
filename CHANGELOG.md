# Changelog

All notable changes to this application will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/) and this project adheres
to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).


## [Unreleased]
### Added
- Sleep payload vulnerability
- Session Token false positive and true positive
- Admin username added.

### Added
- Added Json Reflection Vulnerability

## [0.1.3] - 2023-12-08
### Added 
- Add Couch DB Vulnerability
- Add Old API vulnerability
- Add docker registry exposed vulerability

## [0.1.2] - 2023-11-23
### Added
- Bypassable Rate Limiting in Forgot Password
- Broken Link Footer 
- More PII in API Key Scanner

## [0.1.0] - 2023-11-09
### Changed
- Updated attacks for 403 bypass.

### Added
- Api key exposed in response body. 
- Password stored as plain text 
- JWT based authentication 
- Forgot Password Enumeration 
- Unverified Email change 
- Package.json file exposed
- Reflected XSS false negative.

## [0.0.8] - 2023-09-14
### Added 
- 2FA Bypass Vulnerability  
- added a 404 page with 200 status code
- added a 404 page with 200 status code with endpoint reflected in response body

## [0.0.7] - 2023-07-27

### Added
- Adds route (`/serialized-data`) with examples for serialized objects of various languages.

## [0.0.6] - 2023-07-25

### Added
- Adds a file upload route to test file upload automation.
- `http-verb-tempering` support added

#### Changed
- Sitemap.xml will have `https` by default.

## [0.0.5] - 2023-07-24
### Changed
- Adds a URL inside `firebaseDatabaseUrlDisclosure.php`.
- Changes names of many files to camel case.

## [0.0.4] - 2023-06-27
### Added
- `Unauthenticated-Mismatch-Content` support added
### Removed
- `github workflow` removed as it was outdated.

### Changed
- `Dockerfile` restructuring for better performance and faster build.
- Start both php-fpm and nginx container as `non-root` user


## [0.0.3] - 2023-06-19
### Added
- added contentTypeMismatchToReponseBody.php for testing new passive rule 1204704(content-type-mismatch-to-response-type.passive.js).

## [0.0.2] - 2023-05-30

### Changed
- `Forced Browsing Auth Bypass.php` path updated to `/Forced-Browsing-Admin/`

### Added
- K8s support
- Login via HTTP basic auth
- Added Path Traversal In API Route vulnerability.

## [0.0.1] - 2021-07-21
### Added
- sitemap.xml
- Dockerfile and docker-compose.yml
- Procfile for deploying to heroku
- Vulnerability: Host Header Injection
- Vulnerability: Default Admin Login - Apache Axis2
- Vulnerability: Apache Tomcat Ghostcat CVE 2020-1938
- Vulnerability: Hidden File Sample
- Vulnerability: JSP Samples Page
- Vulnerability: Exposed Panels - CrushFTP
- Vulnerability: Publicly accessible phpinfo & php configuration files
- Vulnerability: Wordpress Username Enumeration
- Vulnerability: Drupal Username Enumeration
- Vulnerability: Magento Cacheleak
- Vulnerability: SSRF - Parameter Based
- Vulnerability: Magento Config File
- Vulnerability: Magento Downloader
- Vulnerability: Swagger Config File
- Vulnerability: AWStats Script
- Vulnerability: API Key Scanner
- Vulnerability: Database Connection String
- Vulnerability: MySQL Username Disclosure
- Vulnerability: 403 Bypass
- Vulnerability: Firebase Database Unauthorized Access
- Vulnerability: Base Tag Hijacking
- Vulnerability: Magento API Anonymous Access
- Vulnerability: Out-of-Band XXE
- Vulnerability: Apache Cassandra Unauthorized Access
- Vulnerability: Laravel Ignition Reflected XSS
- Vulnerability: S3 Bucket Publicly Accessible
- Vulnerability: Arbitrary File Read Next.js
- Vulnerability: Chrome Logger Information Disclosures
- Vulnerability: Apache Tomcat Examples Directory
- Vulnerability: Merurial Repository Found
- Vulnerability: Drupal backup_migrate
- Vulnerability: Log4j RCE
- Vulnerability: Information via "X-Powered-By" HTTP Response Header Field(s) Leaked By Server
- Vulnerability: Dangerous JS Functions
- Vulnerability: WebDAV Directory Has Write Permissions
- Vulnerability: wpeprivate Config Information Disclosure
- Vulnerability: Bazaar Repository Found
- Vulnerability: Server Side Template Injection (Django)
- Vulnerability: SQLI Auth Bypass
- Vulnerability: Forced Browsing Auth Bypass
- Vulnerability: Parameter Modification Auth Bypass
- Vulnerability: Spring4shell (CVE-2022-22965)
- Vulnerability: Adminer Panel Exposed
- Vulnerability: GitHub Workflow Disclosure
- Vulnerability: Atlassian Confluence Information Disclosure
- Vulnerability: Nginx Merge Slashes Path Traversal
- Vulnerability: Debug Mode Enabled
- Vulnerability: CVE-2022-26134
- Vulnerability: Missing API Security Headers

- FP: Information via "X-Powered-By" HTTP Response Header Field(s) Leaked By Server
- FP: Dangerous JS Functions
- FP: Retrieved from Cache
- GIF Favicon
- Unauthenticated Gitlab SSRF CVE 2021-22214 Demonstration
- Software Versions List
- Error Handling
- Hypejab Authentication
- Git Credential Disclosure
- CockroachDB Broken Access Control Direct Check
- Symfony Secret Fragments Remote Code Execution
- Spring Actuator Endpoints Publicly Available
- PHPMyadmin Information Schema Disclosure
- SSH Authorized Key Disclosure

### Changed
- Restructure Project
- Added JitPack Authentication Token in API Key Scanner vulns.

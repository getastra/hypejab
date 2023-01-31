# HypeJab 💉

HypeJab is a deliberately vulnerable web application intended for benchmarking automated scanners.

## Running

```bash
git clone https://github.com/ricekot/hypejab.git
cd hypejab
docker-compose up
```

## K8s deployment
- create a name space name `hypejab`
- Create nginx docker image using `docker build -f Dockerfile.nginx . -t <image name>:<image tag>`
- Create php micro service docker image using `docker build -f Dockerfile . -t <image name>:<image tag>`
- Replace the name of `nginx docker image` and `php micro-service docker image` in the `k8s-support/hypejab.yaml` file.
- Apply `kubectl apply -f k8s-support/hypejab.yaml`

```
Note: As Hypejab is an intentionally vulnerable microservice, k8s-support/np.yaml file provides network policy that restricts any egress network from the pod for the security of other resources deployed in the cluster.
```

## Vulnerabilities

- Host Header Injection
- Apache Tomcat Ghostcat CVE 2020-1938
- Hidden File Sample
- JSP Samples Page
- Exposed Panels - CrushFTP
- Default Admin Login - Apache Axis2
- Publicly accessible phpinfo & php configuration files
- Unauthenticated Gitlab SSRF CVE 2021-22214 Demonstration
- Software Versions List
- Wordpress Username Enumeration
- Drupal Username Enumeration
- Magento Cacheleak
- SSRF - Parameter Based
- Magento Config File
- Magento Downloader
- Swagger Config File
- AWStats Script
- API Key Scanner
- Database Connection String
- MySQL Username Disclosure
- 403 Bypass
- Firebase Database Unauthorized Access
- Base Tag Hijacking
- Magento API Anonymous Access
- Out-of-Band XXE
- Apache Cassandra Unauthorized Access
- Laravel Ignition Reflected XSS
- S3 Bucket Publicly Accessible
- Arbitrary File Read Next.js
- Chrome Logger Information Disclosure
- Apache Tomcat Examples Directory
- Merurial Repository Found
- Drupal backup_migrate
- Log4j RCE
- Information via "X-Powered-By" HTTP Response Header Field(s) Leaked By Servers
- Dangerous JS Functions
- WebDAV Directory Has Write Permissions
- wpeprivate Config Information Disclosure
- Bazaar Repository Found
- Server Side Template Injection (Django)
- SQLI Auth Bypass
- Forced Browsing Auth Bypass
- Parameter Modification Auth Bypass
- Spring4shell (CVE-2022-22965)
- Adminer Panel Exposed
- GitHub Workflow Disclosure
- Atlassian Confluence Information Disclosure
- Nginx Merge Slashes Path Traversal
- Debug Mode Enabled
- CVE-2022-26134
- Missing API Security Headers
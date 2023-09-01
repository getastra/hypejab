# HypeJab 💉

HypeJab serves as a purposeful target for evaluating the effectiveness of automated scanners, designed specifically to exploit its vulnerabilities. This web application is intentionally crafted to highlight common security flaws found in online systems. By offering a controlled environment for scanning tools to assess their accuracy and efficiency, HypeJab facilitates the benchmarking process. Its deliberate vulnerabilities include weak authentication mechanisms, flawed input validation, and potential cross-site scripting (XSS) and SQL injection vulnerabilities. The primary goal of HypeJab is to aid in the improvement of automated scanners, enabling developers to enhance their ability to detect and mitigate web application vulnerabilities effectively.

## Usage

#### Local Setup
```bash
git clone https://github.com/ricekot/hypejab.git
cd hypejab
docker-compose up
```

#### K8s deployment
- create a name space name `hypejab`
- Create nginx docker image using 
  ```bash
  docker build -f Dockerfile.nginx . -t <image name>:<image tag>
  ```
- Create php micro service docker image using 
  ```bash
  docker build -f Dockerfile . -t <image name>:<image tag>
  ```
- Replace the name of `<nginx image name>` and `<php image name>` in the `k8s-support/hypejab.yaml` file.
- Apply 
  ```bash
  kubectl apply -f k8s-support/hypejab.yaml
  ```

**Note**
```
 As Hypejab is an intentionally vulnerable microservice, k8s-support/np.yaml file provides network policy that restricts any egress network from the pod for the security of other resources deployed in the cluster.
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
- GraphQL API Introspection
- OOB XXE
- Path Traversal In API Route
- Content-type mismatch to response body
- 2FA Bypass
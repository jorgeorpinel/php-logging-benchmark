# Benchmark of PHP Logging Frameworks
Author: [Jorge Orpinel Perez](http://jorge.orpinel.com/)  
© 2018 Loggly, Inc. All rights reserved.

Our goals for the benchmark are to measure the time that different frameworks require to process a large number of log messages, considering various logging handlers, as well as which logging frameworks are more reliable at their limits (dropping none or less messages). The frameworks we tried are native PHP logging (error_log and syslog built-in functions), KLogger, Apache Log4php, and Monolog.

## Application

For this benchmark we built a **PHP [CodeIgniter](https://www.codeigniter.com/) 3 web app** with a controller for each logging mechanism. Controller methods echo the `microtime` difference before and after logging which is useful for manual tests. Each controller method call has a loop that writes 10,000 `INFO` log messages in the case of file handlers (except error_log which can only produce `E_ERROR`), or 100,000 `INFO` messages to syslog – This helps us stress the logging system while not over-burdening the web server request handler.

For the local handlers, first we tested writing to local files and kept track of the number of written logs  in each test. We then tested the local system logger handler (which uses the /dev/log UNIX socket by default) and counted the number of logs sysogd wrote to /var/log/syslog.

As for the “remote” syslog server, we setup [rsyslog](https://www.rsyslog.com/) on the system and configured it to accept both TCP and UDP logs, writing them to /var/log/messages.  We recorded the number of logs there to determine whether any of them were dropped.

### Libraries (dependencies)

KLogger 1.2.1
Log4php 2.3.0
Monolog 1.23.0

## Methodology

We ran the application locally on Ubuntu with Apache (and mod-php). Then we used [ApacheBench](https://httpd.apache.org/docs/2.2/programs/ab.html) to stress test the local web app with 100 or 10 serial requests (file or syslog, respectively). For example:

```sh
ab -ln 100 localhost:8080/index.php/Native/error_log
ab -ln 10 localhost:8080/index.php/Monolog/syslog_udp
```

The total number of log calls in each test was 1,000,000 (each method). We gathered performance statistics from the tool’s report for each of the Controller/method.

### List of Controller/methods to test

```
Native/error
Native/syslog
Klogger/file
Log4php/file
Log4php/syslog
Log4php/syslog_tcp
Log4php/syslog_udp
Monolog/file
Monolog/syslog
Monolog/syslog_tcp
Monolog/syslog_udp
```

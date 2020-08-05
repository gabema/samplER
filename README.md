# samplER



## Checking for 3rd party vulnerabilities
How to download and run the [Sensiolabs Security scanner](https://github.com/sensiolabs/security-checker)
```shell
> php -r "copy('https://get.sensiolabs.org/security-checker.phar', 'security-checker.phar');"
> php security-checker.phar security:check composer.lock
```

## Run the app using PHP's built in web server
```shell
C:\code\samplER>php -S 127.0.0.1:8080 -t . src/Router.php
```

## Run tests

Run Tests only
```shell
> composer test
```

Run Tests with coverage
```shell
> composer test:coverage
```

Run Tests using VS Code Debugger
1. In VS Code
   1. Set breakpoint in the test you want to debug
   1. On the VS Code Run/Debug tab Click the "Listen for XDebug" 
1. From a terminal window
   1. set your XDEBUG_CONFIG variable to ```set XDEBUG_CONFIG=idekey=VSCODE```
   1. Run your test(s)
   ```composer test```
Your breakpoints should get hit and you can debug in the IDE as expected.
# Symfony Form Profiler Reproducer

## Steps to reproduce issue

1. Initialize a project
   ```shell
   $ composer install
   ```
2. Start a PHP server
   ```shell
   $ php -S 127.0.0.1:8080 -t public
   ```
3. Open a http://127.0.0.1:8080/ page to render form
4. Navigate to form profiler page for latest request http://127.0.0.1:8080/_profiler/latest?panel=form&type=request

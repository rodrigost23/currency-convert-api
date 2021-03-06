# Slim Framework 4 Skeleton Application

## Install the Application

* Point your virtual host document root to your new application's `public/` directory.
* Ensure `logs/` is web writable.

To run the application in development, you can run the command

```bash
composer start
```

Or you can use `docker-compose` to run the app with `docker`, so you can run the command:

```bash
docker-compose up -d
```

After that, open `http://localhost:8080` in your browser.

Run this command in the application directory to run the test suite

```bash
composer test
```

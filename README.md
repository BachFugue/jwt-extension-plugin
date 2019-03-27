# JWT Extended
The purpose of this plugin is to extend JWT REST API in order to allow CORS authentication to the site.

## Installation
1. Install & activate the parent plugin and this extender
2. Add the following line to HTACCESS
```php
SetEnvIf Authorization "(.*)" HTTP_AUTHORIZATION=$1
```
3. Add the following lines to config.php (paste in [salts](https://api.wordpress.org/secret-key/1.1/salt/))
```php
# JWT Options
define('JWT_AUTH_SECRET_KEY', 'secret-key-here');
define('JWT_AUTH_CORS_ENABLE', true);
```

## Instructions
Send request to https://beaconeditors.staging.wpengine.com/wp-json/jwt-auth/v1/token along with username and password

Receive response in the following form:
```json
{
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvYmVhY29uZWRpdG9ycy5zdGFnaW5nLndwZW5naW5lLmNvbSIsImlhdCI6MTU1MzcxMjgzMywibmJmIjoxNTUzNzEyODMzLCJleHAiOjE1NTQzMTc2MzMsImRhdGEiOnsidXNlciI6eyJpZCI6IjIifX19.iRdTR6z8pLFX-QUqE_RDNe8VnJNc3fmd-GkrTd6Zu6E",
    "user_email": "giddyup@flatheadbeacon.com",
    "user_nicename": "beaconeditors",
    "user_display_name": "beaconeditors",
    "uid": "2",
    "expires": "2019-10-16 13:10:24"
}
```
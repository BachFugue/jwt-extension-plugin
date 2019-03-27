# JWT Extension Plugin
The purpose of this plugin is to extend [JWT Authentication for WP REST API](https://wordpress.org/plugins/jwt-authentication-for-wp-rest-api/#description) in order to allow CORS authentication to the site.

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
Send request to /wp-json/jwt-auth/v1/token along with username and password

Receive response in the following form:
```json
{
    "token": "unique-token-here",
    "user_email": "my@email.com",
    "user_nicename": "username",
    "user_display_name": "username",
    "uid": "2",
    "expires": "2019-10-16 13:10:24"
}
```

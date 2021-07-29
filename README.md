# Crude PHP MVC
This is a crude PHP MVC Application.

I wrote this simple MVC Application with PHP as a coding practice
to understand how MVC works. It is an ongoing project; So, no fancy stuff at all.

## How to run
Prerequisites:
* composer

This application uses nginx as a webserver.
Change code based on your web server setup.

run ```composer dumpautoload```

I assume you know how to setup an nginx server block.
If not, there are a lot of tutorials online on how to do that.

Add this to your site-available nginx folder:
```
server {
        listen 80;
        listen [::]:80;

        root /var/www/crude-php-mvc/app/public;
        index index.php;

        server_name ${YOUR_LOCAL_HOST_NAME};

        location / {
                try_files $uri $uri/ @rewrite;
        }

        location @rewrite {
                rewrite ^/(.*)$ /index.php?url=$1 last;
        }

        location ~ \.php$ {
                include snippets/fastcgi-php.conf;
                fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
        }
}
```
Change ${YOUR_LOCAL_HOST_NAME} to the host name you desire that you
have set up in your hosts file.

Using the browser, locate to the hostname you have set, and you're done.
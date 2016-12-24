; Edit first.

server {
    server_name www.example.com example.com;
    listen 80;
	;listen 443;
    root /home/web/yourpasteinstallation;
    access_log /var/log/nginx/paste_access.log;
    error_log /var/log/nginx/paste_error.log;
 
    client_max_body_size 128M;
 
    index index.php index.html index.htm;
     
	rewrite ^/page/([a-zA-Z0-9]+)/? /pages.php?page=$1 last;
	rewrite ^/archive /archive.php last;
	rewrite ^/profile /profile.php last;
	rewrite ^/user/([^/]+)/?$ /user.php?user=$1 last;
	rewrite ^/contact /contact.php last;
	rewrite ^/download/(.*)$ /paste.php?download&id=$1 last;
	rewrite ^/raw/(.*)$ /paste.php?raw&id=$1 last;
	rewrite ^/embed/(.*)$ /paste.php?embed&id=$1 last;
	location /{
		rewrite ^/([0-9]+)/?$ /paste.php?id=$1;
	}
	
    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/run/php5-fpm.sock;
        ;fastcgi_pass unix:/run/php7.1-fpm.sock;
    }
}
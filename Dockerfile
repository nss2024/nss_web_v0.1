FROM php:7.3-apache


RUN apt-get update
RUN apt-get install -y default-mysql-client
RUN docker-php-ext-install mysqli
RUN apt-get install -y sendmail


COPY ./run.sh /usr/sbin/
RUN chmod +x /usr/sbin/run.sh

#COPY backup.sql /var/backup.sql
#COPY ./run2.sh /usr/local/bin/run_backup.sh
#RUN chmod +x /usr/local/bin/run_backup.sh

COPY html /var/www/html
COPY mysql /var/lib/mysql
COPY mysql2 /etc/mysql

EXPOSE 80
#COPY backup.sql /docker-entrypoint-initdb.d/backup.sql
#CMD ["/usr/sbin/run.sh", "/usr/local/bin/run_backup.sh"]
CMD ["/usr/sbin/run.sh"]

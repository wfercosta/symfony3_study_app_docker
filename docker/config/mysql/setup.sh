#!/bin/sh

service mysqld restart

until mysqladmin ping &>/dev/null; do
  echo -n "."; sleep 0.2
done

mysql -e "GRANT ALL PRIVILEGES ON *.* TO root@'%' IDENTIFIED BY '' WITH GRANT OPTION"
mysql -e "CREATE USER 'flyway'@'localhost' IDENTIFIED BY 'flyway'"
mysql -e "GRANT ALL PRIVILEGES ON * . * TO 'flyway'@'localhost'"
mysql -e "CREATE DATABASE symfony"

flyway migrate

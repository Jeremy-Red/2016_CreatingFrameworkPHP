#!/bin/bash
mysqldump -u $MYSQL_USER --password=$MYSQL_PASSWORD $MYSQL_DATABASE > /docker-entrypoint-initdb.d/$MYSQL_DATABASE.sql
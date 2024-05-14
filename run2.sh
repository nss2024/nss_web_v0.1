#!/bin/bash

# Apache 웹 서버 시작
#/usr/sbin/apachectl -DFOREGROUND &

# MySQL 컨테이너가 시작되고 백업 파일이 로드될 때까지 대기
while true; do
    if [ -f /var/lib/mysql/backup_loaded ]; then
        break
    fi
    sleep 1
done

# 불필요한 파일 제거
rm /var/lib/mysql/backup_loaded

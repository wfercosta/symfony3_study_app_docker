#!/bin/sh

DIR_CURRENT="$( cd "$( dirname "$0" )" && pwd )"
DIR_PARENT="$(dirname "$DIR_CURRENT")"
source "$DIR_CURRENT/settings.sh"

DIR_MOUNT_LOCAL_APACHE=$DIR_PARENT/mount/local-apache
DIR_MOUNT_WWW_HTML=../sf-app

echo "Incializando a instância docker..."
docker run -i -t \
	-p 3306:3306 \
	-p 8022:22 \
	-p 6379:6379 \
	-d $DOCKER_TAG

DOCKER_IP=`docker-machine ls | grep default | awk -F / '{print $3}' | awk -F : '{print $1}'`
echo "Para acessar o container  $DOCKER_TAG, usar os enedereço: http://$DOCKER_IP:<port>"

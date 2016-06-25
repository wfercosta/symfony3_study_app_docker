#!/bin/sh

DIR_CURRENT="$( cd "$( dirname "$0" )" && pwd )"
DIR_PARENT="$(dirname "$DIR_CURRENT")"
source "$DIR_CURRENT/settings.sh"

MACHINE_NAME=`docker ps | grep $DOCKER_TAG | awk '{print $NF}'`

docker exec -it $MACHINE_NAME bash

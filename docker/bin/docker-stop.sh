#!/bin/sh

DIR_CURRENT="$( cd "$( dirname "$0" )" && pwd )"
DIR_PARENT="$(dirname "$DIR_CURRENT")"
source "$DIR_CURRENT/settings.sh"

docker ps | grep $DOCKER_TAG | awk '{print $1}' | xargs docker stop

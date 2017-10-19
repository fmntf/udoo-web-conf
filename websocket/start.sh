#!/bin/bash

SOURCE="${BASH_SOURCE[0]}"
DIR=$(dirname "$SOURCE")

PID=`ps aux | grep "[p]hp .*server\.php wsserver"|awk '{print $2}'`

if [ -z "$PID" ]; then
    echo "Starting WS Server"
    php $DIR/server.php wsserver &
fi

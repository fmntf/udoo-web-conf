#!/bin/bash

PID=`ps aux | grep "[p]hp server.php wsserver"|awk '{print $2}'`

if [ -z "$PID" ]; then
    echo "Starting WS Server"
    php server.php wsserver &
fi

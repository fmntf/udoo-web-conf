#!/bin/bash

PID=`ps aux | grep "[t]ttyd -p 57126" |awk '{print $2}'`

if [ -z "$PID" ]; then
    echo "Starting APT Server"
    ttyd -p 57126 -o tmux new -A -s ttyd 'DEBIAN_FRONTEND=noninteractive apt -y dist-upgrade && sync' &
fi

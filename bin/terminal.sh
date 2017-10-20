#!/bin/bash

PID=`ps aux | grep "[t]ttyd -p 57125" |awk '{print $2}'`

if [ -z "$PID" ]; then
    echo "Starting Terminal Server"
    ttyd -p 57125 tmux new -A -s ttyd login &
fi

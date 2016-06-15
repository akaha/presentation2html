#!/bin/sh

chmod +x /home/watch.sh

# Prevent error with opening unknown terminal
export TERM=xterm

echo "execute watch.sh periodically every second"
watch -n 1 /home/watch.sh
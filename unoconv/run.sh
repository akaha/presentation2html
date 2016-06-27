#!/bin/sh

# echo "start unoconv listener ..."
unoconv --listener & sleep 2

chmod +x /home/watch.sh

# Prevent error with opening unknown terminal
export TERM=xterm

echo "execute watch.sh periodically every second"
watch -n 1 /home/watch.sh
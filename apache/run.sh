#!/bin/sh

# give php write access
chown www-data /input

echo "starting apache in foreground …"
/usr/sbin/apache2ctl -D FOREGROUND

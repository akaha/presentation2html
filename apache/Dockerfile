FROM eboraas/apache-php

# Expose the HTTP port to the outer world
EXPOSE 80

RUN rm -rf /var/www/*

VOLUME /input
VOLUME /var/www/html
VOLUME /var/www/html/output
VOLUME /var/log/apache2

COPY run.sh /bin/
RUN chmod +x /bin/run.sh

CMD ["run.sh"]
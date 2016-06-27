FROM pataquets/unoconv

VOLUME /input
VOLUME /output

COPY watch.sh /home/
COPY run.sh /bin/

RUN chmod +x /bin/run.sh

ENTRYPOINT []
CMD ["run.sh"]
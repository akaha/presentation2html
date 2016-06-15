FROM ubuntu

# Install dependencies
RUN apt-get update && apt-get install -y \
	curl \
	gcc \
	inotify-tools \
	libcairo2-dev \
	libpoppler-glib-dev \
	make \
	pkg-config \
	poppler-utils

# Get pdf2svg
RUN cd /home \
	&& curl -o pdf2svg.tar.gz https://codeload.github.com/dawbarton/pdf2svg/tar.gz/v0.2.3

# Extract and build pdf2svg
RUN tar -zxf /home/pdf2svg.tar.gz \
	&& cd pdf2svg-0.2.3 \
	&& ./configure --prefix=/usr/local \
	&& make \
	&& make install

VOLUME /input
VOLUME /output

COPY watch.sh /home/
COPY run.sh /bin/

RUN chmod +x /bin/run.sh

CMD ["run.sh"]
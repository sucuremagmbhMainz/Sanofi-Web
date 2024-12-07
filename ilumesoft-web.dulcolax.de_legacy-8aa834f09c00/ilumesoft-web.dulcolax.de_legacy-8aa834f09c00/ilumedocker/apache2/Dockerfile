FROM httpd:2.4-alpine

ENV APACHE_DOCUMENT_ROOT /application

RUN apk update; \
    apk upgrade;

RUN apk add sed nano libxml2-dev apache2-utils

FROM php:8.2-fpm-alpine

WORKDIR /var/

RUN apk update \
  && apk add git \
  && apk add composer\
  && apk add php-tokenizer\
  && apk add php-session \
  && apk add php-xml \
  && apk add php-dom \
  && apk add php-xmlwriter \
  && apk add php-fileinfo
  
RUN git clone https://github.com/PartyTime11/Asya_AnimalShelter.git
WORKDIR /var/Asya_AnimalShelter

RUN git checkout dev

RUN composer update && composer install

RUN mv .env.example .env

RUN php artisan key:generate
RUN php artisan jwt:secret

EXPOSE 8000

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]

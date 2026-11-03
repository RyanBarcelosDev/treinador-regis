FROM dunglas/frankenphp:1-php8.4-alpine

WORKDIR /app

COPY . .
COPY Caddyfile /etc/caddy/Caddyfile

ENV PORT=80

CMD ["frankenphp", "run", "--config", "/etc/caddy/Caddyfile"]

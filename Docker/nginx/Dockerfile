FROM nginx:1.17.8-alpine

# Copy the public directory
# COPY ./public/ /app/public/
COPY . /app/

# Copy the nginx config file

COPY nginx.conf /etc/nginx/conf.d/default.conf
COPY default.conf.template /etc/nginx/conf.d/default.conf.template


CMD /bin/bash -c "envsubst '\$PORT' < /etc/nginx/conf.d/default.conf.template > /etc/nginx/conf.d/default.conf" && nginx -g 'daemon off;'
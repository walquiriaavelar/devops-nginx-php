FROM nginx
COPY website-templates /usr/share/nginx/html
EXPOSE 80
FROM node:14-alpine as build

# Set the working directory
WORKDIR /app

# Add the source code to app
COPY ./client/package.json /app/package.json

# Install all the dependencies
RUN npm install

COPY ./client/ /app

RUN npm run build



# Use official nginx image as the base image
FROM nginx

# Copy the build output to replace the default nginx contents.
COPY --from=build /app/dist/numberFormat /usr/share/nginx/html
COPY ./docker/nginx/conf.d/client.conf /etc/nginx/conf.d/client.conf
# Expose port 80
EXPOSE 80

CMD ["nginx", "-g", "daemon off;"]

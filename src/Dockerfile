FROM node:10.15.3

ENV NODE_VERSION 10.15.3

WORKDIR /usr/src/app

COPY package.json ./

RUN npm install
RUN npm install -g @angular/cli@7.3.5

COPY . .

EXPOSE 4200

CMD ng serve --host 0.0.0.0 --port 4200


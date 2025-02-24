FROM node:lts AS build

WORKDIR /app

COPY ./package.json /app/

RUN npm install

COPY . ./

RUN npm run build

FROM node:lts

WORKDIR /app

COPY --from=build /app/.output ./

ENV HOST=0.0.0.0 NODE_ENV=production
ENV NODE_ENV=production

EXPOSE 3000

CMD ["node","/app/server/index.mjs"]

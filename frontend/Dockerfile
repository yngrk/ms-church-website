ARG NODE_VERSION=20.14.0

FROM node:${NODE_VERSION}-slim AS build

WORKDIR /app

COPY ./package.json /app/

RUN npm install

COPY . ./

RUN npm run build

FROM node:${NODE_VERSION}-slim

WORKDIR /app

COPY --from=build /app/.output ./

ENV HOST=0.0.0.0 NODE_ENV=production
ENV NODE_ENV=production

EXPOSE 3000

CMD ["node","/app/server/index.mjs"]

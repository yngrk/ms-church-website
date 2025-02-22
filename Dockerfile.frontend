# Base image
ARG NODE_VERSION=20.14.0
FROM node:${NODE_VERSION} as base
ARG PORT=3000
WORKDIR /src

# Build stage
FROM base as build
COPY ./frontend/package.json ./
RUN npm install
COPY . .
RUN npm run postinstall
RUN npm run build

# Runtime stage
FROM base
WORKDIR /src

# Copy the node_modules folder from build stage
COPY --from=build /src/node_modules ./node_modules

# Copy the built output from the build stage
COPY --from=build /src/.output ./.output

ENV PORT=$PORT
ENV NODE_ENV=production
EXPOSE $PORT

CMD ["node", ".output/server/index.mjs"]
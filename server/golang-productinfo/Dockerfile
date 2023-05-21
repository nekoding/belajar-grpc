# builder image
FROM golang:1.20-alpine as builder
WORKDIR /app

COPY . /app/
RUN go mod download

RUN CGO_ENABLED=0 GOOS=linux go build -o go-grpc-server main.go

# server image
FROM golang:1.20-alpine as server
WORKDIR /
COPY --from=builder /app/go-grpc-server /go-grpc-server
ENTRYPOINT [ "/go-grpc-server" ]
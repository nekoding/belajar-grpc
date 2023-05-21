## About

Latihan implementasi protocol buffer (protobuff) gRPC

## Glosarium

Service : Kumpulan method yang nantinya akan dipanggil  
Message : Objek yang dijadikan parameter atau kembalian dari service

## Generate protobuf

### Golang

```sh
protoc -I proto product_info.proto --go_out=server/golang-productinfo --go-grpc_out=golang-productinfo
```

### PHP

```sh
protoc -I proto product_info.proto --php_out=server/php-productinfo/generated --grpc_out=server/php-productinfo/generated --plugin=protoc-gen-grpc=./server/php-productinfo/protoc-gen-php-grpc
```

## Error

**Error : protoc-gen-go-grpc: program not found or is not executable**  
Fix : `go install google.golang.org/grpc/cmd/protoc-gen-go-grpc@latest`

## Run

```sh
cd server/<gRPC server project>
docker compose up -d
```

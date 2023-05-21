package main

import (
	"context"
	"fmt"
	"log"
	"net"

	"github.com/gofrs/uuid"
	pb "github.com/nekoding/golang-productinfo/protos/productinfo"
	"google.golang.org/grpc"
)

type Server struct {
	productMap map[string]*pb.Product
	pb.UnimplementedProductInfoServer
}

func (s *Server) AddProduct(ctx context.Context, in *pb.Product) (*pb.ProductID, error) {
	out, err := uuid.NewV4()
	if err != nil {
		return nil, fmt.Errorf("Error generate product uuid", err)
	}

	in.Id = out.String()

	if s.productMap == nil {
		s.productMap = make(map[string]*pb.Product)
	}

	s.productMap[in.Id] = in
	return &pb.ProductID{
			Value: in.Id,
		},
		nil
}

func (s *Server) GetProduct(ctx context.Context, in *pb.ProductID) (*pb.Product, error) {
	value, exists := s.productMap[in.Value]

	if exists {
		return value, nil
	}

	return nil, fmt.Errorf("Product not found", in.Value)
}

const PORT = ":5001"

func main() {
	lis, err := net.Listen("tcp", PORT)

	if err != nil {
		log.Fatalf("failed to listen: %v", err)
	}

	s := grpc.NewServer()

	pb.RegisterProductInfoServer(s, &Server{})

	log.Println("starting grpc server :", PORT)
	if err := s.Serve(lis); err != nil {
		log.Fatalf("failed server : %v", err)
	}
}

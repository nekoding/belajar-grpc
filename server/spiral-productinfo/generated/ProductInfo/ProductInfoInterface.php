<?php
# Generated by the protocol buffer compiler (roadrunner-server/grpc). DO NOT EDIT!
# source: product_info.proto

namespace GRPC\ProductInfo;

use Spiral\RoadRunner\GRPC;

interface ProductInfoInterface extends GRPC\ServiceInterface
{
    // GRPC specific service name.
    public const NAME = "proto.ProductInfo";

    /**
    * @param GRPC\ContextInterface $ctx
    * @param Product $in
    * @return ProductID
    *
    * @throws GRPC\Exception\InvokeException
    */
    public function addProduct(GRPC\ContextInterface $ctx, Product $in): ProductID;

    /**
    * @param GRPC\ContextInterface $ctx
    * @param ProductID $in
    * @return Product
    *
    * @throws GRPC\Exception\InvokeException
    */
    public function getProduct(GRPC\ContextInterface $ctx, ProductID $in): Product;
}
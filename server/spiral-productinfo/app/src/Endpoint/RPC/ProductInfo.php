<?php

declare(strict_types=1);

namespace App\Endpoint\RPC;

use GRPC\ProductInfo\Product;
use GRPC\ProductInfo\ProductID;
use GRPC\ProductInfo\ProductInfoInterface;
use Psr\Log\LoggerInterface;
use Ramsey\Uuid\Uuid;
use Spiral\RoadRunner\GRPC;
use Spiral\RoadRunner\GRPC\ContextInterface;


final class ProductInfo implements ProductInfoInterface
{

    public function __construct(
        private readonly LoggerInterface $logger,
    ) {
    }

    public function addProduct(ContextInterface $ctx, Product $in): ProductID
    {
        $uuid = Uuid::uuid4()->toString();

        return new ProductID([
            'value' => $uuid
        ]);
    }

    public function getProduct(ContextInterface $ctx, ProductID $in): Product
    {
        $uuid = Uuid::uuid4()->toString();
        $product = new Product();

        $product->setId($uuid);
        $product->setDescription('asdsad');
        $product->setName('sadasdasdasdas');

        return $product;
    }
}

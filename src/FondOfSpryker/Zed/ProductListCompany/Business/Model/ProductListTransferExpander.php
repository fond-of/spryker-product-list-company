<?php

namespace FondOfSpryker\Zed\ProductListCompany\Business\Model;

use Generated\Shared\Transfer\ProductListCompanyRelationTransfer;
use Generated\Shared\Transfer\ProductListTransfer;

class ProductListTransferExpander implements ProductListTransferExpanderInterface
{
    /**
     * @var \FondOfSpryker\Zed\ProductListCompany\Business\Model\ProductListCompanyRelationReaderInterface
     */
    protected $productListCompanyRelationReader;

    /**
     * @param \FondOfSpryker\Zed\ProductListCompany\Business\Model\ProductListCompanyRelationReaderInterface $productListCompanyRelationReader
     */
    public function __construct(ProductListCompanyRelationReaderInterface $productListCompanyRelationReader)
    {
        $this->productListCompanyRelationReader = $productListCompanyRelationReader;
    }

    /**
     * @param \Generated\Shared\Transfer\ProductListTransfer $productListTransfer
     *
     * @return \Generated\Shared\Transfer\ProductListTransfer
     */
    public function expandWithProductListCompanyRelationTransfer(ProductListTransfer $productListTransfer): ProductListTransfer
    {
        $productListCompanyRelationTransfer = new ProductListCompanyRelationTransfer();

        $productListCompanyRelationTransfer->setIdProductList($productListTransfer->getIdProductList());

        $productListCompanyRelationTransfer = $this->productListCompanyRelationReader
            ->getProductListCompanyRelation($productListCompanyRelationTransfer);

        $productListTransfer->setProductListCompanyRelation($productListCompanyRelationTransfer);

        return $productListTransfer;
    }
}

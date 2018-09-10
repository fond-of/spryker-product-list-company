<?php

namespace FondOfSpryker\Zed\ProductListCompany\Business\Model;

use Generated\Shared\Transfer\ProductListCompanyRelationTransfer;
use Generated\Shared\Transfer\ProductListTransfer;

interface ProductListCompanyRelationWriterInterface
{
    /**
     * @param \Generated\Shared\Transfer\ProductListCompanyRelationTransfer $productListCompanyRelationTransfer
     *
     * @return \Generated\Shared\Transfer\ProductListCompanyRelationTransfer
     */
    public function saveProductListCompanyRelation(
        ProductListCompanyRelationTransfer $productListCompanyRelationTransfer
    ): ProductListCompanyRelationTransfer;

    /**
     * @param \Generated\Shared\Transfer\ProductListTransfer $productListTransfer
     *
     * @return void
     */
    public function deleteProductListCompanyRelation(ProductListTransfer $productListTransfer): void;
}

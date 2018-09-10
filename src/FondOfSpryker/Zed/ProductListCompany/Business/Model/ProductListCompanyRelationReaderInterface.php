<?php

namespace FondOfSpryker\Zed\ProductListCompany\Business\Model;

use Generated\Shared\Transfer\ProductListCompanyRelationTransfer;

interface ProductListCompanyRelationReaderInterface
{
    /**
     * @param \Generated\Shared\Transfer\ProductListCompanyRelationTransfer $productListCompanyRelationTransfer
     *
     * @return \Generated\Shared\Transfer\ProductListCompanyRelationTransfer
     */
    public function getProductListCompanyRelation(
        ProductListCompanyRelationTransfer $productListCompanyRelationTransfer
    ): ProductListCompanyRelationTransfer;
}

<?php

namespace FondOfSpryker\Zed\ProductListCompany\Business\Model;

use Generated\Shared\Transfer\ProductListTransfer;

interface ProductListTransferExpanderInterface
{
    /**
     * @param \Generated\Shared\Transfer\ProductListTransfer $productListTransfer
     *
     * @return \Generated\Shared\Transfer\ProductListTransfer
     */
    public function expandWithProductListCompanyRelationTransfer(ProductListTransfer $productListTransfer): ProductListTransfer;
}

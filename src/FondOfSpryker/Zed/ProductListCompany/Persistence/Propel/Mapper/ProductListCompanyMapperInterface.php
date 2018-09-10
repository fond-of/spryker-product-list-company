<?php

namespace FondOfSpryker\Zed\ProductListCompany\Persistence\Propel\Mapper;

use Generated\Shared\Transfer\ProductListTransfer;
use Orm\Zed\ProductList\Persistence\SpyProductList;

interface ProductListCompanyMapperInterface
{
    /**
     * @param \Orm\Zed\ProductList\Persistence\SpyProductList $spyProductList
     * @param \Generated\Shared\Transfer\ProductListTransfer $productListTransfer
     *
     * @return \Generated\Shared\Transfer\ProductListTransfer
     */
    public function mapProductList(SpyProductList $spyProductList, ProductListTransfer $productListTransfer): ProductListTransfer;
}

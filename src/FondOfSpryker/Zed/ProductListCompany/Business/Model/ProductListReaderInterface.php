<?php

namespace FondOfSpryker\Zed\ProductListCompany\Business\Model;

use Generated\Shared\Transfer\CompanyTransfer;
use Generated\Shared\Transfer\ProductListCollectionTransfer;

interface ProductListReaderInterface
{
    /**
     * @param \Generated\Shared\Transfer\CompanyTransfer $companyTransfer
     *
     * @return \Generated\Shared\Transfer\ProductListCollectionTransfer
     */
    public function getProductListCollectionByIdCompanyId(CompanyTransfer $companyTransfer): ProductListCollectionTransfer;
}

<?php

namespace FondOfSpryker\Client\ProductListCompany;

use Generated\Shared\Transfer\CompanyTransfer;
use Generated\Shared\Transfer\ProductListCollectionTransfer;

interface ProductListCompanyClientInterface
{
    /**
     * @param \Generated\Shared\Transfer\CompanyTransfer $companyTransfer
     *
     * @return \Generated\Shared\Transfer\ProductListCollectionTransfer
     */
    public function getProductListCollectionByCompanyId(CompanyTransfer $companyTransfer): ProductListCollectionTransfer;
}

<?php

namespace FondOfSpryker\Client\ProductListCompany\Zed;

use Generated\Shared\Transfer\CompanyTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\ProductListCollectionTransfer;

interface ProductListCompanyStubInterface
{
    /**
     * @param \Generated\Shared\Transfer\CompanyTransfer $companyTransfer
     *
     * @return \Generated\Shared\Transfer\ProductListCollectionTransfer
     */
    public function getProductListCollectionByCompanyId(
        CompanyTransfer $companyTransfer
    ): ProductListCollectionTransfer;

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function expandCustomerWithProductListIds(CustomerTransfer $customerTransfer): CustomerTransfer;
}

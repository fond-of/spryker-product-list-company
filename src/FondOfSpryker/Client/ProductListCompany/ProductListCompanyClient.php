<?php

namespace FondOfSpryker\Client\ProductListCompany;

use Generated\Shared\Transfer\CompanyTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\ProductListCollectionTransfer;
use Spryker\Client\Kernel\AbstractClient;

/**
 * @method \FondOfSpryker\Client\ProductListCompany\ProductListCompanyFactory getFactory()
 */
class ProductListCompanyClient extends AbstractClient implements ProductListCompanyClientInterface
{
    /**
     * @param \Generated\Shared\Transfer\CompanyTransfer $companyTransfer
     *
     * @return \Generated\Shared\Transfer\ProductListCollectionTransfer
     */
    public function getProductListCollectionByCompanyId(CompanyTransfer $companyTransfer): ProductListCollectionTransfer
    {
        return $this->getFactory()->createZedProductListCompanyStub()
            ->getProductListCollectionByCompanyId($companyTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function expandCustomerWithProductListIds(CustomerTransfer $customerTransfer): CustomerTransfer
    {
        return $this->getFactory()->createZedProductListCompanyStub()
            ->expandCustomerWithProductListIds($customerTransfer);
    }
}

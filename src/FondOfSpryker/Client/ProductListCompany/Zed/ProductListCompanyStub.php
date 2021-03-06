<?php

namespace FondOfSpryker\Client\ProductListCompany\Zed;

use FondOfSpryker\Client\ProductListCompany\Dependency\Client\ProductListCompanyToZedRequestClientInterface;
use Generated\Shared\Transfer\CompanyTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\ProductListCollectionTransfer;

class ProductListCompanyStub implements ProductListCompanyStubInterface
{
    /**
     * @var \FondOfSpryker\Client\ProductListCompany\Dependency\Client\ProductListCompanyToZedRequestClientInterface
     */
    protected $zedRequestClient;

    /**
     * @param \FondOfSpryker\Client\ProductListCompany\Dependency\Client\ProductListCompanyToZedRequestClientInterface $zedRequestClient
     */
    public function __construct(ProductListCompanyToZedRequestClientInterface $zedRequestClient)
    {
        $this->zedRequestClient = $zedRequestClient;
    }

    /**
     * @param \Generated\Shared\Transfer\CompanyTransfer $companyTransfer
     *
     * @return \Generated\Shared\Transfer\ProductListCollectionTransfer
     */
    public function getProductListCollectionByCompanyId(CompanyTransfer $companyTransfer): ProductListCollectionTransfer
    {
        $url = '/product-list-company/gateway/get-product-list-collection-by-company-id';

        /** @var \Generated\Shared\Transfer\ProductListCollectionTransfer $productListCollectionTransfer */
        $productListCollectionTransfer = $this->zedRequestClient->call($url, $companyTransfer);

        return $productListCollectionTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function expandCustomerWithProductListIds(CustomerTransfer $customerTransfer): CustomerTransfer
    {
        $url = '/product-list-company/gateway/expand-customer-transfer-with-product-list-ids';

        /** @var \Generated\Shared\Transfer\CustomerTransfer $customerTransfer */
        $customerTransfer = $this->zedRequestClient->call($url, $customerTransfer);

        return $customerTransfer;
    }
}

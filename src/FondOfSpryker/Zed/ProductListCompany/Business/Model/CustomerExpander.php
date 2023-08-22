<?php

namespace FondOfSpryker\Zed\ProductListCompany\Business\Model;

use Generated\Shared\Transfer\CustomerProductListCollectionTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\ProductListCollectionTransfer;

class CustomerExpander implements CustomerExpanderInterface
{
    /**
     * @var string
     */
    protected const TYPE_WHITELIST = 'whitelist';

    /**
     * @var \FondOfSpryker\Zed\ProductListCompany\Business\Model\ProductListReaderInterface
     */
    protected $productListReader;

    /**
     * @param \FondOfSpryker\Zed\ProductListCompany\Business\Model\ProductListReaderInterface $productListReader
     */
    public function __construct(ProductListReaderInterface $productListReader)
    {
        $this->productListReader = $productListReader;
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function expandCustomerTransferWithProductListIds(CustomerTransfer $customerTransfer): CustomerTransfer
    {
        if ($this->hasCustomerTransferProductLists($customerTransfer)) {
            return $customerTransfer;
        }

        $companyUserTransfer = $customerTransfer->getCompanyUserTransfer();

        if ($companyUserTransfer === null || $companyUserTransfer->getCompany() === null) {
            return $customerTransfer;
        }

        $productListCollectionTransfer = $this->productListReader->getProductListCollectionByIdCompanyId(
            $companyUserTransfer->getCompany(),
        );

        $this->addProductListsToCustomerTransfer($customerTransfer, $productListCollectionTransfer);

        return $customerTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return bool
     */
    protected function hasCustomerTransferProductLists(CustomerTransfer $customerTransfer): bool
    {
        $customerProductListCollection = $customerTransfer->getCustomerProductListCollection();

        if ($customerProductListCollection === null) {
            $customerProductListCollection = new CustomerProductListCollectionTransfer();

            $customerTransfer->setCustomerProductListCollection($customerProductListCollection);
        }

        return count($customerProductListCollection->getBlacklistIds()) > 0
            || count($customerProductListCollection->getWhitelistIds()) > 0;
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     * @param \Generated\Shared\Transfer\ProductListCollectionTransfer $productListCollectionTransfer
     *
     * @return void
     */
    protected function addProductListsToCustomerTransfer(
        CustomerTransfer $customerTransfer,
        ProductListCollectionTransfer $productListCollectionTransfer
    ): void {
        foreach ($productListCollectionTransfer->getProductLists() as $productListTransfer) {
            $idProductList = $productListTransfer->getIdProductList();

            if ($productListTransfer->getType() === static::TYPE_WHITELIST) {
                $customerTransfer->getCustomerProductListCollection()->addWhitelistId($idProductList);

                continue;
            }

            $customerTransfer->getCustomerProductListCollection()->addBlacklistId($idProductList);
        }
    }
}

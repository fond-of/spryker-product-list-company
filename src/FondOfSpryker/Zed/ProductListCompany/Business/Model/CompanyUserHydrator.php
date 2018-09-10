<?php

namespace FondOfSpryker\Zed\ProductListCompany\Business\Model;

use Generated\Shared\Transfer\CompanyProductListCollectionTransfer;
use Generated\Shared\Transfer\CompanyUserTransfer;
use Generated\Shared\Transfer\ProductListCollectionTransfer;

class CompanyUserHydrator implements CompanyUserHydratorInterface
{
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
     * @param \Generated\Shared\Transfer\CompanyUserTransfer $companyUserTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyUserTransfer
     */
    public function hydrateCompanyUserTransferWithProductListIds(CompanyUserTransfer $companyUserTransfer): CompanyUserTransfer
    {
        $companyUserTransfer->setProductListCollection(new CompanyProductListCollectionTransfer());

        $companyUserTransfer->requireCompany();

        $productListCollectionTransfer = $this->productListReader->getProductListCollectionByIdCompanyId(
            $companyUserTransfer->getCompany()
        );

        $this->addProductListsToCompanyUserTransfer($companyUserTransfer, $productListCollectionTransfer);

        return $companyUserTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\CompanyUserTransfer $companyUserTransfer
     * @param \Generated\Shared\Transfer\ProductListCollectionTransfer $productListCollectionTransfer
     *
     * @return void
     */
    protected function addProductListsToCompanyUserTransfer(
        CompanyUserTransfer $companyUserTransfer,
        ProductListCollectionTransfer $productListCollectionTransfer
    ): void {
        foreach ($productListCollectionTransfer->getProductLists() as $productListTransfer) {
            $idProductList = $productListTransfer->getIdProductList();

            if ($productListTransfer->getType() === static::TYPE_WHITELIST) {
                $companyUserTransfer->getProductListCollection()->addWhitelistId($idProductList);

                continue;
            }

            $companyUserTransfer->getProductListCollection()->addBlacklistId($idProductList);
        }
    }
}

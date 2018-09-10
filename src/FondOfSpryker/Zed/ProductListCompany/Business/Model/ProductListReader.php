<?php

namespace FondOfSpryker\Zed\ProductListCompany\Business\Model;

use FondOfSpryker\Zed\ProductListCompany\Persistence\ProductListCompanyRepositoryInterface;
use Generated\Shared\Transfer\CompanyTransfer;
use Generated\Shared\Transfer\ProductListCollectionTransfer;

class ProductListReader implements ProductListReaderInterface
{
    /**
     * @var \FondOfSpryker\Zed\ProductListCompany\Persistence\ProductListCompanyRepositoryInterface
     */
    protected $productListCompanyRepository;

    /**
     * @param \FondOfSpryker\Zed\ProductListCompany\Persistence\ProductListCompanyRepositoryInterface $productListCompanyRepository
     */
    public function __construct(ProductListCompanyRepositoryInterface $productListCompanyRepository)
    {
        $this->productListCompanyRepository = $productListCompanyRepository;
    }

    /**
     * @param \Generated\Shared\Transfer\CompanyTransfer $companyTransfer
     *
     * @return \Generated\Shared\Transfer\ProductListCollectionTransfer
     */
    public function getProductListCollectionByIdCompanyId(
        CompanyTransfer $companyTransfer
    ): ProductListCollectionTransfer {
        $companyTransfer->requireIdCompany();

        return $this->productListCompanyRepository
            ->getProductListCollectionByIdCompany($companyTransfer->getIdCompany());
    }
}

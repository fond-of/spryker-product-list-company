<?php

namespace FondOfSpryker\Zed\ProductListCompany\Business\Model;

use FondOfSpryker\Zed\ProductListCompany\Persistence\ProductListCompanyRepositoryInterface;
use Generated\Shared\Transfer\ProductListCompanyRelationTransfer;

class ProductListCompanyRelationReader implements ProductListCompanyRelationReaderInterface
{
    /**
     * @var \FondOfSpryker\Zed\ProductListCompany\Persistence\ProductListCompanyRepositoryInterface
     */
    protected $productListCompanyRepository;

    /**
     * @param \FondOfSpryker\Zed\ProductListCompany\Persistence\ProductListCompanyRepositoryInterface $productListCompanyRepository
     */
    public function __construct(
        ProductListCompanyRepositoryInterface $productListCompanyRepository
    ) {
        $this->productListCompanyRepository = $productListCompanyRepository;
    }

    /**
     * @param \Generated\Shared\Transfer\ProductListCompanyRelationTransfer $productListCompanyRelationTransfer
     *
     * @return \Generated\Shared\Transfer\ProductListCompanyRelationTransfer
     */
    public function getProductListCompanyRelation(
        ProductListCompanyRelationTransfer $productListCompanyRelationTransfer
    ): ProductListCompanyRelationTransfer {
        $productListCompanyRelationTransfer->requireIdProductList();

        $companyIds = $this->productListCompanyRepository->getRelatedCompanyIdsByIdProductList(
            $productListCompanyRelationTransfer->getIdProductList()
        );

        $productListCompanyRelationTransfer->setCompanyIds($companyIds);

        return $productListCompanyRelationTransfer;
    }
}

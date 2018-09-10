<?php

namespace FondOfSpryker\Zed\ProductListCompany\Business;

use Generated\Shared\Transfer\CompanyUserTransfer;
use Generated\Shared\Transfer\ProductListCompanyRelationTransfer;
use Generated\Shared\Transfer\ProductListTransfer;

interface ProductListCompanyFacadeInterface
{
    /**
     * @param \Generated\Shared\Transfer\CompanyUserTransfer $companyUserTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyUserTransfer
     */
    public function hydrateCompanyUserWithProductListIds(CompanyUserTransfer $companyUserTransfer): CompanyUserTransfer;

    /**
     * @param \Generated\Shared\Transfer\ProductListCompanyRelationTransfer $productListCompanyRelationTransfer
     *
     * @return \Generated\Shared\Transfer\ProductListCompanyRelationTransfer
     */
    public function saveProductListCompanyRelation(
        ProductListCompanyRelationTransfer $productListCompanyRelationTransfer
    ): ProductListCompanyRelationTransfer;

    /**
     * @param \Generated\Shared\Transfer\ProductListTransfer $productListTransfer
     *
     * @return void
     */
    public function deleteProductListCompanyRelation(
        ProductListTransfer $productListTransfer
    ): void;
}

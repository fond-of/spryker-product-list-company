<?php

namespace FondOfSpryker\Zed\ProductListCompany\Persistence;

use Generated\Shared\Transfer\ProductListTransfer;

interface ProductListCompanyEntityManagerInterface
{
    /**
     * @param int $idProductList
     * @param array $companyIds
     *
     * @return void
     */
    public function addCompanyRelations(int $idProductList, array $companyIds): void;

    /**
     * @param int $idProductList
     * @param array $companyIds
     *
     * @return void
     */
    public function removeCompanyRelations(int $idProductList, array $companyIds): void;

    /**
     * @param \Generated\Shared\Transfer\ProductListTransfer $productListTransfer
     *
     * @return void
     */
    public function deleteProductListCompanyRelations(ProductListTransfer $productListTransfer): void;
}

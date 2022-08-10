<?php

namespace FondOfSpryker\Zed\ProductListCompany\Persistence;

use Generated\Shared\Transfer\ProductListCollectionTransfer;

interface ProductListCompanyRepositoryInterface
{
    /**
     * @param int $idCompany
     *
     * @return \Generated\Shared\Transfer\ProductListCollectionTransfer
     */
    public function getProductListCollectionByIdCompany(int $idCompany): ProductListCollectionTransfer;

    /**
     * @param int $idProductList
     *
     * @return array<int>
     */
    public function getRelatedCompanyIdsByIdProductList(int $idProductList): array;
}

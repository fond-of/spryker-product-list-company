<?php

namespace FondOfSpryker\Zed\ProductListCompany\Persistence;

use Generated\Shared\Transfer\ProductListTransfer;
use Orm\Zed\ProductList\Persistence\SpyProductListCompany;
use Spryker\Zed\Kernel\Persistence\AbstractEntityManager;

/**
 * @method \FondOfSpryker\Zed\ProductListCompany\Persistence\ProductListCompanyPersistenceFactory getFactory()
 */
class ProductListCompanyEntityManager extends AbstractEntityManager implements ProductListCompanyEntityManagerInterface
{
    /**
     * @param int $idProductList
     * @param array $companyIds
     *
     * @return void
     */
    public function addCompanyRelations(int $idProductList, array $companyIds): void
    {
        foreach ($companyIds as $idCompany) {
            $productListCompanyEntity = new SpyProductListCompany();
            $productListCompanyEntity->setFkProductList($idProductList)
                ->setFkCompany($idCompany)
                ->save();
        }
    }

    /**
     * @param int $idProductList
     * @param array $companyIds
     *
     * @return void
     */
    public function removeCompanyRelations(int $idProductList, array $companyIds): void
    {
        if (count($companyIds) === 0) {
            return;
        }

        $productListCompanyEntities = $this->getFactory()
            ->createProductListCompanyQuery()
            ->filterByFkProductList($idProductList)
            ->filterByFkCompany_In($companyIds)
            ->find();

        foreach ($productListCompanyEntities as $productListCompany) {
            $productListCompany->delete();
        }
    }

    /**
     * @param \Generated\Shared\Transfer\ProductListTransfer $productListTransfer
     *
     * @return void
     */
    public function deleteProductListCompanyRelations(ProductListTransfer $productListTransfer): void
    {
        $productListCompanyEntities = $this->getFactory()
            ->createProductListCompanyQuery()
            ->filterByFkProductList($productListTransfer->getIdProductList())
            ->find();

        foreach ($productListCompanyEntities as $productListCompanyEntity) {
            $productListCompanyEntity->delete();
        }
    }
}

<?php

namespace FondOfSpryker\Zed\ProductListCompany\Persistence;

use Generated\Shared\Transfer\ProductListCollectionTransfer;
use Generated\Shared\Transfer\ProductListTransfer;
use Orm\Zed\ProductList\Persistence\Map\SpyProductListCompanyTableMap;
use Spryker\Zed\Kernel\Persistence\AbstractRepository;

/**
 * @method \FondOfSpryker\Zed\ProductListCompany\Persistence\ProductListCompanyPersistenceFactory getFactory()
 */
class ProductListCompanyRepository extends AbstractRepository implements ProductListCompanyRepositoryInterface
{
    /**
     * @param int $idCompany
     *
     * @return \Generated\Shared\Transfer\ProductListCollectionTransfer
     */
    public function getProductListCollectionByIdCompany(int $idCompany): ProductListCollectionTransfer
    {
        /** @var array<\Orm\Zed\ProductList\Persistence\SpyProductList> $productListEntities */
        $productListEntities = $this->getFactory()
            ->getProductListQuery()
            ->useSpyProductListCompanyQuery()
                ->filterByFkCompany($idCompany)
            ->endUse()
            ->find();

        $productListCollectionTransfer = new ProductListCollectionTransfer();
        $productListCompanyMapper = $this->getFactory()->createProductListCompanyMapper();

        foreach ($productListEntities as $productListEntity) {
            $productListCollectionTransfer->addProductList(
                $productListCompanyMapper->mapProductList($productListEntity, new ProductListTransfer()),
            );
        }

        return $productListCollectionTransfer;
    }

    /**
     * @param int $idProductList
     *
     * @return array<int>
     */
    public function getRelatedCompanyIdsByIdProductList(int $idProductList): array
    {
        /** @var \Propel\Runtime\Collection\ArrayCollection $collection */
        $collection = $this->getFactory()
            ->createProductListCompanyQuery()
            ->clear()
            ->filterByFkProductList($idProductList)
            ->select(SpyProductListCompanyTableMap::COL_FK_COMPANY)
            ->find();

        return $collection->toArray();
    }
}

<?php

namespace FondOfSpryker\Zed\ProductListCompany\Communication\Plugin\ProductList;

use FondOfSpryker\Zed\ProductList\Dependency\Plugin\ProductListPostSaverPluginInterface;
use Generated\Shared\Transfer\ProductListCompanyRelationTransfer;
use Generated\Shared\Transfer\ProductListTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \FondOfSpryker\Zed\ProductListCompany\Business\ProductListCompanyFacadeInterface getFacade()
 * @method \FondOfSpryker\Zed\ProductListCompany\ProductListCompanyConfig getConfig()
 */
class ProductListCompanyRelationPostSaverPlugin extends AbstractPlugin implements ProductListPostSaverPluginInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\ProductListTransfer $productListTransfer
     *
     * @return \Generated\Shared\Transfer\ProductListTransfer
     */
    public function postSave(ProductListTransfer $productListTransfer): ProductListTransfer
    {
        $productListCompanyRelationTransfer = $productListTransfer->getProductListCompanyRelation();

        if (!$productListCompanyRelationTransfer) {
            return $productListTransfer;
        }

        $productListTransfer = $this->saveProductListCompanyRelation(
            $productListTransfer,
            $productListCompanyRelationTransfer
        );

        return $productListTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\ProductListTransfer $productListTransfer
     * @param \Generated\Shared\Transfer\ProductListCompanyRelationTransfer $productListCompanyRelationTransfer
     *
     * @return \Generated\Shared\Transfer\ProductListTransfer
     */
    protected function saveProductListCompanyRelation(
        ProductListTransfer $productListTransfer,
        ProductListCompanyRelationTransfer $productListCompanyRelationTransfer
    ): ProductListTransfer {
        $productListCompanyRelationTransfer->setIdProductList($productListTransfer->getIdProductList());

        $productListCompanyRelationTransfer = $this->getFacade()
            ->saveProductListCompanyRelation($productListCompanyRelationTransfer);

        $productListTransfer->setProductListCompanyRelation($productListCompanyRelationTransfer);

        return $productListTransfer;
    }
}

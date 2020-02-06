<?php

namespace FondOfSpryker\Zed\ProductListCompany\Communication\Plugin;

use FondOfSpryker\Zed\ProductList\Dependency\Plugin\ProductListPreDeleterPluginInterface;
use Generated\Shared\Transfer\ProductListTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \FondOfSpryker\Zed\ProductListCompany\Business\ProductListCompanyFacadeInterface getFacade()
 * @method \FondOfSpryker\Zed\ProductListCompany\ProductListCompanyConfig getConfig()
 */
class ProductListCompanyRelationPreDeleterPlugin extends AbstractPlugin implements ProductListPreDeleterPluginInterface
{
    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\ProductListTransfer $productListTransfer
     *
     * @return void
     */
    public function preDelete(ProductListTransfer $productListTransfer): void
    {
        $this->getFacade()->deleteProductListCompanyRelation($productListTransfer);
    }
}

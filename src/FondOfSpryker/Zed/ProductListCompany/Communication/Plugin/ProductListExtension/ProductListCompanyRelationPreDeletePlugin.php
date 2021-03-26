<?php

namespace FondOfSpryker\Zed\ProductListCompany\Communication\Plugin\ProductListExtension;

use FondOfSpryker\Zed\ProductListExtension\Dependency\Plugin\ProductListPreDeletePluginInterface;
use Generated\Shared\Transfer\ProductListTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \FondOfSpryker\Zed\ProductListCompany\Business\ProductListCompanyFacadeInterface getFacade()
 * @method \FondOfSpryker\Zed\ProductListCompany\ProductListCompanyConfig getConfig()
 */
class ProductListCompanyRelationPreDeletePlugin extends AbstractPlugin implements ProductListPreDeletePluginInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\ProductListTransfer $productListTransfer
     *
     * @return void
     */
    public function execute(ProductListTransfer $productListTransfer): void
    {
        $this->getFacade()->deleteProductListCompanyRelation($productListTransfer);
    }
}

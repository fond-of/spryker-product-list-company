<?php

namespace FondOfSpryker\Zed\ProductListCompany\Communication\Plugin;

use FondOfSpryker\Zed\ProductList\Business\ProductList\ProductListPreDeleterInterface;
use Generated\Shared\Transfer\ProductListTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \FondOfSpryker\Zed\ProductListCompany\Business\ProductListCompanyFacadeInterface getFacade()
 */
class ProductListCompanyRelationPreDeleterPlugin extends AbstractPlugin implements ProductListPreDeleterInterface
{
    /**
     * @param \Generated\Shared\Transfer\ProductListTransfer $productListTransfer
     *
     * @return void
     */
    public function preDelete(ProductListTransfer $productListTransfer): void
    {
        $this->getFacade()->deleteProductListCompanyRelation($productListTransfer);
    }
}

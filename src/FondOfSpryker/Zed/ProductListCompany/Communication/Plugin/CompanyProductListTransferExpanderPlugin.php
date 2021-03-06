<?php

namespace FondOfSpryker\Zed\ProductListCompany\Communication\Plugin;

use FondOfSpryker\Zed\ProductList\Dependency\Plugin\ProductListTransferExpanderPluginInterface;
use Generated\Shared\Transfer\ProductListTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \FondOfSpryker\Zed\ProductListCompany\Business\ProductListCompanyFacadeInterface getFacade()
 */
class CompanyProductListTransferExpanderPlugin extends AbstractPlugin implements ProductListTransferExpanderPluginInterface
{
    /**
     * Specification
     * - Expands the provided product list transfer object's data and returns the modified object.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\ProductListTransfer $productListTransfer
     *
     * @return \Generated\Shared\Transfer\ProductListTransfer
     */
    public function expandTransfer(ProductListTransfer $productListTransfer): ProductListTransfer
    {
        $productListTransfer = $this->getFacade()
            ->expandProductListTransferWithProductListCompanyRelationTransfer($productListTransfer);

        return $productListTransfer;
    }
}

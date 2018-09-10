<?php

namespace FondOfSpryker\Zed\ProductListCompany\Business;

use Generated\Shared\Transfer\CompanyUserTransfer;
use Generated\Shared\Transfer\ProductListCompanyRelationTransfer;
use Generated\Shared\Transfer\ProductListTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \FondOfSpryker\Zed\ProductListCompany\Business\ProductListCompanyBusinessFactory getFactory()
 */
class ProductListCompanyFacade extends AbstractFacade implements ProductListCompanyFacadeInterface
{
    /**
     * @param \Generated\Shared\Transfer\CompanyUserTransfer $companyUserTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyUserTransfer
     */
    public function hydrateCompanyUserWithProductListIds(CompanyUserTransfer $companyUserTransfer): CompanyUserTransfer
    {
        return $this->getFactory()
            ->createCompanyUserHydrator()
            ->hydrateCompanyUserTransferWithProductListIds($companyUserTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\ProductListCompanyRelationTransfer $productListCompanyRelationTransfer
     *
     * @return \Generated\Shared\Transfer\ProductListCompanyRelationTransfer
     */
    public function saveProductListCompanyRelation(
        ProductListCompanyRelationTransfer $productListCompanyRelationTransfer
    ): ProductListCompanyRelationTransfer {
        return $this->getFactory()->createProductListCompanyRelationWriter()
            ->saveProductListCompanyRelation($productListCompanyRelationTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\ProductListTransfer $productListTransfer
     *
     * @return void
     */
    public function deleteProductListCompanyRelation(
        ProductListTransfer $productListTransfer
    ): void {
        $this->getFactory()->createProductListCompanyRelationWriter()
            ->deleteProductListCompanyRelation($productListTransfer);
    }
}

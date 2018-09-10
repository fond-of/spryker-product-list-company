<?php

namespace FondOfSpryker\Zed\ProductListCompany\Communication\Plugin;

use Generated\Shared\Transfer\CompanyUserTransfer;
use Spryker\Zed\CompanyUserExtension\Dependency\Plugin\CompanyUserHydrationPluginInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \FondOfSpryker\Zed\ProductListCompany\Business\ProductListCompanyFacadeInterface getFacade()
 */
class ProductListCompanyUserHydrationPlugin extends AbstractPlugin implements CompanyUserHydrationPluginInterface
{
    /**
     * @param \Generated\Shared\Transfer\CompanyUserTransfer $companyUserTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyUserTransfer
     */
    public function hydrate(CompanyUserTransfer $companyUserTransfer): CompanyUserTransfer
    {
        return $this->getFacade()->hydrateCompanyUserWithProductListIds($companyUserTransfer);
    }
}

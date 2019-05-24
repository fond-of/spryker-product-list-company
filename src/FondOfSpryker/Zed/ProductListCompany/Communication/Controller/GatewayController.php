<?php

namespace FondOfSpryker\Zed\ProductListCompany\Communication\Controller;

use Generated\Shared\Transfer\CompanyTransfer;
use Generated\Shared\Transfer\ProductListCollectionTransfer;
use Spryker\Zed\Kernel\Communication\Controller\AbstractGatewayController;

/**
 * @method \FondOfSpryker\Zed\ProductListCompany\Business\ProductListCompanyFacade getFacade()
 */
class GatewayController extends AbstractGatewayController
{
    /**
     * @param \Generated\Shared\Transfer\CompanyTransfer $companyTransfer
     *
     * @return \Generated\Shared\Transfer\ProductListCollectionTransfer
     */
    public function getProductListCollectionByCompanyIdAction(CompanyTransfer $companyTransfer): ProductListCollectionTransfer
    {
        return $this->getFacade()->getProductListCollectionByCompanyId($companyTransfer);
    }
}

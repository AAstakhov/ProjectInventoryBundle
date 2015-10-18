<?php

namespace AAstakhov\ProjectInventoryBundle\Report\Preparer;

use AAstakhov\ProjectInventoryBundle\Exception\InventoryPreparerProviderTypeUnknownException;
use AAstakhov\ProjectInventoryBundle\Report\ReportTypeAlias;

/**
 * Class PreparerProvider
 * @package AAstakhov\ProjectInventoryBundle\Report\Preparer
 */
class PreparerProvider
{
    /**
     * @var TypeBundlePreparer
     */
    private $bundlePrepare;
    /**
     * @var TypeServicePreparer
     */
    private $servicePrepare;

    /**
     * @param TypeBundlePreparer $bundlePreparer
     * @param TypeServicePreparer $servicePreparer
     */
    // @todo: maybe dynamic arguments?
    public function __construct(TypeBundlePreparer $bundlePreparer, TypeServicePreparer $servicePreparer)
    {
        $this->bundlePrepare = $bundlePreparer;
        $this->servicePrepare = $servicePreparer;
    }

    /**
     * @param $type
     * @return TypeBundlePreparer|TypeServicePreparer
     * @throws \Exception
     */
    public function get($type)
    {
        switch ($type)
        {
            case ReportTypeAlias::BUNDLE:
            {
                return $this->bundlePrepare;
                break;
            }

            case ReportTypeAlias::SERVICE:
            {
                return $this->servicePrepare;
                break;
            }

            default:
            {
                throw new InventoryPreparerProviderTypeUnknownException(sprintf('Report type `%s` unknown', $type));
            }
        }
    }
}
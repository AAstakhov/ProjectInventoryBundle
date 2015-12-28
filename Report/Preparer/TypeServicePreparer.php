<?php

namespace AAstakhov\ProjectInventoryBundle\Report\Preparer;

use AAstakhov\ProjectInventoryBundle\Report\Report;
use AAstakhov\ProjectInventoryBundle\Report\ReportTypeAlias;

/**
 * Class TypeServicePreparer
 * @package AAstakhov\ProjectInventoryBundle\Report\Preparer
 */
class TypeServicePreparer extends BasePreparer implements ITypeReportPreparer
{
    /**
     * @var string
     */
    private static $template = 'ProjectInventoryBundle:Report:service.html.twig';

    /**
     * @return Report
     */
    public function prepare()
    {
        // fixtures
        $tplData = array(
            'services' => array(
                'aastakhov.project_inventory.report.preparer_type.bundle',
                'aastakhov.project_inventory.report.preparer_type.service',
                'aastakhov.project_inventory.report.preparer_provider',
                'aastakhov.project_inventory.report.storage',
            )
        );

        return new Report(ReportTypeAlias::SERVICE, self::$template, $tplData);
    }
}
<?php

namespace AAstakhov\ProjectInventoryBundle\Report\Preparer;

use AAstakhov\ProjectInventoryBundle\Report\Report;
use AAstakhov\ProjectInventoryBundle\Report\ReportTypeAlias;

/**
 * Class TypeBundlePreparer
 * @package AAstakhov\ProjectInventoryBundle\Report\Preparer
 */
class TypeBundlePreparer extends BasePreparer implements ITypeReportPreparer
{
    /**
     * @var string
     */
    private static $template = 'ProjectInventoryBundle:Report:bundle.html.twig';

    /**
     * @return Report
     */
    public function prepare()
    {
        // fixtures
        $tplData = array(
            'bundles' => array(
                'TwigBundle',
                'DoctrineBundle',
                'SensioDistributionBundle',
                'SensioGeneratorBundle',
            )
        );

        $report = new Report(ReportTypeAlias::BUNDLE, self::$template, $tplData);

        return $report;
    }
}
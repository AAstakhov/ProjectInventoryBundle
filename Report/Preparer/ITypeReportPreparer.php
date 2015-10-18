<?php

namespace AAstakhov\ProjectInventoryBundle\Report\Preparer;

use AAstakhov\ProjectInventoryBundle\Report\Report;

/**
 * Interface ITypeReportPreparer
 * @package AAstakhov\ProjectInventoryBundle\Report\Preparer
 */
interface ITypeReportPreparer
{
    /**
     * @return Report
     */
    public function prepare();
}
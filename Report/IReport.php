<?php

namespace AAstakhov\ProjectInventoryBundle\Report;

/**
 * Interface IReport
 * @package AAstakhov\ProjectInventoryBundle\Report
 */
interface IReport
{
    /**
     * @return string
     */
    public function getName();

    /**
     * @return string
     */
    public function getTemplateName();

    /**
     * @return array
     */
    public function getTemplateData();
}
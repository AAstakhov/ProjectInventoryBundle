<?php

namespace AAstakhov\ProjectInventoryBundle\Report;

use AAstakhov\ProjectInventoryBundle\Report\Preparer\PreparerProvider;

/**
 * Class ReportGenerator
 * @package AAstakhov\ProjectInventoryBundle\Report
 */
class ReportGenerator
{
    /**
     * @var PreparerProvider
     */
    private $preparerProvider;

    /**
     * @var ReportStorage
     */
    private $storage;

    /**
     * @param PreparerProvider $preparerProvider
     * @param ReportStorage $storage
     */
    public function __construct(PreparerProvider $preparerProvider, ReportStorage $storage)
    {
        $this->preparerProvider = $preparerProvider;
        $this->storage = $storage;
    }

    /**
     * @param $type
     * @param string $format
     * @return Report
     * @throws \AAstakhov\ProjectInventoryBundle\Exception\InventoryPreparerProviderTypeUnknownException
     */
    public function handle($type, $format = ReportFormatAlias::HTML)
    {
        $preparer = $this->preparerProvider->get($type);

        $report = $preparer->prepare();

        $this->storage->saveReport($report, $format);

        return $report;
    }
}
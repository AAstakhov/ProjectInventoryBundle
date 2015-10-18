<?php

namespace AAstakhov\ProjectInventoryBundle\Report;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;

/**
 * Class ReportStorage
 * @package AAstakhov\ProjectInventoryBundle\Report
 */
class ReportStorage
{
    /**
     * @var string
     */
    private $storagePath = 'inventory/';

    /**
     * @var \Twig_Environment
     */
    private $twig;

    /**
     * @param \Twig_Environment $twig
     */
    public function __construct(\Twig_Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @param Report $report
     * @param string $format
     * @return bool
     */
    public function saveReport(Report $report, $format = ReportFormatAlias::HTML)
    {
        $filename = $this->getReportFilename($report, $format);

        $content = $this->twig->render($report->getTemplateName(), $report->getTemplateData());

        $fs = new Filesystem();
        $fs->dumpFile($filename, $content);

        return true;
    }

    /**
     * @param Report $report
     * @param $format
     * @return string
     */
    private function getReportFilename(Report $report, $format)
    {
        return $this->getStorageDir() . $report->getName() .'.'. $format;
    }

    /**
     * @return string
     */
    private function getStorageDir()
    {
        return __DIR__.'/../../../../web/' . $this->storagePath;
    }
}
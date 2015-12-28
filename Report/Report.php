<?php

namespace AAstakhov\ProjectInventoryBundle\Report;

/**
 * Class Report
 * @package AAstakhov\ProjectInventoryBundle\Report
 */
/**
 * Class Report
 * @package AAstakhov\ProjectInventoryBundle\Report
 */
class Report implements IReport
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var
     */
    private $type;
    /**
     * @var
     */
    private $tplName;
    /**
     * @var array
     */
    private $tplData = array();

    /**
     * @param $type
     * @param $tplName
     * @param array $tplData
     */
    public function __construct($type, $tplName, array $tplData = array())
    {
        $this->type = $type;
        $this->tplName = $tplName;
        $this->tplData = $tplData;

        $this->name = $type .'_'. time();
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getTemplateName()
    {
        return $this->tplName;
    }

    /**
     * @return array
     */
    public function getTemplateData()
    {
        return $this->tplData;
    }
}
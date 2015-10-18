<?php

namespace AAstakhov\ProjectInventoryBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class ReportGenerateCommand
 * @package AAstakhov\ProjectInventoryBundle\Command
 */
class ReportGenerateCommand extends ContainerAwareCommand
{
    /**
     *
     */
    protected function configure()
    {
        $this
            ->setName('inventory:report:generate')
            ->setDescription('Generate documentations')
            ->addOption('type', null, InputOption::VALUE_REQUIRED, 'Report type')
        ;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $type = $input->getOption('type');

        $generator = $this->getContainer()->get('aastakhov.project_inventory.report.generator');
        $report = $generator->handle($type);

        $output->writeln(sprintf('Report %s saved successfully', $report->getName()));
    }
}
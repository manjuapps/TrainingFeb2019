<?php
namespace Training\ModuleInfo\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Details extends Command {

    public $moduleList;

    public function __construct(
        \Magento\Framework\Module\ModuleListInterface $moduleList,
        $name = null)
    {
        parent::__construct($name);
        $this->moduleList = $moduleList;
    }

    protected function configure()
    {
        $this->setName("training:modules:details")->setDescription("List all Modules");

        $this->setDefinition([
            new InputArgument(
                'name',
                InputArgument::OPTIONAL,
                'Name'
            )
        ]);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("Listing all modules: ");

        $moduleName = $input->getArgument('name');

        $module = $this->moduleList->getOne($moduleName);
        $output->writeln($module['name'] . " - " . $module['setup_version']);

        $output->writeln("Done.");
    }
}
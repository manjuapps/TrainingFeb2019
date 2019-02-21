<?php
namespace Training\ModuleInfo\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Info extends Command {

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
        $this->setName("training:modules:list")->setDescription("List all Modules");
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("Listing all modules: ");

        $modules = $this->moduleList->getNames();
        foreach ($modules as $module) {
            $output->write($module . ", ");
        }

        $output->writeln("Done.");
    }
}
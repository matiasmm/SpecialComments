<?php

class generatehelpersTask extends sfBaseTask
{
  protected function configure()
  {
    // // add your own arguments here
    // $this->addArguments(array(
    //   new sfCommandArgument('my_arg', sfCommandArgument::REQUIRED, 'My argument'),
    // ));

    $this->addOptions(array(
      new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name'),
      new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
      new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'propel'),
      // add your own options here
    ));

    $this->namespace        = '';
    $this->name             = 'generate-helpers';
    $this->briefDescription = '';
    $this->detailedDescription = <<<EOF
The [generate-helpers|INFO] generate helpers inside the lib folder of this plugins from files t_***.phtml      .
Call it with:

  [php symfony generate-helpers|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
 	$con =new TemplateController();
  	$con->generateHelpersFromDir(dirname(__FILE__)."/../../../../web",dirname(__FILE__)."/../../lib/helper" );
 
    // add your code here
  }
}

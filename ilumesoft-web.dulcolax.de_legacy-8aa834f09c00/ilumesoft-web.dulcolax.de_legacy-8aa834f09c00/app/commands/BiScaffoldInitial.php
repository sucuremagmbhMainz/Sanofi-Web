<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class BiScaffoldInitial extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'BiScaffold:Initial';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Initial site for Bi';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire(){
		//route of the app
		$routes_scaffold='app/';
		$routes_templates='vendor/template_Bi/';

		//messages for user
		$this->info("Started to make the scaffold for Bi site");

		//creating the directories
		$this->comment("Creating the directories...");
		mkdir($routes_scaffold.'views/layouts');
		$this->comment("views/layouts");
		mkdir($routes_scaffold.'views/errors');
		$this->comment("views/errors");
		mkdir($routes_scaffold.'views/includes');
		$this->comment("views/errors");
		mkdir($routes_scaffold.'views/pages');
		$this->comment("views/pages");

		//Creating files
		$this->comment("\n\nCreating the files...");
		//Includes
		$BS_PageIncludeFooter = fopen($routes_scaffold."views/includes/footer.blade.php", "w");
		fclose($BS_PageIncludeFooter);
		$this->comment("views/includes/footer.blade.php");
		$BS_PageIncludeHeader = fopen($routes_scaffold."views/includes/header.blade.php", "w");
		fclose($BS_PageIncludeHeader);
		$this->comment("views/includes/header.blade.php");
		//Master
		$BS_PageMaster = fopen($routes_scaffold."views/layouts/master.blade.php", "w");
		fwrite($BS_PageMaster, file_get_contents($routes_templates.'master.txt'));
		fclose($BS_PageMaster);
		$this->comment("views/layouts/master.blade.php");
		//Controller
		$BS_PageController = fopen($routes_scaffold."controllers/PageController.php", "w");
		fwrite($BS_PageController, file_get_contents($routes_templates.'PageController.txt'));
		fclose($BS_PageController);
		$this->comment("controllers/PageController.php");
		//Index of site
		$BS_PageIndex = fopen($routes_scaffold."views/pages/home.blade.php", "w");
		fwrite($BS_PageIndex, file_get_contents($routes_templates.'PageIndex.txt'));
		fclose($BS_PageIndex);
		$this->comment("views/pages/home.blade.php");
		//error page
		$BS_PageError = fopen($routes_scaffold."views/errors/404.blade.php", "w");
		fwrite($BS_PageError, file_get_contents($routes_templates.'error.txt'));
		fclose($BS_PageError);
		$this->comment("views/errors/404.blade.php");
		$this->comment("\n\nMaking the changes in config files....");
		//error config
		$BS_PageError = fopen($routes_scaffold."start/global.php", "w");
		fwrite($BS_PageError, file_get_contents($routes_templates.'global.txt'));
		fclose($BS_PageError);
		$this->comment("start/global.php");
		//Routes
		$BS_Routes = fopen($routes_scaffold."routes.php", "w");
		fwrite($BS_Routes, file_get_contents($routes_templates.'route.txt'));
		fclose($BS_Routes);
		$this->comment("routes.php");
		$this->comment("\n\nDone, the home page is in views/pages/index.blade.php");
		
	}

}

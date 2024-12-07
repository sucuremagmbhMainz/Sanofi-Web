<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class BiScaffoldPage extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'BiScaffold:Page';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create Page for Bi Site';

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
		$name_page= $this->argument('name_page');
		$name_function=$this->argument('ff_page');
		
		/*
		if(stristr($name_page, '.html') ){
			$name_function= strtok($name_page, '.html');  
		}
		else if (stristr($name_page, '.htm') ) {
			$name_function= strtok($name_page, '.htm');  
		}
		else{
			$name_function= $name_page;  	
		}
		*/
		//Check if the file already exists
		if (file_exists($routes_scaffold."views/pages/".$name_function.".blade.php")) {
			$this->comment("The page already exists");
		    return;
		} 
		
		//create the view of the page
		$this->info("Started to Create the view");
		$BS_Page = fopen($routes_scaffold."views/pages/".$name_function.".blade.php", "w");
		fwrite($BS_Page, file_get_contents($routes_templates.'PageIndex.txt'));
		fclose($BS_Page);
		$this->comment("views/pages/".$name_function.".blade.php");

		//add the funtion on the controller
		$txt_file='';
		$buf = file_get_contents($routes_scaffold."controllers/PageController.php");
		$add_fun='';
		$separator = "\r\n";
		$line = strtok($buf, $separator);
		while ($line !== false) {
			$add_fun='';
		    if(strstr($line, "PageController")){    	
		    	$add_fun= "\r\n\r\n\tpublic function ".$name_function."(){\r\n\t\t\$meta_data = array(\r\n\t\t\t'page_title' => 'Page title',\r\n\t\t\t'meta_description' => '',";
		    	$add_fun.= "\r\n\t\t\t'meta_robots' => ''\r\n\t\t\t);\r\n\t\treturn View::make('pages.".$name_function."', \$meta_data);\r\n\t}\n\r";
	    	}
	    	$txt_file.="\r\n".$line.$add_fun;
		    $line = strtok( $separator );
		}
		$fp = fopen($routes_scaffold."controllers/PageController.php", "r+");   
		fwrite($fp, $txt_file);
		fclose($fp);

		//add the page in routes
		$txt_file='';
		$add_fun='';
		$control=0;
		$buf = file_get_contents($routes_scaffold."routes.php");
		$separator = "\r\n";
		$line = strtok($buf, $separator);
		while ($line !== false) {
			$add_fun='';
			
		    if((strstr($line, "Route::"))&&($control==0)) {    	
		    	$add_fun= "\r\n\r\nRoute::get('".$name_page."', 'PageController@".$name_function."');\r\n";
		    	$control++;
	    	}
	    	$txt_file.="\r\n".$line.$add_fun;
		    $line = strtok( $separator );
		}
		$fp = fopen($routes_scaffold."routes.php", "r+");   
		fwrite($fp, $txt_file);
		fclose($fp);

		
	}

	/**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return array(
            array('name_page', InputArgument::REQUIRED, 'Name of the page'),
            array('ff_page', InputArgument::REQUIRED, 'function of the page'),

        );
    }

}

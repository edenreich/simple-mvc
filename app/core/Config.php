<?php

namespace App\Core;

/**
 * The config class.
 *
 * The configuration of the application. 
 *
 */
class Config
{
	/**
	 * The config directory path.
	 *
	 * @var string
	 */
	protected $directoryPath = '';

	/**
	 * The enviorment.
	 *
	 * @var string
	 */
	protected $env = 'local';

	/**
	 * The config files.
	 *
	 * @var array
	 */
	protected $files = [];

	/**
	 * Loading all the config files from the specified directory.
	 *
	 * @return void
	 */
	public function __construct($configDirectoryPath)
	{
		$this->setEnviroment($this->getEnviroment($configDirectoryPath.DIRECTORY_SEPARATOR.'main.ini'));

		$this->files = $this->compileEnviromentFiles($configDirectoryPath);

		dd($this->get('config'));
	}

	/**
	 * This method stores the files into array of filenames.
	 *
	 * @param string
	 * 
	 * @return array
	 */
	protected function compileEnviromentFiles($configDirectoryPath)
	{
		$directoryFiles = scandir($configDirectoryPath.DIRECTORY_SEPARATOR.$this->env);
		unset($directoryFiles[0], $directoryFiles[1]);

		foreach($directoryFiles as $configFile)
		{
			if(! file_exists($configDirectoryPath.DIRECTORY_SEPARATOR.$this->env.DIRECTORY_SEPARATOR.$configFile)) continue;
			$name = substr($configFile, 0, strpos($configFile, '.'));
			$this->files[$name] = parse_ini_file($configDirectoryPath.DIRECTORY_SEPARATOR.$this->env.DIRECTORY_SEPARATOR.$configFile);
			$this->files['path'] = $configDirectoryPath.DIRECTORY_SEPARATOR.$this->env.DIRECTORY_SEPARATOR.$configFile;
		}

		unset($directoryFiles);
		
		return $this->files;
	}

	/**
	 * This method set the enviroment.
	 *
	 * @param string
	 * 
	 * @return void
	 */
	protected function setEnviroment($enviorment)
	{
		$this->env = $enviorment;
	}

	/**
	 * This method retrieve the enviroment 
	 * from the main config file.
	 *
	 * @param string
	 * 
	 * @return string
	 */
	protected function getEnviroment($path)
	{
		return parse_ini_file($path)['env'];
	}

	/**
	 * This method retrieve the specific
	 * config file content.
	 * 
	 * @return array
	 */
	public function get($file)
	{
		return $this->files[$file];
	}

	/**
	 * This method retrieve the files of
	 * the pre-defined enviroment.
	 * 
	 * @return array
	 */
	public function getAll()
	{
		return $this->files;
	}

}
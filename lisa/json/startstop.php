<?php

/*****************************************
*   Klasse zur Remote-Steuerung des 
*   Backends und der FakeClients
*
*
*****************************************/

	$get = $_GET['do']
	$process = new Process('java -jar ../ws/ws.jar');


	switch ($get) {
		case 'start':
			$process.start();
			break;

		case 'stop':
			 $process.stop();
			break;

		case 'status':
			if ($process.status()){
        	echo "The process is currently running";
    	}else{
        	echo "The process is not running.";
    	}
			break;

		case 'populate':
			$clientFaker = new Process('java -jar ../ws/client.jar');
			$clientFaker.start();
			break;
		
	}
    // You may use status(), start(), and stop(). notice that start() method gets called automatically one time.
    

    // Then you can start/stop/ check status of the job.
   
    
    

/* An easy way to keep in track of external processes.
 * Ever wanted to execute a process in php, but you still wanted to have somewhat controll of the process ? Well.. This is a way of doing it.
 * @compability: Linux only. (Windows does not work).
 * @author: Peec
 */
class Process{
    private $pid;
    private $command;

    public function __construct($cl=false){
        if ($cl != false){
            $this->command = $cl;
            $this->runCom();
        }
    }
    private function runCom(){
        $command = 'nohup '.$this->command.' > /dev/null 2>&1 & echo $!';
        exec($command ,$op);
        $this->pid = (int)$op[0];
    }

    public function setPid($pid){
        $this->pid = $pid;
    }

    public function getPid(){
        return $this->pid;
    }

    public function status(){
        $command = 'ps -p '.$this->pid;
        exec($command,$op);
        if (!isset($op[1]))return false;
        else return true;
    }

    public function start(){
        if ($this->command != '')$this->runCom();
        else return true;
    }

    public function stop(){
        $command = 'kill '.$this->pid;
        exec($command);
        if ($this->status() == false)return true;
        else return false;
    }
}
?>
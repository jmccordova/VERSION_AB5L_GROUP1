<?php
	defined('AUTH') or die;

	if(defined('RLOGGER')) return;
	
	if(!defined('RCONFIG'))
		include_once 'bin/RConfig.php';
	
	DEFINE('RLOGGER',1);
	
	final class RLogger{
		public static function log($mode, $api, $params, $name, $message){
		
			$_SESSION['messages'][] = $message;
		
			if(	(!RConfig::log		//log unnecessary
				||$api=="conrad/login"
				||$api=="conrad/log_in"
				||$api=="conrad/sign_up"
				)
				&& $mode!='E'
			) return;
			
			$paramString = (gettype($params)=="array")?((sizeof($params)==0)?"none":implode(',',$params)):$params;

			$fh = fopen(RConfig::logs_path.$mode.date('-Y-n-j').'.log','a');
			fwrite($fh, date("G:i:s")."|".RLogger::getIP()."|".$api.'|'.$name."|".$paramString."|".$message."\n");
			fclose($fh);
		}
		private static function getIP(){
			return (empty($_SERVER['HTTP_CLIENT_IP'])?(empty($_SERVER['HTTP_X_FORWARDED_FOR'])?$_SERVER['REMOTE_ADDR']:$_SERVER['HTTP_X_FORWARDED_FOR']):$_SERVER['HTTP_CLIENT_IP']);
		}
	}
?>

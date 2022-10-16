<?php

require_once './sys/classes/traits/DateUtils.php';
require_once './sys/classes/traits/StringUtils.php';

/**
 * Разне помоћне функције.
 */
final class Utils {

	use DateUtils, StringUtils;

	/**
	 * Исписивање нормализованог линка
	 * За апсолутне путање: заменимо PATH са BASE
	 * @param string $path Линк
	 * @return string
	 */


	
	public function load_list($table_name,$id,$libelle)
	{
	   $unit=Model:: get_All($table_name) ;
	   $out_unit='<option selected="selected" value="0">--CHOOSE AN OPTION--</option>'; 
				  for ($i=0;$i<sizeof($unit);$i++)
				  { 
				   $out_unit.='<option value="'.$unit[$i]->$id.'">'.$unit[$i]->$id.":".$unit[$i]->$libelle.'</option>';
				  }
				  return $out_unit ;
	}
	final public static function generateLink($path) {
		return Config::BASE.$path;	
	}
	public function toDate($ch)
		{
			if(strlen(trim($ch))===8)
			{
					$j=substr($ch,0,2); 
					$m=substr($ch,2,2);
					$y=substr($ch,4,4);
					$ch=$y."/".$m."/".$j ;
			}
			else if(strlen(trim($ch))>8)
			{
					$j=substr($ch,0,2); 
					$m=substr($ch,3,2);
					$y=substr($ch,6,4);
					$ch=$y."/".$m."/".$j ;

			} else 
			{	
				$ch='1956/03/20' ;
			}
	 		return $ch  ;	
		}
public static function get_section_by_partie($partie)
{	$sec=0;
	switch($partie){
	case "01": case "02": case  "03": case  "04" : {$sec= 1 ;}
				break ;
				case "05" : {$sec=2 ;}
				break ;
				case"06": case "07": case"08": case "09" : {$sec=3 ;}
				break ;
				case "10" : {$sec=4 ;}
				break ;
				case"11": case"12" : {$sec= 5 ;}
				break ;
		}
		return $sec ;
}


public  static function rrmdir($dir) { 
	if (is_dir($dir)) { 
	  $objects = scandir($dir);
	  foreach ($objects as $object) { 
		if ($object != "." && $object != "..") { 
		  if (is_dir($dir. DIRECTORY_SEPARATOR .$object) && !is_link($dir."/".$object))
			{self::rrmdir($dir. DIRECTORY_SEPARATOR .$object);
			echo "<h3> Supression  du dossier ".$object."<h3><br>" ;
			}
		  else
			{unlink($dir. DIRECTORY_SEPARATOR .$object); 
				echo "<h3> Supression  du fichier ".$object."<h3><br>" ;
			}
		} 
	  }
	  rmdir($dir); 
	} 
  }
public function generatefilename($id,$ges) 
 {
	$communes=explode(",",$id) ;
	asort($communes) ;
	$chaine=implode(",",$communes) ; 
	$gestion=explode(",",$ges) ;
	asort($gestion) ;
	$chaine1=implode(",",$gestion) ; 
	$hash=md5($chaine.$chaine1) ;
	return $hash ;
 }

	final public function url_exists($url){
		$url = str_replace("http://", "", $url);
		if (strstr($url, "/")) {
			$url = explode("/", $url, 2);
			$url[1] = "/".$url[1];
		} else {
			$url = array($url, "/");
		}

		$fh = fsockopen($url[0], 80);
		if ($fh) {
			fputs($fh,"GET ".$url[1]." HTTP/1.1\nHost:".$url[0]."\n\n");
			if (fread($fh, 22) == "HTTP/1.1 404 Not Found") { return FALSE; }
			else { return TRUE;    }

		} else { return FALSE;}

	}
	final public static function cen_chiffreEnLettre($n) {
		$tab=[""," االعنوان لأول "," العنوان الثاني "," الحسابات الخاصة في الخزينة "," حسابات أموال المشاركة "," الخامس "," السادس "," السابع "," الثامن "," التاسع "," العاشر "," الحادي عشر "," الثاني عشر " ] ; 
	    return $tab[$n] ;
	}
	final public static function chiffreEnLettre($n) {
		$tab=[""," الأول "," الثاني "," الثالث "," الرابع "," الخامس "," السادس "," السابع "," الثامن "," التاسع "," العاشر "," الحادي عشر "," الثاني عشر " ] ; 
	    return $tab[$n] ;
	}

 final  public static function group_by($key,$data)
 {
$result=array() ;	 
foreach($data as $val)
{
	if(array_key_exists($key,$val))
	{
		$result[$val[$key]][]=$val ; 

	}
	else 
	{
		$result[''][]=$val  ;
	}
}
return $result ;
 }

 public static function sortByName($a, $b,$direction)
 {
	 $a = $a['COUNT(*)'];
	 $b = $b['COUNT(*)'];
 
	 if ($a == $b) return 0;
	 if($direction=='desc')return ($a < $b) ? -1 : 1;
	 if($direction=='asc')return ($a > $b) ? -1 : 1;
 }
 
 public static function sortBy($field, &$array, $direction = 'desc')
 {
	 usort($array, Utils::sortByName($field,$field,$direction));
 var_dump($array) ;die ;
	 return true;
 }



 public static function array_orderby()
{
    $args = func_get_args();
    $data = array_shift($args);
    foreach ($args as $n => $field) {
        if (is_string($field)) {
            $tmp = array();
            foreach ($data as $key => $row)
                $tmp[$key] = $row[$field];
            $args[$n] = $tmp;
            }
    }
    $args[] = &$data;
    call_user_func_array('array_multisort', $args);
    return array_pop($args);
}

 public static function clear($link1)
		{
			$files1 = glob($link1.'*'); // get all file names
			if($files1!=NULL)
			{
			foreach($files1 as $file)
			{
				if(is_file($file))
			  	{
			  		if(unlink($file))
			   		echo $file." supprimé   <br>"  ; 
			   		else  echo "impossible de supprimer  ".$file ."<br>" ; // delete file
		  		}
		  	  else 
			    { 
				   
					/*	$f1 = glob($file.'/*')  ;
						echo  " <h6>suppression des fichies du Dossier  :".$file .' </h6><br>' ; 
						foreach($f1 as $fi)
							{
								if(is_file($fi)) 
									{
										if(unlink($fi))
										echo $fi." supprimé   <br>"  ; 
										else  echo "impossible de supprimer  ".$fi ."<br>" ; // delete file
									}
							}*/
						$handle = opendir($file);
						//do whatever you need
						closedir($handle) ; 
	 					rmdir($file) or die (var_dump($file)) ;
				}
			}
		}
		}



public static function eclair($x , $y){
    if (!is_array($x) || !is_array($y)){
     return FALSE;
     }
     array_pad($x, count($y), "");
     array_pad($y, count($x), "");
     $retour = "";
     while(count($x) > 0){
     $retour .= array_shift($x).' - '.array_shift($y).' - ';
     }
     return $retour;
    }

	private function __construct() {}

}

<?php


class winningNumbers{
	 static $lotterys = array(	"powerball"			=> 	"http://www.calottery.com/play/draw-games/powerball/winning-numbers",
								"mega-millions" 	=> 	"http://www.calottery.com/play/draw-games/mega-millions/winning-numbers",
								"superlotto-plus"	=>	"http://www.calottery.com/play/draw-games/superlotto-plus/winning-numbers",
								"test"				=>	"pb_web.txt"
							);
    
    public function __construct(){}
    
     public static function getNumbers($lottery){
	
	
	
		
    	$powerball =  (file_get_contents(self::$lotterys[$lottery]));
            $powerball_split = preg_split('/table/', $powerball);
            //extra table -> find the container table -> extract all tr into an array.
            foreach($powerball_split as $split){ //find table has the class tag_even
                if(strpos($split, 'tag_even') !== false){
                    $tagname = 'tr';
                    $pattern = "/<tr>([\n\s]+.+){8}<\/tr>/";
                    preg_match_all($pattern,$split,$match);
                }
            }
            
            foreach ($match[0] as &$result){
                $pattern = '/<tr>.+?<a href.+?<span.+?>(\w{3}).+?(\d+).+?(\d{4}).+?(\d+).+?<span>(\s+)?(\d+)(\s+)?<\/span>(\s+)?<span>(\s+)?(\d+)(\s+)?<\/span>(\s+)?<span>(\s+)?(\d+)(\s+)?<\/span>(\s+)?<span>(\s+)?(\d+)(\s+)?<\/span>(\s+)?<span>(\s+)?(\d+)(\s+)?<\/span>.+?<td.+?>(\d+).+?<\/tr>/';
                
                $result = preg_replace("/\n/",'',$result); //remove all newlines
                //$result = preg_replace($pattern,"id = $4 -----date $1 $2 $3---------number-$6 $10 $14 $18 $22------Mega-$24-",$result);
                $_result = preg_replace($pattern,"$4,$1 $2 $3,$6 $10 $14 $18 $22 $24",$result);
                $listArray =  array();
                list($listArray["id"],$listArray["date"],$listArray["number"]) = explode(',',$_result);
                $result = $listArray;
                $result["date"] =  strtotime($result["date"]);
            }
			return $match[0];
    }
    
}
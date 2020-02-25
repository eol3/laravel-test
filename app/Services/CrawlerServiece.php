<?php

namespace App\Services;
use Symfony\Component\DomCrawler\Crawler;
use App\Astro;

class CrawlerServiece {
	
	public function get_all_astros() {
		$astro_arr = ["牡羊座", "金牛座", "雙子座", "巨蟹座", "獅子座", "處女座", "天秤座", "天蠍座", "射手座", "摩羯座", "水瓶座", "雙魚座"];
        
    foreach($astro_arr as $key => $item) {
        $data = $this->get_astro($key);
        $data['astro_id'] = $key;
        $data['astro_name'] = $item;
        Astro::create($data);
    }
	}

	public function get_astro($astro_id) {
		$html = file_get_contents("http://astro.click108.com.tw/daily_10.php?iAstro=".$astro_id);

		$crawler = new Crawler($html);
		
		$data = [];
		$data['all_description'] = $crawler->filter('.TODAY_CONTENT > p')->eq(1)->text();
		$data['love_description'] = $crawler->filter('.TODAY_CONTENT > p')->eq(3)->text();
		$data['career_description'] = $crawler->filter('.TODAY_CONTENT > p')->eq(5)->text();
		$data['money_description'] = $crawler->filter('.TODAY_CONTENT > p')->eq(7)->text();
		
		$text = $crawler->filter('.txt_green')->eq(0)->text();
		$data['all_score'] = $this->get_score($text);
		$text = $crawler->filter('.txt_pink')->eq(0)->text();
		$data['love_score'] = $this->get_score($text);
		$text = $crawler->filter('.txt_blue')->eq(0)->text();
		$data['career_score'] = $this->get_score($text);
		$text = $crawler->filter('.txt_orange')->eq(0)->text();
		$data['money_score'] = $this->get_score($text);
		
		return $data;
	}
	
	private function get_score($text) {
		$star = substr($text, 12, 15);
		preg_match_all('/./u', $star, $matches);
		$matches = $matches[0];
		$scroe = 0;
		foreach($matches as $item) {
			if ($item == '★') $scroe += 1;
		}
		return $scroe;
	}
}
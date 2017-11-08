<?php


 ?>




$images = array();
preg_match_all('/(img|src)=("|')[^"'>]+/i', $data, $media);
unset($data);
$data=preg_replace('/(img|src)("|'|="|=')(.*)/i',"$3",$media[0]);
foreach($data as $url)
{
	$info = pathinfo($url);
	if (isset($info['extension']))
	{
		if (($info['extension'] == 'jpg') ||
		($info['extension'] == 'jpeg') ||
		($info['extension'] == 'gif') ||
		($info['extension'] == 'png'))
		array_push($images, $url);
	}
}









<?PHP
  // Original PHP code by Chirp Internet: www.chirp.com.au
  // Adapted to include 404 and Allow directive checking by Eric at LinkUp.com
  // Please acknowledge use of this code by including this header.

  function robots_allowed($url, $useragent=false)
  {
    // parse url to retrieve host and path
    $parsed = parse_url($url);

    $agents = array(preg_quote('*'));
    if($useragent) $agents[] = preg_quote($useragent, '/');
    $agents = implode('|', $agents);

    // location of robots.txt file, only pay attention to it if the server says it exists
    if(function_exists('curl_init')) {
      $handle = curl_init("http://{$parsed['host']}/robots.txt");
      curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);
      $response = curl_exec($handle);
      $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
      if($httpCode == 200) {
        $robotstxt = explode("\n", $response);
      } else {
        $robotstxt = false;
      }
      curl_close($handle);
    } else {
      $robotstxt = @file("http://{$parsed['host']}/robots.txt");
    }

    // if there isn't a robots, then we're allowed in
    if(empty($robotstxt)) return true;

    $rules = array();
    $ruleApplies = false;
    foreach($robotstxt as $line) {
      // skip blank lines
      if(!$line = trim($line)) continue;

      // following rules only apply if User-agent matches $useragent or '*'
      if(preg_match('/^\s*User-agent: (.*)/i', $line, $match)) {
        $ruleApplies = preg_match("/($agents)/i", $match[1]);
        continue;
      }
      if($ruleApplies) {
        list($type, $rule) = explode(':', $line, 2);
        $type = trim(strtolower($type));
        // add rules that apply to array for testing
        $rules[] = array(
          'type' => $type,
          'match' => preg_quote(trim($rule), '/'),
        );
      }
    }

    $isAllowed = true;
    $currentStrength = 0;
    foreach($rules as $rule) {
      // check if page hits on a rule
      if(preg_match("/^{$rule['match']}/", $parsed['path'])) {
        // prefer longer (more specific) rules and Allow trumps Disallow if rules same length
        $strength = strlen($rule['match']);
        if($currentStrength < $strength) {
          $currentStrength = $strength;
          $isAllowed = ($rule['type'] == 'allow') ? true : false;
        } elseif($currentStrength == $strength && $rule['type'] == 'allow') {
          $currentStrength = $strength;
          $isAllowed = true;
        }
      }
    }

    return $isAllowed;
  }
?>
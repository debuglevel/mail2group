<?php

public function isApprovedMail($mail)
{

$mails = <<<EOD
user01138@university.invalid
user02061@university.invalid
user02123@university.invalid
user04223@university.invalid
user04711@university.invalid
EOD;

	if (contains($mail, $mails))
	{
		return true;
	}
	return false;
}

public function contains($substring, $string) {
        $pos = strpos($string, $substring);
 
        if($pos === false) {
                // string needle NOT found in haystack
                return false;
        }
        else {
                // string needle found in haystack
                return true;
        }
}

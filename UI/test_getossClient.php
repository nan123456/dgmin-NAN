<?php
    function gmt_iso8601($time) {
        $dtStr = date("c", $time);
        $mydatetime = new DateTime($dtStr);
        $expiration = $mydatetime->format(DateTime::ISO8601);
        $pos = strpos($expiration, '+');
        $expiration = substr($expiration, 0, $pos);
        return $expiration."Z";
    }

    $id= 'LTAI3mn8yoxIT6r2';
    $key= 'QBzJVFarEhYjXm3E8XZtkcQArAx9km';
    $host = 'http://sgydata.oss-cn-shenzhen.aliyuncs.com';

    $now = time();
//	echo "timestamp_now ->".$now."<br/><hr/>";
    $expire = 3600; //设置该policy超时时间是10s. 即这个policy过了这个有效时间，将不能访问
    $end = $now + $expire;
//	echo "timestamp_end ->".$end."<br/><hr/>";
    $expiration = gmt_iso8601($end);
//	echo "expiration ->".$expiration."<br/><hr/>";
    $dir = 'dgjx';

    //最大文件大小.用户可以自己设置
    $condition = array(0=>'content-length-range', 1=>0, 2=>1048576000);
    $conditions[] = $condition; 

    //表示用户上传的数据,必须是以$dir开始, 不然上传会失败,这一步不是必须项,只是为了安全起见,防止用户通过policy上传到别人的目录
    $start = array(0=>'starts-with', 1=>'$key', 2=>$dir);
    $conditions[] = $start; 


    $arr = array('expiration'=>$expiration,'conditions'=>$conditions);
    //echo json_encode($arr);
    //return;
    $policy = json_encode($arr);
    $base64_policy = base64_encode($policy);
    $string_to_sign = $base64_policy;
    $signature = base64_encode(hash_hmac('sha1', $string_to_sign, $key, true));

    $response = array();
    $response['accessid'] = $id;
    $response['host'] = $host;
    $response['policy'] = $base64_policy;
    $response['signature'] = $signature;
    $response['expire'] = $end;
    //这个参数是设置用户上传指定的前缀
    $response['dir'] = $dir;
//	print_r($response);
//	echo "<br/><hr/>";
	$json['sign'] = $response;
	echo json_encode($json);
//	echo "<br/><hr/>";
	//本地的临时端口
	$str = '{"accessid":"LTAI3mn8yoxIT6r2",
	"host":"http:\/\/sgydata.oss-cn-shenzhen.aliyuncs.com",
	"policy":"eyJleHBpcmF0aW9uIjoiMjAxNy0xMS0wMVQyMTowNzo1OFoiLCJjb25kaXRpb25zIjpbWyJjb250ZW50LWxlbmd0aC1yYW5nZSIsMCwxMDQ4NTc2MDAwXSxbInN0YXJ0cy13aXRoIiwiJGtleSIsInBpY3R1cmVcLyJdXX0=",
	"signature":"QN\/2RZIDFRydVwA4iDPCcqK0dJE=",
	"expire":1509541678,
	"dir":"picture\/"}';
	//东莞的临时端口
	$str2 = '{"accessid":"LsBbv8YlGb6GAw3h",
	"host":"http:\/\/mor-eyoo.oss- cn-shenzhen.aliyuncs.com",
	"policy":"eyJleHBpcmF0aW9uIjoiMjAxNy0xMS0wMVQxNzoxNjo1MFoiLCJjb25kaXRpb25zIjpbWyJjb250ZW50LWxlbmd0aC1yYW5nZSIsMCwxMDQ4NTc2MDAwXSxbInN0YXJ0cy13aXRoIiwiJGtleSIsImRnanhcLyJdXX0=",
	"signature":"vdd0AH0evz29HlU2ZLMFt5MQelU=",
	"expire":1509527810,
	"dir":"dgjx\/"}';
	$str3 = '"accessid":"LsBbv8YlGb6GAw3h",
	"host":"http:\/\/mor-eyoo.oss-cn-shenzhen.aliyuncs.com",
	"policy":"eyJleHBpcmF0aW9uIjoiMjAxNy0xMS0wMlQxNToxMDoxNloiLCJjb25kaXRpb25zIjpbWyJjb250ZW50LWxlbmd0aC1yYW5nZSIsMCwxMDQ4NTc2MDAwXSxbInN0YXJ0cy13aXRoIiwiJGtleSIsImRnanhcLyJdXX0=",
	"signature":"U9oDGLmSY8o+r9sk2sZKgdmvv6U=",
	"expire":1509606616,
	"callback":"eyJjYWxsYmFja1VybCI6Imh0dHA6XC9cL2ZpbGVzLm1hbGwxMjYuY29tXC9maWxlc1wvYWxpeXVub3NzdmFsaWRcL3ZhbGlkYXRlIiwiY2FsbGJhY2tCb2R5IjoiZmlsZW5hbWU9JHtvYmplY3R9JnNpemU9JHtzaXplfSZtaW1lVHlwZT0ke21pbWVUeXBlfSZoZWlnaHQ9JHtpbWFnZUluZm8uaGVpZ2h0fSZ3aWR0aD0ke2ltYWdlSW5mby53aWR0aH0iLCJjYWxsYmFja0JvZHlUeXBlIjoiYXBwbGljYXRpb25cL3gtd3d3LWZvcm0tdXJsZW5jb2RlZCJ9",
	"dir":"dgjx"}';
//	echo $str3;
	
//	$pol_0 = 'eyJleHBpcmF0aW9uIjoiMjAxNy0xMS0wMVQxNzoxNjo1MFoiLCJjb25kaXRpb25zIjpbWyJjb250ZW50LWxlbmd0aC1yYW5nZSIsMCwxMDQ4NTc2MDAwXSxbInN0YXJ0cy13aXRoIiwiJGtleSIsImRnanhcLyJdXX0=';
//	$pol_1 = base64_decode($pol_0);
//	$pol_2 = json_decode($pol_1);
//	print_r($pol_2);
//	echo strtotime("2017-11-01 20:50:00")."<br/>".strtotime("2017-11-01 20:51:00");
?>

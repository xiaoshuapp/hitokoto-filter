<?php
    // 读取文件
    $file = "sentences/sentences/k.json"; // 文件名
    $r_file = fopen($file, "r") or die("Unable to open file!");
    if(filesize($file) > 0) 
        $data = fread($r_file,filesize($file));
    fclose($r_file);


    if(isset($data)) {
        // 从json文件中读取数据
        $a =  json_decode($data,true);
        // 过滤内容
        for($x=0;isset($a[$x]);$x++) {
            if($a[$x]["creator"] !== "折影轻梦") {
                unset($a[$x]);
            }
        }

        shuffle($a);
        // 打印内容
        print_r($a);
    }
    
    // 写入文件
    $w_file = fopen("hitokoto.json", "w") or die("Unable to open file!");
    fwrite($w_file, json_encode($a));
    fclose($w_file);
?>
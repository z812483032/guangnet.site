<?PHP
    /*
     | Submail log/message API demo
     | SUBMAIL SDK Version 2.5 --PHP
     | copyright 2011 - 2016 SUBMAIL
     |--------------------------------------------------------------------------
     */
    
    /*
     |载入 app_config 文件
     |--------------------------------------------------------------------------
     */
    require '../app_config.php';

    /*
     |载入 SUBMAILAutoload 文件
     |--------------------------------------------------------------------------
     */
    
    require_once('../SUBMAILAutoload.php');
    
    /*
     |初始化 MESSAGELog 类
     |--------------------------------------------------------------------------
     */
    
    $submail=new MESSAGELog($message_configs);
    
    /*
     |设置获取仅包含该项目标识（即模板标记）的日志
     |--------------------------------------------------------------------------
     */
    
    //    $submail->setProject('Gy1CR1');
    
    /*
     |设置获取仅包含该联系人的日志
     |--------------------------------------------------------------------------
     */
    
    //    $submail->setRecipient('18*********');
    
    /*
     |设置获取仅包含该状态的日志
     |--------------------------------------------------------------------------
     */
    
    //$submail->setResultStatus('dropped');
    
    /*
     |设置日志的开始日期和时间
     |默认 请求当日的 00:00:00
     |Y-m-d H:i:s 或 Y/m/d H:i:s
     |--------------------------------------------------------------------------
     */
    
    //    $submail->setStartDate('2015/03/01 00:00:00');
    
    /*
     |设置日志的结束日期和时间
     |默认 请求当日的 23:59:59
     |Y-m-d H:i:s 或 Y/m/d H:i:s
     |--------------------------------------------------------------------------
     */
    
    //    $submail->setEndDate('2015/03/03 23:00:00');
    
    /*
     |设置日志返回的行数
     |默认 50
     |最小 10，最大1000
     |--------------------------------------------------------------------------
     */
    
    //    $submail->setRows(100);
    
    /*
     |设置日志返回的行数的偏移范围（实际偏移数为该值*行数 即 offset*rows）
     |默认 0
     |--------------------------------------------------------------------------
     */
    
    //    $submail->setOffset(0);
    
    /*
     |--------------------------------------------------------------------------
     */
    
    print_r($submail->log());

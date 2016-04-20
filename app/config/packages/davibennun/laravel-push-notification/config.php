<?php

return array(

    'com.fomr.tasty'  => array(
        'environment' =>'production',
        'certificate' =>app_path().'/cert/push.pem',
        'passPhrase'  =>'tastyfoodsinc2016',
        'service'     =>'apns'
    ),
    'Tasty' => array(
        'environment' =>'production',
        'apiKey'      =>'AIzaSyDVnk9AlH4812qu4WeY6sX6tdr_m3F6bXc',
        'service'     =>'gcm'
    ),

    'HappyDelivery' => array(
        'environment' =>'production',
        'apiKey'      =>'AIzaSyB_IVj-J7blsBC5cKY27Yt4c7muLvZ2N3M',
        'service'     =>'gcm'
    )


);
<?php
return array(
    // set your paypal credential
    'client_id' => 'AWUGX1Gr9PRDv3FQ-MF8uz2aV6075D57D_Sr87dw5xOs9i1Op5E4zbxH0PLut9i6Oa23vsyMzk79-jKE',
    'secret' => 'ELmZyVCCVRN7brnNaGpOBvr1qCdC5M3dMHV9aPuMvt2nwrocU2jHXzOC6Ft84ShBLzAqKwzbFYWD9zdC',

    /**
     * SDK configuration
     */
    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'sandbox',

        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 12000,

        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,

        /**
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/paypal.log',

        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
    ),
);
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    namespace Zenoph\Notify\Enums;
    
    class RequestHandshake {
        const HSHK_OK = 0;
        const HSHK_ERR_RH_HTTP_ACCEPT  = 1101;
        const HSHK_ERR_RH_CONTENT_TYPE = 1102;
        
        // GROUP ID: 12
        const HSHK_ERR_UA_MODEL         = 1201;
        const HSHK_ERR_UA_PID           = 1202;
        const HSHK_ERR_UA_AUTH          = 1203;
        const HSHK_ERR_UA_API_NO_ACCESS = 1204;
        const HSHK_ERR_UA_API_NO_PPASS  = 1205;
        
        // Unable to understand request. GROUP_ID 14
        const HSHK_ERR_DATA          = 1401;
        const HSHK_ERR_BAD_REQUEST   = 1402;
        const HSHK_ERR_INTERNAL      = 1403;
        const HSHK_ERR_UNKNOWN       = 1404;
        const HSHK_ERR_ACCESS_DENIED = 1405;
        const HSHK_ERR_API_RETIRED   = 1406;
        const HSHK_ERR_SERVICE       = 1407;
        const HSHK_ERR_ACCT_INACTIVE = 1408;
        const HSHK_ERR_ACCT_SUSPENDED = 1409;
        
    /*    // Delivery requests. GROUP_ID: 15
        const HSHK_ERR_DR_MESSAGE_ID     = 1501;
        const HSHK_ERR_DR_DESTINATION_ID = 1502; */
        
        // GROUP ID: 15
        const HSHK_ERR_MR_TEMPLATE_ID   = 1501;
        const HSHK_ERR_MR_DESTINATIONS  = 1502;
        const HSHK_ERR_MR_PARAMETER     = 1503;
        const HSHK_ERR_MR_QUERY_TIME    = 1504;
        const HSHK_ERR_MR_VOICE_FILE    = 1505;
        const HSHK_ERR_MR_VOICE_SIZE    = 1506;                
                
        // GROUP ID: 18 (for scheduled messages requests)
        const HSHK_ERR_SM_SUBMITTED     = 1801;
        const HSHK_ERR_SM_NOT_SCHEDULED = 1802;
        const HSHK_ERR_SM_MESSAGE       = 1803;
        const HSHK_ERR_SM_CATEGORY      = 1804;
        const HSHK_ERR_SM_DATETIME      = 1805;
        const HSHK_ERR_SM_MESSAGE_VARS  = 1806;
        const HSHK_ERR_SM_INTERNAL      = 1807;
    }

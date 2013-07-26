<?php
/**
 * Description of Tracking
 *
 * @author matt
 */
abstract class Tracking {
    
    const PROTOCOL_VERSION = '1';
    const ENDPOINT_HTTP = 'http://www.google-analytics.com/collect';
    const ENDPOINT_HTTPS = 'https://ssl.google-analytics.com/collect';
    
    /**
     * Tracking ID / Web Property ID
     * The tracking ID / web property ID. The format is UA-XXXX-Y. 
     * All collected data is associated by this ID.
     * 
     * @var string
     */
    private $trackingId; 
    
    
    /**
     * Anonymize IP
     * 
     * When present, the IP address of the sender will be anonymized. 
     * For example, the IP will be anonymized if any of the following 
     * parameters are present in the payload: &aip=, &aip=0, or &aip=1
     * 
     * @var type 
     */
    private $anonymizeIp = false;
    
    
    /**
     * Queue Time
     * 
     * Used to collect offline / latent hits. 
     * The value represents the time delta (in milliseconds) between when the 
     * hit being reported occurred and the time the hit was sent. 
     * The value must be greater than or equal to 0. 
     * Values greater than four hours may lead to hits not being processed.
     * 
     * @var integer 
     */
    private $queueTime;
    
    
    /**
     * Cache Buster
     * 
     * Used to send a random number in GET requests to ensure browsers and 
     * proxies don't cache hits. It should be sent as the final parameter of 
     * the request since we've seen some 3rd party internet filtering software 
     * add additional parameters to HTTP requests incorrectly. 
     * This value is not used in reporting.
     * 
     * @var string 
     */
    private $cacheBuster;
    
    
    
    /**
     * Client Id
     * 
     * Required for all hit types. 
     * This anonymously identifies a particular user, device, or browser 
     * instance. For the web, this is generally stored as a first-party cookie 
     * with a two-year expiration. For mobile apps, this is randomly generated 
     * for each particular instance of an application install. 
     * The value of this field should be a random UUID (version 4) as 
     * described in http://www.ietf.org/rfc/rfc4122.txt
     * 
     * @var string 
     */
    private $clientId;
    
    
    /**
     * Session Control
     * 
     * Used to control the session duration. A value of 'start' forces a new 
     * session to start with this hit and 'end' forces the current session to 
     * end with this hit. All other values are ignored.
     * 
     * @var string 
     */
    private $sessionControl;
    
    
    /**
     * Document Referrer
     * 
     * Specifies which referral source brought traffic to a website. 
     * This value is also used to compute the traffic source. 
     * The format of this value is a URL.
     * 
     * @var string 
     */
    private $referrer;
    
    
    /**
     * Campaign Name
     * 
     * Specifies the campaign name.
     * 
     * @var string 
     */
    private $campaignName;
    
    /**
     * Campaign Source
     * 
     * Specifies the campaign source.
     * 
     * @type string
     */
    private $campaignSource;
    
    
    /**
     * Campaign Medium
     * 
     * Specifies the campaign medium.
     * @var string 
     */
    private $campaignMedium;
    
    
    /**
     * Campaign Keyword
     * 
     * @var string 
     */
    private $campaignKeyword;
    
    
    /**
     *
     * @var type 
     */
    private $campaignContent;
    
    
    private function getCacheBuster() {
        return microtime(true);
    }
    
    private function doRequest() {
        
    }
    
}

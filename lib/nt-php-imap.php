<?php
/**
 * nt-php-imap.php - Main Library File with all functions 
 *
 * @package nt-php-imap
 */
require_once("../vendor/autoload.php");

/**
 * imap_8bit - Convert an 8bit string to a quoted-printable string
 * Ref: https://www.php.net/manual/en/function.imap-8bit.php
 **/
if(!function_exists('imap_8bit')) {
  $errors = [];
  function imap_8bit($str_8bit) {
    return quoted_printable_encode($str_8bit);
  }
}


/**
 * imap_alerts - Returns all IMAP alert messages that have occurred
 * Ref: https://www.php.net/manual/en/function.imap-alerts.php
 **/
//unverified
if(!function_exists('imap_alerts')) {
  function imap_alerts() {
    global $imap_stream;
    return $imap_stream->alerts();
  }
}


/**
 * imap_append - Append a string message to a specified mailbox
 * Ref: https://www.php.net/manual/en/function.imap-append.php
 **/

 //unverified
if(!function_exists('imap_append')) {
  function imap_append($imap_stream, string $mailbox, string $message, string $options = NULL, string $internal_date = NULL) {
    $imap_stream->openMailbox($mailbox);
    $result = $imap_stream->append($mailbox,$message);
    if(!empty($result)){
      return true;
    }else{
      return false;
    }
  }
}


/**
 * imap_base64 - Decode BASE64 encoded text
 * Ref: https://www.php.net/manual/en/function.imap-base64.php
 **/
if(!function_exists('imap_base64')) {
  function imap_base64($str_base64) {
    return base64_decode($str_base64,true);
  }
}


/**
 * imap_binary - Convert an 8bit string to a base64 string
 * Ref: https://www.php.net/manual/en/function.imap-binary.php
 **/
if(!function_exists('imap_binary')) {
  function imap_binary($str_8bit) {
    return base64_encode($str_8bit);
  }
}


/**
 * imap_body - Read the message body
 * Ref: https://www.php.net/manual/en/function.imap-body.php
 **/
if(!function_exists('imap_body')) {
  //incomplete
  /*The optional options are a bit mask with one or more of the following:

  FT_UID - The msg_number is a UID
  FT_PEEK - Do not set the \Seen flag if not already set
  FT_INTERNAL - The return string is in internal format, will not canonicalize to CRLF.*/

  define('FT_UID',1);
  define('FT_PEEK',2);
  define('FT_INTERNAL', 3);

  function imap_body($imap_stream, int $msg_number, int $options = 0) {
    $uid = imap_uid($msg_number);
    return $imap_stream->fetchFromSectionString($imap_stream->currentMailbox(),$uid); 
  }
}


/**
 * imap_bodystruct - Read the structure of a specified body section of a specific message
 * Ref: https://www.php.net/manual/en/function.imap-bodystruct.php
 **/
if(!function_exists('imap_bodystruct')) {
  //unverified | incomplete
  function imap_bodystruct($imap_stream , int $msg_number , string $section){
    $uid = imap_uid($msg_number);
    return $imap_stream->fetchFromSectionString($imap_stream->currentMailbox(),$uid,$section);
  }
}


/**
 * imap_check - Check current mailbox
 * Ref: https://www.php.net/manual/en/function.imap-check.php
 **/
if(!function_exists('imap_check')) {
  //unverified | incomplete
  /*Returns the information in an object with following properties:

    Date - current system time formatted according to » RFC2822
    Driver - protocol used to access this mailbox: POP3, IMAP, NNTP
    Mailbox - the mailbox name
    Nmsgs - number of messages in the mailbox
    Recent - number of recent messages in the mailbox
    
    Returns FALSE on failure.*/
  function imap_check($imap_stream) {
    return $imap_stream->currentMailbox();
  }
}


/**
 * imap_clearflag_full - Clears flags on messages
 * Ref: https://www.php.net/manual/en/function.imap-clearflag-full.php
 **/
if(!function_exists('imap_clearflag_full')) {
  //unverified | incomplete
  define('ST_UID', 1);
  function imap_clearflag_full($imap_stream , string $sequence , string $flag, int $options = 0 ) {
    
    try{
      $sequences = explode(",",$sequence);
    
      if($options){
        $obj = new Horde_Imap_Client_Ids($sequences);
      }else{
        $obj = new Horde_Imap_Client_Ids($sequences,true);
      }

      $current = $imap_stream->currentMailbox();
      $imap_stream->store($current['mailbox'],[
        "remove" => [$flag],
        "ids" => $obj
      ]);

      return true;
    }catch (Horde_Imap_Client_Exception $e){
      return false;
    }
  }
}


/**
 * imap_close - Close an IMAP stream
 * Ref: https://www.php.net/manual/en/function.imap-close.php
 **/
if(!function_exists('imap_close')) {
  //unverfified
  define('CL_EXPUNGE',1);
  function imap_close($imap_stream, int $flag = 0) {
    try{
      if($flag!=0){
        $imap_stream->close([
          "expunge" => true
        ]);
      }else{
        $imap_stream->close();
      }

      return true;
    }catch(Horde_Imap_Client_Exception $e){
      return false;
    }
  }
}


/**
 * imap_create - Alias of imap_createmailbox
 * Ref: https://www.php.net/manual/en/function.imap-create.php
 **/
if(!function_exists('imap_create')) {
  function imap_create($imap_stream,$mailbox) {
    $result = imap_createmailbox($imap_stream,$mailbox);
    return $result;
  }
}


/**
 * imap_createmailbox - Create a new mailbox
 * Ref: https://www.php.net/manual/en/function.imap-createmailbox.php
 **/
if(!function_exists('imap_createmailbox')) {
  //unverified
  function imap_createmailbox($imap_stream, $mailbox) {
    try{
      $new = new Horde_Imap_Client_Mailbox($mailbox);
      $imap_stream->createMailbox($new['mailbox']);
      return true;
    }catch(Horde_Imap_Client_Exception $e){
      return false;
    }
    
  }
}


/**
 * imap_delete - Mark a message for deletion from current mailbox
 * Ref: https://www.php.net/manual/en/function.imap-delete.php
 **/
if(!function_exists('imap_delete')) {
  //unverified
  function imap_delete($imap_stream ,$msg_number,$options = 0) {
    try{
      
      if($options){
        $id = new Horde_Imap_Client_Ids([$msg_number]);
      }else{
        $id = new Horde_Imap_Client_Ids([$msg_number],true);
      }
      $current = $imap_stream->currentMailbox();
      $imap_stream->store($current['mailbox'], array(
          'ids' => $id,
          'add' => array(Horde_Imap_Client::FLAG_DELETED)
      ));
      return true;
    }catch (Horde_Imap_Client_Exception $e){
      return false;
    }
  }
}


/**
 * imap_deletemailbox - Delete a mailbox
 * Ref: https://www.php.net/manual/en/function.imap-deletemailbox.php
 **/
if(!function_exists('imap_deletemailbox')) {
  //unverified
  function imap_deletemailbox($imap_stream, $mailbox) {
    try{
      $current = new Horde_Imap_Client_Mailbox($mailbox);
      $imap_stream->deleteMailbox($current['mailbox']);
      return true;
     }catch (Horde_Imap_Client_Exception $e){
        return false;
     }
  }
}


/**
 * imap_errors - Returns all of the IMAP errors that have occurred
 * Ref: https://www.php.net/manual/en/function.imap-errors.php
 **/
if(!function_exists('imap_errors')) {
  //unverified
  //errors to be added at all exceptions
  function imap_errors() {
    global $errors;
    $temp = $errors;
    unset($GLOBALS['errors']);
    $errors = [];
    return $temp;
  }
}


/**
 * imap_expunge - Delete all messages marked for deletion
 * Ref: https://www.php.net/manual/en/function.imap-expunge.php
 **/
if(!function_exists('imap_expunge')) {
  function imap_expunge( $imap_stream) {
    try{
        $current = $imap_stream->currentMailbox();
        $imap_stream->expunge($current['mailbox']);
        return true;
     }catch (Horde_Imap_Client_Exception $e){
        return false;
     }
  }
}


/**
 * imap_fetch_overview - Read an overview of the information in the headers of the given message
 * Ref: https://www.php.net/manual/en/function.imap-fetch-overview.php
 **/
//incomplete
if(!function_exists('imap_fetch_overview')) {
  function imap_fetch_overview($imap_stream, string $sequence, int $options = 0) {
    $current = $imap_stream->currentMailbox();
    $query = new Horde_Imap_Client_Fetch_Query();
    $query->structure();

    if($options){ //uid given
      $arr = explode(",",$sequence);
      if(count($arr) >= 2){
          $uid = [];
          $max = count($arr);
          for($i=0;$i<$max;$i++){
            $uid[$i] = new Horde_Imap_Client_Ids($arr[$i]);
          }

      }else{
        $arr = explode(":",$sequence);
        if(count($arr) == 2){
           $uid = [];
           $j=0;
           for($i=$arr[0]; $i<$arr[1];$i++){
              $uid[$j]= new Horde_Imap_Client_Ids($i);
              $j++;
           } 
        }
      }

    }else{
      $arr = explode(",",$sequence);
      if(count($arr) >= 2){
          $uid = [];
          $max = count($arr);
          for($i=0;$i<$max;$i++){
            $uid[$i] = imap_uid($arr[$i]);
          }
      }else{
        $arr = explode(":",$sequence);
        if(count($arr) == 2){
           $uid = [];
           $j=0;
           for($i=$arr[0]; $i<$arr[1];$i++){
              $uid[$j]=imap_uid($i);
              $j++;
           } 
        }else{
          $obj = new stdClass;
          return $obj;
        }
      }
    }

    $results = $imap_stream->fetch($current['mailbox'], $query, array(
      'ids' => $uid
    ));

    $structure = [];
    $i=0;
    foreach($results as $result){
      $structure[$i] = $result->getStructure();
      $i++;
    }

    return $structure;

  }
}


/**
 * imap_fetchbody - Fetch a particular section of the body of the message
 * Ref: https://www.php.net/manual/en/function.imap-fetchbody.php
 **/
//incomplete
if(!function_exists('imap_fetchbody')) {
  function imap_fetchbody($imap_stream , int $msg_number , string $section, int $options = 0) {
    $current = $imap_stream->currentMailbox();
    $query = new Horde_Imap_Client_Fetch_Query();
    $query->structure();

    $uid = imap_uid($msg_number);

    $result = $imap_stream->fetch($current['mailbox'], $query, array(
      'ids' => $uid
    ));
  }
}


/**
 * imap_fetchheader - Returns header for a message
 * Ref: https://www.php.net/manual/en/function.imap-fetchheader.php
 **/
if(!function_exists('imap_fetchheader')) {
  
  define('FT_UID',1);
  define('FT_INTERNAL',2);
  define('FT_PREFETCHTEXT',3);

  function imap_fetchheader($imap_stream , int $msg_number, int $options = 0) {
    
  }
}


/**
 * imap_fetchmime - Fetch MIME headers for a particular section of the message
 * Ref: https://www.php.net/manual/en/function.imap-fetchmime.php
 **/
if(!function_exists('imap_fetchmime')) {
  function imap_fetchmime($imap_stream , int $msg_number , string $section, int $options = 0) {
  }
}


/**
 * imap_fetchstructure - Read the structure of a particular message
 * Ref: https://www.php.net/manual/en/function.imap-fetchstructure.php
 **/
if(!function_exists('imap_fetchstructure')) {
  function imap_fetchstructure(resource $imap_stream , int $msg_number, int $options = 0) {
  }
}


/**
 * imap_fetchtext - Alias of imap_body
 * Ref: https://www.php.net/manual/en/function.imap-fetchtext.php
 **/
if(!function_exists('imap_fetchtext')) {
  function imap_fetchtext() {
    imap_body();
  }
}


/**
 * imap_gc - Clears IMAP cache
 * Ref: https://www.php.net/manual/en/function.imap-gc.php
 **/
//incomplete
if(!function_exists('imap_gc')) {
  define('IMAP_GC_ELT',1);
  define('IMAP_GC_ENV',2);
  define('IMAP_GC_TEXTS',3);

  function imap_gc($imap_stream,int $caches) {
    try{
      $imap_stream->$cache->deleteMailbox();
      return true;
    }catch(Horde_Imap_Client_Exception $e){
      return false;
    }
  }
}


/**
 * imap_get_quota - Retrieve the quota level settings, and usage statics per mailbox
 * Ref: https://www.php.net/manual/en/function.imap-get-quota.php
 **/
if(!function_exists('imap_get_quota')) {
  function imap_get_quota($imap_stream,$quota_root) {
    return $imap_stream->getQuota($quota_root);
  }
}


/**
 * imap_get_quotaroot - Retrieve the quota settings per user
 * Ref: https://www.php.net/manual/en/function.imap-get-quotaroot.php
 **/
if(!function_exists('imap_get_quotaroot')) {
  function imap_get_quotaroot($imap_stream,$quota_root) {
    return $imap_stream->getQuotaRoot($quota_root);
  }
}


/**
 * imap_getacl - Gets the ACL for a given mailbox
 * Ref: https://www.php.net/manual/en/function.imap-getacl.php
 **/
if(!function_exists('imap_getacl')) {
  function imap_getacl( resource $imap_stream , string $mailbox) {
    return $imap_stream->getACL($mailbox);
  }
}


/**
 * imap_getmailboxes - Read the list of mailboxes, returning detailed information on each one
 * Ref: https://www.php.net/manual/en/function.imap-getmailboxes.php
 **/
if(!function_exists('imap_getmailboxes')) {
  function imap_getmailboxes($imap_stream , string $ref , string $pattern ) {
    return $imap_stream->listMailboxes($pattern);
  }
}


/**
 * imap_getsubscribed - List all the subscribed mailboxes
 * Ref: https://www.php.net/manual/en/function.imap-getsubscribed.php
 **/
if(!function_exists('imap_getsubscribed')) {
  function imap_getsubscribed($imap_stream , string $ref , string $pattern) {
    return $imap_stream->listMailboxes($pattern,Horde_Imap_Client::MBOX_SUBSCRIBED_EXISTS);
  }
}


/**
 * imap_header - Alias of imap_headerinfo
 * Ref: https://www.php.net/manual/en/function.imap-header.php
 **/
if(!function_exists('imap_header')) {
  function imap_header() {
    imap_headerinfo();
  }
}


/**
 * imap_headerinfo - Read the header of the message
 * Ref: https://www.php.net/manual/en/function.imap-headerinfo.php
 **/
if(!function_exists('imap_headerinfo')) {
  function imap_headerinfo() {
  }
}


/**
 * imap_headers - Returns headers for all messages in a mailbox
 * Ref: https://www.php.net/manual/en/function.imap-headers.php
 **/
if(!function_exists('imap_headers')) {
  function imap_headers($imap_stream) {
    $query = new Horde_Imap_Client_Fetch_Query();
    $query->envelope();
    $query->structure();

    $mailbox = $imap_stream->currentMailbox();
    if(is_array($mailbox)){
      $curMailBox = $mailbox["mailbox"];
      $messages = $imap_stream->fetch($curMailBox, $query);
      $headers = array();
      foreach($messages as $message){
        $envelope = $message->getEnvelope();
        $flags = $message->getFlags();

        $msghdr = array();
        $msghdr['recipients'] = $envelope->to->bare_addresses;
        $msghdr['senders']    = $envelope->from->bare_addresses;
        $msghdr['cc']         = $envelope->cc->bare_addresses;
        $msghdr['bcc']         = $envelope->bcc->bare_addresses;
        $msghdr['subject']    = $envelope->subject;
        $msghdr['timestamp']  = $envelope->date->getTimestamp();
        $msghdr['flags'] = $flags;

        array_push($headers,$msghdr);
      }
      return $headers;
    }else{
      return array();
    }

  }
}


/**
 * imap_last_error - Gets the last IMAP error that occurred during this page request
 * Ref: https://www.php.net/manual/en/function.imap-last-error.php
 **/
if(!function_exists('imap_last_error')) {
  function imap_last_error() {
  }
}


/**
 * imap_list - Read the list of mailboxes
 * Ref: https://www.php.net/manual/en/function.imap-list.php
 **/
if(!function_exists('imap_list')) {
  function imap_list($imap_stream , string $ref , string $pattern) {
    return $imap_stream->listMailboxes($pattern);
  }
}


/**
 * imap_listmailbox - Alias of imap_list
 * Ref: https://www.php.net/manual/en/function.imap-listmailbox.php
 **/
if(!function_exists('imap_listmailbox')) {
  function imap_listmailbox($imap_stream, $ref,$pattern) {
    imap_list($imap_stream, $ref,$pattern);
  }
}


/**
 * imap_listscan - Returns the list of mailboxes that matches the given text
 * Ref: https://www.php.net/manual/en/function.imap-listscan.php
 **/
if(!function_exists('imap_listscan')) {
  function imap_listscan($imap_stream , string $ref , string $pattern , string $content) {
    $mailBoxes = $imap_stream->listMailboxes($pattern);
    $selMailBoxes = array();

    foreach($mailBoxes as $mailBox){
      $curMailBox = $mailBox['mailbox'];
      $tmp = strtolower($curMailBox->utf8);
      if(strpos($tmp,$content) || $tmp==$content){
          array_push($selMailBoxes,$mailBox);
      }
    }
    return $selMailBoxes;
  }
}


/**
 * imap_listsubscribed - Alias of imap_lsub
 * Ref: https://www.php.net/manual/en/function.imap-listsubscribed.php
 **/
if(!function_exists('imap_listsubscribed')) {
  function imap_listsubscribed($imap_stream , string $ref , string $pattern ) {
    imap_lsub($imap_stream,$ref,$pattern );
  }
}


/**
 * imap_lsub - List all the subscribed mailboxes
 * Ref: https://www.php.net/manual/en/function.imap-lsub.php
 **/
if(!function_exists('imap_lsub')) {
  function imap_lsub($imap_stream , string $ref , string $pattern ) {
    return $imap_stream->listMailboxes($pattern,Horde_Imap_Client::MBOX_SUBSCRIBED_EXISTS);
  }
}


/**
 * imap_mail_compose - Create a MIME message based on given envelope and body sections
 * Ref: https://www.php.net/manual/en/function.imap-mail-compose.php
 **/
if(!function_exists('imap_mail_compose')) {
  function imap_mail_compose(array $envelope , array $body) {
  }
}


/**
 * imap_mail_copy - Copy specified messages to a mailbox
 * Ref: https://www.php.net/manual/en/function.imap-mail-copy.php
 **/
if(!function_exists('imap_mail_copy')) {
  
  define('CP_UID', '01');
  define('CP_MOVE','10');

  function imap_mail_copy($imap_stream, $msglist, $mailbox,$options = 0) {
    $source = $imap_stream->currentMailbox();
    if(isset($source['mailbox'])){
      $imap_stream->copy($source['mailbox'],$mailbox,[
        "ids" => $msglist,
        "move" => $options=="11" ? true:false 
      ]);
      
    }else{
      return false;
    }
    
  }
}


/**
 * imap_mail_move - Move specified messages to a mailbox
 * Ref: https://www.php.net/manual/en/function.imap-mail-move.php
 **/
if(!function_exists('imap_mail_move')) {
  function imap_mail_move($imap_stream, $msglist,$mailbox,$options=0) {
    $source = $imap_stream->currentMailbox();
    if(isset($source['mailbox'])){
      $imap_stream->copy($source['mailbox'],$mailbox,[
        "ids" => $msglist,
        "move" => true 
      ]);
      
    }else{
      return false;
    }
  }
}


/**
 * imap_mail - Send an email message
 * Ref: https://www.php.net/manual/en/function.imap-mail.php
 **/
if(!function_exists('imap_mail')) {
  function imap_mail($to ,$subject,$message) {
    $result = mail($to,$subject,$message);
    return $result;
  }
}


/**
 * imap_mailboxmsginfo - Get information about the current mailbox
 * Ref: https://www.php.net/manual/en/function.imap-mailboxmsginfo.php
 **/
if(!function_exists('imap_mailboxmsginfo')) {
  function imap_mailboxmsginfo( $imap_stream) {
    $current = $imap_stream->currentMailbox();
    return $imap_stream->status($current['mailbox']);
  }
}


/**
 * imap_mime_header_decode - Decode MIME header elements
 * Ref: https://www.php.net/manual/en/function.imap-mime-header-decode.php
 **/
if(!function_exists('imap_mime_header_decode')) {
  function imap_mime_header_decode() {

  }
}


/**
 * imap_msgno - Gets the message sequence number for the given UID
 * Ref: https://www.php.net/manual/en/function.imap-msgno.php
 **/
if(!function_exists('imap_msgno')) {
  function imap_msgno() {
  }
}


/**
 * imap_mutf7_to_utf8 - Decode a modified UTF-7 string to UTF-8
 * Ref: https://www.php.net/manual/en/function.imap-mutf7-to-utf8.php
 **/
if(!function_exists('imap_mutf7_to_utf8')) {
  function imap_mutf7_to_utf8() {
  }
}


/**
 * imap_num_msg - Gets the number of messages in the current mailbox
 * Ref: https://www.php.net/manual/en/function.imap-num-msg.php
 **/
if(!function_exists('imap_num_msg')) {
  function imap_num_msg($imap_stream) {
    $data = $imap_stream->currentMailbox();

    $query = new Horde_Imap_Client_Search_Query();
    $results = $imap_stream->search($data['mailbox'], $query);

    $query = new Horde_Imap_Client_Fetch_Query();
    $query->envelope();
    $query->structure();

    $all = $imap_stream->fetch($data['mailbox'], $query, array('ids' => $results['match']));
    return $all->count();
  }
}


/**
 * imap_num_recent - Gets the number of recent messages in current mailbox
 * Ref: https://www.php.net/manual/en/function.imap-num-recent.php
 **/
if(!function_exists('imap_num_recent')) {
  function imap_num_recent($imap_stream) {
      $data = $imap_stream->currentMailbox();

      $query = new Horde_Imap_Client_Search_Query();
      $query->flag('\Recent');
      
      $results = $imap_stream->search($data['mailbox'], $query);

      $query = new Horde_Imap_Client_Fetch_Query();
      $query->envelope();
      $query->structure();

      $all = $imap_stream->fetch($data['mailbox'], $query, array('ids' => $results['match']));
      return $all->count();
  }
}


/**
 * imap_open - Open an IMAP stream to a mailbox
 * Ref: https://www.php.net/manual/en/function.imap-open.php
 **/
if(!function_exists('imap_open')) {
  
  function imap_open(string $mailbox, string $username, string $password, int $options = 0, int $n_retries = 0, array $params = array() ) {
     
    if(is_empty($mailbox)){
        return null;
      }
      else{
        $tmp = explode(":",$mailbox);
      
        $host = substr($tmp[0],1);
        $port = filter_var($mailbox, FILTER_SANITIZE_NUMBER_INT);
        $folder =  explode("}",$tmp[1]);

        if(isset($folder[1])){
          $folder = $folder[1];
        }else{
          $folder = null;
        }  

        $protocol = false;
        
        $tmp[1] = strtolower($tmp[1]);
        if(strpos($tmp[1], 'ssl') !== false) {
          $protocol = "ssl";
        }
        
        if(strpos($tmp[1], 'sslv2') !== false) {
          $protocol = "sslv2";
        }

        if(strpos($tmp[1], 'sslv3') !== false) {
          $protocol = "sslv3";
        }

        if(strpos($tmp[1], 'tls') !== false) {
          $protocol = "tls";
        }

        if(strpos($tmp[1], 'tlsv1') !== false) {
          $protocol = "tlsv1";
        }

      
      
        $client = new Horde_Imap_Client_Socket(array(
          'username' => $username,
          'password' => $password,
          'hostspec' => $host,
          'port' => $port,
          'secure' => $protocol, //ssl,tls etc
        
          // OPTIONAL Debugging. Will output IMAP log to the /tmp/foo file
          'debug' => '/tmp/foo',
        
          // OPTIONAL Caching. Will use cache files in /tmp/hordecache.
          // Requires the Horde/Cache package, an optional dependency to
          // Horde/Imap_Client.
          'cache' => array(
              'backend' => new Horde_Imap_Client_Cache_Backend_Cache(array(
                  'cacheob' => new Horde_Cache(new Horde_Cache_Storage_File(array(
                      'dir' => '/tmp/hordecache'
                  )))
              ))
          )
        ));
        
        $client->login();

        if(!empty($folder)){
          $client->openMailbox($folder);
        }
      
        return $client;
        
      }
  }
}


/**
 * imap_ping - Check if the IMAP stream is still active
 * Ref: https://www.php.net/manual/en/function.imap-ping.php
 **/
if(!function_exists('imap_ping')) {
  function imap_ping($imap_stream) {
  }
}


/**
 * imap_qprint - Convert a quoted-printable string to an 8 bit string
 * Ref: https://www.php.net/manual/en/function.imap-qprint.php
 **/
if(!function_exists('imap_qprint')) {
  function imap_qprint($string) {
    return quoted_printable_decode($string);
  }
}


/**
 * imap_rename - Alias of imap_renamemailbox
 * Ref: https://www.php.net/manual/en/function.imap-rename.php
 **/
if(!function_exists('imap_rename')) {
  function imap_rename($imap_stream, string $old_mbox, string $new_mbox) {
    return imap_renamemailbox($imap_stream,$old_mbox,$new_mbox);
  }
}


/**
 * imap_renamemailbox - Rename an old mailbox to new mailbox
 * Ref: https://www.php.net/manual/en/function.imap-renamemailbox.php
 **/
if(!function_exists('imap_renamemailbox')) {
  function imap_renamemailbox($imap_stream, string $old_mbox, string $new_mbox) {
    try{
      $old = new Horde_Imap_Client_Mailbox($old_mbox);
      $new = new Horde_Imap_Client_Mailbox($new_mbox);
      
      $imap_stream->renameMailbox($old['mailbox'],$new['mailbox']);
      return true;

    }catch (Horde_Imap_Client_Exception $e){
      return false;
    }
  }
}


/**
 * imap_reopen - Reopen IMAP stream to new mailbox
 * Ref: https://www.php.net/manual/en/function.imap-reopen.php
 **/
if(!function_exists('imap_reopen')) {
  function imap_reopen($imap_stream , string $mailbox, int $options = 0, int $n_retries = 0) {
    try{
      
      $imap_stream->openMailbox($mailbox);
      return true;

    }catch (Horde_Imap_Client_Exception $e){
      return false;
    }
  }
}


/**
 * imap_rfc822_parse_adrlist - Parses an address string
 * Ref: https://www.php.net/manual/en/function.imap-rfc822-parse-adrlist.php
 **/
if(!function_exists('imap_rfc822_parse_adrlist')) {
  function imap_rfc822_parse_adrlist($address,$default_host) {

    $emails = explode(",",$address);
    $result = [];
    $i=0;
    foreach($emails as $email){
      $tmp = explode("<",$email);
      if(count($tmp) == 2){
        $personal = $tmp[0];
        $tmp = explode("@",$tmp[1]);
      }else{
        $personal = '';
        $tmp = explode("@",$tmp[0]);
      }

      $mailbox = $tmp[0];

      $result[$i] = new StdClass;
      $result[$i]->mailbox = trim($mailbox);
      $result[$i]->host = trim($default_host);
      $result[$i]->personal = trim($personal);
      
      $i++;  
    }

    return $result;

  }
}


/**
 * imap_rfc822_parse_headers - Parse mail headers from a string
 * Ref: https://www.php.net/manual/en/function.imap-rfc822-parse-headers.php
 **/
if(!function_exists('imap_rfc822_parse_headers')) {
  function imap_rfc822_parse_headers(string $headers, string $defaulthost = "UNKNOWN") {
  }
}


/**
 * imap_rfc822_write_address - Returns a properly formatted email address given the mailbox, host, and personal info
 * Ref: https://www.php.net/manual/en/function.imap-rfc822-write-address.php
 **/
if(!function_exists('imap_rfc822_write_address')) {
  function imap_rfc822_write_address(string $mailbox , string $host , string $personal) {
    $personal = trim($personal);
    $host=trim(strtolower($host));
    $mailbox=trim(strtolower($mailbox));
    
    return $personal." <".$mailbox."@".$host.">"; 
  }
}


/**
 * imap_savebody - Save a specific body section to a file
 * Ref: https://www.php.net/manual/en/function.imap-savebody.php
 **/
if(!function_exists('imap_savebody')) {
  function imap_savebody($imap_stream ,$file , $msg_number, $part_number = "", $options = 0) {
  }
}


/**
 * imap_scan - Alias of imap_listscan
 * Ref: https://www.php.net/manual/en/function.imap-scan.php
 **/
if(!function_exists('imap_scan')) {
  function imap_scan($imap_stream,$ref,$pattern,$content) {
    return imap_listscan($imap_stream,$ref,$pattern,$content);
  }
}


/**
 * imap_scanmailbox - Alias of imap_listscan
 * Ref: https://www.php.net/manual/en/function.imap-scanmailbox.php
 **/
if(!function_exists('imap_scanmailbox')) {
  function imap_scanmailbox($imap_stream,$ref,$pattern,$content) {
    return imap_listscan($imap_stream,$ref,$pattern,$content);
  }
}


/**
 * imap_search - This function returns an array of messages matching the given search criteria
 * Ref: https://www.php.net/manual/en/function.imap-search.php
 **/
if(!function_exists('imap_search')) {
  function imap_search($imap_stream,$criteria,$options,$charset = NULL) {
    try{
      
      $imap_stream->setQuota($imap_stream->currentMailbox(),$criteria,[$options]);
      return true;

    }catch (Horde_Imap_Client_Exception $e){
      return false;
    }
  }
}


/**
 * imap_set_quota - Sets a quota for a given mailbox
 * Ref: https://www.php.net/manual/en/function.imap-set-quota.php
 **/
if(!function_exists('imap_set_quota')) {
  function imap_set_quota($imap_stream, string $quota_root , int $quota_limit) {
    try{
      
      $imap_stream->setQuota($quota_root,$quota_limit);
      return true;

    }catch (Horde_Imap_Client_Exception $e){
      return false;
    }
  }
}


/**
 * imap_setacl - Sets the ACL for a given mailbox
 * Ref: https://www.php.net/manual/en/function.imap-setacl.php
 **/
if(!function_exists('imap_setacl')) {
  function imap_setacl($imap_stream , string $mailbox , string $id , string $rights) {
    try{
      
      if(is_empty($rights)){
        $remove = true;
      }else{
        $remove = false;
      }
      
      $imap_stream->setACL($mailbox,$id,[
        "remove" => $remove,
        "rights" => $rights
      ]);

      return true;
    }catch (Horde_Imap_Client_Exception $e){
      return false;
    }
  }
}


/**
 * imap_setflag_full - Sets flags on messages
 * Ref: https://www.php.net/manual/en/function.imap-setflag-full.php
 **/
if(!function_exists('imap_setflag_full')) {
  function imap_setflag_full() {
  }
}


/**
 * imap_sort - Gets and sort messages
 * Ref: https://www.php.net/manual/en/function.imap-sort.php
 **/
if(!function_exists('imap_sort')) {
  function imap_sort($imap_stream, $criteria,$reverse,$options = 0,$search_criteria = NULL,$charset = NULL ) {
    $sort_obj = new Horde_Imap_Client_Socket_ClientSort($imap_stream);
    $opts = [ 
      "sort" => [ "Horde_Imap_Client::".$criteria ]
    ];

    if($reverse){
      array_push($opts["sort"], Horde_Imap_Client::SORT_REVERSE);
    }

    $source = $imap_stream->currentMailbox(); 
    $query = new Horde_Imap_Client_Search_Query();
    $query->text($search_criteria);

    $search_result = $imap_stream->search($source['mailbox'],$query,$opts);
    return $search_result;
}


/**
 * imap_status - Returns status information on a mailbox
 * Ref: https://www.php.net/manual/en/function.imap-status.php
 **/
if(!function_exists('imap_status')) {
  
  define('SA_MESSAGES',1);
  define('SA_RECENT',2);
  define('SA_UNSEEN',16);
  define('SA_UIDNEXT',4);
  define('SA_UIDVALIDITY',8);
  define('SA_ALL',32);

  function imap_status($imap_stream,$mailbox,$options ) {
    if(!empty($options)){
      return $imap_stream->status($mailbox,$options);
    }
    return $imap_stream->status($mailbox);
  }
}


/**
 * imap_subscribe - Subscribe to a mailbox
 * Ref: https://www.php.net/manual/en/function.imap-subscribe.php
 **/
if(!function_exists('imap_subscribe')) {
  function imap_subscribe($imap_stream, $mailbox) {
    try{
      $current = new Horde_Imap_Client_Mailbox($mailbox);
      $imap_stream->subscribeMailbox($current['mailbox'],true);
      return true;
    }catch (Horde_Imap_Client_Exception $e){
      return false;
    }
  }
}


/**
 * imap_thread - Returns a tree of threaded message
 * Ref: https://www.php.net/manual/en/function.imap-thread.php
 **/
if(!function_exists('imap_thread')) {
  function imap_thread($imap_stream, int $options = SE_FREE) {
    $current = $imap_stream->currentMailbox();
    $thread =  $imap_stream->thread($current['mailbox']);
    return $thread->getRawData();
  }
}


/**
 * imap_timeout - Set or fetch imap timeout
 * Ref: https://www.php.net/manual/en/function.imap-timeout.php
 **/
if(!function_exists('imap_timeout')) {
  function imap_timeout(int $timeout_type, int $timeout = -1) {

  }
}


/**
 * imap_uid - This function returns the UID for the given message sequence number
 * Ref: https://www.php.net/manual/en/function.imap-uid.php
 **/
if(!function_exists('imap_uid')) {
  function imap_uid( resource $imap_stream , int $msg_number) {
  }
}


/**
 * imap_undelete - Unmark the message which is marked deleted
 * Ref: https://www.php.net/manual/en/function.imap-undelete.php
 **/

 //used uid instead of msg_number
if(!function_exists('imap_undelete')) {
  function imap_undelete($imap_stream,int $msg_number,int $flags = 0 ) {
    
    try{
      $current = $imap_stream->currentMailbox();
      $imap_stream->store($current['mailbox'], array(
          'ids' => $msg_number,
          'remove' => array(Horde_Imap_Client::FLAG_DELETED)
      ));
      return true;
    }catch (Horde_Imap_Client_Exception $e){
      return false;
    }

  }
}


/**
 * imap_unsubscribe - Unsubscribe from a mailbox
 * Ref: https://www.php.net/manual/en/function.imap-unsubscribe.php
 **/
if(!function_exists('imap_unsubscribe')) {
  function imap_unsubscribe($imap_stream, $mailbox) {
    try{
      $current = new Horde_Imap_Client_Mailbox($mailbox);
      $imap_stream->subscribeMailbox($current['mailbox'],false);
      return true;
    }catch (Horde_Imap_Client_Exception $e){
      return false;
    }
  }
}


/**
 * imap_utf7_decode - Decodes a modified UTF-7 encoded string
 * Ref: https://www.php.net/manual/en/function.imap-utf7-decode.php
 **/
if(!function_exists('imap_utf7_decode')) {
  function imap_utf7_decode() {
    return mb_convert_encoding( $str, "ISO_8859-1", "UTF7-IMAP" );
  }
}


/**
 * imap_utf7_encode - Converts ISO-8859-1 string to modified UTF-7 text
 * Ref: https://www.php.net/manual/en/function.imap-utf7-encode.php
 **/
if(!function_exists('imap_utf7_encode')) {
  function imap_utf7_encode($str_iso_8859) {
    return mb_convert_encoding( $str_iso_8859, "UTF7-IMAP", "ISO_8859-1" );
  }
}


/**
 * imap_utf8_to_mutf7 - Encode a UTF-8 string to modified UTF-7
 * Ref: https://www.php.net/manual/en/function.imap-utf8-to-mutf7.php
 **/
if(!function_exists('imap_utf8_to_mutf7')) {
  function imap_utf8_to_mutf7($str_utf8) {
    return mb_convert_encoding($str_utf8,'UTF7-IMAP');
  }
}


/**
 * imap_utf8 - Converts MIME-encoded text to UTF-8
 * Ref: https://www.php.net/manual/en/function.imap-utf8.php
 **/
if(!function_exists('imap_utf8')) {
  function imap_utf8($string) {
    return iconv_mime_decode($string,0,"UTF-8");
  }
}
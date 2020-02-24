<?php
/**
 * nt-php-imap.php - Main Library File with all functions 
 *
 * @package nt-php-imap
 */

$imap_alertQueue = [];

/**
 * imap_8bit - Convert an 8bit string to a quoted-printable string
 * Ref: https://www.php.net/manual/en/function.imap-8bit.php
 **/
if(!function_exists('imap_8bit')) {
  function imap_8bit($str_8bit) {
    return quoted_printable_encode($str_8bit);
  }
}


/**
 * imap_alerts - Returns all IMAP alert messages that have occurred
 * Ref: https://www.php.net/manual/en/function.imap-alerts.php
 **/
if(!function_exists('imap_alerts')) {
  function imap_alerts() {
    return count($imap_alertQueue) ? $imap_alertQueue: false;
  }
}


/**
 * imap_append - Append a string message to a specified mailbox
 * Ref: https://www.php.net/manual/en/function.imap-append.php
 **/

 //depends on imap_open
if(!function_exists('imap_append')) {
  function imap_append() {
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
  function imap_body() {
  }
}


/**
 * imap_bodystruct - Read the structure of a specified body section of a specific message
 * Ref: https://www.php.net/manual/en/function.imap-bodystruct.php
 **/
if(!function_exists('imap_bodystruct')) {
  function imap_bodystruct() {
  }
}


/**
 * imap_check - Check current mailbox
 * Ref: https://www.php.net/manual/en/function.imap-check.php
 **/
if(!function_exists('imap_check')) {
  function imap_check() {
  }
}


/**
 * imap_clearflag_full - Clears flags on messages
 * Ref: https://www.php.net/manual/en/function.imap-clearflag-full.php
 **/
if(!function_exists('imap_clearflag_full')) {
  function imap_clearflag_full() {
  }
}


/**
 * imap_close - Close an IMAP stream
 * Ref: https://www.php.net/manual/en/function.imap-close.php
 **/
if(!function_exists('imap_close')) {
  function imap_close() {
  }
}


/**
 * imap_create - Alias of imap_createmailbox
 * Ref: https://www.php.net/manual/en/function.imap-create.php
 **/
if(!function_exists('imap_create')) {
  function imap_create() {
  }
}


/**
 * imap_createmailbox - Create a new mailbox
 * Ref: https://www.php.net/manual/en/function.imap-createmailbox.php
 **/
if(!function_exists('imap_createmailbox')) {
  function imap_createmailbox() {
  }
}


/**
 * imap_delete - Mark a message for deletion from current mailbox
 * Ref: https://www.php.net/manual/en/function.imap-delete.php
 **/
if(!function_exists('imap_delete')) {
  function imap_delete() {
  }
}


/**
 * imap_deletemailbox - Delete a mailbox
 * Ref: https://www.php.net/manual/en/function.imap-deletemailbox.php
 **/
if(!function_exists('imap_deletemailbox')) {
  function imap_deletemailbox() {
  }
}


/**
 * imap_errors - Returns all of the IMAP errors that have occurred
 * Ref: https://www.php.net/manual/en/function.imap-errors.php
 **/
if(!function_exists('imap_errors')) {
  function imap_errors() {
  }
}


/**
 * imap_expunge - Delete all messages marked for deletion
 * Ref: https://www.php.net/manual/en/function.imap-expunge.php
 **/
if(!function_exists('imap_expunge')) {
  function imap_expunge() {
  }
}


/**
 * imap_fetch_overview - Read an overview of the information in the headers of the given message
 * Ref: https://www.php.net/manual/en/function.imap-fetch-overview.php
 **/
if(!function_exists('imap_fetch_overview')) {
  function imap_fetch_overview() {
  }
}


/**
 * imap_fetchbody - Fetch a particular section of the body of the message
 * Ref: https://www.php.net/manual/en/function.imap-fetchbody.php
 **/
if(!function_exists('imap_fetchbody')) {
  function imap_fetchbody() {
  }
}


/**
 * imap_fetchheader - Returns header for a message
 * Ref: https://www.php.net/manual/en/function.imap-fetchheader.php
 **/
if(!function_exists('imap_fetchheader')) {
  function imap_fetchheader() {
  }
}


/**
 * imap_fetchmime - Fetch MIME headers for a particular section of the message
 * Ref: https://www.php.net/manual/en/function.imap-fetchmime.php
 **/
if(!function_exists('imap_fetchmime')) {
  function imap_fetchmime() {
  }
}


/**
 * imap_fetchstructure - Read the structure of a particular message
 * Ref: https://www.php.net/manual/en/function.imap-fetchstructure.php
 **/
if(!function_exists('imap_fetchstructure')) {
  function imap_fetchstructure() {
  }
}


/**
 * imap_fetchtext - Alias of imap_body
 * Ref: https://www.php.net/manual/en/function.imap-fetchtext.php
 **/
if(!function_exists('imap_fetchtext')) {
  function imap_fetchtext() {
  }
}


/**
 * imap_gc - Clears IMAP cache
 * Ref: https://www.php.net/manual/en/function.imap-gc.php
 **/
if(!function_exists('imap_gc')) {
  function imap_gc() {
  }
}


/**
 * imap_get_quota - Retrieve the quota level settings, and usage statics per mailbox
 * Ref: https://www.php.net/manual/en/function.imap-get-quota.php
 **/
if(!function_exists('imap_get_quota')) {
  function imap_get_quota() {
  }
}


/**
 * imap_get_quotaroot - Retrieve the quota settings per user
 * Ref: https://www.php.net/manual/en/function.imap-get-quotaroot.php
 **/
if(!function_exists('imap_get_quotaroot')) {
  function imap_get_quotaroot() {
  }
}


/**
 * imap_getacl - Gets the ACL for a given mailbox
 * Ref: https://www.php.net/manual/en/function.imap-getacl.php
 **/
if(!function_exists('imap_getacl')) {
  function imap_getacl() {
  }
}


/**
 * imap_getmailboxes - Read the list of mailboxes, returning detailed information on each one
 * Ref: https://www.php.net/manual/en/function.imap-getmailboxes.php
 **/
if(!function_exists('imap_getmailboxes')) {
  function imap_getmailboxes() {
  }
}


/**
 * imap_getsubscribed - List all the subscribed mailboxes
 * Ref: https://www.php.net/manual/en/function.imap-getsubscribed.php
 **/
if(!function_exists('imap_getsubscribed')) {
  function imap_getsubscribed() {
  }
}


/**
 * imap_header - Alias of imap_headerinfo
 * Ref: https://www.php.net/manual/en/function.imap-header.php
 **/
if(!function_exists('imap_header')) {
  function imap_header() {
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
  function imap_headers() {
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
  function imap_list() {
  }
}


/**
 * imap_listmailbox - Alias of imap_list
 * Ref: https://www.php.net/manual/en/function.imap-listmailbox.php
 **/
if(!function_exists('imap_listmailbox')) {
  function imap_listmailbox() {
  }
}


/**
 * imap_listscan - Returns the list of mailboxes that matches the given text
 * Ref: https://www.php.net/manual/en/function.imap-listscan.php
 **/
if(!function_exists('imap_listscan')) {
  function imap_listscan() {
  }
}


/**
 * imap_listsubscribed - Alias of imap_lsub
 * Ref: https://www.php.net/manual/en/function.imap-listsubscribed.php
 **/
if(!function_exists('imap_listsubscribed')) {
  function imap_listsubscribed() {
  }
}


/**
 * imap_lsub - List all the subscribed mailboxes
 * Ref: https://www.php.net/manual/en/function.imap-lsub.php
 **/
if(!function_exists('imap_lsub')) {
  function imap_lsub() {
  }
}


/**
 * imap_mail_compose - Create a MIME message based on given envelope and body sections
 * Ref: https://www.php.net/manual/en/function.imap-mail-compose.php
 **/
if(!function_exists('imap_mail_compose')) {
  function imap_mail_compose() {
  }
}


/**
 * imap_mail_copy - Copy specified messages to a mailbox
 * Ref: https://www.php.net/manual/en/function.imap-mail-copy.php
 **/
if(!function_exists('imap_mail_copy')) {
  function imap_mail_copy() {
  }
}


/**
 * imap_mail_move - Move specified messages to a mailbox
 * Ref: https://www.php.net/manual/en/function.imap-mail-move.php
 **/
if(!function_exists('imap_mail_move')) {
  function imap_mail_move() {
  }
}


/**
 * imap_mail - Send an email message
 * Ref: https://www.php.net/manual/en/function.imap-mail.php
 **/
if(!function_exists('imap_mail')) {
  function imap_mail() {
  }
}


/**
 * imap_mailboxmsginfo - Get information about the current mailbox
 * Ref: https://www.php.net/manual/en/function.imap-mailboxmsginfo.php
 **/
if(!function_exists('imap_mailboxmsginfo')) {
  function imap_mailboxmsginfo() {
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
  function imap_num_msg() {
  }
}


/**
 * imap_num_recent - Gets the number of recent messages in current mailbox
 * Ref: https://www.php.net/manual/en/function.imap-num-recent.php
 **/
if(!function_exists('imap_num_recent')) {
  function imap_num_recent() {
  }
}


/**
 * imap_open - Open an IMAP stream to a mailbox
 * Ref: https://www.php.net/manual/en/function.imap-open.php
 **/
if(!function_exists('imap_open')) {
  function imap_open(string $mailbox, string $username, string $password, int $options = 0, int $n_retries = 0, array $params = array() ) {
  }
}


/**
 * imap_ping - Check if the IMAP stream is still active
 * Ref: https://www.php.net/manual/en/function.imap-ping.php
 **/
if(!function_exists('imap_ping')) {
  function imap_ping() {
  }
}


/**
 * imap_qprint - Convert a quoted-printable string to an 8 bit string
 * Ref: https://www.php.net/manual/en/function.imap-qprint.php
 **/
if(!function_exists('imap_qprint')) {
  function imap_qprint() {
  }
}


/**
 * imap_rename - Alias of imap_renamemailbox
 * Ref: https://www.php.net/manual/en/function.imap-rename.php
 **/
if(!function_exists('imap_rename')) {
  function imap_rename() {
  }
}


/**
 * imap_renamemailbox - Rename an old mailbox to new mailbox
 * Ref: https://www.php.net/manual/en/function.imap-renamemailbox.php
 **/
if(!function_exists('imap_renamemailbox')) {
  function imap_renamemailbox() {
  }
}


/**
 * imap_reopen - Reopen IMAP stream to new mailbox
 * Ref: https://www.php.net/manual/en/function.imap-reopen.php
 **/
if(!function_exists('imap_reopen')) {
  function imap_reopen() {
  }
}


/**
 * imap_rfc822_parse_adrlist - Parses an address string
 * Ref: https://www.php.net/manual/en/function.imap-rfc822-parse-adrlist.php
 **/
if(!function_exists('imap_rfc822_parse_adrlist')) {
  function imap_rfc822_parse_adrlist() {
  }
}


/**
 * imap_rfc822_parse_headers - Parse mail headers from a string
 * Ref: https://www.php.net/manual/en/function.imap-rfc822-parse-headers.php
 **/
if(!function_exists('imap_rfc822_parse_headers')) {
  function imap_rfc822_parse_headers() {
  }
}


/**
 * imap_rfc822_write_address - Returns a properly formatted email address given the mailbox, host, and personal info
 * Ref: https://www.php.net/manual/en/function.imap-rfc822-write-address.php
 **/
if(!function_exists('imap_rfc822_write_address')) {
  function imap_rfc822_write_address() {
  }
}


/**
 * imap_savebody - Save a specific body section to a file
 * Ref: https://www.php.net/manual/en/function.imap-savebody.php
 **/
if(!function_exists('imap_savebody')) {
  function imap_savebody() {
  }
}


/**
 * imap_scan - Alias of imap_listscan
 * Ref: https://www.php.net/manual/en/function.imap-scan.php
 **/
if(!function_exists('imap_scan')) {
  function imap_scan() {
  }
}


/**
 * imap_scanmailbox - Alias of imap_listscan
 * Ref: https://www.php.net/manual/en/function.imap-scanmailbox.php
 **/
if(!function_exists('imap_scanmailbox')) {
  function imap_scanmailbox() {
  }
}


/**
 * imap_search - This function returns an array of messages matching the given search criteria
 * Ref: https://www.php.net/manual/en/function.imap-search.php
 **/
if(!function_exists('imap_search')) {
  function imap_search() {
  }
}


/**
 * imap_set_quota - Sets a quota for a given mailbox
 * Ref: https://www.php.net/manual/en/function.imap-set-quota.php
 **/
if(!function_exists('imap_set_quota')) {
  function imap_set_quota() {
  }
}


/**
 * imap_setacl - Sets the ACL for a given mailbox
 * Ref: https://www.php.net/manual/en/function.imap-setacl.php
 **/
if(!function_exists('imap_setacl')) {
  function imap_setacl() {
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
  function imap_sort() {
  }
}


/**
 * imap_status - Returns status information on a mailbox
 * Ref: https://www.php.net/manual/en/function.imap-status.php
 **/
if(!function_exists('imap_status')) {
  function imap_status() {
  }
}


/**
 * imap_subscribe - Subscribe to a mailbox
 * Ref: https://www.php.net/manual/en/function.imap-subscribe.php
 **/
if(!function_exists('imap_subscribe')) {
  function imap_subscribe() {
  }
}


/**
 * imap_thread - Returns a tree of threaded message
 * Ref: https://www.php.net/manual/en/function.imap-thread.php
 **/
if(!function_exists('imap_thread')) {
  function imap_thread() {
  }
}


/**
 * imap_timeout - Set or fetch imap timeout
 * Ref: https://www.php.net/manual/en/function.imap-timeout.php
 **/
if(!function_exists('imap_timeout')) {
  function imap_timeout() {
  }
}


/**
 * imap_uid - This function returns the UID for the given message sequence number
 * Ref: https://www.php.net/manual/en/function.imap-uid.php
 **/
if(!function_exists('imap_uid')) {
  function imap_uid() {
  }
}


/**
 * imap_undelete - Unmark the message which is marked deleted
 * Ref: https://www.php.net/manual/en/function.imap-undelete.php
 **/
if(!function_exists('imap_undelete')) {
  function imap_undelete() {
  }
}


/**
 * imap_unsubscribe - Unsubscribe from a mailbox
 * Ref: https://www.php.net/manual/en/function.imap-unsubscribe.php
 **/
if(!function_exists('imap_unsubscribe')) {
  function imap_unsubscribe() {
  }
}


/**
 * imap_utf7_decode - Decodes a modified UTF-7 encoded string
 * Ref: https://www.php.net/manual/en/function.imap-utf7-decode.php
 **/
if(!function_exists('imap_utf7_decode')) {
  function imap_utf7_decode() {
  }
}


/**
 * imap_utf7_encode - Converts ISO-8859-1 string to modified UTF-7 text
 * Ref: https://www.php.net/manual/en/function.imap-utf7-encode.php
 **/
if(!function_exists('imap_utf7_encode')) {
  function imap_utf7_encode() {
  }
}


/**
 * imap_utf8_to_mutf7 - Encode a UTF-8 string to modified UTF-7
 * Ref: https://www.php.net/manual/en/function.imap-utf8-to-mutf7.php
 **/
if(!function_exists('imap_utf8_to_mutf7')) {
  function imap_utf8_to_mutf7() {
  }
}


/**
 * imap_utf8 - Converts MIME-encoded text to UTF-8
 * Ref: https://www.php.net/manual/en/function.imap-utf8.php
 **/
if(!function_exists('imap_utf8')) {
  function imap_utf8() {
  }
}

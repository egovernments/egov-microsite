<?php
/* Template Name: User Notification Job Template

**/
 
 //get_header();

$previous_time=strtotime(date('Y-m-d H:i:s',strtotime("-2 days")));
$current_time=strtotime(date('Y-m-d H:i:s'));

$epoch_from_date=$previous_time*1000;

$epoch_to_date=$current_time*1000;

$tenantID=get_option('event_api_tenant_id');
$apiUsername=get_option('event_api_username');
$apiPassword=get_option('event_api_password');
$apiURL=get_option('event_api_url');
$found=0;
$cancelled=0;
$inserted_response=array();
$cancelled_response=array();
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $apiURL."/user/oauth/token",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "username=".$apiUsername."&password=".$apiPassword."&grant_type=password&scope=read&tenantId=".$tenantID."&userType=EMPLOYEE",
  CURLOPT_HTTPHEADER => array(
    "accept: application/json, text/plain, */*",
    "accept-language: en-GB,en-US;q=0.9,en;q=0.8",
     "authority: qa.digit.org",
    "authorization: Basic ZWdvdi11c2VyLWNsaWVudDo=",
    "cache-control: no-cache",
    "content-type: application/x-www-form-urlencoded",
    "cookie: _ga=GA1.2.1798825227.1646894210",
    "origin: ".$apiURL,
    "postman-token: c8581ddb-dc7f-0994-1b44-1c06af21f076",
    "referer: ".$apiURL."/employee/user/login",
    "sec-ch-ua: \"Google Chrome\";v=\"93\", \" Not;A Brand\";v=\"99\", \"Chromium\";v=\"93\"",
    "sec-ch-ua-mobile: ?0",
    "sec-ch-ua-platform: \"Linux\"",
    "sec-fetch-dest: empty",
    "sec-fetch-mode: cors",
    "sec-fetch-site: same-origin",
    "user-agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  $accessToken= json_decode($response);
   $api_accessToken=$accessToken->access_token;

   /*********** Insert Event On Cron Job Trigger ****************/

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $apiURL."/egov-user-event/v1/events/_search?tenantId=".$tenantID."&eventTypes=BROADCAST&status=ACTIVE&fromDate=".$epoch_from_date."&toDate=".$epoch_to_date,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n  \"RequestInfo\": {\n    \"apiId\": \"org.egov.pt\",\n    \"msgId\": \"654654\",\n    \"authToken\": \"".$api_accessToken."\"\n  }\n}",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "content-type: application/json",
    "postman-token: 7f469dbe-4e7b-c27f-ba8c-4867f293c463"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {

  $event_lists = json_decode($response);
  
  //echo "<pre>"; 
 //print_r($event_lists);
 //echo "</pre>";

  $all_events= $event_lists->events;
  foreach($all_events as $events){
 
$eventId = $events->id;
$event_title= $events->name;
$event_desc= $events->description;
$eventType= $events->eventType;
$status= $events->status;
$actions= $events->actions;
if($actions){
    $actionUrls =$actions->actionUrls[0]->actionUrl;
    $code =$actions->actionUrls[0]->code;
}else{
    $actionUrls='';
    $code='';
}
$eventDetails= $events->eventDetails;
$event_fromDate= $eventDetails->fromDate;
$event_toDate= $eventDetails->toDate;

if($eventType =='BROADCAST'){

$efromdate=date('Ymd',($event_fromDate/1000));
$efromtime=date('h:i a',($event_fromDate/1000));
$etodate=date('Ymd',($event_toDate/1000));
$etotime=date('h:i a',($event_toDate/1000));

global $wpdb;

$results = $wpdb->get_results( "select post_id from $wpdb->postmeta where meta_key = 'notificationId' AND meta_value='".$eventId."'");

if($results){

$new_event = array(
'ID' => $results[0]->post_id,
'post_title' => $event_title,
'post_content' => $event_desc,
'post_status' => 'publish',
'post_date' => date('Y-m-d H:i:s'),
'post_author' => 1,
'post_type' => 'notification',
);
$post_id = wp_insert_post($new_event);

if($results[0]->post_id){
$post_id = $results[0]->post_id;
update_post_meta($post_id, 'notification_button_title', $code);
update_post_meta($post_id, 'notificationId', $eventId);
update_post_meta($post_id, 'notification_button_url', $actionUrls);
update_post_meta($post_id, 'notification_from', $efromdate);
update_post_meta($post_id, 'notification_to', $etodate);
$found++;
$inserted_response['result']=$found." Notification updated successfully";

}else{
$inserted_response['result']="Error";
}

}else{
$new_event = array(

'post_title' => $event_title,
'post_content' => $event_desc,
'post_status' => 'publish',
'post_date' => date('Y-m-d H:i:s'),
'post_author' => 1,
'post_type' => 'notification',
);
$post_id = wp_insert_post($new_event);

if($post_id){
update_post_meta($post_id, 'notification_button_title', $code);
update_post_meta($post_id, 'notificationId', $eventId);
update_post_meta($post_id, 'notification_button_url', $actionUrls);
update_post_meta($post_id, 'notification_from', $efromdate);
update_post_meta($post_id, 'notification_to', $etodate);

$found++;
$inserted_response['result']=$found." Notification inserted successfully";


}else{
$inserted_response['result']="Error";
}

}
/*** event insert end **/

}else{
     if($found==0){
  $inserted_response['result']="No Data Found";
}

  }


}
echo json_encode($inserted_response);
}



}

?>

<?php 
//get_footer();
?>
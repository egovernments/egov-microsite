<?php
/* Template Name: Document Delete Cron Job Template

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

   
/*************** Delete Document Cron Jon ***********************/

$curl = curl_init();

curl_setopt_array($curl, array(
   CURLOPT_URL => $apiURL."/egov-document-uploader/egov-du/document/_search?tenantIds=".$tenantID."&viewDeletedDocuments=true&fromDate=1632386300318&toDate=".$epoch_to_date,
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

  $document_lists = json_decode($response);

 $total_count= $document_lists->totalCount;
$Documents= $document_lists->Documents;


  foreach($Documents as $documet){
 
 $uuid = $documet->uuid;

$doc_category= $documet->category;

if($uuid){


global $wpdb;
$results1 = $wpdb->get_results( "select post_id,meta_key from $wpdb->postmeta where meta_value='".$uuid."'");

if($results1){


$post_id=$results1[0]->post_id;
$meta_key=$results1[0]->meta_key;
$keyArray=explode('_', $meta_key);

//wp_delete_post( $results1[0]->post_id, false);
 $index = $keyArray[count($keyArray)-2];

delete_row('add_document_details', $index,$post_id);
delete_post_meta($post_id, 'add_document_details_'.$index.'_uuid', $uuid);
$cancelled++;
$cancelled_response['result']=$cancelled." Data deleted successfully";

  
}

}else{

     if($cancelled==0){
  $cancelled_response['result']="No Data Found";
}

  }


}
echo json_encode($cancelled_response);
}



/************ End Document on Cron Job **************************/

}

?>

<?php 
//get_footer();
?>
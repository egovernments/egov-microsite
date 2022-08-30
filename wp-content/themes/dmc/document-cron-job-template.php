<?php
/* Template Name: Document Cron Job Template

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
  CURLOPT_URL => $apiURL."/egov-document-uploader/egov-du/document/_search?tenantIds=".$tenantID."&fromDate=".$epoch_from_date."&toDate=".$epoch_to_date,
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
  // echo "<pre>";
  // print_r($documet);
//echo "</pre>";
$uuid = $documet->uuid;
$document_name= $documet->name;
$document_subhead='';
$doc_desc= $documet->description;
$doc_category= $documet->category;
$documentLink= $documet->documentLink;

global $wpdb;
$doc_exit = $wpdb->get_results( "select post_id from $wpdb->postmeta where meta_value='".$uuid."'");

if($documentLink !=='' && !$doc_exit){


$results = $wpdb->get_results( "select post_id from $wpdb->postmeta where meta_key = 'digit_category_name' AND meta_value='".$doc_category."'");

if($results){

if($results[0]->post_id){

$post_id = $results[0]->post_id;

if($post_id){

 $doc_count=get_post_meta($post_id, 'add_document_details', true);
if(!$doc_count){
  $doc_count=0;
}

                $file_name = $documentLink;
                $upload_dir = wp_upload_dir();
                $image_data = file_get_contents( $documentLink );
                $filename = basename( $file_name );
                $filetype = wp_check_filetype($file_name);
                $filename = time().'.'.$filetype['ext'];

                if ( wp_mkdir_p( $upload_dir['path'] ) ) {
                  $file = $upload_dir['path'] . '/' . $filename;
                }
                else {
                  $file = $upload_dir['basedir'] . '/' . $filename;
                }

                file_put_contents( $file, $image_data );
                $wp_filetype = wp_check_filetype( $filename, null );
                $attachment = array(
                  'post_mime_type' => $wp_filetype['type'],
                  'post_title' => sanitize_file_name( $filename ),
                  'post_content' => '',
                  'post_status' => 'inherit'
                );

                $attach_id = wp_insert_attachment( $attachment, $file );
                require_once( ABSPATH . 'wp-admin/includes/image.php' );
                $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
                wp_update_attachment_metadata( $attach_id, $attach_data );


add_post_meta($post_id, 'add_document_details_'.$doc_count.'_document_heading', $document_name);
add_post_meta($post_id, '_add_document_details_'.$doc_count.'_document_heading', 'field_61f940f8cbb92');

add_post_meta($post_id, 'add_document_details_'.$doc_count.'_document_subheading', $document_subhead);
add_post_meta($post_id, '_add_document_details_'.$doc_count.'_document_subheading', 'field_61f9410ccbb93');

add_post_meta($post_id, 'add_document_details_'.$doc_count.'_upload_document_pdf', $attach_id);
add_post_meta($post_id, '_add_document_details_'.$doc_count.'_upload_document_pdf', 'field_61f94133cbb95');

add_post_meta($post_id, 'add_document_details_'.$doc_count.'_description', $doc_desc);
add_post_meta($post_id, '_add_document_details_'.$doc_count.'_description', 'field_61f94125cbb94');

add_post_meta($post_id, 'add_document_details_'.$doc_count.'_uuid', $uuid);

$doc_count=$doc_count+1;

update_post_meta($post_id, 'add_document_details', $doc_count);

$inserted_response['result']=$found." Data updated successfully";
$found++;
}else{
$inserted_response['result']="Error";
}

}
/*** event insert end **/

}else{


$doc_title=str_replace("_"," ",$doc_category);
$new_event = array(

'post_title' => $doc_title,
'post_content' => '',
'post_status' => 'publish',
'post_date' => date('Y-m-d H:i:s'),
'post_author' => 1,
'post_type' => 'documents',
);
$post_id = wp_insert_post($new_event);

if($post_id){

add_post_meta($post_id, 'digit_category_name', $doc_category);
add_post_meta($post_id, '_digit_category_name', 'field_62817efe8e774');

$doc_count=get_post_meta($post_id, 'add_document_details', true);

if(!$doc_count){
  $doc_count=0;

  add_post_meta($post_id, 'add_document_details', $doc_count);
add_post_meta($post_id, '_add_document_details', 'field_61f94079cbb91');
}

                $file_name = $documentLink;
                $upload_dir = wp_upload_dir();
                $image_data = file_get_contents( $documentLink );
                $filename = basename( $file_name );
                $filetype = wp_check_filetype($file_name);
                $filename = time().'.'.$filetype['ext'];

                if ( wp_mkdir_p( $upload_dir['path'] ) ) {
                  $file = $upload_dir['path'] . '/' . $filename;
                }
                else {
                  $file = $upload_dir['basedir'] . '/' . $filename;
                }

                file_put_contents( $file, $image_data );
                require_once(ABSPATH . 'wp-admin/includes/media.php');
        require_once(ABSPATH . 'wp-admin/includes/file.php');
                require_once( ABSPATH . 'wp-admin/includes/image.php' );
                $wp_filetype = wp_check_filetype( $filename, null );
                $attachment = array(
                  'post_mime_type' => $wp_filetype['type'],
                  'post_title' => sanitize_file_name( $filename ),
                  'post_content' => '',
                  'post_status' => 'inherit'
                );

                $attach_id = wp_insert_attachment( $attachment, $file );

                $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
                wp_update_attachment_metadata( $attach_id, $attach_data );


add_post_meta($post_id, 'add_document_details_'.$doc_count.'_document_heading', $document_name);
add_post_meta($post_id, '_add_document_details_'.$doc_count.'_document_heading', 'field_61f940f8cbb92');

add_post_meta($post_id, 'add_document_details_'.$doc_count.'_document_subheading', $document_subhead);
add_post_meta($post_id, '_add_document_details_'.$doc_count.'_document_subheading', 'field_61f9410ccbb93');

add_post_meta($post_id, 'add_document_details_'.$doc_count.'_upload_document_pdf', $attach_id);
add_post_meta($post_id, '_add_document_details_'.$doc_count.'_upload_document_pdf', 'field_61f94133cbb95');

add_post_meta($post_id, 'add_document_details_'.$doc_count.'_description', $doc_desc);
add_post_meta($post_id, '_add_document_details_'.$doc_count.'_description', 'field_61f94125cbb94');

add_post_meta($post_id, 'add_document_details_'.$doc_count.'_uuid', $uuid);

$doc_count=$doc_count+1;

update_post_meta($post_id, 'add_document_details', $doc_count);

$inserted_response['result']=$found." Data inserted successfully";
$found++;
}else{
$inserted_response['result']="Error";
}
   
  }

 }

}
echo json_encode($inserted_response);
}


/************ End Document on Cron Job **************************/

}

?>

<?php 
//get_footer();
?>
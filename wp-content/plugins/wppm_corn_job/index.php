<?php
/*
Plugin Name: My cron WordPress plugin
Plugin URI: wordpress.org/plugins
Description: A simple WordPress plugin that executes many times in a certain interval.
Version: 1.0.0
Author: David Angulo
Author URI: https://www.davidangulo.xyz/wp/
License: GPL2
*/
register_activation_hook( __FILE__, 'register_schedule');
function register_schedule() {
  if (!wp_next_scheduled('my_daily_event')) {
    wp_schedule_event(time(), '5minutes', 'my_daily_event');
  }
}
add_action('my_daily_event', 'do_this_daily');
function do_this_daily() {
  wp_mail('webcuretechnology@gmail.com', 'Morning Message', 'Good Morning! Have a nice day. :)');
}
register_deactivation_hook( __FILE__, 'remove_schedule');
function remove_schedule() {
  wp_clear_scheduled_hook('my_daily_event');
}
add_filter('cron_schedules', 'custom_cron_schedules');
function custom_cron_schedules($schedules) {
  if (!isset($schedules['5minutes'])) {
    $schedules['5minutes'] = array(
      'interval' => 5*60,
      'display' => __('Once every 5 minutes'));
  }
  if (!isset($schedules['halfhour'])) {
    $schedules['halfhour'] = array(
      'interval' => 30*60,
      'display' => __('Once every 30 minutes'));
  }
  return $schedules;
}
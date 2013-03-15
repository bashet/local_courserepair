<?php
/*
 *File created by Abdul Bashet
 *Email: a_bashet@yahoo.com
 *
 *This file is able to demonestrate a file manager.
 */

require('../../config.php');
//local_courserepair

require_login();
if (isguestuser()) {
    die();
}

$returnurl = optional_param('returnurl', '', PARAM_URL);

if (empty($returnurl)) {
    $returnurl = new moodle_url('/local/courserepair/');
}

$context = get_context_instance(CONTEXT_SYSTEM);

$PAGE->set_url('/local/courserepair/');
$PAGE->set_context($context);
$PAGE->set_title(get_string('pluginname', 'local_courserepair'));
$PAGE->set_heading(get_string('pluginname', 'local_courserepair'));
$PAGE->set_pagelayout('mydashboard');
$PAGE->navbar->add(get_string('pluginname', 'local_courserepair'));

$content = '';

$content .= 'This plugin is working fine!';



echo $OUTPUT->header();
echo $content;
echo $OUTPUT->footer();

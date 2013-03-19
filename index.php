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
global $DB, $CFG;
$upload_assessment_id = 140;
$sql = "SELECT 
            mdl_upload_assessment_data.id as 'ID',
            mdl_course.id as 'Id Number',
            mdl_upload_assessment_data.course_id as 'Course'
            FROM mdl_upload_assessment_data 
            INNER JOIN mdl_course
            ON mdl_course.shortname = SubStr(mdl_upload_assessment_data.course_id,1,LENGTH(mdl_upload_assessment_data.course_id)-4)
            where upload_assessment_id=$upload_assessment_id";
            
            
$records = $DB->get_records_sql($sql);

//print_r($records);
print_r($CFG);

echo $OUTPUT->header();
echo $content;
echo $OUTPUT->footer();

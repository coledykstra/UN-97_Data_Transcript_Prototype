<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class EnrollmentController extends Controller
{
    public function index($studentId)
    {
		$base_url = env('CANVAS_API_BASE_URL');
		$access_token = env('CANVAS_ACCESS_TOKEN');

		$client = new Client([
			'base_uri' => $base_url,
			'headers' => [
				'Authorization' => 'Bearer ' . $access_token,
			],
		]);

		// Make an API request to retrieve enrollments for the specified student ID
		$enrollments_response = $client->get("users/{$studentId}/enrollments");
		$enrollments = json_decode($enrollments_response->getBody(), true);

		$courses_response = $client->get("users/{$studentId}/courses");
        $courses = json_decode($courses_response->getBody(), true);
		function getCourseName($courses, $course_id) {
			foreach ($courses as $course) { 
				if ($course['id'] == $course_id) {
					return $course['name'];
				}
			}
			return null;
		}

		$student_name = "";
		$course_results = [];
		foreach ($enrollments as $enrollment) {
			$total_activity_time = $enrollment['total_activity_time'];
			if ($total_activity_time == 0) {
				continue;
			}
			$course_name = getCourseName($courses, $enrollment['course_id']);
			if ($student_name == "" && isset($enrollment['user'])) {
				$student_name = $enrollment['user']['name'];
			}
			if (isset($enrollment['grades'])) {
				// print_r(json_encode($enrollment['grades']));
				$final_score = $enrollment['grades']['final_score'];
			} else {
				$final_score = null;
			}				
			
			$row = [
				'course_name' => $course_name,
				'total_activity_time' => $enrollment['total_activity_time'],
				'final_score' => $final_score
			];
			$course_results[] = $row;
		}

		return view('enrollments.index', compact('student_name', 'course_results'));	
    }
}

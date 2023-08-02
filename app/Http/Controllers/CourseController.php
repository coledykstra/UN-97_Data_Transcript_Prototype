<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class CourseController extends Controller
{
    public function index()
    {
        $baseUrl = env('CANVAS_API_BASE_URL');
        $accessToken = env('CANVAS_ACCESS_TOKEN');

        $client = new Client([
            'base_uri' => $baseUrl,
            'headers' => [
                'Authorization' => 'Bearer ' . $accessToken,
            ],
        ]);

        $response = $client->get('courses');
        $courses = json_decode($response->getBody(), true);

        // Fetch enrollments for each course
        foreach ($courses as &$course) {
            $courseId = $course['id'];
            $enrollmentsResponse = $client->get("courses/{$courseId}/enrollments");
            $enrollments = json_decode($enrollmentsResponse->getBody(), true);
            $course['enrollments'] = $enrollments;
        }

        return view('courses.index', compact('courses'));
    }
}

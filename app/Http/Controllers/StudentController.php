<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class StudentController extends Controller
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

		// Make an API request to retrieve a list of students
		$response = $client->get('accounts/self/users');
		$students = json_decode($response->getBody(), true);

		return view('students.index', compact('students'));	
    }
}

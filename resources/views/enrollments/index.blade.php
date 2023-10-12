<!DOCTYPE html>
<html>
<head>
    <title>Canvas LMS {{ $student_name }} Transcript</title>
</head>
<body>
    <h1>{{ $student_name }} Transcript</h1>
    <table border=1>
		<tr><th>Course</th><th>Total Activity</th><th>Final Score</th></tr>
        @foreach ($course_results as $course)
			<tr><td>{{ $course['course_name'] }}</td>
				<td>{{ $course['total_activity_time'] }}</td>
				<td>{{ $course['final_score'] }}</td>
			</tr>
        @endforeach
    </table>
</body>
</html>

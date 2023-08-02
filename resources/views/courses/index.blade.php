<!DOCTYPE html>
<html>
<head>
    <title>Canvas LMS Courses</title>
</head>
<body>
    <h1>Canvas LMS Courses</h1>
    <ul>
        @foreach ($courses as $course)
            <li>
                {{ $course['name'] }}
                <ul>
                    @foreach ($course['enrollments'] as $enrollment)
                        <li>{{ $enrollment['user']['name'] }} ({{ $enrollment['type'] }})</li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
</body>
</html>

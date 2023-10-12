<!DOCTYPE html>
<html>
<head>
    <title>Canvas LMS Student List</title>
</head>
<body>
    <h1>Canvas LMS Courses</h1>
    <ul>
        @foreach ($students as $student)
            <li>
                <a href="enrollments/{{ $student['id'] }}">{{ $student['name'] }}</a>
            </li>
        @endforeach
    </ul>
</body>
</html>

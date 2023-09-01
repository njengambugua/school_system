<?php
// Define the schedule times
$scheduleTimes = [
    "8:00 AM - 9:00 AM",
    "9:00 AM - 10:00 AM",
    "10:00 AM - 10:20 AM",
    "10:20 AM - 11:20 AM",
    "11:20 AM - 12:20 PM",
    "12:20 PM - 1:00 PM",
    "1:00 PM - 2:00 PM",
    "2:00 PM - 3:00 PM",
];

// Define the subjects and their corresponding grades
$subjects = [
    "Math" => ["Grade 7", "Grade 8"],
    "Science" => ["Grade 7", "Grade 8"],
    "History" => ["Grade 9", "Grade 10"],
    "English" => ["Grade 9", "Grade 10"],
    "Physics" => ["Grade 11", "Grade 12"],
    "Chemistry" => ["Grade 11", "Grade 12"],
];

// Create an array to store the schedule
$schedule = [];

// Create a list of teachers with their subjects and grades they can teach
$teachers = [
    ["name" => "Teacher A", "subjects" => ["Math", "Science"], "grades" => ["Grade 7", "Grade 8"]],
    ["name" => "Teacher B", "subjects" => ["History", "English"], "grades" => ["Grade 9", "Grade 10"]],
    ["name" => "Teacher C", "subjects" => ["Physics", "Chemistry"], "grades" => ["Grade 11", "Grade 12"]],
];

// Create the schedule
for ($day = 1; $day <= 5; $day++) { // Assuming a 5-day work week
    foreach ($scheduleTimes as $time) {
        // Shuffle the teachers to assign them in a random order
        shuffle($teachers);
        
        foreach ($teachers as $teacher) {
            $subject = array_rand($teacher["subjects"]);
            $grade = $teacher["grades"][array_rand($teacher["grades"])];

            // Check if teacher is available at this time
            $isAvailable = true;
            foreach ($schedule as $lesson) {
                if ($lesson["Day"] == "Day $day" && $lesson["Time"] == $time && $lesson["Teacher"] == $teacher["name"]) {
                    $isAvailable = false;
                    break;
                }
            }

            // If the teacher is available, add the lesson to the schedule
            if ($isAvailable) {
                $schedule[] = [
                    "Day" => "Day $day",
                    "Time" => $time,
                    "Subject" => $subject,
                    "Grade" => $grade,
                    "Teacher" => $teacher["name"]
                ];
                break; // Break out of the teacher loop for this time slot
            }
        }
    }
}

// Print the schedule
echo "<pre>";
print_r($schedule);
echo "</pre>";

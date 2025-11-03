<?php

$filename = "ratings.txt";

function format_ratings($category, $ratings) {
    $line = strtoupper($category) . ": ";
    $line .= implode(", ", $ratings);
    $line .= "\n";
    return $line;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $wings = $_POST['wings'] ?? [];
    $mac = $_POST['mac'] ?? [];
    $dessert = $_POST['dessert'] ?? [];

    $content = "";
    $content .= format_ratings("Wings", $wings);
    $content .= format_ratings("Mac & Cheese", $mac);
    $content .= format_ratings("Dessert", $dessert);
    $content .- "--------------------------\n";

    file_put_contents($filename, $content, FILE_APPEND | LOCK_EX);

    echo "<h2>Rating saved successfully!</h2>";
    echo "<a href='index.php'>Back to form</a>";
} else {
    echo "Invalid request.";
}
?>
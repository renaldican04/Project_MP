<?php
// includes/helpers.php
function check_overlap($pdo, $playstation_id, $new_start, $new_end) {
    // Overlap if NOT (new_end <= existing_start OR new_start >= existing_end)
    $sql = "SELECT COUNT(*) FROM rentals WHERE playstation_id = :pid AND status IN ('pending','active')
            AND NOT ( :new_end <= start_time OR :new_start >= end_time )";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':pid' => $playstation_id,
        ':new_start' => $new_start,
        ':new_end' => $new_end
    ]);
    return $stmt->fetchColumn() > 0;
}

function hours_between($start, $end) {
    $s = new DateTime($start);
    $e = new DateTime($end);
    $diff = $s->diff($e);
    $hours = $diff->days * 24 + $diff->h + ($diff->i > 0 ? 1 : 0); // round up partial hour
    return $hours;
}

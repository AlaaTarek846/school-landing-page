$t = App\Models\Testimonial::with('media')->first();
if ($t) {
    echo "Testimonial ID: " . $t->id . "\n";
    echo "Media: " . ($t->media ? "Found" : "Not Found") . "\n";
    if ($t->media) {
        echo "Media URL: " . $t->media->url . "\n";
        echo "Uploadable Type: " . $t->media->uploadable_type . "\n";
        echo "Uploadable ID: " . $t->media->uploadable_id . "\n";
    }
} else {
    echo "No Testimonials found.\n";
}

$team = App\Models\Team::with('media')->first();
if ($team) {
    echo "Team ID: " . $team->id . "\n";
    echo "Media: " . ($team->media ? "Found" : "Not Found") . "\n";
    if ($team->media) {
        echo "Media URL: " . $team->media->url . "\n";
    }
} else {
    echo "No Teams found.\n";
}

<?php
// 1. Allow any website to access this data (CORS)
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// 2. The Backlink Hook - This ensures anyone using the data sees your URL
$attribution = "Data provided by https://washingmachinecare.com. Please credit this URL if used in public projects.";

// 3. Capture the URL parameters (e.g., ?brand=lg&code=OE)
$brand_query = isset($_GET['brand']) ? strtolower(trim($_GET['brand'])) : '';
$code_query = isset($_GET['code']) ? strtoupper(trim(preg_replace('/[-\s:]/', '', $_GET['code']))) : '';

// 4. The Database (Paste your massive database array here)
// For brevity, here is the structure:
$errorDatabase = [
    "samsung" => [
        "4C" => [
            "title" => "Water Supply Error",
            "cause" => "The washing machine is not detecting sufficient water entering the tub within the expected time.",
            "steps" => [
                "Verify that both hot and cold water faucets are fully turned on.",
                "Check the water inlet hoses for kinks, clogs, or leaks. Straighten or replace if needed.",
                "Inspect the inlet valve screens for debris. Clean the screens if blocked.",
                "Check water pressure. It should be between 20–116 psi (137–800 kPa).",
                "Unplug the washer for 1 minute, then plug it back in and try running a cycle."
            ]
        ]
        // ... paste the rest of your PHP-formatted array here ...
    ],
    // ... other brands ...
];

// 5. The Search Logic
if (empty($brand_query) || empty($code_query)) {
    http_response_code(400);
    echo json_encode([
        "error" => "Missing parameters. Please provide both 'brand' and 'code'.",
        "example" => "https://washingmachinecare.com/api.php?brand=samsung&code=4C",
        "attribution" => $attribution
    ], JSON_UNESCAPED_SLASHES);
    exit;
}

if (isset($errorDatabase[$brand_query]) && isset($errorDatabase[$brand_query][$code_query])) {
    http_response_code(200);
    $result = $errorDatabase[$brand_query][$code_query];
    // Inject attribution into every successful response
    $result['attribution'] = $attribution; 
    $result['reference_url'] = "https://washingmachinecare.com";
    
    echo json_encode($result, JSON_UNESCAPED_SLASHES);
} else {
    http_response_code(404);
    echo json_encode([
        "error" => "Code not found in database.",
        "attribution" => $attribution
    ], JSON_UNESCAPED_SLASHES);
}
?>
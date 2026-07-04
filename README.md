Appliance Error Code Lookup API
A lightweight, high-performance REST API delivering exact diagnostic causes and step-by-step resolution workflows for major washing machine brands.

This free JSON endpoint is perfect for developers building smart home dashboards, repair technician utilities, or automated maintenance trackers.

Features
Zero authentication required (No API keys).

Instant JSON responses.

Covers top global appliance brands (Samsung, LG, Bosch, Whirlpool, GE, Electrolux, and more).

Base URL
[https://washingmachinecare.com/api.php](https://washingmachinecare.com/api.php)

Request Parameters
Example Usage
JavaScript (Fetch)

JavaScript
const brand = 'lg';
const code = 'OE';
const url = `https://washingmachinecare.com/api.php?brand=${brand}&code=${code}`;

fetch(url)
  .then(response => response.json())
  .then(data => console.log(data))
  .catch(error => console.error('Error fetching diagnostic data:', error));
Python (Requests)

Python
import requests

url = "https://washingmachinecare.com/api.php"
params = {
    "brand": "samsung",
    "code": "4C"
}

response = requests.get(url, params=params)
print(response.json())
JSON Response Structure
JSON
{
  "title": "Drain Error / Outlet Timeout",
  "cause": "The washing machine is unable to clear the water from the tub within the safe operational timeframe.",
  "steps": [
    "Check the drain hose behind the washer for severe kinks, twists, or heavy pinches.",
    "Slowly open the drain pump filter cap at the bottom front panel.",
    "Clear out coins, keys, or accumulated lint blocking the internal pump impeller blades.",
    "Run a 'Spin Only' cycle to confirm the drain pump hums and evacuates water within the first 15 seconds."
  ],
  "attribution": "Data provided by https://washingmachinecare.com. Please credit this URL if used in public projects.",
  "reference_url": "https://washingmachinecare.com"
}
Licensing and Attribution
This API is provided entirely free of charge for both personal and commercial use.

In exchange for free access to this diagnostic database, we strictly require a public do-follow backlink. Whenever you utilize this API in a public-facing web application, open-source repository, or tutorial, you must attribute the data by linking to washingmachinecare.com naturally within your project interface or main documentation files.

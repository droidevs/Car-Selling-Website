<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $states = [
            "Alabama" => ["Birmingham", "Montgomery", "Mobile", "Huntsville", "Tuscaloosa"],
            "Alaska" => ["Anchorage", "Fairbanks", "Juneau", "Sitka", "Ketchikan"],
            "Arizona" => ["Phoenix", "Tucson", "Mesa", "Chandler", "Scottsdale"],
            "Arkansas" => ["Little Rock", "Fort Smith", "Fayetteville", "Springdale", "Jonesboro"],
            "California" => ["Los Angeles", "San Diego", "San Jose", "San Francisco", "Fresno"],
            "Colorado" => ["Denver", "Colorado Springs", "Aurora", "Fort Collins", "Boulder"],
            "Connecticut" => ["Bridgeport", "New Haven", "Stamford", "Hartford", "Waterbury"],
            "Delaware" => ["Wilmington", "Dover", "Newark", "Middletown"],
            "Florida" => ["Miami", "Orlando", "Tampa", "Jacksonville", "Tallahassee"],
            "Georgia" => ["Atlanta", "Savannah", "Augusta", "Columbus", "Macon"],
            "Hawaii" => ["Honolulu", "Hilo", "Kailua", "Pearl City"],
            "Idaho" => ["Boise", "Meridian", "Nampa", "Idaho Falls", "Pocatello"],
            "Illinois" => ["Chicago", "Aurora", "Naperville", "Joliet", "Springfield"],
            "Indiana" => ["Indianapolis", "Fort Wayne", "Evansville", "South Bend", "Carmel"],
            "Iowa" => ["Des Moines", "Cedar Rapids", "Davenport", "Sioux City", "Iowa City"],
            "Kansas" => ["Wichita", "Overland Park", "Kansas City", "Topeka", "Olathe"],
            "Kentucky" => ["Louisville", "Lexington", "Bowling Green", "Owensboro"],
            "Louisiana" => ["New Orleans", "Baton Rouge", "Shreveport", "Lafayette", "Lake Charles"],
            "Maine" => ["Portland", "Lewiston", "Bangor", "South Portland"],
            "Maryland" => ["Baltimore", "Frederick", "Rockville", "Gaithersburg", "Annapolis"],
            "Massachusetts" => ["Boston", "Worcester", "Springfield", "Lowell", "Cambridge"],
            "Michigan" => ["Detroit", "Grand Rapids", "Warren", "Sterling Heights", "Ann Arbor"],
            "Minnesota" => ["Minneapolis", "Saint Paul", "Rochester", "Duluth"],
            "Mississippi" => ["Jackson", "Gulfport", "Southaven", "Hattiesburg"],
            "Missouri" => ["Kansas City", "St. Louis", "Springfield", "Columbia"],
            "Montana" => ["Billings", "Missoula", "Great Falls", "Bozeman"],
            "Nebraska" => ["Omaha", "Lincoln", "Bellevue", "Grand Island"],
            "Nevada" => ["Las Vegas", "Henderson", "Reno", "North Las Vegas"],
            "New Hampshire" => ["Manchester", "Nashua", "Concord"],
            "New Jersey" => ["Newark", "Jersey City", "Paterson", "Elizabeth", "Edison"],
            "New Mexico" => ["Albuquerque", "Las Cruces", "Rio Rancho", "Santa Fe"],
            "New York" => ["New York City", "Buffalo", "Rochester", "Albany", "Syracuse"],
            "North Carolina" => ["Charlotte", "Raleigh", "Greensboro", "Durham", "Winston-Salem"],
            "North Dakota" => ["Fargo", "Bismarck", "Grand Forks"],
            "Ohio" => ["Columbus", "Cleveland", "Cincinnati", "Toledo", "Akron"],
            "Oklahoma" => ["Oklahoma City", "Tulsa", "Norman", "Broken Arrow"],
            "Oregon" => ["Portland", "Eugene", "Salem", "Gresham"],
            "Pennsylvania" => ["Philadelphia", "Pittsburgh", "Allentown", "Erie"],
            "Rhode Island" => ["Providence", "Warwick", "Cranston"],
            "South Carolina" => ["Charleston", "Columbia", "North Charleston", "Greenville"],
            "South Dakota" => ["Sioux Falls", "Rapid City"],
            "Tennessee" => ["Nashville", "Memphis", "Knoxville", "Chattanooga"],
            "Texas" => ["Houston", "Dallas", "Austin", "San Antonio", "Fort Worth"],
            "Utah" => ["Salt Lake City", "West Valley City", "Provo", "Ogden"],
            "Vermont" => ["Burlington", "South Burlington", "Rutland"],
            "Virginia" => ["Virginia Beach", "Norfolk", "Chesapeake", "Richmond"],
            "Washington" => ["Seattle", "Spokane", "Tacoma", "Vancouver"],
            "West Virginia" => ["Charleston", "Huntington", "Morgantown"],
            "Wisconsin" => ["Milwaukee", "Madison", "Green Bay", "Kenosha"],
            "Wyoming" => ["Cheyenne", "Casper", "Laramie"]
        ];
        foreach($states as $state => $cities) {
            State::factory()
                ->state(['name' => $state])
                ->has(
                    City::factory()
                        ->count(count($cities))
                        ->sequence(
                            ...array_map(fn($city) => ['name' => $city] , $cities)
                        )
                )
                ->create();
        }
    }
}

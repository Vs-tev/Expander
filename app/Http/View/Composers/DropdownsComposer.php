<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;

class DropdownsComposer 
{
    public function compose(View $view){

        $branches = [
            "Analysis",
            "Aplikasi Digital Finance",
            "Automotive and Air Craft",
            "Bank and Digital Finance Inclusion",
            "Banking and Investment",
            "Concumer Finance",
            "Creative",
            "Economic",
            "Event Organizer, Spa, Beauty and Hair Salon",
            "Financial",
            "Food, Restaurant, Franchise and Ritel",
            "Garment and Laundry",
            "Industries",
            "Insurance",
            "Internet",
            "Market",
            "Mining, Plantation, Forestry and Agryculture",
            "Pharmaceuticals",
            "Property, Construction, Furniture and Elektronik",
            "Stock Market, Trading and Forex",
            "Telecommunication",
            "Transportation and Ekspedisi",
            "Web Technologie, App, Computer software"
       ];
       $view->with('branches', $branches);

        $progress = [
            'Idea',
            'We have an idea and a plan',
            'We have an idea and a project',
            'We have a working project',
            'We have working project with income',
        ];
        $view->with('progress', $progress);

        $help = [
            "Looking for advisor",
            "Looking for cofounder",
            "Search a team",
            "Looking for specialist",
            "Looking for investor",
            "looking to sell this product",
            "Looking for worker",
        ];
        $view->with('help', $help);

        $profiles = [
            "Company",
            "Start up",
            "Investor",
            "Person",
        ];
        $view->with('profiles', $profiles);
    }
    

}


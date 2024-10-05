<?php

namespace Database\Seeders;

use App\Models\Bid;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $bids_data = [
            1 => [
                'task_id' => 2,
                'performer_id' => 2, 
                'message' => "give me this project I want to try this project", 
                'bid_amount' => '1200',
            ],
            2 => [
                'task_id' => 3,
                'performer_id' => 3, 
                'message' => "give me this project I want to try this project", 
                'bid_amount' => '800',
            ],
            3 => [
                'task_id' => 1,
                'performer_id' => 1, 
                'message' => "give me thisthis project", 
                'bid_amount' => '40',
            ],
            4 => [
                'task_id' => 2,
                'performer_id' => 2, 
                'message' => "give me this project I want to try this project", 
                'bid_amount' => '800',
            ],

        ];

        foreach($bids_data as $bid_data){
            Bid::create($bid_data);    
        }
            
    }
}

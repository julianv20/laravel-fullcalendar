<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                'event' => 'Cita #1',
                'start_date' => '2023-05-16 08:00',
                'end_date' => '2023-05-16 11:00',
            ],
            [
                'event' => 'Cita #2',
                'start_date' => '2023-05-16 11:30',
                'end_date' => '2023-05-16 02:00',
            ],
            [
                'event' => 'Cita #3',
                'start_date' => '2023-05-16 02:30',
                'end_date' => '2023-05-16 05:00',
            ]
        ];
        foreach ($events as $event) {
            Event::create($event);
        }
    }
}

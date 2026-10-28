<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['title' => 'Class of 2025 Media & Video Graduates', 'image' => 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=1470&auto=format&fit=crop', 'category' => 'Graduations & Awards', 'order' => 1],
            ['title' => 'Fullstack Development Graduation', 'image' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=1471&auto=format&fit=crop', 'category' => 'Graduations & Awards', 'order' => 2],
            ['title' => 'Hands-on Training Session', 'image' => 'https://images.unsplash.com/photo-1531482615713-2afd69097998?q=80&w=1470&auto=format&fit=crop', 'category' => 'Practical & Fieldwork', 'order' => 3],
            ['title' => 'Classroom Learning', 'image' => 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?q=80&w=1470&auto=format&fit=crop', 'category' => 'Classrooms & Learning', 'order' => 4],
        ];

        foreach ($items as $item) {
            Gallery::create($item);
        }
    }
}

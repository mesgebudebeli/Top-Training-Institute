<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@toptraining.com',
            'password' => Hash::make('password'),
            'is_admin' => true,
        ]);

        $categories = [
            ['name' => 'Languages', 'slug' => 'languages', 'description' => 'Master modern spoken and written languages for career, travel, and academic success.', 'topics' => "English Communication\nBusiness English\nFrench\nArabic"],
            ['name' => 'Basic Computer Skills', 'slug' => 'basic-computer-skills', 'description' => 'Build essential computer literacy and master productivity software like Microsoft Office.', 'topics' => "Computer Fundamentals\nWindows\nFile Management\nMicrosoft Word"],
            ['name' => 'Full-Stack Website Development', 'slug' => 'full-stack-website-development', 'description' => 'Develop responsive modern websites and web applications from frontend to backend.', 'topics' => "HTML & CSS\nJavaScript\nTypeScript\nReact\nNode.js\nPHP"],
            ['name' => 'Programming Languages', 'slug' => 'programming-languages', 'description' => 'Learn high-demand programming languages for software engineering, data, and automation.', 'topics' => "Python\nJavaScript\nJava\nC\nC++"],
            ['name' => 'Graphics Design', 'slug' => 'graphics-design', 'description' => 'Create stunning brand identities, vector graphics, print layouts, and digital visuals.', 'topics' => "Design Fundamentals\nAdobe Photoshop\nAdobe Illustrator\nAdobe InDesign"],
            ['name' => 'Video Editing', 'slug' => 'video-editing', 'description' => 'Edit professional videos, craft visual effects, color grade, and master post-production.', 'topics' => "Adobe Premiere Pro\nDaVinci Resolve\nAfter Effects\nColor Correction"],
            ['name' => 'Digital Marketing', 'slug' => 'digital-marketing', 'description' => 'Grow brands and reach audiences through search engines, social media, and digital advertising.', 'topics' => "Social Media Marketing\nContent Marketing\nSEO\nOnline Advertising"],
            ['name' => 'Photography & Videography', 'slug' => 'photography-videography', 'description' => 'Master camera controls, lighting setups, cinematic composition, and production workflows.', 'topics' => "Camera Operation\nLighting & Composition\nCinematography\nAudio Capture"],
            ['name' => 'Accounting Software', 'slug' => 'accounting-software', 'description' => 'Streamline bookkeeping, financial reporting, payroll, and tax preparation with industry tools.', 'topics' => "QuickBooks\nPeachtree / Sage\nTally\nAdvanced Excel for Accounting"],
            ['name' => 'Engineering Software', 'slug' => 'engineering-software', 'description' => 'Master computer-aided design, 3D modeling, structural analysis, and project planning.', 'topics' => "AutoCAD\nRevit\nCivil 3D\nETABS\nSketchUp"],
        ];

        foreach ($categories as $cat) {
            Category::create($cat);
        }

        $courses = [
            ['title' => 'AutoCAD & Revit for Engineering & Architectural Design', 'slug' => 'autocad-revit-engineering-architectural-design', 'category_id' => Category::where('slug', 'engineering-software')->first()->id, 'short_description' => 'Draft precise 2D technical drawings and construct parametric 3D Building Information Models (BIM) using AutoCAD and Revit.', 'duration' => '12 Weeks', 'level' => 'All Level', 'mode' => 'In Person, Hybrid', 'is_featured' => true],
            ['title' => 'Digital Marketing & Performance Growth', 'slug' => 'digital-marketing-performance-growth', 'category_id' => Category::where('slug', 'digital-marketing')->first()->id, 'short_description' => 'Learn to build targeted digital campaigns, master SEO, manage social media channels, and interpret marketing analytics.', 'duration' => '8 Weeks', 'level' => 'All Level', 'mode' => 'In Person, Online, Hybrid', 'is_featured' => true],
            ['title' => 'Full-Stack Website Development', 'slug' => 'full-stack-website-development-course', 'category_id' => Category::where('slug', 'full-stack-website-development')->first()->id, 'short_description' => 'Build modern, responsive, database-driven web applications from frontend user interfaces to cloud-deployed backends.', 'duration' => '16 Weeks', 'level' => 'All Level', 'mode' => 'In Person, Hybrid, Online', 'is_featured' => true],
            ['title' => 'Professional English Communication & Workplace Fluency', 'slug' => 'professional-english-communication-workplace-fluency', 'category_id' => Category::where('slug', 'languages')->first()->id, 'short_description' => 'Elevate your spoken and written English fluency for professional settings, interviews, presentations, and correspondence.', 'duration' => '10 Weeks', 'level' => 'All Level', 'mode' => 'In Person, Online, Hybrid', 'is_featured' => true],
            ['title' => 'Professional Graphic Design & Brand Identity', 'slug' => 'professional-graphic-design-brand-identity', 'category_id' => Category::where('slug', 'graphics-design')->first()->id, 'short_description' => 'Master industry-standard design tools including Adobe Photoshop, Illustrator, and InDesign to produce compelling visual assets.', 'duration' => '12 Weeks', 'level' => 'All Level', 'mode' => 'In Person, Hybrid', 'is_featured' => true],
            ['title' => 'Python Programming & Software Fundamentals', 'slug' => 'python-programming-software-fundamentals', 'category_id' => Category::where('slug', 'programming-languages')->first()->id, 'short_description' => 'Learn core programming logic, data structures, object-oriented principles, and automation scripts using Python.', 'duration' => '10 Weeks', 'level' => 'All Level', 'mode' => 'In Person, Online', 'is_featured' => true],
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}

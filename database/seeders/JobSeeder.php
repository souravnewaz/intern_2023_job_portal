<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\JobDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    public function run()
    {
        $titles = [
            'UI/UX Engineer', 'Junior Web Developer', 'Senior Web Developer', 'Junior App Developer', 'Senior App Developer', 'Backend Engineer', 'DevOps Engineer', 'Technical Lead', 'System Engineer', 'Associate Software Engineer', 'Web Designer', 'Shopify Developer', 'Wordpress Plugin Developer', 'Database Engineer', 'Intern Web Developer', 'Intern App Developer', 'Senior Android Developer', 'Senior Kotlin Developer', 'MERN Stack Engineer',
        ];

        $genders = ['male', 'female', 'any'];
        $emp_status = ['part_time', 'full_time'];

        $responsibilites = [
            'Serve as the liaison among the authority, Professors, Doctors, Nurses, Medical Staff and department employees',
            'Provide connection to computers with Organization Active Directory.',
            'Having strong knowledge of DNS & DHCP Servers.'
        ];

        $educations = [
            'Bachelor of Science (BSc) in Computer Science',
            'Preferably B.Sc or M.Sc or equivalent degree from a reputed university.'
        ];

        $experiences = [
            '1 to 5 year(s)',
            'Agile methodology, Artifical Intelligence, DevOps, Process Automation, Programmer/ Software Engineer, SPRING boot',
            'Freshers are also encouraged to apply.'
        ];

        $additionals = [
            'Age 22 to 38 years',
            'Both males and females are allowed to apply',
            'Strong communication skills in English (both written and spoken) will be a Big Plus in the selection process.'
        ];

        $benifits = [
            'Lunch + Snacks',
            'Yearly Salary Review',
            'Yearly Tour'
        ];

        foreach($titles as $title) {
            $job = Job::create([
                'category_id' => 1,
                'company_id' => 1,
                'title' => $title,
                'location' => 'Dhaka, Bangladesh',
                'vacancy' => rand(1, 9),
                'experience' => rand(1, 5),
                'gender' => $genders[array_rand($genders)],
                'employment_status' => $emp_status[array_rand($emp_status)],
                'min_age' => 20,
                'max_age' => 30,
                'salary_starts' => 20000,
                'salary_ends' => 30000,
                'deadline' => date('y-m-d'),
            ]);

            foreach($responsibilites as $responsibility) {
                JobDetail::create([
                    'job_id' => $job->id,
                    'type' => 'responsibility',
                    'title' => $responsibility
                ]);
            }

            foreach($educations as $education) {
                JobDetail::create([
                    'job_id' => $job->id,
                    'type' => 'education',
                    'title' => $education
                ]);
            }

            foreach($experiences as $experience) {
                JobDetail::create([
                    'job_id' => $job->id,
                    'type' => 'experience',
                    'title' => $experience
                ]);
            }

            foreach($additionals as $additional) {
                JobDetail::create([
                    'job_id' => $job->id,
                    'type' => 'additional',
                    'title' => $additional
                ]);
            }

            foreach($benifits as $benifit) {
                JobDetail::create([
                    'job_id' => $job->id,
                    'type' => 'benifit',
                    'title' => $benifit
                ]);
            }
            
        }        
    }
}

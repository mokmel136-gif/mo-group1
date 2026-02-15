<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Categories
        $web = \App\Models\Category::create(['name' => 'تطوير الويب', 'slug' => 'web-development']);
        $design = \App\Models\Category::create(['name' => 'تصميم واجهة المستخدم', 'slug' => 'ui-ux-design']);
        $research = \App\Models\Category::create(['name' => 'دراسة حالة', 'slug' => 'case-study']);

        // Team
        \App\Models\TeamMember::create([
            'name' => 'أليس جونسون',
            'role' => 'كبير مطوري الويب',
            'bio' => 'خبيرة في تطوير التطبيقات المتكاملة مع خبرة تزيد عن 10 سنوات في تقنيات Laravel.',
            'image' => 'team/alice.jpg'
        ]);
        \App\Models\TeamMember::create([
            'name' => 'باسل سمير',
            'role' => 'المدير الإبداعي',
            'bio' => 'مصمم حائز على جوائز يركز على الجماليات البسيطة والوظيفية.',
            'image' => 'team/basel.jpg'
        ]);

        // Projects
        \App\Models\Project::create([
            'category_id' => $web->id,
            'title' => 'منصة تجارة إلكترونية',
            'description' => 'تجربة تسوق حديثة وقابلة للتوسع مع مدفوعات متكاملة ونظام إدارة المخزون.',
            'status' => 'published',
            'thumbnail' => 'projects/ecommerce.jpg'
        ]);
        \App\Models\Project::create([
            'category_id' => $design->id,
            'title' => 'تطبيق بنكي للجوال',
            'description' => 'واجهة نظيفة وآمنة لإدارة التمويل الشخصي، تركز على سهولة الوصول للمستخدم.',
            'status' => 'published',
            'thumbnail' => 'projects/bank.jpg'
        ]);
        \App\Models\Project::create([
            'category_id' => $research->id,
            'title' => 'تحليل أداء تطبيقات الويب 2024',
            'description' => 'دراسة متعمقة في أداء أطر عمل JavaScript الحديثة عبر مختلف الأجهزة المحمولة.',
            'status' => 'published',
            'thumbnail' => 'projects/research.jpg'
        ]);

        \App\Models\User::factory()->create([
            'name' => 'مدير النظام',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);
    }
}

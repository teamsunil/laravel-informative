<?php
use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        $headerMenus = [
            ['title' => 'Home', 'slug' => 'home', 'url' => '/', 'position' => 'header'],
            ['title' => 'About', 'slug' => 'about', 'url' => '/about', 'position' => 'header'],
            ['title' => 'Services', 'slug' => 'services', 'url' => '/services', 'position' => 'header'],
            ['title' => 'Contact', 'slug' => 'contact', 'url' => '/contact', 'position' => 'header'],
            ['title' => 'Blog', 'slug' => 'blog', 'url' => '/blogs', 'position' => 'header'],
        ];

        $footerCompanyMenus = [
            ['title' => 'Terms & Conditions', 'slug' => 'terms', 'url' => '/terms', 'position' => 'footer-company'],
            ['title' => 'Privacy Policy', 'slug' => 'privacy', 'url' => '/privacy', 'position' => 'footer-company'],
            ['title' => 'Support', 'slug' => 'support', 'url' => '/support', 'position' => 'footer-company'],
            ['title' => 'FAQ', 'slug' => 'faq', 'url' => '/faq', 'position' => 'footer-company'],
        ];

        $footerQuickLinks = [
            ['title' => 'About', 'slug' => 'about', 'url' => '/about', 'position' => 'footer-quick'],
            ['title' => 'Services', 'slug' => 'services', 'url' => '/services', 'position' => 'footer-quick'],
            ['title' => 'Team', 'slug' => 'team', 'url' => '/team', 'position' => 'footer-quick'],
            ['title' => 'Contact', 'slug' => 'contact', 'url' => '/contact', 'position' => 'footer-quick'],
        ];

        Menu::insert(array_merge($headerMenus, $footerCompanyMenus, $footerQuickLinks));
    }
}

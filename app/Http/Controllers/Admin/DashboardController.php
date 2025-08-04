<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Models\Page;
use App\Models\Blog;
use App\Models\User;
use App\Models\Contact;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
     public function index()
    {
        $totalPages = Page::count();
        $totalBlogs = Blog::count();
        $totalUsers = User::count();
        $totalContacts = 0;

        $activePages = Page::where('status', 1)->count();
        $inactivePages = Page::where('status', 0)->count();

        $blogMonthlyCounts = Blog::selectRaw('MONTHNAME(created_at) as month, COUNT(*) as count')
            ->where('created_at', '>=', now()->subMonths(11)->startOfMonth())
            ->groupBy('month')
            ->orderByRaw('MIN(created_at)')
            ->pluck('count', 'month')
            ->toArray();

        // Ensure all 12 months are present
        $allMonths = collect(range(0, 11))
            ->mapWithKeys(fn($i) => [Carbon::now()->subMonths($i)->format('F') => 0])
            ->reverse()
            ->merge($blogMonthlyCounts)
            ->toArray();

        $latestBlogs = Blog::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalPages', 'totalBlogs', 'totalUsers', 'totalContacts',
            'activePages', 'inactivePages', 'blogMonthlyCounts', 'latestBlogs'
        ));
    }
}

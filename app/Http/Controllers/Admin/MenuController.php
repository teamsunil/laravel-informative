<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::orderBy('position')->orderBy('order')->get();
        return view('admin.menus.index', compact('menus'));
    }

    public function create()
    {
        return view('admin.menus.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'    => 'required|string|max:255',
            'slug'     => 'required|string|max:255|unique:menus,slug',
            'url'      => 'nullable|string|max:255',
            'position' => 'required|in:header,footer-company,footer-quick',
            'order'    => 'required|integer',
            'status'   => 'required|boolean',
        ]);

        Menu::create($validated);

        return redirect()->route('menus.index')->with('success', 'Menu created successfully.');
    }

    public function edit(Menu $menu)
    {
        return view('admin.menus.edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        $validated = $request->validate([
            'title'    => 'required|string|max:255',
            'slug'     => 'required|string|max:255|unique:menus,slug,' . $menu->id,
            'url'      => 'nullable|string|max:255',
            'position' => 'required|in:header,footer-company,footer-quick',
            'order'    => 'required|integer',
            'status'   => 'required|boolean',
        ]);

        $menu->update($validated);

        return redirect()->route('menus.index')->with('success', 'Menu updated successfully.');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menus.index')->with('success', 'Menu deleted successfully.');
    }

    // Ajax status toggle (optional)
    public function toggleStatus(Menu $menu)
    {
        $menu->status = !$menu->status;
        $menu->save();

        return response()->json(['status' => 'success', 'new_status' => $menu->status]);
    }



        public function sort()
        {
            $menus = Menu::orderBy('position')->orderBy('order')->get()->groupBy('position');
            return view('admin.menus.sort', compact('menus'));
        }

            public function updateOrder(Request $request)
            {
                $orderData = $request->order; // [id1, id2, id3, ...]
                $titles = $request->titles;   // [id => title]
                $urls = $request->urls;       // [id => url]

                foreach ($orderData as $index => $id) {
                    Menu::where('id', $id)->update([
                        'order' => $index + 1,
                        'title' => $titles[$id],
                        'url' => $urls[$id]
                    ]);
                }

                return response()->json(['status' => 'success']);
            }



}

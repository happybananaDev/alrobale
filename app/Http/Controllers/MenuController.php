<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    private Array $images;

    // Load home page with menu list
    public function getMenus() {
        $path = "docs";
        $menus = scandir($path);

        $menuList = [];

        foreach ($menus as $menu) {
            if (basename($menu) != "." && basename($menu) != "..") {
                $menuInfo = [
                    "menuName" => "",
                    "menuFullName" => "",
                ];
                $nameFilter = explode(".", $menu);
                $cleanName = str_replace("_", " ", $nameFilter[0]);
                $menuInfo['menuName'] = $cleanName;
                $menuInfo['menuFullName'] = basename($menu);

                array_push($menuList, $menuInfo);
            }
        }

        // Get images for gallery
        $this->getGallery();

        return view('home', [
            "menus" => $menuList,
            "images" => $this->images,
        ]);
    }

    // Upload new menu
    public function uploadMenu(Request $request) {
        $fileName = $request->file('menuItem')->getClientOriginalName();

        $request->file('menuItem')->storeAs("", $fileName, "docs");

        return redirect('/');
    }

    // Remove menu from navbar list
    public function removeMenu(Request $request) {
        $fileName = $request->input('menuName');
        unlink(public_path() . "/docs/" . $fileName);

        return redirect('/');
    }

    // Load image gallery page
    private function getGallery() {
        $path = "images/gallery";
        $images = scandir($path);
        $polishedImages = [];

        foreach ($images as $image) {
            if ($image != "." && $image != "..") {
                array_push($polishedImages, $image);
            }
        }

        $this->images = $polishedImages;
    }

    // Upload new image to gallery
    public function uploadImage(Request $request) {
        $fileName = $request->file('image')->getClientOriginalName();

        $request->file('image')->storeAs("", $fileName, "gallery");

        return redirect('/');
    }

    // Remove image from gallery
    public function removeImage(Request $request) {
        $fileName = $request->input('imageName');
        //dd($fileName);
        unlink(public_path() . "/images/gallery/" . $fileName);

        return redirect('/');
    }

    // Set site language
    public function setLang($locale) {
        app()->setLocale($locale);
        session()->put('locale', $locale);

        return $this->getMenus();
    }
}

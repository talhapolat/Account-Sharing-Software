<?php

namespace App\Http\Controllers;

use App\Account;
use App\Category;
use App\Comment;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $accounts = Account::all()->sortByDesc('id')->take(10);
        $comments = Comment::all()->where('statu', '1')->sortByDesc('id')->take(10);
        $tags = Tag::all()->random(15);
        $categoryname = "Premium";
        $description = "Free Premium Accounts, Brazzers, XHamster, Adult videos, Mobile porn, Brazzers account, Xhamster account";
        $keywords = "Premium,Free Accounts,Porn, Free Porn, Adult";
        return view('home', compact('categories', 'accounts', 'comments', 'tags', 'categoryname', 'description', 'keywords'));
    }

    public function category($slug_category)
    {
        $categories = Category::all();
        $category = Category::where('slug', $slug_category)->firstOrFail();
        $accounts = $category->accounts->sortByDesc('id')->take(10);
        $comments = Comment::all()->where('statu', '1')->sortByDesc('id')->take(10);
        $tags = Tag::all()->random(15);
        $categoryname = $category->title;
        $description = $category->description;
        $keywords = $category->keywords;
        return view('home', compact('categories', 'accounts', 'comments', 'tags', 'categoryname', 'description', 'keywords'));
    }

    public function comment()
    {
        $comment = Comment::create([
            'name'    => request('firstname'),
            'account' => request('account'),
            'comment' => request('message'),
            'statu' => 1
        ]);

        return redirect()->route('home');
    }

    public function tagmanager($slug_tag)
    {
        $tag = Tag::where('url', $slug_tag)->firstOrFail();
        $categories = Category::all();
        $category = Category::where('slug', $tag->info)->firstOrFail();
        $accounts = $category->accounts->sortByDesc('id')->take(10);
        $comments = Comment::all()->where('statu', '1')->take(10)->sortByDesc('id');;
        $tags = Tag::all()->random(15);
        $categoryname = $category->title;
        $description = $category->description;
        $keywords = $category->keywords;
        return view('home', compact('categories', 'accounts', 'comments', 'tags', 'categoryname', 'description', 'keywords'));
    }


    public function sitemap()
    {
        $tags = Tag::all()->sortByDesc('id');
        $now = Carbon::now()->toAtomString();
        $content = view('sitemap', compact('tags','now'));
        return response($content)->header('Content-Type', 'application/xml');
    }



}

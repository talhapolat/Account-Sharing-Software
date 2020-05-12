<?php

namespace App\Http\Controllers;

use App\Account;
use App\Category;
use App\CategoryAccount;
use App\Comment;
use App\Tag;
use App\UserModel;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Yaf\Session;

class AdminController extends Controller
{
    public function index()
    {

        if (request()->session()->get('userlogin') != true)
            return redirect()->route('adminlogin');

        $categories = Category::all();
        $accounts = Account::all()->take(10)->sortByDesc('id');
        $comments = Comment::all()->take(10)->sortByDesc('id');
        $tags = Tag::all();
        return view('admin', compact('categories', 'accounts', 'comments', 'tags'));
    }

    public function girisform()
    {
        return view('adminlogin');
    }

    public function giris(Request $request)
    {

        $username = request('username');
        $password = request('password');



        $user = UserModel::all()->where('username', $username)->where('password', $password)->first();

        if ($user)
        {
            $request->session()->put('userlogin', true);
            return redirect()->route('adminindex');
        } else
             return redirect()->route('adminlogin');

    }

    public function adminchange()
    {
        return view('adminchange');
    }

    public function changepassword(Request $request)
    {

        $username = $request->get('username');
        $password = $request->get('password');

        $user = UserModel::all()->first();

        $user->username = $username;
        $user->password = $password;

        $user->update(['username'=>$username]);
        $user->update(['password'=>$password]);
        $request->session()->flush();
        return redirect()->route('adminlogin');

    }


    public function category()
    {
        if (request()->session()->get('userlogin') != true)
            return redirect()->route('adminlogin');

        $categories = Category::all()->sortByDesc('id');;
        $tags = Tag::all();
        return view('admincategory', compact('categories', 'tags'));
    }

    public function addcategory()
    {
        $category = Category::create([
            'title'    => request('title'),
            'slug' => request('slug'),
            'description' => request('description'),
            'keywords' => request('keywords')
        ]);

        return redirect()->route('admincategory');
    }

    public function deletecategory($id)
    {

        $counter = CategoryAccount::all()->where('category_id', $id)->count();

        for($i=0; $i<$counter; $i++){
            $accountid = CategoryAccount::all()->where('category_id', $id)->skip($i)->first()->account_id;
            Account::destroy($accountid);
        }
        Category::destroy($id);
        return redirect()->route('admincategory');
    }

    public function account()
    {
        if (request()->session()->get('userlogin') != true)
            return redirect()->route('adminlogin');

        $accounts = Account::all()->sortByDesc('id');;
        $categories = Category::all();
        return view('adminaccount', compact('accounts', 'categories'));
    }

    public function addaccount()
    {
        $account = Account::create([
            'username'    => request('username'),
            'password' => request('password')
        ]);

        $categoryaccount = CategoryAccount::create([
            'category_id'    => request('category'),
            'account_id' => $account->id
        ]);

        return redirect()->route('adminaccount');
    }

    public function deleteaccount($id)
    {
        Account::destroy($id);
        return redirect()->route('adminaccount');
    }

    public function comment()
    {
        if (request()->session()->get('userlogin') != true)
            return redirect()->route('adminlogin');

        $comments = Comment::all()->sortByDesc('id');
        $categories = Category::all();
        return view('admincomment', compact('comments', 'categories'));
    }

    public function addcomment()
    {
        $comment = Comment::create([
            'name'    => request('firstname'),
            'account' => request('account'),
            'comment' => request('message'),
            'statu' => 1
        ]);

        return redirect()->route('admincomment');
    }

    public function deletecomment($id)
    {
        Comment::destroy($id);
        return redirect()->route('admincomment');
    }


    public function tag()
    {
        if (request()->session()->get('userlogin') != true)
            return redirect()->route('adminlogin');

        $categories = Category::all();
        $tags = Tag::all()->sortByDesc('id');
        return view('admintag', compact('tags', 'categories'));
    }

    public function addtag()
    {
        $tag = Tag::create([
            'title'    => request('title'),
            'url' => request('url'),
            'info' => request('info')
        ]);
        return redirect()->route('admintag');
    }

    public function deletetag($id)
    {
        Tag::destroy('id', $id);
        return redirect()->route('admintag');
    }

    public function adminout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('adminlogin');
    }
}

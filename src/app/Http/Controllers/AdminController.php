<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use App\Models\Content;
use App\Models\Language;

class AdminController extends Controller
{

    // 管理画面
    public function index()
    {
        $user = Auth::user();
        $contents = Content::all();
        $languages = Language::all();
        return view('admin.index', compact('user', 'contents', 'languages'));
    }

    // 学習コンテンツ追加
    public function contentAddIndex()
    {
        return view('admin.content.add');
    }
    public function contentAdd(Request $request)
    {
        Content::create([
            'content' => $request->content,
            'color' => $request->color
        ]);
        return redirect('/admin/index');
    }

    //コンテンツ編集
    public function contentEditIndex($id)
    {
        $content = Content::find($id);
        return view('/admin/content/edit', compact('content'));
    }
    public function contentEdit(Request $request, $content)
    {
        $content = Content::find($content);
        $content->update([
            "content" => $request->content
        ]);
        return redirect('admin/index');
    }

    //コンテンツ削除
    public function contentDeleteIndex($id)
    {
        $content = Content::find($id);
        return view('/admin/content/delete', compact('content'));
    }
    public function contentDelete(Request $request, $id)
    {
        $content = Content::find($id);
        $content->delete();
        return redirect('admin/index');
    }




    // 学習言語追加
    public function languageAddIndex()
    {
        return view('admin.language.add');
    }
    public function languageAdd(Request $request)
    {
        Language::create([
            'language' => $request->language,
            'color' => $request->color
        ]);
        return redirect('/admin/index');
    }

    //言語編集
    public function languageEditIndex($id)
    {
        $language = Language::find($id);
        return view('/admin/language/edit', compact('language'));
    }
    public function languageEdit(Request $request, $language)
    {
        $language = Language::find($language);
        $language->update([
            "language" => $request->language
        ]);
        return redirect('admin/index');
    }

    //言語削除
    public function languageDeleteIndex($id)
    {
        $language = Language::find($id);
        return view('/admin/language/delete', compact('language'));
    }
    public function languageDelete(Request $request, $id)
    {
        $language = Language::find($id);
        $language->delete();
        return redirect('admin/index');
    }


    //ユーザーの編集・削除（登録はデフォルト）
    public function user()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    //ユーザー削除
    public function userDeleteIndex($id)
    {
        $user = User::find($id);
        return view('/admin/user/delete', compact('user'));
    }
    public function userDelete(Request $request, $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('admin/user/index');
    }

    //ユーザー編集
    public function userEditIndex($id)
    {
        $user = User::find($id);
        return view('/admin/user/edit', compact('user'));
    }
    public function userEdit(Request $request, $user)
    {
        $user = User::find($user);
        $user->update($request->only(['name']));
        return redirect('admin/user/index');
    }

}

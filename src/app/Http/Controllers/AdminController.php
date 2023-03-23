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
    //ユーザーの編集・削除（登録はデフォルト）
    public function user()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    //削除
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

    //編集
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

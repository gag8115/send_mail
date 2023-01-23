<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmailAddressList;
use App\Mail\GeneralPurposeMail;

class MainController extends Controller
{
    // 一覧画面のアクション。
    public function list()
    {
        $mailList = (new EmailAddressList)->getData();

        return view('parts.list', compact('mailList'));
    }

    // メール送信処理。
    public function processingMail(Request $request)
    {
        foreach ($request->checks as $value) {
            \Mail::send(new GeneralPurposeMail($value));
        }
        
        return view('parts.complete');
    }

    // 新規作成画面のアクション。
    public function create()
    {
        return view('parts.create');
    }

    // 新規作成の処理。
    public function processingCreate(Request $request)
    {
        (new EmailAddressList)->createData($request);

        return redirect()->route('list');
    }

    // 編集画面のアクション。
    public function edit(Request $request, $id)
    {        
        $data = (new EmailAddressList)->getDataForEdit($id);

        return view('parts.edit', compact('data'));
    }

    // 編集の処理。
    public function processingEdit(Request $request, $id)
    {
        (new EmailAddressList)->editData($request, $id);

        return redirect()->route('list');
    }

    // 削除の処理。
    public function processingDelete(Request $request, $id)
    {
        (new EmailAddressList)->deleteData($id);

        return redirect()->route('list');
    }

}

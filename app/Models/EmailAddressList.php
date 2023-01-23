<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailAddressList extends Model
{
    use HasFactory;

    protected $guarded = array('id');
    // 今回は、テーブル名を指定。
    protected $table = 'email_address_list';

    // 一覧取得処理。
    public function getData() {

        $result = $this->prepareData()
            ->orderBy('created_at', 'desc')
            ->get();

        $mailList = [];

        // データを配列に整形。
        foreach ($result as $item) {

            array_push($mailList, [
                'id' => $item->id,
                'user' => $item->user,
                'email' => $item->email
            ]);            
        };

        return $mailList;
    }

    // 新規作成処理。
    public function createData($request)
    {
        $nowTime = date("Y/m/d H:i:s");

        $postData = [
            'user' => (String)e($request->user),
            'email' => (String)e($request->email),
            'created_at' => $nowTime,
            'updated_at' => $nowTime,
        ];

        self::create($postData);
    }

    // 編集処理に必要である、対象の情報を取得。
    public function getDataForEdit($id)
    {
        $result = $this->prepareData()
            ->where('id', (int)$id)
            ->first()
            ->toArray();

        return $result;
    }

    // 編集処理。
    public function editData($request, $id)
    {
        $nowTime = date("Y/m/d H:i:s");

        $this->prepareGenericGql($id)
            ->update([
                'user' => (string)$request->user,
                'email' => (string)$request->email,
                'updated_at' => $nowTime,
            ]);
    }

    // データを削除する。
    public function deleteData($id)
    {
        $nowTime = date("Y/m/d H:i:s");

        $this->prepareGenericGql($id)
            ->update([
                'deleted_at' => $nowTime,
            ]);    
    }

    // データ取得に関して、処理をまとめている。
    private function prepareData()
    {
        return self::select([
            'id',
            'user',
            'email',
        ])
            // 削除されたかどうかは、フラグで管理している。
            ->whereNull('deleted_at');
    }

    // updateとdeleteで共通するSQLを切り出している。
    private function prepareGenericGql($id)
    {
        return self::where('id', (int)$id)
            // 削除されたレコードには、フラグを付ける。
            ->whereNull('deleted_at');
    }
}

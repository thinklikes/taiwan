<?php

use Illuminate\Database\Seeder;

class PageAuthsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //先清空
        DB::table('erp_page_auths')->truncate();

        $rules = [
            "0"       => [9, 1, 0, -1], //"首頁"
            "1"       => [9, 1, 0, -1], //"進銷存首頁"
            "101"     => [9, 1, 0, -1], //"基本資料管理"
            "10101"   => [9, 1, 0, -1], //"客戶資料管理"
            "1010101" => [9, 1, 0, -1], //"新增單筆客戶資料"
            "1010102" => [9, 1, 0],     //"存入單筆客戶資料"
            "1010103" => [9, 1, 0, -1], //"檢視單筆客戶資料"
            "1010104" => [9, 1, 0, -1], //"維護單筆客戶資料"
            "1010105" => [9, 1, 0],     //"更新單筆客戶資料"
            "1010106" => [9, 1, 0],     //"刪除單筆客戶資料"
            "10102"   => [9, 1, 0, -1], //"供應商資料管理"
            "1010201" => [9, 1, 0, -1], //"新增單筆供應商資料"
            "1010202" => [9, 1, 0],     //"存入單筆供應商資料"
            "1010203" => [9, 1, 0, -1], //"檢視單筆供應商資料"
            "1010204" => [9, 1, 0, -1], //"維護單筆供應商資料"
            "1010205" => [9, 1, 0],     //"更新單筆供應商資料"
            "1010206" => [9, 1, 0],     //"刪除單筆供應商資料"
            "10103"   => [9, 1, 0, -1], //"料品資料管理"
            "1010301" => [9, 1, 0, -1], //"新增單筆料品資料"
            "1010302" => [9, 1, 0],     //"存入單筆料品資料"
            "1010303" => [9, 1, 0, -1], //"檢視單筆料品資料"
            "1010304" => [9, 1, 0, -1], //"維護單筆料品資料"
            "1010305" => [9, 1, 0],     //"更新單筆料品資料"
            "1010306" => [9, 1, 0],     //"刪除單筆料品資料"
            "10104"   => [9, 1, 0, -1], //"料品單位管理"
            "1010401" => [9, 1, 0, -1], //"新增料品單位資料"
            "1010402" => [9, 1, 0],     //"存入料品單位資料"
            "1010403" => [9, 1, 0, -1], //"檢視料品單位資料"
            "1010404" => [9, 1, 0, -1], //"維護料品單位資料"
            "1010405" => [9, 1, 0],     //"更新料品單位資料"
            "1010406" => [9, 1, 0],     //"刪除料品單位資料"
            "10105"   => [9, 1, 0, -1], //"料品類別管理"
            "1010501" => [9, 1, 0, -1], //"新增料品類別資料"
            "1010502" => [9, 1, 0],     //"存入料品類別資料"
            "1010503" => [9, 1, 0, -1], //"檢視料品類別資料"
            "1010504" => [9, 1, 0, -1], //"維護料品類別資料"
            "1010505" => [9, 1, 0],     //"更新料品類別資料"
            "1010506" => [9, 1, 0],     //"刪除料品類別資料"
            "10106"   => [9, 1, 0, -1], //"付款方式管理"
            "1010601" => [9, 1, 0, -1], //"新增單筆付款方式"
            "1010602" => [9, 1, 0],     //"存入單筆付款方式"
            "1010603" => [9, 1, 0, -1], //"檢視單筆付款方式"
            "1010604" => [9, 1, 0, -1], //"維護單筆付款方式"
            "1010605" => [9, 1, 0],     //"更新單筆付款方式"
            "1010606" => [9, 1, 0],     //"刪除單筆付款方式"
            "10107"   => [9, 1, 0, -1], //"倉庫資料管理"
            "1010701" => [9, 1, 0, -1], //"新增單筆倉庫資料"
            "1010702" => [9, 1, 0],     //"存入單筆倉庫資料"
            "1010703" => [9, 1, 0, -1], //"檢視單筆倉庫資料"
            "1010704" => [9, 1, 0, -1], //"維護單筆倉庫資料"
            "1010705" => [9, 1, 0],     //"更新單筆倉庫資料"
            "1010706" => [9, 1, 0],     //"刪除單筆倉庫資料"
            "102"     => [9, 1, 0, -1], //"進貨作業"
            "10201"   => [9],           //"採購單管理"
            "1020101" => [9],           //"新增採購單據"
            "1020102" => [9],           //"存入採購單據"
            "1020103" => [9],           //"檢視採購單據"
            "1020104" => [9],           //"維護採購單據"
            "1020105" => [9],           //"更新採購單據"
            "1020106" => [9],           //"刪除採購單據"
            "10202"   => [9, 1, 0, -1], //"進貨單管理"
            "1020201" => [9, 1, 0, -1], //"新增進貨單據"
            "1020202" => [9, 1, 0],     //"存入進貨單據"
            "1020203" => [9, 1, 0, -1], //"檢視進貨單據"
            "1020204" => [9, 1, 0, -1], //"維護進貨單據"
            "1020205" => [9, 1, 0],     //"更新進貨單據"
            "1020206" => [9, 1, 0],     //"刪除進貨單據"
            "10203"   => [9, 1, 0, -1], //"進貨退回單管理"
            "1020301" => [9, 1, 0, -1], //"新增進貨退回單據"
            "1020302" => [9, 1, 0],     //"存入進貨退回單據"
            "1020303" => [9, 1, 0, -1], //"檢視進貨退回單據"
            "1020304" => [9, 1, 0, -1], //"維護進貨退回單據"
            "1020305" => [9, 1, 0],     //"更新進貨退回單據"
            "1020306" => [9, 1, 0],     //"刪除進貨退回單據"
            "10204"   => [9, 1, 0, -1], //"付款單管理"
            "1020401" => [9, 1, 0, -1], //"新增付款單"
            "1020402" => [9, 1, 0],     //"存入付款單"
            "1020403" => [9, 1, 0, -1], //"檢視付款單"
            "1020404" => [9, 1, 0, -1], //"維護付款單"
            "1020405" => [9, 1, 0],     //"更新付款單"
            "1020406" => [9, 1, 0],     //"刪除付款單"
            "10205"   => [9, 1, 0, -1], //"應付帳款沖銷單管理"
            "1020501" => [9, 1, 0, -1], //"新增應付帳款沖銷單"
            "1020502" => [9, 1, 0],     //"存入應付帳款沖銷單"
            "1020503" => [9, 1, 0, -1], //"檢視應付帳款沖銷單"
            "1020504" => [9, 1, 0, -1], //"維護應付帳款沖銷單"
            "1020505" => [9, 1, 0],     //"更新應付帳款沖銷單"
            "1020506" => [9, 1, 0],     //"刪除應付帳款沖銷單"
            "103"     => [9, 1, 0, -1], //"銷貨作業"
            "10301"   => [9],           //"訂購單管理"
            "1030101" => [9],           //"新增訂購單據"
            "1030102" => [9],           //"存入訂購單據"
            "1030103" => [9],           //"檢視訂購單據"
            "1030104" => [9],           //"維護訂購單據"
            "1030105" => [9],           //"更新訂購單據"
            "1030106" => [9],           //"刪除訂購單據"
            "10302"   => [9, 1, 0, -1], //"銷貨單管理"
            "1030201" => [9, 1, 0, -1], //"新增銷貨單據"
            "1030202" => [9, 1, 0],     //"存入銷貨單據"
            "1030203" => [9, 1, 0, -1], //"檢視銷貨單據"
            "1030204" => [9, 1, 0, -1], //"維護銷貨單據"
            "1030205" => [9, 1, 0],     //"更新銷貨單據"
            "1030206" => [9, 1, 0],     //"刪除銷貨單據"
            "10303"   => [9, 1, 0, -1], //"銷貨退回單管理"
            "1030301" => [9, 1, 0, -1], //"新增銷貨退回單據"
            "1030302" => [9, 1, 0],     //"存入銷貨退回單據"
            "1030303" => [9, 1, 0, -1], //"檢視銷貨退回單據"
            "1030304" => [9, 1, 0, -1], //"維護銷貨退回單據"
            "1030305" => [9, 1, 0],     //"更新銷貨退回單據"
            "1030306" => [9, 1, 0],     //"刪除銷貨退回單據"
            "10304"   => [9, 1, 0, -1], //"銷貨日報表"
            "10305"   => [9, 1, 0, -1], //"對帳單列印"
            "10306"   => [9, 1, 0, -1], //"收款單管理"
            "1030601" => [9, 1, 0, -1], //"新增收款單"
            "1030602" => [9, 1, 0],     //"存入收款單"
            "1030603" => [9, 1, 0, -1], //"檢視收款單"
            "1030604" => [9, 1, 0, -1], //"維護收款單"
            "1030605" => [9, 1, 0],     //"更新收款單"
            "1030606" => [9, 1, 0],     //"刪除收款單"
            "10307"   => [9, 1, 0, -1], //"應收帳款沖銷單管理"
            "1030701" => [9, 1, 0, -1], //"新增應收帳款沖銷單"
            "1030702" => [9, 1, 0],     //"存入應收帳款沖銷單"
            "1030703" => [9, 1, 0, -1], //"檢視應收帳款沖銷單"
            "1030704" => [9, 1, 0, -1], //"維護應收帳款沖銷單"
            "1030705" => [9, 1, 0],     //"更新應收帳款沖銷單"
            "1030706" => [9, 1, 0],     //"刪除應收帳款沖銷單"
            "104"     => [9, 1, 0, -1], //"存貨管理作業"
            "10401"   => [9, 1, 0, -1], //"調整單管理"
            "1040101" => [9, 1, 0, -1], //"新增調整單"
            "1040102" => [9, 1, 0],     //"存入調整單"
            "1040103" => [9, 1, 0, -1], //"檢視調整單"
            "1040104" => [9, 1, 0, -1], //"維護調整單"
            "1040105" => [9, 1, 0],     //"更新調整單"
            "1040106" => [9, 1, 0],     //"刪除調整單"
            "10402"   => [9, 1, 0, -1], //"轉倉單管理"
            "1040201" => [9, 1, 0, -1], //"新增轉倉單"
            "1040202" => [9, 1, 0],     //"存入轉倉單"
            "1040203" => [9, 1, 0, -1], //"檢視轉倉單"
            "1040204" => [9, 1, 0, -1], //"維護轉倉單"
            "1040205" => [9, 1, 0],     //"更新轉倉單"
            "1040206" => [9, 1, 0],     //"刪除轉倉單"
            "10403"   => [9, 1, 0, -1], //"庫存異動表"
            "1040301" => [9, 1, 0, -1], //"庫存異動表-列出查詢結果"
            '10404'   => [9, 1, 0, -1], //'庫存總表'
            '1040401' => [9, 1, 0, -1], //'庫存總表-列出查詢結果'
            "105"     => [9, 1, 0, -1], //"系統"
            "10501"   => [9, 1],        //"系統參數設定"
            "1050101" => [9, 1],        //"維護系統參數"
            "1050102" => [9, 1],        //"更新系統參數"
            "10502"   => [9, 1],        //"使用者資料管理"
            "1050201" => [9, 1],        //"新增使用者資料"
            "1050202" => [9, 1],        //"存入使用者資料"
            "1050203" => [9, 1],        //"檢視使用者資料"
            "1050204" => [9, 1],        //"維護使用者資料"
            "1050205" => [9, 1],        //"更新使用者資料"
            "1050206" => [9, 1],        //"刪除使用者資料"
            "10504" => [9, 1],        //"資料備份匯出"
            "10505"   => [9, 1],        //"資料備份匯入"
            "10506"   => [9, 1, 0, -1], //"系統更新記錄"
            "106"     => [9, 1, 0],     //"電商平台作業"
            "10601"   => [9, 1, 0],     //"電商平台品名對照表"
            "1060101"   => [9, 1, 0],     //"電商平台品名對照表編輯器"
            "10602"   => [9, 1, 0],     //"電商平台訂單EXCEL上傳"
            "10603"   => [9, 1, 0],     //"電商平台訂單管理"
            "1060301" => [9, 1, 0],     //"電商平台訂單上傳紀錄"
            "1060302" => [9, 1, 0],     //"電商平台訂單內容"
        ];
        $inserts = [];
        foreach ($rules as $code => $auths) {
            foreach($auths as $auth) {
                $inserts[] = ['page_code' => $code, 'auth_level' => $auth];
            }
        }

        DB::table('erp_page_auths')->insert($inserts);
    }
}

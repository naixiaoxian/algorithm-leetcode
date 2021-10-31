<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\testLog;
use Illuminate\Support\Facades\DB;

class TestLogController extends Controller
{
    //
    public function testCommit(){
        \DB::beginTransaction();
        try {
            \DB::beginTransaction();
            \DB::insert("insert into test_logs set name='an'");
            \DB::rollBack();         //子事务回滚
            \DB::insert("insert into test_logs set name='bn'");
            \DB::rollBack();
        }catch (\Exception $e) {
            \DB::rollBack();
            echo $e->getMessage();
            exit;
        }
        return testLog::query()->get()->toArray();
    }
}

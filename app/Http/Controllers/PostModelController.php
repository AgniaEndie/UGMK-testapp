<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostHandler;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PostModelController extends Controller
{
    /**
     * Отображение списка элементов
     */
    public function index()
    {
        $elems = Post::paginate(2); //2 - количество элементов на странице, поставил 2 для быстрого тестирования
        return view('dashboard', compact('elems'));
    }

    /**
     * Создание новой записи
     */
    public function create(Request $request)
    {
        $post = new Post;

        $post->id = $request["id"];
        $post->name = $request["name"];
        $post->itemType = $request["itemType"];
        $post->measureName = $request["measureName"];
        $post->quantity = $request["quantity"];
        $post->price = $request["price"];
        $post->costPrice = $request["costPrice"];
        $post->sumPrice = $request["sumPrice"];
        $post->tax = $request["tax"];
        $post->taxPercent = $request["taxPercent"];
        $post->discount = $request["discount"];
        //&txn_id=$id&txn_date=$txn_date&account=$name&sum=$price&type=sometype


        try {
            //test-branch свой сервер не отключенный (Основной сервер не возвращал валидный ответ, вследствие чего был написан свой)
//            $apiResponse = Http::get("http://foxworld.online:25666/", [
//                "command" => "pay",
//                "txn_id" => $post->id,
//                "txn_date" => Carbon::now()->timestamp,
//                "account" => $post->name,
//                "sum" => $post->price,
//                "type" => "sometype"
//            ]);

            $apiResponse = Http::get("https://46.160.151.173/", [
                "command" => "pay",
                "txn_id" => $post->id,
                "txn_date" => Carbon::now()->timestamp,
                "account" => $post->name,
                "sum" => $post->price,
                "type" => "sometype"
            ]);

            $responseModel = new PostHandler;
            $responseModel->id = uuid_create();
            $responseModel->post = $post->id;
            $responseModel->check_code = $apiResponse["check_code"];
            $responseModel->comment = $apiResponse["comment"];
            $responseModel->status = $apiResponse["status"];

            $post->saveOrFail();
            $responseModel->saveOrFail();
        } catch (\Throwable $e) {
            return Response([
                "error" => $e->getMessage()
            ], 500);
        }

        return $post;
    }
}

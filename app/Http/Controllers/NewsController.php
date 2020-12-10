<?php

namespace App\Http\Controllers;

use App\Http\Requests\News\CreateNewsRequest;
use App\Http\Requests\News\UpdateNewsRequest;
use App\Models\News;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class NewsController extends Controller
{
    public function index(Request $request): View
    {

        $user = $request->user();

        $newss = News::query()
            ->orderBy('updated_at', 'DESC')
            ->get()
            ->toArray();

        return view('newss', [
            'newss' => $newss,
            'userEmail' => $user->email ?? null
        ]);
    }

    public function show( UpdateNewsRequest $request,$newsId)
    {

        $user =$request->user();

        $news = News::query()
            ->where('id', '=', $newsId)
            ->first();

        if (!$news) {
            return response()->json(['error' => 'News not found with ID: ' . $newsId], 404);
        }

            return response()->view('newwssid',[
                'news' => $news,
                'userid' => $user->id ?? null ,
                'newsId' => $news->user_id ?? null
            ]);

    }

    public function store(CreateNewsRequest  $request)
    {
        /** @var User|null $user */
        $user = $request->user();

        if (!$user) {
            return response()->json(['error' => 'You should be authorized to create news'], 401);
        }

        $validated = $request->validated();

        $news = new News();
        $news->user_id = $user->id;
        $news->title = $validated['title'];
        $news->text = $validated['text'];
        $news->save();

        return redirect('/newss');
    }

    public function update(UpdateNewsRequest $request, $newsId)
    {


        $user =$request->user();

        $news = News::query()
            ->where('id', '=', $newsId)
            ->first();

        if (!$news) {
            return response()->json(['error' => 'News not found with ID: ' . $newsId], 404);
        }


              $validated = $request->validated();


              $news->title = $validated['title'] ?? $news->title;
              $news->text = $validated['text'] ?? $news->text;
              $news->save();

        return response()->view('newwssid',[
            'news' => $news,
            'userid' => $user->id ?? null ,
            'newsId' => $news->user_id ?? null
        ]);


    }

    public function destroy($newsId)
    {


        $news = News::query()
            ->where('id', '=', $newsId)
            ->first();

        if (!$news) {
            return response()->json(['error' => 'News not found with ID: ' . $newsId], 404);
        }
        $user_id = User::query()->where("id");
        $news_id = News::query()->where("user_id");
        if ($user_id = $news_id ) {
            $news->delete();
        }

        return response()->view( 'delite');


    }
}

<?php

namespace App\Http\Controllers;

use App\Article;
use App\ArticleCategory;
use App\HomePageFeature;
use Illuminate\Http\Request;

class PageController extends Controller
{
    
    public function index()
    {
        $articles = Article::all()->sortByDesc('id')->take(20);
        $features = HomePageFeature::all()->sortByDesc('id')->take(10);
        $popular = Article::all()->sortByDesc('views')->take(5);
        $justin = Article::all()->sortByDesc('published_at')->take(5);
        $didyoumiss = Article::all()->take(3);
        return view('index', compact('articles', 'features','popular','justin','didyoumiss'));
    }

    public function category($category)
    {
        $category = ArticleCategory::where('slug', $category)->firstOrFail();
        $articles = Article::where('category_id', $category->id)->get()->sortByDesc('id')->take(20);
        return view('category', compact('category', 'articles'));
    }

    public function articleView($date, $article)
    {
        $article = Article::where('date', $date)->where('slug', $article)->firstOrFail();
        $category = ArticleCategory::whereId($article->category_id)->firstOrFail();
        if ($article->category != $category) { abort(404); }
        $article->views++;
        $article->save();
        return view('article', compact('article', 'category'));
    }

    public function other()
    {
        return view('other');
    }

    public function emergency()
    {
        return view('emergency');
    }

    public function tweet(Request $request)
    {

        $hookObject = json_encode([
            /*
             * The general "message" shown above your embeds
             */
            "content" => $request->get('tweetContent'),
            /*
             * The username shown in the message
             */
            "username" => '@'.$request->get('handle'),
            /*
             * The image location for the senders image
             */
            "avatar_url" => $request->get('avatar'),
            /*
             * Whether or not to read the message in Text-to-speech
             */
            "tts" => false,
            /*
             * File contents to send to upload a file
             */
            // "file" => "",
            /*
             * An array of Embeds
             */
            /*"embeds" => [
                [

                    "title" => $article->title,


                    "type" => "rich",

                    "description" => $article->caption,
                    "url" => route('article.view', ['article' => $article->id, 'category' => $category->id]),

                    "timestamp" => date('Y-m-d H:i:s'),

                    "color" => hexdec( "000000" ),

                    "footer" => [
                        "text" => "Created ".date('Y-m-d H:i:s'),
                    ],

                    "author" => [
                        "name" => $article->author
                    ],

                    "fields" => [
                        [
                            "name" => "Data A",
                            "value" => "Value A",
                            "inline" => false
                        ],
                    ]
                ]
            ]*/

        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );

        $ch = curl_init();

        curl_setopt_array( $ch, [
            CURLOPT_URL => config('app.DISCORD_TWITTER_WEBHOOK'),
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $hookObject,
            CURLOPT_HTTPHEADER => [
                "Length" => strlen( $hookObject ),
                "Content-Type" => "application/json"
            ]
        ]);

        $response = curl_exec( $ch );
        curl_close( $ch );


    }
}

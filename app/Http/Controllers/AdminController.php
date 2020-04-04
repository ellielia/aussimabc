<?php

namespace App\Http\Controllers;

use App\Article;
use App\ArticleCategory;
use App\ByElection;
use App\FederalElection;
use App\Helpers;
use App\Tweet;
use Illuminate\Support\Facades\Auth;
use PDF;
use Illuminate\Http\Request;
use Psy\Util\Str;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->journalist == false && Auth::user()->administrator == false)
        {
            return view('admin.noaccess');
        }
        $articles = Article::all()->sortByDesc('published_at');
        $categories = ArticleCategory::all();
        return view('admin.index', compact('articles', 'categories'));
    }

    public function addCategory(Request $request)
    {
        $category = new ArticleCategory();
        $category->name = $request->get('name');
        $category->description = $request->get('description');
        $category->bg_url = $request->get('bg_url');
        $category->slug = \Illuminate\Support\Str::slug($request->get('name'));
        if ($request->get('show_on_nav') == "yes")
        {
            $category->show_on_nav = 1;
        } else {
            $category->show_on_nav = 0;
        }
        $category->save();

        return back()->with('alert', 'Category added!');
    }

    public function viewArticle($id)
    {
        $article = Article::whereId($id)->firstOrFail();
        $categories = ArticleCategory::all();
        return view('admin.viewarticle', compact('article', 'categories'));
    }

    public function editArticle(Request $request, $id)
    {
        $article = Article::whereId($id)->firstOrFail();
        $article->fill($request->all());
        $article->last_edited_at = date('Y-m-d H:i:s');
        $article->save();
        return response()->json(['msg' => 'Saved changes'], 200);
    }

    public function publishArticle(Request $request)
    {
        $article = new Article();
        $article->fill($request->all());
        $article->slug = \Illuminate\Support\Str::slug($article->title);
        $article->published_at = date('Y-m-d H:i:s');
        $article->date = date('Y-m-d');
        $article->save();

        $hookObject = json_encode([
            /*
             * The general "message" shown above your embeds
             */
            "content" => "",
            /*
             * The username shown in the message
             */
            "username" => "ABC News",
            /*
             * The image location for the senders image
             */
            "avatar_url" => "https://www.abc.net.au/news/image/10477576-3x2-940x627.jpg",
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
            "embeds" => [
                [
                    // Set the title for your embed
                    "title" => $article->title,

                    // The type of your embed, will ALWAYS be "rich"
                    "type" => "rich",

                    // A description for your embed
                    "description" => $article->caption,

                    // The URL of where your title will be a link to
                    "url" => route('news.article', ['date' => $article->date, 'article' => $article->slug]),

                    "thumbnail" => date('Y-m-d H:i:s'),

                    // The integer color to be used on the left side of the embed
                    "color" => hexdec( "000000" ),

                    "thumbnail" => [
                        "url" => $article->image_url,
                    ],

                    "footer" => [
                        "text" => "Published ".date('Y-m-d H:i:s'),
                    ],

                    "author" => [
                        "name" => $article->author
                    ],

                    /*"fields" => [
                        [
                            "name" => "Data A",
                            "value" => "Value A",
                            "inline" => false
                        ],
                    ]*/
                ]
            ]

        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );
        $ch = curl_init();
        curl_setopt_array( $ch, [
            CURLOPT_URL => config('app.DISCORD_WEBHOOK'),
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $hookObject,
            CURLOPT_HTTPHEADER => [
                "Length" => strlen( $hookObject ),
                "Content-Type" => "application/json"
            ]
        ]);
        $response = curl_exec( $ch );
        curl_close( $ch );

        return redirect()->route('admin.article.view', $article->id);
    }

    public function articleJson($id)
    {
        $article = Article::whereId($id)->firstOrFail();
        return ($article->toJson(JSON_PRETTY_PRINT));
    }

    public function articlePdf($id)
    {
        $article = Article::whereId($id)->firstOrFail();
        $pdf = PDF::loadView('admin.articlepdf', compact('article'));
        return $pdf->download($article->title.'.pdf');
    }

    public function tweet(Request $request)
    {

        $tweet = new Tweet();
        $tweet->handle = $request->get('handle');
        $tweet->avatar = $request->get('avatar');
        $tweet->timestamp = date('Y-m-d H:i:s');
        $tweet->content = $request->get('tweetContent');
        $tweet->user_id = Auth::id();
        $tweet->save();

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

    public function electionsIndex()
    {
        $fed = FederalElection::all();
        $by = ByElection::all();
        return view('admin.elections.index', compact('fed', 'by'));
    }
}

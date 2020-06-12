<?php 

namespace App\Http\Controllers;
use App\Article;
use App\ArticleContent;
class ArticleController extends Controller {

   public function generateArticle($id) {
      $article_to_use = Article::where('id', $id)->first();

      $data['title'] = $article_to_use->title;
      $data['introduction'] =  $article_to_use->introduction;
      $data['headers'] = array();
      $data['contents'] = array();

      $article_contents = ArticleContent::where('article_id', $id)->orderby('step')->get();
      foreach($article_contents as $content) {
          array_push($data['headers'], $content->header);
          array_push($data['contents'], $content->content);
          

      }


      return view("article", $data);

   }
}
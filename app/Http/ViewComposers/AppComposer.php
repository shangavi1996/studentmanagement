namespace App\Http\ViewComposers;

use App\Post;
use Illuminate\Contracts\View\View;

class RecentPostsComposer
{
  private $posts;

  public function __construct(Post $posts) {
    $this->posts = $posts;
  }

  public function compose(View $view) {
    $view->with('posts', $this->posts->recent());
  }

}
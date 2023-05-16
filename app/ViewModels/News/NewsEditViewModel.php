<?php

namespace App\ViewModels\News;

use App\ViewModels\News\Object\NewsEditObject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

class NewsEditViewModel
{
    public function __construct(
        readonly private Model|Builder $news
    )
    {
    }

    /**
     * @return NewsEditObject
     */
    public function getNews(): NewsEditObject
    {
        $news = $this->news;
        return new NewsEditObject(
            id:$news["id"],
            title: $news["title"],
            body: $news["body"],
            thumbnail: $news["thumbnail"],
            description: $news["description"],
            type_id: $news["type_id"],
            draft: $news['draft'],
            pin: $news["pin"]
        );
    }
}

<?php

namespace App\ViewModels\News;

use App\Models\News;
use App\Models\Tag;
use App\ViewModels\News\Object\NewsEditObject;
use App\ViewModels\News\Object\NewTagsObject;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

class NewsEditViewModel
{
    public function __construct(
        readonly private Model|Builder    $news,
        readonly private Collection|array $tags,
    )
    {
    }

    /**
     * @return NewTagsObject[]
     */
    public function getTags(): array
    {
        return $this->tags->map(fn(Tag $tag) => new NewTagsObject(id: $tag["id"], name: $tag["name"]))->toArray();
    }

    /**
     * @return NewsEditObject
     */
    public function getNews(): NewsEditObject
    {
        /**
         * @var News $news
         */
        $news = $this->news;
        dd($news->Tags()->get());
        return new NewsEditObject(
            id: $news["id"],
            title: $news["title"],
            body: $news["body"],
            thumbnail: $news["thumbnail"],
            description: $news["description"],
            type_id: $news["type_id"],
            draft: $news['draft'],
            pin: $news["pin"], tags: $news->Tags()->get()->pluck("id")->toArray()
        );
    }
}

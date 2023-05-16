<?php

namespace App\ViewModels\News;

use App\ViewModels\News\Object\NewShowObject;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class NewShowViewModel
{
    public function __construct(
        private readonly Model|Builder $news
    )
    {
    }

    /**
     * @return NewShowObject
     */
    public function getNews(): NewShowObject
    {
        $news = $this->news;
        return new NewShowObject(
            title: $news["title"],
            updated_at: Carbon::parse($news["updated_at"])->isoFormat("D/M/Y h:m:s"),
            body: $news["body"],
            thumbnail: $news["thumbnail"],
            type_id: $news["type_id"]
        );
    }
}

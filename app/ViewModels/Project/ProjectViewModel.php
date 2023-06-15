<?php

namespace App\ViewModels\Project;

use App\Models\Project;
use App\Models\Setting;
use App\ViewModels\Project\Object\ProjectObject;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class ProjectViewModel
{
    public function __construct(
        readonly private Collection|array $projects
    )
    {
    }

    /**
     * @return ProjectObject[]
     */
    public function getProjects(): array
    {
        return $this->projects->map(fn(Project $project) => new ProjectObject(name: $project["name"], thumbnail: $project["thumbnail"]))->toArray();
    }

    public function getHeadingTop()
    {
        return Setting::query()->where("name", "cctb_heading_1")->first()->value;
    }

    public function getHeadingBottom()
    {
        return Setting::query()->where("name", "cctb_heading_2")->first()->value;
    }

    public function getText()
    {
        return Setting::query()->where("name", "cctb_text")->first()->value;
    }

    public function getImage()
    {
        return Setting::query()->where("name", "cctb_image")->first()->value;
    }

    public function getImageAlt()
    {
        return Setting::query()->where("name", "cctb_image_alt")->first()->value;
    }
}

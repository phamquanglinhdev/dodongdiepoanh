<?php

namespace App\ViewModels\Project;

use App\Models\Project;
use App\ViewModels\Project\Object\ProjectObject;
use Illuminate\Database\Eloquent\Collection;

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
}

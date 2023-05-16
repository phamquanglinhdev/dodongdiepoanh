<?php

namespace App\Composers;

use App\Repositories\AreaRepository;
use App\ViewModels\Footer\FooterViewModel;
use Illuminate\View\View;

class FooterComposer
{
    public function __construct(
        private readonly AreaRepository $areaRepository
    )
    {
    }

    public function compose(View $view): View
    {
        return $view->with("footerViewModel", new FooterViewModel(
            about_me: $this->areaRepository->getAboutMeArea(), rules: $this->areaRepository->getRulesArea()
        ));
    }
}

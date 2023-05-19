@php
    use App\ViewModels\News\TopNewsViewModel;
        /**
         * @var TopNewsViewModel $topNewsViewModel
         */
@endphp

@push("modal")
    <!-- Button trigger modal -->
    <div style="position: fixed;bottom: 0;left: 0" class="mt-4">
        <button type="button" class="btn bg-main text-white d-lg-none d-md-block rounded-0 " data-mdb-toggle="modal"
                data-mdb-target="#exampleModal">
            <i class="fas fa-list"></i>
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade bg-white" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="accordion accordion-borderless bg-white p-2" id="categories-right-bar">
                    <div class="row">
                        <div class="text-white bg-main p-3 d-flex justify-content-between align-items-center">
                            <div>TIN TỨC NỔI BẬT</div>
                            <span>
                                 <a type="button" class="px-3 text-white" data-mdb-dismiss="modal">
                                     <i class="fas fa-times"></i>
                                 </a>
                            </span>
                        </div>
                        <div class="my-2">
                            @foreach($topNewsViewModel->getTrendingNews() as $news)
                                <div class="mini-new py-2 border-bottom">
                                    <div class="">
                                        <span class="fw-semibold">{{$news->getUpdatedAt()}}</span> -
                                        <span class="fw-bold text-main">{{$news->getType()}}</span>
                                    </div>
                                    <a href="{{$news->getSlug()}}" class="text-reset fw-normal">
                                        <div>{{Str::limit($news->getTitle())}}</div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        <div class="text-white bg-main p-3">TIN TỨC MỚI NHẤT</div>
                        <div class="my-2">
                            @foreach($topNewsViewModel->getRecentlyNews() as $news)
                                <div class="mini-new py-2 border-bottom">
                                    <div class="">
                                        <span class="fw-semibold">{{$news->getUpdatedAt()}}</span> -
                                        <span class="fw-bold text-main">{{$news->getType()}}</span>
                                    </div>
                                    <a href="{{$news->getSlug()}}" class="text-reset fw-normal">
                                        <div>{{Str::limit($news->getTitle())}}</div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="button" class="w-100 rounded-0 btn bg-main text-white" data-mdb-dismiss="modal">
                            Đóng
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endpush
<div class="row">
    <div class="text-white bg-main p-3">TIN TỨC NỔI BẬT</div>
    <div class="my-2">
        @foreach($topNewsViewModel->getTrendingNews() as $news)
            <div class="mini-new py-2 border-bottom">
                <div class="">
                    <span class="fw-semibold">{{$news->getUpdatedAt()}}</span> -
                    <span class="fw-bold text-main">{{$news->getType()}}</span>
                </div>
                <a href="{{$news->getSlug()}}" class="text-reset fw-normal">
                    <div>{{Str::limit($news->getTitle())}}</div>
                </a>
            </div>
        @endforeach
    </div>
</div>
<div class="row">
    <div class="text-white bg-main p-3">TIN TỨC MỚI NHẤT</div>
    <div class="my-2">
        @foreach($topNewsViewModel->getRecentlyNews() as $news)
            <div class="mini-new py-2 border-bottom">
                <div class="">
                    <span class="fw-semibold">{{$news->getUpdatedAt()}}</span> -
                    <span class="fw-bold text-main">{{$news->getType()}}</span>
                </div>
                <a href="{{$news->getSlug()}}" class="text-reset fw-normal">
                    <div>{{Str::limit($news->getTitle())}}</div>
                </a>
            </div>
        @endforeach
    </div>
</div>

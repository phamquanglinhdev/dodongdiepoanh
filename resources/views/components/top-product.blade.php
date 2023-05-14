<div class="row">
    <div class=" col-lg-3 col-6 col-12 ">
        <div class="text-white bg-main p-3">SẢN PHẨM NỔI BẬT</div>
    </div>
</div>
<div class="row mt-2">
    @for($i=1;$i<=8;$i++)
        <div class="col-lg-3 mb-3 col-6 p-lg-3 p-1">
            <a href="#">
                <div class="card rounded-0 p-lg-0">
                    <img src="{{asset("img/product.jpg")}}" class="card-img-top rounded-0" alt="Fissure in Sandstone"/>
                    <div class="card-body">
                        <h5 class="card-title text-main ">Bộ ngũ sự, lọ hoa, đèn thờ</h5>
                        <div class="card-text">Loại : <a href="#">Lư hương</a></div>
                        <div class="card-text">Kích thước : 70cm</div>
                        <div class="card-text">Mã sản phẩm : DVT</div>
                    </div>
                </div>
            </a>
        </div>
    @endfor
</div>
<div class="d-flex justify-content-end mb-3">
    <a href="#" class="text-reset px-2">Xem tất cả <i class="fas fa-chevron-circle-right"></i></a>
</div>

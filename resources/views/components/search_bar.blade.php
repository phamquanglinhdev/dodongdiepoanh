<div class="bg-main pb-1 px-2 pt-3">
    <form action="{{route("products.search")}}">
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="params" placeholder="Tìm kiếm ..." aria-label="" aria-describedby="button-addon2">
            <button class="shadow-0 btn bg-light" type="submit" id="button-addon2">
                <i class="fas fa-search text-main"></i>
            </button>
        </div>
    </form>
</div>

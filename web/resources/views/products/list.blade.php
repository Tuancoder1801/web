<div class="row isotope-grid">

    @foreach ($products as $key => $product)
        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
            <!-- Block2 -->
            <div class="block2">
                <div class="block2-pic hov-img0">
                    <img src="{{ $product->thumbnail }}" alt="{{ $product->name }}">

                    {{-- <a href="#"
                        class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                        Quick View
                    </a> --}}
                </div>

                <div class="block2-txt flex-w flex-t p-t-14">
                    <div class="block2-txt-child1 flex-col-l ">
                        <a href="/san-pham/{{ $product->id }}-{{ Str::slug($product->name, '-') }}.html"
                            class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                            {{ $product->name }}
                        </a>

                        <span class="stext-105 cl3">
                            {!!  \App\Helpers\Helper::price($product->price, $product->discount)  !!}
                        </span>
                    </div>

                    {{-- <div class="block2-txt-child2 flex-r p-t-3">
                        <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                            <img class="icon-heart1 dis-block trans-04" src="/template/images/icons/icon-heart-01.png"
                                alt="ICON">
                            <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                src="/template/images/icons/icon-heart-02.png" alt="ICON">
                        </a>
                    </div> --}}
                </div>
            </div>
        </div>
    @endforeach
</div>

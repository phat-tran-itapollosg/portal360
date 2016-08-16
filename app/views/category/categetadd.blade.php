<link rel="stylesheet" href="{{ URL::asset('public/css/css_alphal/css.css' )}}">
<div class='content'>
    <ul class='ulli'>
        <li class="faqli">
            @if($getdel==0)
                <h1 class="title">
                    Category
                </h1>
                @foreach ($cate as $cates)
                    <div class="box">
                        <div class="question">
                            <a class='afaq' href="faq/edit/{{$cates->cid}}">Câu hỏi: {{ $cates->ccontent}}</a>
                            
                        </div>
                            <div class="question">
                                ||
                                <a class='afaqadd' href="{{URL::asset("faq/edit/$cates->cid")}}">Sửa Category</a>
                                
                                    &nbsp;||
                            </a> 
                                &nbsp;||
                            <a class='afaqadd' href="faq/del/data/{{$cates->cid}}">
                                Xóa Category
                            </a> 
                                &nbsp;||
                            <a class='afaqadd' href="{{URL::asset('faq/del/get')}}">
                                Các Category đã Xóa
                            </a> 
                                &nbsp;||
                            </div>
                </div>
                @endforeach
            @endif
        </li>
    </ul>
</div>
        
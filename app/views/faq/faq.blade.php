<!--
 *
 *Alpha team Tran Tan Phat
 *trantanphat.it@gmail.com
 *
 */
-->
<link rel="stylesheet" href="{{ URL::asset('public/css/css.css' )}}">
<div class='content'>
    <ul class='ulli'>
        <li class="faqli">
        
            @if($getdel==0)
                <h1 class="title">
                    Hỏi Đáp FAQ
                </h1>
                
                   
                    <div class="box">
                     @foreach ($getfaq1 as $getfaq1s) 
                        <div class="question">
                            <a class='afaq' href="faq/edit/{{$getfaq1s->id}}">Câu hỏi: {{ $getfaq1s->faqquestion }}</a>
                            
                        </div>
                        <div class="reply">
                        Danh mục:                            
                            {{$getfaq1s->ccontent}}
                        </div>
                        <div class="reply">
                            >>{{ $getfaq1s->faqreply }}
                            <div class="question">
                                ||
                                <a class='afaqadd' href="faq/edit/{{$getfaq1s->id}}">Sửa</a>
                                
                                    &nbsp;||
                                <a class='afaqadd' href="{{URL::asset('/faq/add')}}">
                                   Thêm FAQ 
                            </a> 
                                &nbsp;||
                            <a class='afaqadd' href="faq/del/data/{{$getfaq1s->id}}">
                                Xóa FAQ
                            </a> 
                                &nbsp;||
                            <a class='afaqadd' href="{{URL::asset('faq/del/get')}}">
                                Các tin đã Xóa
                            </a> 
                                &nbsp;||
                            </div>
                        </div>
                    
                    @endforeach
                </div>
            @elseif($faqdelget!=null)
                <h1 class="title">
                    Các FAQ đã xóa
                </h1>
                @foreach ($faqdelget as $infofaq)
                    <div class="box">
                            <div class="question">
                                    <label class="lbfaq">Câu hỏi: </label>
                                        
                                    <a class='afaq' href='{{URL::asset("faq/edit/$infofaq->id")}}'>
                                            {{$infofaq->faqquestion}}
                                        </a>
                            </div>
                            <div class="question" >
                                        <label class="lbfaq">>></label>
                                <td class='right'>
                                    <label>{{$infofaq->faqreply}}
                            </div>
                            <div class="question" >
                                    <a class='afaq' href='{{URL::asset("faq/edit/$infofaq->id")}}'>
                                        Sửa và phục hồi</a>
                                    ||
                                    <a class='afaq' href="{{URL::asset('/faq/add')}}">
                                       Thêm Câu Hỏi    
                                    </a>|||
                                    <a class='afaq' href="{{URL::asset('/faq')}}">
                                       Quay lại trang FAQ   
                                    </a>
                            </div>
                    </div>
                    @endforeach       
            @else
                
                <h1 class="title">
                    Không có FAQ đã xóa
                </h1>
            @endif
        </li>   
    </ul>
        
</div>
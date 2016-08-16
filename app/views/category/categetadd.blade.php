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
                    Category
                </h1>
                    
                    <div class="box">
                        <div class="question">
                        <table border="1|0" style="margin:auto; with:300px">
                        
                            <tr>
                                <td>ID</td>
                                <td>Nội dung</td>
                                <td>Chức năng</td>
                            </tr>
                @foreach ($cate as $cates)
                            <tr>
                                <td><a class='afaq' href="edit/{{$cates->cid}}">{{$cates->cid}}</a></td>
                                <td><a class='afaq' href="edit/{{$cates->cid}}">{{ $cates->ccontent}}</a></td>
                                <td class='right'>
                                    <a class='afaqadd' href="{{URL::asset("category/edit/$cates->cid")}}">Sửa Category</a>
                                    <a class='afaqadd' href="{{URL::asset("category/dele/$cates->cid")}}">Xóa Category</a>
                                </td>
                            </tr>
                @endforeach
                            <form action="{{URL::asset('/category/add/data')}}" method="post">
                            <!-- {!! Form::open(array('url' => '/faq/add/data', 'method' => 'post'))!!} -->
                            <tr>
                                <div class="question">
                                    <td>
                                        <label>Thêm Nội dung Category</label>
                                        <!--{!! Form::label(' Câu hỏi  ') !!} -->
                                    </td>
                                    <td class='right'>
                                    
                                            <textarea class="textareaq" required autofocus  style="float:right;" type="text" name="ccontent" id ="ccontent"></textarea>
                                            <div>
                                                <input type="submit" value="Thêm category" />     
                                            </div>
                                            <!--{!! Form::text('txtq',null,['id' => 'txtq']) !!}-->
                                    </td>
                                </div>
                            </tr>
                            <tr>
                        </table>
                            
                        </div>
                            <div class="submit" style="text-align:center">
                                &nbsp;||
                            <a class='afaqadd' href="del/data/{{$cates->cid}}">
                                Xóa Category
                            </a> 
                                &nbsp;||
                            <a class='afaqadd' href="{{URL::asset('category/del/get')}}">
                                Các Category đã Xóa
                            </a> 
                                &nbsp;||
                            <a class='afaqadd' href="{{URL::asset('faq')}}">
                                Quay lại trang FAQ
                            </a> 
                                
                            </div>
                </div>
            @else
                <h1 class="title">
                    Category Đã Xóa
                </h1>
                    
                    <div class="box">
                        <div class="question">
                        <table border="1|0" style="margin:auto; with:300px">
                        
                            <tr>
                                <td>ID</td>
                                <td>Nội dung</td>
                                <td>Chức năng</td>
                            </tr>
                @foreach ($cate as $cates)
                            <tr>
                                <td><a class='afaq' href="edit/{{$cates->cid}}">{{$cates->cid}}</a></td>
                                <td><a class='afaq' href="edit/{{$cates->cid}}">{{ $cates->ccontent}}</a></td>
                                <td class='right'>
                                    <a class='afaqadd' href="{{URL::asset("category/edit/$cates->cid")}}">Sửa Category</a>
                                </td>
                            </tr>
                @endforeach
                           
                        </table>
                            
                        </div>
                            <div class="submit" style="text-align:center">
                                &nbsp;||
                            <a class='afaqadd' href="{{URL::asset('category/get')}}">
                                Quay lại trang Category
                            </a> 
                                &nbsp;||
                            </div>
                </div>
            @endif
        </li>
    </ul>
</div>
        
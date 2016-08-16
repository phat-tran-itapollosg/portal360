<!--
 *
 *Alpha team Tran Tan Phat
 *trantanphat.it@gmail.com
 *
 */
-->
<link rel="stylesheet" href="{{ URL::asset('public/css/css.css') }}">
<div class='content'>
    <h1 class="title">
        Chỉnh sửa Category
    </h1>
    @foreach ($infocate as $infofaq)
    <div class="box">
        <Form action="{{URL::asset('/category/edit/data/')}}" method="post">
            
        
        <table align="center">
        <tr>
            <div class="question">
                <td>
                        
                </td>
                <td>
                        <label>IDCategory: {{$infofaq->cid}}</label>
                        <input type="text" name="id" value="{{$infofaq->cid}}" hidden />
                </td>
            </div>
        </tr>
        <tr>
            <div class="question" >
            <td>
                <label class="lbfaq">Nội dung Category </label>
                
            </td>
            <td class='right'>
                <textarea class="textarear" cols="1" required  name="ccontent" >
                            {{$infofaq->ccontent}}
                </textarea>
            </td>
            </div>
        
        </tr>
        </table>
        <div class="submittable" >
                <input type="submit" value=" Lưu lại bảng sửa ">
                ||
                <a class='afaq' href="{{URL::asset('/category/add')}}">
                   Thêm Câu Hỏi    
                </a>|||
                <a class='afaq' href="{{URL::asset('/category/get')}}">
                   Quay lại trang FAQ   
                </a>
        </div>
                
        </Form>
    </div>
    @endforeach   
</div>
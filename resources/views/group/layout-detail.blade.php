@extends('layouts.index')

@push('css')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="source/css/detail-group.css">
    <link rel="stylesheet" href="source/css/listcontent.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css"/>


@endpush

@section('content')
    @include('layouts.header')
    @include('group.layouts.header')

    <section class="section-rbg">
        <div class="container">
            <div class="row">
                <div class="col-md-9 rbg-color">
                    {{--<div class="row section-nav">
                        <div class="col-md"><a class="font-clor" href="#">CONTENT</a></div>
                        <div class="col-md"><a class="font-clor" href="{{route('member.list')}}">MEMBER</a></div>
                        <div class="col-md"><a class="font-clor" href="#">ATTENDANCE</a></div>
                        <div class="col-md"><a class="font-clor" href="#">CALEDAR</a></div>
                        <div class="col-md"><a class="font-clor" href="#">PENDING ITEMS</a></div>
                        <div class="col-md"><a class="font-clor" href="#">SETTING</a></div>
                    </div>--}}
                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-content-tab" data-toggle="pill" href="#pills-content" role="tab" aria-controls="pills-content" aria-selected="true">Content</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-member-tab" data-toggle="pill" href="#pills-member" role="tab" aria-controls="pills-member" aria-selected="false">Member</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-attendance-tab" data-toggle="pill" href="#pills-attendance" role="tab" aria-controls="pills-attendance" aria-selected="false">Attendance</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " id="pills-calendar-tab" data-toggle="pill" href="#pills-calendar" role="tab" aria-controls="pills-calendar" aria-selected="false">Calendar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " id="pills-pendingItem-tab" data-toggle="pill" href="#pills-pendingItem" role="tab" aria-controls="pills-pendingItem" aria-selected="false">Pending Item</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " id="pills-setting-tab" data-toggle="pill" href="#pills-setting" role="tab" aria-controls="pills-setting" aria-selected="false">Setting</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3"></div>
            </div>
            <div class="row section-m1">
                <div class="col-md-9 col-sm-9 col-xs-9 section-m2">

                    {{--@yield('section')--}}

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-content" role="tabpanel" aria-labelledby="pills-content-tab">

                            @if (count($errors) > 0)
                                @foreach($errors->all() as $error)
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>{{$error}}</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endforeach
                            @endif
                            @if(session('notify'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ session('notify') }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-12">
                                    <nav>
                                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Add Content</a>
                                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">or view existing contents</a>
                                        </div>
                                    </nav>
                                    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                            <button type="button" class="btn btn-secondary btn-lg mt-4" data-toggle="modal" data-target="#myModel">You have a new content ?</button>
                                            <div class="modal fade" id="myModel">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Create New Content</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                            <form method="post" id="createContent" action="{{route('content.add',$group->id)}}">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <label for="name">Your Content Name</label>
                                                                    <input type="text" class="form-control" maxlength="65" name="conten" id="content">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlSelect1">Level</label>
                                                                    <select name="level" class="form-control">
                                                                        <option value="0">Beginner</option>
                                                                        <option value="1">Intermediate</option>
                                                                        <option value="2">Expert</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="dateofbirth">Start Date</label>
                                                                    <input class="form-control" type="date" name="start">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="dateofbirth">End Date</label>
                                                                    <input class="form-control" type="date" name="end">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlTextarea1">Description</label>
                                                                    <textarea class="form-control" rows="3" name="description" id="description"></textarea>
                                                                </div>
                                                                <button type="submit" id="addcontent" class="btn btn-success mt-3 float-lg-right m-3">Done</button>
                                                                <button type="submit" onclick="resetData()" class="btn btn-light mt-3 float-lg-right" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancel</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                            Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row info">
                                <div class="col-4 bg-image">
                                    <div class="row header-info">
                                        <div class="col-5">
                                            <h2>learning</h2>
                                        </div>
                                        <div class="col-7">
                                            <i class="far fa-heart icon-heart"></i> <span> 0</span>
                                        </div>
                                    </div>
                                    <div class="row main-info">
                                        <div class="col-4">
                                            <img src="source/img/group/img_avatar.png" class="avatar">
                                        </div>
                                        <div class="col-8">
                                            <p>Nguyễn Việt Hà</p>
                                            <ul>
                                                <li>start: 21/1/2020</li>
                                                <li>End: 21/2/2020</li>
                                                <li>Tags: defaultTag</li>
                                                <li>Level: Intermediate</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-success mt-3 ml-5">Take Attendance</button>
                                </div>
                                <div class="col-8 header-content">
                                    <div class="row">
                                        <div class="col-6">
                                            <h3>NTQ Group PHP</h3>
                                        </div>
                                        <div class="col-6">
                                            <div class="dropdown">
                                                <a href="" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    ...
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="#">Create event for content</a>
                                                    <a class="dropdown-item" href="#">Edit</a>
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                        <span style="padding: 15px;">
					PHP là ngôn ngữ lập trình mã nguồn mở phía server được thiết kế để dễ dàng xây dựng các trang web động. Mã PHP có thể thực thi trên server để tạo ra mã HTML và xuất ra trình duyệt web theo yêu cầu của người sử dụng. PHP cho phép xây dựng ứng dụng web trên mạng internet tương tác với mọi cơ sở dữ liệu như: MySQL, Oracle,… Ngôn ngữ lập trình PHP được tối ưu hóa cho các ứng dụng web, tốc độ nhanh, nhỏ gọn, cú pháp giống C và Java, dễ học và thời gian xây dựng sản phẩm tương đối ngắn hơn so với các ngôn ngữ khác nên PHP đã nhanh chóng trở thành một ngôn ngữ lập trình phổ biến nhất thế giới.
				</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row info">
                                <div class="col-4 bg-image">
                                    <div class="row header-info">
                                        <div class="col-5">
                                            <h2>learning</h2>
                                        </div>
                                        <div class="col-7">
                                            <i class="far fa-heart icon-heart"></i> <span> 0</span>
                                        </div>
                                    </div>
                                    <div class="row main-info">
                                        <div class="col-4">
                                            <img src="source/img/group/img_avatar.png" class="avatar">
                                        </div>
                                        <div class="col-8">
                                            <p>Nguyễn Việt Hà</p>
                                            <ul>
                                                <li>start: 21/1/2020</li>
                                                <li>End: 21/2/2020</li>
                                                <li>Tags: defaultTag</li>
                                                <li>Level: Intermediate</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-success mt-3 ml-5">Take Attendance</button>
                                </div>
                                <div class="col-8 header-content">
                                    <div class="row">
                                        <div class="col-6">
                                            <h3>NTQ Group PHP</h3>
                                        </div>
                                        <div class="col-6">
                                            <div class="dropdown">
                                                <a href="" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    ...
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="#">Create event for content</a>
                                                    <a class="dropdown-item" href="#">Edit</a>
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                        <span style="padding: 15px;">
					PHP là ngôn ngữ lập trình mã nguồn mở phía server được thiết kế để dễ dàng xây dựng các trang web động. Mã PHP có thể thực thi trên server để tạo ra mã HTML và xuất ra trình duyệt web theo yêu cầu của người sử dụng. PHP cho phép xây dựng ứng dụng web trên mạng internet tương tác với mọi cơ sở dữ liệu như: MySQL, Oracle,… Ngôn ngữ lập trình PHP được tối ưu hóa cho các ứng dụng web, tốc độ nhanh, nhỏ gọn, cú pháp giống C và Java, dễ học và thời gian xây dựng sản phẩm tương đối ngắn hơn so với các ngôn ngữ khác nên PHP đã nhanh chóng trở thành một ngôn ngữ lập trình phổ biến nhất thế giới.
				</span>
                                    </div>
                                </div>
                            </div>

                                @foreach($contents as $content)
                                    <div class="row info">
                                        <div class="col-4 bg-image">
                                            <div class="row header-info">
                                                <div class="col-5">
                                                    <h2>
                                                        @if(strtotime($content->end_date) > time())
                                                            {{'learning'}}

                                                        @else
                                                            {{"Done"}}
                                                        @endif
                                                    </h2>
                                                </div>
                                                <div class="col-7">
                                                    <i class="far fa-heart icon-heart"></i> <span> 0</span>
                                                </div>
                                            </div>
                                            <div class="row main-info">
                                                <div class="col-4">
                                                    <img src="source/img/user/{{$content->user->avatar}}" class="avatar">
                                                </div>
                                                <div class="col-8">
                                                    <p>{{ $content->user->name }}</p>
                                                    <ul>
                                                        <li>start: {{ $content->start_date }}</li>
                                                        <li>End: {{ $content->end_date }}</li>
                                                        <li>Tags: defaultTag</li>
                                                        <li>Level:
                                                            @if($content->level == 0)
                                                                {{"Beginer"}}
                                                            @elseif($content->level == 1)
                                                                {{'Intern'}}
                                                            @else
                                                                {{'Expert'}}
                                                            @endif
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-success mt-3 ml-5">Take Attendance</button>
                                        </div>
                                        <div class="col-8 header-content">
                                            <div class="row">
                                                <div class="col-6">
                                                    <h3>{{ $content->title }}</h3>
                                                </div>
                                                <div class="col-6">
                                                    <div class="dropdown">
                                                        <a href="" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            ...
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="">Create event for content</a>
                                                            <a class="dropdown-item" href="" data-toggle="modal" data-target="#myModelCreate">Edit</a>
                                                            <a class="dropdown-item" href="#">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span style="padding: 15px;">
						{!! $content->content !!}
					</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                        </div>
                        <div class="tab-pane fade" id="pills-member" role="tabpanel" aria-labelledby="pills-member-tab">

                            {{-- Member--}}
                            <div class="row" style="margin-top: 20px">
                                @foreach($members as $member)
                                    <div class="col-md-6 " style="margin-top: 10px">
                                        <div class="row">
                                            <div class="col-md-5">

                                                <img style="width: 100%;height: 100%"
                                                     src="source/img/user/{{$member->avatar}}">

                                            </div>
                                            <div class="col-md-7 border">
                                                <div>
                                                    <p>{{$member->name}} @if($group->author->id == $member->id) <i class="fa fa-star"></i> @endif</p>
                                                    <p>Joined date :{{date('Y-m-d',strtotime($member->created_at))}} </p>
                                                </div>
                                                <div>
                                                    <p>Gmail: {{$member->email}}</p>
                                                    <p>Skype: {{$member->nickname}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>


                        </div>
                        <div class="tab-pane fade" id="pills-attendance" role="tabpanel" aria-labelledby="pills-attendance-tab">Attendace</div>
                        <div class="tab-pane fade" id="pills-calendar" role="tabpanel" aria-labelledby="pills-calendar-tab">Calendar</div>
                        <div class="tab-pane fade" id="pills-pendingItem" role="tabpanel" aria-labelledby="pills-pendingItem-tab">Pending Item</div>
                        <div class="tab-pane fade" id="pills-setting" role="tabpanel" aria-labelledby="pills-setting-tab">Setting</div>
                    </div>


                </div>

                <div class="col-md-3 col-sm-3 col-xs-3">
                    <div class="d-flex align-items-center height-background"
                         style="background-color:rgba(192,192,192,0);">
                        <div class="rounded" style="width: 100%;">
                            <form>
                                <input style="width: 85%; height:35px" type="text" name=""
                                       placeholder="   Add member to this group">&ensp;
                                <button type="submit"><i style="color: blue;font-size: 17px;border-color: white"
                                                         class="fas fa-plus"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class=" margin-top datepicker" style="background-color:rgba(192,192,192,0);">
                        <input id="datepicker" width="100%"/>
                        <script>
                            $('#datepicker').datepicker({
                                uiLibrary: 'bootstrap4'
                            });
                        </script>

                    </div>
                    <div class="margin-top">
                        <div class="card">
                            <div class="card-body">
                                <div>
                                    <h5 class="card-title">Group infomation</h5>
                                </div>
                                <div class="margin-top margin-left">
                                    <div class="border-bottom margin-top"><i class="fas fa-clock"></i>&emsp; AAA</div>
                                    <div style="color: #ff6119" class="border-bottom margin-top"><i
                                            class="fas fa-star"></i>&emsp;
                                        AAA
                                    </div>
                                    <div style="color: #ff6119" class="border-bottom margin-top"><i
                                            class="far fa-user"></i>&emsp;
                                        AAA
                                    </div>
                                    <div class="border-bottom margin-top"><i class="far fa-user"></i>&emsp; AAA</div>
                                    <div class="border-bottom margin-top"><i class="far fa-calendar-alt"></i>&emsp; AAA
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="margin-top">
                        <div class="card">
                            <div class="card-body">
                                <div>
                                    <h5 class="card-title">Important Links</h5>
                                </div>
                                <div class="margin-left">
                                    <p><a class="font-clor" href="#">Google</a></p>
                                    <p><a class="font-clor" href="#">Redmine</a></p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>
@endsection()
@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="source/js/group/uploadavatar.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>

    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
    <script type="text/javascript">
        $('textarea').ckeditor();
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script type="text/javascript" src="source/js/group/content.js"></script>
    <script type="text/javascript" src="js/content/resetForm.js"></script>
@endpush

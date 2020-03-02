@if(isset($courses))
    <section>
        <div class="container">
            @if (session('smg'))
                <div class="alert alert-success range-top-20">
                    {{ session('smg') }}
                </div>
            @endif

            @if(count($errors)>0)
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">
                        <h5> {{$error}}</h5>
                    </div>
                @endforeach
            @endif
            <div class="margin-bottom-top d-flex justify-content-between">
                <h3 style="width: 15%">Course</h3>
                @if(\Illuminate\Support\Facades\Auth::check())
                    <div class="range-top-10">
                        <button type="button" class="btn btn-success" data-toggle="modal"
                                data-target=".bd-example-modal-lg">Add
                            Course
                        </button>

                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                             aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <form action="{{route('course.create')}}" method="POST" id="createCourse">
                                        @csrf
                                        <div class="container">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Name Course</label>
                                                <input type="text" class="form-control" id="course" name="course"
                                                       aria-describedby="emailHelp" placeholder="Name Course" maxlength="64">
                                                <div class="color-red" id="errorCourse"></div>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Desciption</label>
                                                <textarea class="form-control" rows="4" id="description" type="text"
                                                          name="description" placeholder="Desciption" maxlength="500"></textarea>
                                                <div class="color-red" id="errorDescription"></div>
                                            </div>

                                            <input style="margin-bottom: 10px" type="submit" name="addCourse"
                                                   class="btn btn-primary" value="Add">
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <div class="row">
                @foreach($courses as $course)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 range-top-20">
                        <a @if(\Illuminate\Support\Facades\Auth::check())
                           {! href="{{route('group.list',$course->id)}}" !}
                           @endif
                           style="text-decoration: none">
                            <div class="card">

                                <div class="card-body hv-bgr">

                                    <div class="d-flex justify-content-center border-bottom">
                                        <h3 class="d-flex justify-content-center rounded name-course"
                                            style="color: white"> {{substr($course->name,0,9)}} </h3>
                                    </div>
                                    <div class="range-top-20">
                                        <div class="border-bottom font-cs"><i class=" fas fa-award"></i> <i>Author:
                                                :</i>{{$course->author->name}}</div>
                                        <div class="border-bottom font-cs"><i class="fas fa-hourglass-start"></i> <i>Date
                                                : </i> {{ date('Y-m-d',strtotime($course->created_at))}}  </div>
                                        <div class="border-bottom font-cs"><i class="fas fa-file-alt"></i> <i>Desciption
                                                :</i> {{substr($course->description,0,14)}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>

                        @if(\Illuminate\Support\Facades\Auth::check() && isset($course->author) && $course->author->id == \Illuminate\Support\Facades\Auth::user()->id)
                            <div class="rol" style="margin-top: 6%;text-align: center">
                                <button type="button" class="edit" data-toggle="modal"
                                   data-target="#editCourse" data-id="{{$course->id}}" data-name="{{$course->name}}"
                                   data-des = "{{$course->description}}">Edit Course</button>

                            </div>
                        @endif
                    </div>
                @endforeach

                    <div class="modal fade" id="editCourse" tabindex="-1" role="dialog"
                         aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div style="color: red;text-align: center;height: 30px;">
                                    <p id="message"></p>
                                </div>
                                <form id="edit">
                                    @csrf
                                    <div class="container">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Name Course</label>
                                            <input type="text"  class="form-control" id="name"
                                                   name="name" maxlength="64" aria-describedby="emailHelp"
                                                   >
                                            <p class="errorr" id="error-course"></p>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Desciption</label>
                                            <textarea class="form-control" rows="5" id="descriptionn"
                                                      type="text" name="desciption">{{ old('desciption') }}</textarea>
                                            <p class="errorr" id="error-description"></p>
                                        </div>

                                        <div class="form-group">
                                            <button class="btn btn-primary" type="submit"
                                                    id="save">Save
                                            </button>
                                            <button type="button" class="btn btn-primary" id="cancel">
                                                Reset
                                            </button>
                                            <button type="button" style="margin-left: 60%" class="btn btn-secondary" id="close" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </section>
@endif
@push('scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="source/js/course/validate.js"></script>
    <script src="source/js/course/edit.js"></script>
@endpush

@if (Session::has('message'))
    <div class="alert {{Session::get('alert') ?? 'alert-info'}} alert-block"
         style="width: 350px; height: 100px;position: fixed;left: 76.5%;top: 1px;z-index: 102;line-height: 33px;" id="flash">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{Session::get('message')}}</strong>
    </div>
@endif


@if (Session::has('error'))
    <div class="alert alert-danger alert-block"
         style="width: 350px; height: 100px;position: fixed;left: 76.5%;top: 1px;z-index: 102;line-height: 33px;" id="flash">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{Session::get('error')}}</strong>
    </div>
@endif


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

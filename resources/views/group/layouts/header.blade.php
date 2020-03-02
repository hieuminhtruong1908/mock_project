
@push('css')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="source/css/groupheader.css">

@endpush
<div id="cover">
    {{--<div class="ml-auto" style="position: fixed;z-index: 3">
        <input type="button" class="btn btn-primary d-none" id="btnDiscard" value="Discard Changes" />
    </div>--}}
    <div id="message" class="alert" style="width: 200px;position: fixed;z-index: 3"></div>
    <div class="container-fluid cover-imagee" id="imgProfileCover"
         style="background-image: url('source/img/group/{{$group->thumbnail}}')">
        <div>
            @if($caption==true)
            <form id="form_upload_cover" enctype="multipart/form-data" action="{{route('group.uploadCover',$group->id)}}">
                @CSRF
                <input type="button" class="btn btn-secondary btn-secondary1"
                       id="btnChangePictureCover" value="">
                <input type="file" style="display: none;" id="profilePictureCover"
                       name="uploadCover"/>
            </form>
            @endif
        </div>
        <div class="container">
            <div style="display: flex;padding-top: 23%">
                <div style="width: 14%;height: 150px">
                    <div class="image-container">
                        <img
                            src="source/img/group/{{$group->slug}}"
                            id="imgProfile"
                            style="width: 150px; height: 150px" class="img-thumbnail"/>
                        <div class="middle">
                            @if($caption==true)
                            <form id="formupload" enctype="multipart/form-data" action="{{route('group.uploadAvatar',$group->id)}}">
                                @CSRF
                                <input type="button" class="btn btn-secondary" id="btnChangePicture"
                                       value="Change"/>
                                <input type="file" style="display: none;" id="profilePicture"
                                       name="upload"/>
                                <input id="id-group" value="{{$group->id}}" style="display: none">
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="detail_group" style="width: 14%;height: 150px">
                    <div class="detail_group_name">
                        <h3>{{$group->name}}</h3>
                    </div>
                    <div class="select_box">
                       {{-- <select style="height:30px;">
                            <option>Custom</option>
                            <option>Volvo</option>
                            <option>Fiat</option>
                            <option>Audi</option>
                        </select>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

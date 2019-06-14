@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body dropper-zone">
                    <form action="{{ route('upload-files') }}" class="dropzone">
                            @csrf
                        <div class="fallback">
                            <input name="file" type="file" multiple />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <h2>Files</h2>
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#image">Images</a></li>
        <li><a data-toggle="tab" href="#video">Videos</a></li>
        <li><a data-toggle="tab" href="#music">Music</a></li>
        <li><a data-toggle="tab" href="#document">Document</a></li>
    </ul>

    <div class="tab-content">
        <div id="image" class="tab-pane fade in active show">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Uploaded On</th>
                        <th>Action</th>
                    </thead>
                    @foreach($image as $img)
                        <tr>
                            <td>{{$img->name}}</td>
                            <td><img class="file-image" src="{{url("storage/app/".$img->location)}}"></td>
                            <td>{{$img->created_at}}</td>
                            <td><a href="{{url('delete/'.$img->id)}}"><span class="glyphicon glyphicon-trash"></span></a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div id="video" class="tab-pane fade">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th>Name</th>
                        <th>Video</th>
                        <th>Uploaded On</th>
                        <th>Action</th>
                    </thead>
                    @foreach($video as $vid)
                        <tr>
                            <td>{{$vid->name}}</td>
                            <td>
                                <video width="320" height="240" controls>
                                    <source src="{{url("storage/app/".$vid->location)}}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </td>
                            <td>{{$vid->created_at}}</td>
                            <td><a href="{{url('delete/'.$vid->id)}}"><span class="glyphicon glyphicon-trash"></span></a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div id="music" class="tab-pane fade">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th>Name</th>
                        <th>Music</th>
                        <th>Uploaded On</th>
                        <th>Action</th>
                    </thead>
                    @foreach($music as $mus)
                        <tr>
                            <td>{{$mus->name}}</td>
                            <td>
                                <audio controls>
                                    <source src="{{url("storage/app/".$mus->location)}}" type="audio/ogg">
                                    Your browser does not support the audio element.
                                </audio>
                            </td>
                            <td>{{$mus->created_at}}</td>
                            <td><a href="{{url('delete/'.$mus->id)}}"><span class="glyphicon glyphicon-trash"></span></a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div id="document" class="tab-pane fade">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th>Name</th>
                        <th>Document</th>
                        <th>Uploaded On</th>
                        <th>Action</th>
                    </thead>
                    @foreach($document as $doc)
                        <tr>
                            <td>{{$doc->name}}</td>
                            <td>
                                <a href="{{url("storage/app/".$doc->location)}}" target="_blank">View</a>
                            </td>
                            <td>{{$doc->created_at}}</td>
                            <td><a href="{{url('delete/'.$doc->id)}}"><span class="glyphicon glyphicon-trash"></span></a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
            
        </div>
    </div>
</div>
@endsection

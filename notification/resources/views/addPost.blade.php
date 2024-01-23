@extends("layouts.app")
@section('content')
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">Thêm bài viết</h4>
            </div>
        </div>
        <div class="iq-card-body">
            <form action="{{route("store")}}" method="POST">
                <div class="form">
                    @csrf
                    <div class="">
                        <div class="">
                            <label for="reviewName">Tiêu đề bài viết</label>
                            <input type="text" class="form-control" id="reviewName" name="name" placeholder="Nhập tiêu đề bài viết ...">
                        </div>

                  <div class="">
                    <div class="">
                        <label for="content">Nội dung</label>
                        <input id="content" class="form-control" name="content"></input>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Submit form</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            document.getElementById('button-image').addEventListener('click', (event) => {
                event.preventDefault();

                window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
            });
        });
            // set file link
        function fmSetLink(url) {
            //console.log(url)
            url = url.replace(/^.*\/\/[^\/]+/, ''); // remove domain
            console.log(url)
            document.getElementById('image_label').value = url;

        }
    </script>

@endsection

<div class="modal fade" id="image_modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg box-shadow" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">{{__('Crop Image')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div> 
            <div class="modal-body">
                <div class="img-container">
                    <div class="row">
                        <div class="col-md-8">
                            <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                        </div>
                        <div class="col-md-4">
                            <div class="preview"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel')}}</button>
                <button type="button" class="btn btn-primary" id="crop">{{__('Crop')}}</button>
            </div>
        </div>
    </div>
</div>

{{-- JQuery link --}}

{{-- JavaScript for the cropping --}}
<script>
    
    var $modal = $('#image_modal');
    var image = document.getElementById('image');
    var cropper;

    $.ajaxSetup({
        headers:{ 
            'X-CSRFToken': $('meta[name="csrf-token"]').attr('content') 
        }
    });

    $(".image").change(function(e){
        var files = e.target.files;
        var done = function (url) {
            image.src = url;
            $modal.modal('show');
        };

        var reader;
        var file;
        var url;
        if (files && files.length > 0) {
            file = files[0];
            if (URL) {
                done(URL.createObjectURL(file));
            } 
            else if (FileReader) {
                reader = new FileReader();
                reader.onload = function (e) {
                    done(reader.result);
                };
                reader.readAsDataURL(file);
            }
        }
    });
    
    $modal.on('shown.bs.modal', function () {
        cropper = new Cropper(image, {
            aspectRatio: 12/9,
            viewMode: 3,
            preview: '.preview',
            zoomOnWheel: true,
            scalable: true,
        });
    }).on('hidden.bs.modal', function () {
        cropper.destroy();
        cropper = null;
    });
    
    $("#crop").click(function(){
        canvas = cropper.getCroppedCanvas({
            minWidth: 256,
            minHeight: 256,
            maxWidth: 500,
            maxHeight: 450,
        });
        canvas.toBlob(function(blob) {
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob); 
            reader.onloadend = function() {
                var base64data = reader.result; 
                $("#base64image").val(base64data);
                document.getElementById('image_container').style.display = "block";
                var image = document.getElementById('output_img');
                image.src = base64data;
                $modal.modal('hide');
                document.getElementById('image-br').style.display = "block";
            }
        });
    });
</script>
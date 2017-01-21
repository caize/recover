<link href="/assets/plugins/bootstrap-fileinput/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
<!-- canvas-to-blob.min.js is only needed if you wish to resize images before upload.
     This must be loaded before fileinput.min.js -->
<script src="/assets/plugins/bootstrap-fileinput/js/plugins/canvas-to-blob.js" type="text/javascript"></script>
<!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview.
     This must be loaded before fileinput.min.js -->
<script src="/assets/plugins/bootstrap-fileinput/js/plugins/sortable.min.js" type="text/javascript"></script>
<!-- purify.min.js is only needed if you wish to purify HTML content in your preview for HTML files.
     This must be loaded before fileinput.min.js -->
<script src="/assets/plugins/bootstrap-fileinput/js/plugins/purify.min.js" type="text/javascript"></script>
<!-- the main fileinput plugin file -->
<script src="/assets/plugins/bootstrap-fileinput/js/fileinput.js" type="text/javascript"></script>
<!-- optionally if you need a theme like font awesome theme you can include 
    it as mentioned below -->
<script src="/assets/plugins/bootstrap-fileinput/js/themes/gly.js"></script>
<!-- optionally if you need translation for your language then include
    locale file as mentioned below -->
<script src="/assets/plugins/bootstrap-fileinput/js/locales/zh.js" type="text/javascript"></script>
<div class="tab-content" style="margin-left: 0;padding-left: 0;">
    <div role="tabpanel" class="tab-pane active" id="file-upload">
        <div class="row" style="margin:10px 0;">
            <div class="col-sm-12" style="margin-left: 0;padding-left: 0;">
                <input id="upload-input" type="file" class="file-loading" name="imgFile[]" multiple accept="image/*">
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
</script>
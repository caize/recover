$(document).ready(function() {
    App.init();
    FormPlugins.init();
    // FormWizard.init();
});
$(function() {
    $("#wizard").bwizard({
        validating: function(e, t) {
            // if(t.index==0){
            //     if(Vr.resources.type == undefined){
            //         layer.msg('请选择服务类型',{icon:2});
            //         return false;
            //     }
            // }
            // if(t.index==1){
            //     if(Vr.resources.identity == undefined){
            //         layer.msg('请选择服务身份',{icon:2});
            //         return false;
            //     }
            // }
        }
    });
    var Vr = new Vue({
        http: {
            root: '/root',
            headers: {
                'X-CSRF-TOKEN': Aizxin.conf.TOKEN
            }
        },
        el: '#addResources',
        data: {
            resources: {
                province: '',
                city: '',
                district: '',
                rc1_id: '',
                rc2_id: '',
                rc2_id: '',
            },
            cityname: {
                provincename: '',
                cityname: '',
                districtname: '',
            },
            targetA: 0,
            identityA: 0,
            units: [],
            classType: {
                btnSuccess: 'btn-success',
                btnWhite: 'btn-white',
                ntextb: 'ninputb',
                display: 'display',
                atextw: 'ainputw',
                atextb: 'ainputb',
            },
            citydataurl: Aizxin.U('admin/area'),
            catedataurl: Aizxin.U('admin/cate'),
        },
        components: {
            vueCity: vueCity,
            vueCate: vueCate,
        },
        created: function() {
            this.unit()
        },
        methods: {
            /**
             *  [target 目标选择]
             */
            target: function(target, targetA) {
                this.$set('targetA', targetA);
                this.resources.type = target;
                this.resources.service = targetA;
            },
            /**
             *  [identity 身份选择]
             */
            identity: function(identity) {
                this.$set('identityA', identity);
                this.resources.identity = identity;
            },
            unit: function() {
                this.$http.get(Aizxin.U('admin/unit')).then(function(response) {
                    this.$set('units', response.data.result)
                }, function(response) {
                    console.log(response)
                });
            },
            /**
             *  [callback 返回响应]
             */
            callback: function(response) {
                var _this = this;
                if (response.data.code == 400) {
                    layer.msg(response.data.message, {
                        icon: 2
                    });
                    layer.close(_this.load);
                }
                if (response.data.code == 422) {
                    layer.msg(response.data.message, {
                        icon: 2
                    });
                    layer.close(_this.load);
                }
                if (response.data.code == 200) {
                    //此处用setTimeout演示ajax的回调
                    setTimeout(function() {
                        layer.close(_this.load);
                        _this.$set('load', null);
                        layer.msg(response.data.message, {
                            icon: 1,
                            time: 2000 //2秒关闭（如果不配置，默认是3秒）
                        }, function() {
                            // window.location.href = "{{url('/admin/article/index')}}";
                        });
                    }, 3000);
                }
            }
        }
    });
    $("#upload-input").fileinput({
        maxFileCount: 6, //表示允许同时上传的最大文件个数
        allowedFileExtensions: ["jpg", "png", "gif"],
        uploadUrl: Aizxin.U("admin/qiniu/upload"),
        language: 'zh',
        uploadAsync: false,
        overwriteInitial: false,
        // maxImageWidth: 200,
        // maxImageHeight: 150,
        showRemove: false,
        maxFileSize: 6144, //表示允许同时上传的图片不能6M
    }).on('filebatchpreupload', function(event, data) {
        // var n = data.files.length, files = n > 1 ? n + ' files' : 'one file';
        if (Vr.showUpload == false) {
            return {
                message: "图片尺寸或大小错误，不能上传!",
                data: {}
            };
        }
    }).on('filebatchuploadsuccess', function(event, data, previewId, index) {
        response = data.response;
        console.log(data);
        // $.each(data.files, function(key, file) {
        //     var fname = response[key].file;
        //     Vr.nitialPreview.push("<img style='height:160px' src='"+fname+"'>");
        //     Vr.initialPreviewConfig.push({caption: "", url: "/admin/upload/delete", key: ((key++)-1)})
        // });
        console.log(response);
        Vr.$set('showRemove', false);
    }).on('fileuploaderror', function(event, data, msg) { // 上传错误
        console.log(msg);
        Vr.$set('showUpload', false);
    }).on('filesuccessremove', function(event, id) {
        if (id) {
            console.log(id);
        } else {
            return false; // abort the thumbnail removal
        }
    }).on('filecleared', function(event) {
        console.log('filecleared');
    });
});
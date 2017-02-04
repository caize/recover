$(function() {
    $("#wizard").bwizard({
        validating: function(e, t) {
            if (t.index == 0) {
                if (Vr.resources.type == 0) {
                    layer.msg('请选择服务类型', {
                        icon: 2
                    });
                    return false;
                }
            }
            if (t.index == 1) {
                if (Vr.resources.identity == 0) {
                    layer.msg('请选择服务身份', {
                        icon: 2
                    });
                    return false;
                }
            }
            if (t.index == 2) {
                if (Vr.resources.province == '') {
                    layer.msg('请选择省', {
                        icon: 2
                    });
                    return false;
                }
                if (Vr.resources.city == '') {
                    layer.msg('选择城市', {
                        icon: 2
                    });
                    return false;
                }
                if (Vr.resources.district == '') {
                    layer.msg('选择县/区', {
                        icon: 2
                    });
                    return false;
                }
                if (Vr.resources.rc1_id == '') {
                    layer.msg('选择分类', {
                        icon: 2
                    });
                    return false;
                }
                if (Vr.resources.unit == 0) {
                    layer.msg('选择计量单位', {
                        icon: 2
                    });
                    return false;
                }
                if (Vr.$AddReValidation.valid == false) {
                    if (Vr.$AddReValidation.contactphone.userPhone) {
                        layer.msg('联系电话有误', {
                            icon: 2
                        });
                        return false;
                    } else {
                        layer.msg('请完整填写信息', {
                            icon: 2
                        });
                        return false;
                    }
                }
            }
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
                type: 0,
                service: 0,
                identity: 0
            },
            address1name: '',
            address2name: '',
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
            isUint: true,
            isUintText: '自定义单位',
            isPrive: false,
            isPriveText: '价格区间',
            showUpload: true,
        },
        components: {
            vueCity: vueCity,
            vueCate: vueCate,
        },
        created: function() {
            this.unit()
        },
        validators: {
            // 手机验证
            userPhone: function(val) {
                return /^(0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/.test(val);
            }
        },
        methods: {
            /**
             *  [target 目标选择]
             */
            target: function(target, targetA) {
                this.$set('targetA', targetA);
                this.$set('resources.type', targetA);
                this.$set('resources.service', targetA);
            },
            /**
             *  [identity 身份选择]
             */
            identity: function(identity) {
                this.$set('identityA', identity);
                this.$set('resources.identity', identity);
            },
            unit: function() {
                this.$http.get(Aizxin.U('admin/unit')).then(function(response) {
                    this.$set('units', response.data.result)
                }, function(response) {
                    console.log(response)
                });
            },
            /**
             *  [addUnit 自定义单位]
             */
            addUnit: function(isUint) {
                this.$set('isUint', isUint ? false : true);
                this.$set("isUintText", isUint ? '选择单位' : '自定义单位');
            },
            /**
             *  [addPrive 自定义价格]
             */
            addPrive: function(isPrive) {
                this.$set('isPrive', isPrive ? false : true);
                this.$set("isPriveText", isPrive ? '价格区间' : '单价格');
            },
            saveResources: function() {
                if (this.resources.imgs == undefined) {
                    layer.msg('请上传资源图片', {
                        icon: 2
                    });
                }
                this.$http.post(Aizxin.U('admin/resources'), this.resources).then(function(response) {
                    console.log(response)
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
        initialPreview: [], //默认加载文件
        initialPreviewConfig: [], //默认加载文件配置
        enctype: 'multipart/form-data',
        maxFileCount: 6, //表示允许同时上传的最大文件个数
        allowedFileExtensions: ["jpg", "png", "gif"],
        uploadUrl: Aizxin.U("admin/qiniu/upload"),
        language: 'zh',
        uploadAsync: false, //false filebatchuploadsuccess能用 true fileuploaded能用
        overwriteInitial: true,
        // maxImageWidth: 200,
        // maxImageHeight: 150,
        showRemove: false,
        maxFileSize: 6144, //表示允许同时上传的图片不能6M
        // showUpload: false, //隐藏上传按钮
    }).on('filebatchpreupload', function(event, data) {
        if (Vr.showUpload == false) {
            return {
                message: "图片尺寸或大小错误，不能上传!",
                data: {}
            };
        }
    }).on('filebatchuploadsuccess', function(event, data, previewId, index) {
        response = data.response;
        var outImgs = [];
        $.each(data.files, function(key, file) {
            var fname = response[key].file;
            outImgs.push(fname);
        });
        Vr.resources.imgs = outImgs;
    }).on('fileuploaderror', function(event, data, msg) { // 上传错误
        Vr.$set('showUpload', false);

    }).on("fileremoved", function(event, prvid, index) { //未上传时点击删除
        console.log("fileremoved", prvid);

    }).on("filesuccessremove", function(event, prvid) { //上传成功后点击删除
        console.log("filesuccessremove", prvid);

    }).on('filecleared', function(event) {
        console.log('filecleared');
    });
});
$(document).ready(function() {
    App.init();
    FormPlugins.init();
    // FormWizard.init();
});
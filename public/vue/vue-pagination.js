// <pagination @change-page="changePage" :pagination.sync="pagination" :offset.sync="offset" :page-size.sync="pageSize" :name.sync="name"></pagination>
(function(Vue) {
    var tm = '<div class=\"dataTables_info\" id=\"data-table_info\" role=\"status\" aria-live=\"polite\">' + '显示 第{{pagination.current_page}}页，一页显示{{pageSize}}条，总数{{pagination.total}}条</div>' + '<div class=\"dataTables_paginate paging_simple_numbers\" id=\"data-table_paginate\">' + '<a class=\"paginate_button previous\" :class=\"{\'disabled\': noPrevious }\" aria-controls=\"data-table\" data-dt-idx=\"0\" tabindex=\"0\" id=\"data-table_previous\" @click.prevent=\"changePage(pagination.current_page - 1,pageSize,name)\">上一页</a>' + '<span v-for=\"page in pagesNumber\">' + '<a class=\"paginate_button\" :class=\"{\'current\': page == pagination.current_page}\" aria-controls=\"data-table\" data-dt-idx=\"1\" tabindex=\"0\" @click=\"changePage(page,pageSize,name)\">{{page}}</a>' + '</span>' + '<a class=\"paginate_button next\" :class=\"{\'disabled\': noNext }\" aria-controls=\"data-table\" data-dt-idx=\"7\" tabindex=\"0\" id=\"data-table_next\" @click.prevent=\"changePage(pagination.current_page + 1,pageSize,name)\">下一页</a>' + '</div>' + '</div>';
    var input = '<div id=\"data-table_filter\" class=\"dataTables_filter\">' + '<label>查询:' + '<input type=\"search\" placeholder=\"{{title}}\" aria-controls=\"data-table\" v-model=\"name\" v-on:change=\"changeName(name)\">' + '</label>' + '</div>';
    var select = '<select name=\"data-table_length\" aria-controls=\"data-table\" v-on:change=\"changePageSize(pageSize,name)\" v-model=\"pageSize\">' + '<option value=\"10\" selected>10</option>' + '<option value=\"25\">25</option>' + '<option value=\"50\">50</option>' + '<option value=\"100\">100</option>' + '</select>';
    Vue.component('pagination', {
        props: ['pagination', 'offset', 'pageSize', 'name'],
        template: tm,
        replace: true,
        inherit: false,
        created: function() {
            // console.log(this.pageSize)
        },
        computed: {
            /**
             *  [noPrevious 上一页]
             */
            noPrevious: function() {
                return this.pagination.current_page === 1;
            },
            /**
             *  [noNext 下一页]
             */
            noNext: function() {
                return this.pagination.current_page == this.pagination.last_page ? true : false;
            },
            /**
             *  [pagesNumber 页数]
             */
            pagesNumber: function() {
                if (!this.pagination.to) {
                    return [];
                }
                var from = this.pagination.current_page - this.offset;
                if (from < 1) {
                    from = 1;
                }
                var to = from + (this.offset * 2);
                if (to >= this.pagination.last_page) {
                    to = this.pagination.last_page;
                }
                var pagesArray = [];
                while (from <= to) {
                    pagesArray.push(from);
                    from++;
                }
                return pagesArray;
            }
        },
        methods: {
            changePage: function(page, pageSize, name) {
                if (this.pagination.current_page > this.pagination.last_page) {
                    this.$set('pagination.current_page', this.pagination.last_page);
                    this.$dispatch('change-page', this.pagination.last_page, pageSize, name);
                } else if (page < this.pagination.last_page) {
                    this.$set('pagination.current_page', page);
                    this.$dispatch('change-page', page, pageSize, name);
                } else if (page > this.pagination.last_page) {
                    this.$set('pagination.current_page', this.pagination.last_page);
                    this.$dispatch('change-page', this.pagination.last_page, pageSize, name);
                } else {
                    this.$dispatch('change-page', page, pageSize, name);
                }
            },
        },
    });
    Vue.component('vue-input', {
        props: ['pagination', 'pageSize', 'name', 'title'],
        template: input,
        replace: true,
        inherit: false,
        created: function() {
            // console.log(this.pageSize)
        },
        methods: {
            changeName: function(name) {
                this.pagination.current_page = 1;
                this.name = name;
                this.$dispatch('change-page', this.pagination.current_page, this.pageSize, name)
            },
        },
    });
    Vue.component('vue-select', {
        props: ['pagination', 'pageSize', 'name'],
        template: select,
        replace: true,
        inherit: false,
        created: function() {
            // console.log(this.pageSize)
        },
        methods: {
            changePageSize: function(pageSize) {
                this.pagination.current_page = 1;
                this.pageSize = pageSize;
                this.name = '';
                this.$dispatch('change-page', this.pagination.current_page, pageSize, this.name)
            },
        },
    })
})(Vue)
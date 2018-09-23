//== Class definition
var KDashboard = function() {

    var mediumCharts = function() {
        KLib.initMediumChart('k_widget_mini_chart_1', [20, 45, 20, 10, 20, 35, 20, 25, 10, 10], 70, KApp.getColor('danger'));
        KLib.initMediumChart('k_widget_mini_chart_2', [10, 15, 25, 45, 15, 30, 10, 40, 15, 25], 70, KApp.getColor('success'));
        KLib.initMediumChart('k_widget_mini_chart_3', [22, 15, 40, 10, 35, 20, 30, 50, 15, 10], 70, KApp.getColor('warning'));
    }
   
    var generalStatistics = function() {
        // Mini charts
        KLib.initMiniChart($('#k_widget_general_statistics_chart_1'), [6, 12, 9, 18, 15, 9, 11, 8], KApp.getColor('info'), 2);
        KLib.initMiniChart($('#k_widget_general_statistics_chart_2'), [8, 6, 13, 16, 9, 6, 11, 14], KApp.getColor('warning'), 2);
        KLib.initMiniChart($('#k_widget_general_statistics_chart_3'), [3, 9, 9, 18, 15, 9, 11, 8], KApp.getColor('success'), 2);
        KLib.initMiniChart($('#k_widget_general_statistics_chart_4'), [5, 7, 9, 18, 15, 9, 11, 8], KApp.getColor('brand'), 2);
        KLib.initMiniChart($('#k_widget_general_statistics_chart_5'), [3, 9, 5, 18, 15, 7, 11, 6], KApp.getColor('danger'), 2);
        KLib.initMiniChart($('#k_widget_general_statistics_chart_6'), [2, 12, 5, 18, 15, 7, 11, 8], KApp.getColor('focus'), 2);
        KLib.initMiniChart($('#k_widget_general_statistics_chart_7'), [6, 8, 3, 18, 15, 7, 11, 7], KApp.getColor('warning'), 2);
        KLib.initMiniChart($('#k_widget_general_statistics_chart_8'), [8, 6, 9, 18, 15, 7, 11, 16], KApp.getColor('info'), 2);
        KLib.initMiniChart($('#k_widget_general_statistics_chart_9'), [4, 12, 9, 18, 15, 7, 11, 12], KApp.getColor('danger'), 2);
        KLib.initMiniChart($('#k_widget_general_statistics_chart_10'), [3, 14, 5, 12, 15, 8, 14, 16], KApp.getColor('success'), 2);

        // Main chart
        var ctx = document.getElementById("k_widget_general_statistics_chart_main").getContext("2d");

        var gradient1 = ctx.createLinearGradient(0, 0, 0, 350);
        gradient1.addColorStop(0, Chart.helpers.color(KApp.getColor('brand')).alpha(0.3).rgbString());
        gradient1.addColorStop(1, Chart.helpers.color(KApp.getColor('brand')).alpha(0).rgbString());

        var gradient2 = ctx.createLinearGradient(0, 0, 0, 350);
        gradient2.addColorStop(0, Chart.helpers.color(KApp.getColor('danger')).alpha(0.3).rgbString());
        gradient2.addColorStop(1, Chart.helpers.color(KApp.getColor('danger')).alpha(0).rgbString());

        var mainConfig = {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October'],
                datasets: [{
                    label: 'My First dataset',
                    borderColor: KApp.getColor('brand'),
                    borderWidth: 2,
                    backgroundColor: gradient1,
                    pointBackgroundColor: KApp.getColor('brand'),
                    data: [30, 60, 25, 7, 5, 15, 30, 20, 15, 10],
                }, {
                    label: 'My Second dataset',
                    borderWidth: 1,
                    borderColor: KApp.getColor('danger'),
                    backgroundColor: gradient2,
                    pointBackgroundColor: KApp.getColor('danger'),
                    data: [10, 15, 25, 35, 15, 30, 55, 40, 65, 40]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                title: {
                    display: false,
                    text: 'Chart.js Line Chart - Stacked Area'
                },
                tooltips: {
                    intersect: false,
                    mode: 'nearest',
                    xPadding: 10,
                    yPadding: 10,
                    caretPadding: 10
                },
                legend: {
                    display: false,
                    labels: {
                        usePointStyle: false
                    }
                },
                hover: {
                    mode: 'index'
                },
                scales: {
                    xAxes: [{
                        display: false,
                        scaleLabel: {
                            display: false,
                            labelString: 'Month'
                        },
                        ticks: {
                            display: false,
                            beginAtZero: true
                        }
                    }],
                    yAxes: [{
                        display: true,
                        stacked: false,
                        scaleLabel: {
                            display: false,
                            labelString: 'Value'
                        },
                        gridLines: {
                            color: '#eef2f9',
                            drawBorder: false,
                            offsetGridLines: true,
                            drawTicks: false
                        },
                        ticks: {
                            display: false,
                            beginAtZero: true
                        }
                    }]
                },
                elements: {
                    point: {
                        radius: 0,
                        borderWidth: 0,
                        hoverRadius: 0,
                        hoverBorderWidth: 0
                    }
                },
                layout: {
                    padding: {
                        left: 0,
                        right: 0,
                        top: 0,
                        bottom: 0
                    }
                }
            }
        };

        var chart = new Chart(ctx, mainConfig);

        // Update chart on window resize
        KUtil.addResizeHandler(function() {
            chart.update();
        });
    }

    var daterangepickerInit = function() {
        if ($('#k_dashboard_daterangepicker').length == 0) {
            return;
        }

        var picker = $('#k_dashboard_daterangepicker');
        var start = moment();
        var end = moment();

        function cb(start, end, label) {
            var title = '';
            var range = '';

            if ((end - start) < 100 || label == 'Today') {
                title = 'Today:';
                range = start.format('MMM D');
            } else if (label == 'Yesterday') {
                title = 'Yesterday:';
                range = start.format('MMM D');
            } else {
                range = start.format('MMM D') + ' - ' + end.format('MMM D');
            }

            picker.find('#k_dashboard_daterangepicker_date').html(range);
            picker.find('#k_dashboard_daterangepicker_title').html(title);
        }

        picker.daterangepicker({
            direction: KUtil.isRTL(),
            startDate: start,
            endDate: end,
            opens: 'left',
            applyClass: "btn btn-sm btn-primary",
            cancelClass: "btn btn-sm btn-secondary",
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);

        cb(start, end, '');
    }

    var recentOrdersInit = function() {
        if ($('#k_recent_orders').length === 0) {
            return;
        }

        var datatable = $('#k_recent_orders').KDatatable({
            // datasource definition
            data: {
                type: 'remote',
                source: {
                    read: {
                        url: 'inc/api/datatables/demos/default.php',
                    },
                },
                pageSize: 10,
                serverPaging: true,
                serverFiltering: true,
                serverSorting: true
            },

            // layout definition
            layout: {
                scroll: true,
                footer: false,
                height: 380
            },

            // column sorting
            sortable: true,

            pagination: true,

            search: {
              input: $('#generalSearch'),
            },

            // columns definition
            columns: [{
                field: 'id',
                title: '#',
                sortable: 'asc',
                width: 40,
                type: 'number',
                selector: false,
                textAlign: 'center',
            }, {
                field: 'name',
                title: 'Name',
                template: function(row, index, datatable) {
                    return row.first_name + ' ' + row.last_name;
                },
            }, {
                field: 'phone',
                title: 'Phone',
            }, {
                field: 'hire_date',
                title: 'Hire Date',
                type: 'date',
                format: 'MM/DD/YYYY',
            }, {
                field: 'status',
                title: 'Status',
                // callback function support for column rendering
                template: function(row) {
                    var status = {
                        1: {
                            'title': 'Pending',
                            'class': 'k-badge--brand'
                        },
                        2: {
                            'title': 'Delivered',
                            'class': ' k-badge--metal'
                        },
                        3: {
                            'title': 'Canceled',
                            'class': ' k-badge--primary'
                        },
                        4: {
                            'title': 'Success',
                            'class': ' k-badge--success'
                        },
                        5: {
                            'title': 'Info',
                            'class': ' k-badge--info'
                        },
                        6: {
                            'title': 'Danger',
                            'class': ' k-badge--danger'
                        },
                        7: {
                            'title': 'Warning',
                            'class': ' k-badge--warning'
                        }
                    };
                    return '<span class="k-badge ' + status[row.status].class + ' k-badge--inline k-badge--pill">' + status[row.status].title + '</span>';
                }
            }, {
                field: 'type',
                title: 'Type',
                // callback function support for column rendering
                template: function(row) {
                    var status = {
                        1: {
                            'title': 'Online',
                            'state': 'danger'
                        },
                        2: {
                            'title': 'Retail',
                            'state': 'primary'
                        },
                        3: {
                            'title': 'Direct',
                            'state': 'accent'
                        }
                    };
                    return '<span class="k-badge k-badge--' + status[row.type].state + ' k-badge--dot"></span>&nbsp;<span class="k-font-bold k-font-' + status[row.type].state + '">' +
                        status[row.type].title + '</span>';
                }
            }, {
                field: 'Actions',
                title: 'Actions',
                sortable: false,
                width: 130,
                overflow: 'visible',
                textAlign: 'center',
                template: function(row, index, datatable) {
                    var dropup = (datatable.getPageSize() - index) <= 3 ? 'dropup' : '';
                    return '\
                            <div class="dropdown ' + dropup + '" >\
                                <a href="#" class="btn btn-hover-brand btn-icon btn-pill" data-toggle="dropdown">\
                                    <i class="la la-ellipsis-h"></i>\
                                </a>\
                                <div class="dropdown-menu dropdown-menu-right">\
                                    <a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>\
                                    <a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>\
                                    <a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>\
                                </div>\
                            </div>\
                            <a href="#" class="btn btn-hover-brand btn-icon btn-pill" title="Edit details">\
                                <i class="la la-edit"></i>\
                            </a>\
                            <a href="#" class="btn btn-hover-danger btn-icon btn-pill" title="Delete">\
                                <i class="la la-trash"></i>\
                            </a>\
                        ';
                }
            }]
        });

        $('#k_form_status').on('change', function() {
          datatable.search($(this).val().toLowerCase(), 'status');
        });

        $('#k_form_type').on('change', function() {
          datatable.search($(this).val().toLowerCase(), 'type');
        });

        $('#k_form_status,#k_form_type').selectpicker();

        // Reload datatable layout on aside menu toggle
        if (KLayout.getAsideSecondaryToggler()) {
            KLayout.getAsideSecondaryToggler().on('toggle', function() {
                datatable.redraw();
            });    
        }        
    };

    return {
        //== Init demos
        init: function() {
            mediumCharts();
            daterangepickerInit();
            generalStatistics();
            recentOrdersInit();            
        }
    };
}();

//== Class initialization on page load
jQuery(document).ready(function() {
    KDashboard.init();
});
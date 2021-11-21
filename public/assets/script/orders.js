'use strict';
// Class definition
[".kt-datatable1"].hide;
var KTDatatableChildRemoteDataDemo = function() {
	// Private functions

	// demo initializer
	var demo = function() {

		var datatable = $('.kt-datatable').KTDatatable({
            // datasource definition
            data: {
                type: 'remote',
                source: {
                  read: {
                    url: $("[name=MAIN_URL]").val()+"ordersJson?DateFrom=" + $("[name=DateFrom]").val()+ "&DateTo=" + $("[name=DateTo]").val()+ "&PriceFrom=" + $("[name=PriceFrom]").val() + "&PriceTo=" + $("[name=PriceTo]").val() ,
                    map: function(raw) {
                      // sample data mapping
                      var dataSet = raw;
                      if (typeof raw.data !== 'undefined') {
                        dataSet = raw.data;
                      }
                      return dataSet;
                    },
                  },
                },
                pageSizeSelect: [5, 10, 15, 100],
                pageSize: 5,
                serverPaging: false,
                serverFiltering: false,
                serverSorting: false,
              },

			layout: {
				scroll: false,
				height: null,
				footer: false,
			},

			sortable: true,

			detail: {
                title: 'Load sub table',
            },
            search: {
				input: $('#generalSearch'),
			},
			columns: [
				{
          field: 'order.id',
          title: 'orderID',
          sortable: 'asc',
					textAlign: 'center',
          autoHide: false,
				},{
					field: 'order.createdAt',
          title: 'orderDate',
          sortable: true,
          autoHide: false,
				},
        
        {
					field: 'id',
          title: 'orderItemID',
          sortable: false,
          autoHide: false,
				},
        {
					field: 'name',
          title: 'orderItemName',
          sortable: false,
          autoHide: false,
				},
        {
					field: 'quantity',
          title: 'orderItemQuantity',
          sortable: false,
          autoHide: false,
				},
        {
					field: 'basePrice',
          title: 'orderItemPrice',
          sortable: true,
          autoHide: false,
				},
        {
					field: 'customer.firstName',
          title: 'customerFirstName',
          sortable: false,
          autoHide: false,
				},
        {
					field: 'customer.lastName',
          title: 'customerLastName',
          sortable: false,
          autoHide: false,
				},
      
        {
					field: 'addresses',
          title: 'customerAddress',
          sortable: false,
          template: function(data) {
              var html=``;
              $(data.customer.addresses).each(function(index){
                html +=data.customer.addresses[index].type+`: `+data.customer.addresses[index].address+'<br>';
              });

                return html;

          },
				},
        {
					field: 'customerCity',
          title: 'customerCity',
          sortable: false,
          template: function(data) {
            var html=``;
            $(data.customer.addresses).each(function(index){
              html +=data.customer.addresses[index].type+`: `+data.customer.addresses[index].city+'<br>';
            });

              return html;

        },
				},
        {
					field: 'customerZipCode',
          title: 'customerZipCode',
          sortable: false,
          template: function(data) {
              var html=``;
              $(data.customer.addresses).each(function(index){
                html +=data.customer.addresses[index].type+`: `+data.customer.addresses[index].zip+'<br>';
              });

                return html;

          },
				},
        {
					field: 'customer.email',
          title: 'customerEmail',
          sortable: false,

        },
				
        
      ],
		});

	};

	return {
		// Public functions
		init: function(e) {
            // init dmeo
			demo();
		},
	};
}();

jQuery(document).ready(function() {
    KTDatatableChildRemoteDataDemo.init();
});

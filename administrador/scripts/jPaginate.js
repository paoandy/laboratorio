/*

To use simply call .paginate() on the element you wish like so:
$("#content").jPaginate();

you can specify the following options:
items = number of items to have per page on pagination
next = the text you want to have inside the text button
previous = the text you want in the previous button

*/
(function($){
    $.fn.jPaginate = function(options) {
        var defaults = {
            items: 1,
            next: "Next",
            previous: "Prev",
            active: "active",
            pagination_class: "pagination",
        };

        return this.each(function() {
            // object is the selected pagination element list
            obj = $(this);

            // this is how you call the option passed in by plugin of items
            var show_per_page = defaults.items;
            //getting the amount of elements inside parent element
            var number_of_items = obj.children().size();
            //calculate the number of pages we are going to have
            var number_of_pages = Math.ceil(number_of_items/show_per_page);

	    //create the pages of the pagination
            var array_of_elements = [];
            var numP = 0;
            var nexP = show_per_page;

	    var height = 0;
	    var max_height = 0;

	    var curr = 0;

	    //loop through all pages and assign elements into array
            for (var i=0;i<number_of_pages;i++)
            {
                array_of_elements[i] = obj.children().slice(numP, nexP);

                numP += show_per_page;
                nexP += show_per_page;
            }

	    showPage(curr);

            //show selected page
            function showPage(page) {
                obj.children().hide();

		array_of_elements[page].each(function (){
		   $(this).show();
		});
            }

	    $("#next").click( function() {
		if( curr < number_of_pages - 1)
		    curr++;
		showPage(curr);
            });

	    $("#prev").click( function() {
		if( curr > 0)
		    curr--;
		showPage(curr);
            });
        });
    };
})(jQuery);

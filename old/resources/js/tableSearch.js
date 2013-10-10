/** I (ZeroLevels) did not write this javascript file. The following code has been borrowed from Vattic's Mod Support page for the Faithful 32x32 pack. For a link to his profile and texture pack, please refer to the credits page (Which will be up soonish) Full credit for this file goes to Vattic.**/			
			
$(document).ready(function() {

	var timeout = 0,
		columns = {},
		searchText = {},
		columnCount = 0;

	function doFilter() {

		//gets the contents of each input box and stores them in an array
		$('input').each(function () {
			var index = $(this).parent().prevAll().length + 1;
			searchText[index] = this.value.toUpperCase();
		});

		var columnLength = columns[1].length;

		for (var i = 1; i <= columnCount; i+=1) {
			var filter = searchText[i];

			for (var ii = 0; ii < columnLength; ii+=1) {
				if ((searchText[i] == '' || searchText[i] == 'Click here to search...') && i > 1) break;

				var display = 'none';
				if (columns[i][ii].el.parentNode.style.display != 'none' || i == 1) {

					if (columns[i][ii].text.indexOf(filter) > -1) {
						display = '';
					}
				}
				columns[i][ii].el.parentNode.style.display = display;
			}
		}
	}

	$('input').each(function () {

		this.style.display = '';
		this.value = 'Click here to search...';

		columnCount+=1;

		//Setup our columns
		var index = $(this).parent().prevAll().length + 1;

		//alert(index);

		this.column = index;
		columns[index] = [];


		/* attach some data to each column*/ /**Modified to only search rows from tables with .modlist class**/
		$('table.modlist td:nth-child(' + index + ')').each(function () {
			columns[index].push({
				text: this.innerHTML.toUpperCase(),
				el: this
			});
		});

	}).on('keyup', function () {
		/*bind our event with a 250 ms delay*/ /**(modified from 500 to 250)**/
		var that = this;
		clearTimeout(timeout);
		timeout = setTimeout(function () {
			doFilter();
		}, 250);
	}).blur(function() {
		if (this.value == '') {
			this.value = 'Click here to search...';
			this.className = "searchEmpty";
		}
	}).focus(function() {
		if (this.value == 'Click here to search...') {
			this.value = '';
			this.className = "search";
		}
	});
});

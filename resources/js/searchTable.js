// When document is ready: this gets fired before body onload :)
		$(document).ready(function(){
			// Write on keyup event of keyword input element
			$("#modList_Search").keyup(function(){
				// When value of the input is not blank
				if( $(this).val() != "")
				{
					// Show only matching TR, hide rest of them
					$("#modList tbody>tr").hide();
					$("#modList td:contains-ci('" + $(this).val() + "')").parent("tr").show();
				}
				else
				{
					// When there is no input or clean again, show everything back
					$("#modList tbody>tr").show();
				}
			});
		});
		// jQuery expression for case-insensitive filter
		$.extend($.expr[":"], 
		{
			"contains-ci": function(elem, i, match, array) 
			{
				return (elem.textContent || elem.innerText || $(elem).text() || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
			}
		});
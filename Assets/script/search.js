$(document).ready(function() {
	 $('#search_text').keyup(function() {
	 	var search = $($this).val();
	 	if (search = '') 
	 	{
	 		load_data(search);
	 	}
	 	else
	 	{
	 		load_data();
	 	}
	 });
	 load_data();
	 $('#del_after_search').remove()
	 function load_data(query)
	 {
	 	$.ajax({
	 		url: "<?php echo base_url();?> ajaxsearch/fetch",
	 		method: "POST",
	 		data: {query:query},
	 		success: function(data){
	 			$('#result').html(data);
	 		}
	 	})
	 }


});
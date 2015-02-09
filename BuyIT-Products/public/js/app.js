$(document).ready(function()
{
	$("#form_submit").click(function()
	{
		$("#target_form").submit();
	});

	$(".delete_product").click(function(event)
	{
		$("#btn_delete_product").prop("href", '/product/prod/' + event.target.id + '/delete');
	});
});
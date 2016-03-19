function validateForm()
{
	return false;
}

$('#submit_button').click(function() {
	
	var input=$(this);
	var is_name=input.val();
	//alert(input);
	if(is_name)
	{
		alert(is_name);
	}
	else
	{
		$('#nameInner').text('Name Required');
	}
});
$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
   

function AjaxCall(Ajaxmethod,Ajaxurl,AjaxArray,AjaxCond)
{
    //e.preventDefault();
    $.ajax
    ({
        type:Ajaxmethod,
        url:Ajaxurl,
        data:AjaxArray, 
        success:function(data)
        {
            console.log(data,AjaxCond);
            //GetResponse(data,AjaxCond)
        }
    });
}

function GetResponse(ResponseData,AjaxCond)
{
	if(AjaxCond='save_user_data')
	{
		console.log('Here is the data');
	}
	else
	{
		console.log('Sorry Bad request');
	}
}

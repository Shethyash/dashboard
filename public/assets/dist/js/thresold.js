function model_popup(method,title,description)
{
	//alert(method);
	if(method=='success')
	{
		toastr.success(description, title);
	}
	else if(method=='info')
	{
		toastr.info(description, title);
	}
	else if(method=='warning')
	{
		toastr.warning(description, title);
	}
	else if(method=='error')
	{
		toastr.error(description, title);
	}
	else if(method=='200')
	{
		toastr.success(description, title);
	}
	else if(method=='404' || method=='500' || method=='209' || method=='400' || method=='401')
	{
		toastr.error(description, title);
	}
}

function UpdateQueryString(key, value, url) 
{
    if (!url) url = window.location.href;
    
    var re = new RegExp("([?&])" + key + "=.*?(&|#|$)(.*)", "gi"),
        hash;

    if (re.test(url)) {
        if (typeof value !== 'undefined' && value !== null)
            return url.replace(re, '$1' + key + "=" + value + '$2$3');
        else {
            hash = url.split('#');
            url = hash[0].replace(re, '$1$3').replace(/(&|\?)$/, '');
            if (typeof hash[1] !== 'undefined' && hash[1] !== null) 
                url += '#' + hash[1];
            return url;
        }
    }
    else {
        if (typeof value !== 'undefined' && value !== null) {
            var separator = url.indexOf('?') !== -1 ? '&' : '?';
            hash = url.split('#');
            url = hash[0] + separator + key + '=' + value;
            if (typeof hash[1] !== 'undefined' && hash[1] !== null) 
                url += '#' + hash[1];
            return url;
        }
        else
            return url;
    }
}

$(document).ready(function() 
{
	$('#search_value').keypress(function(event)
	{
		var keycode = (event.keyCode ? event.keyCode : event.which);
		if(keycode == '13')
		{
			var x = document.getElementById("search_value").value;
		    var y = window.location.href;
		    var v = UpdateQueryString("search",x,y);
		    window.location.href = v;	
		}
	});
});

    
function openDelete(table,field,id)
{
	document.getElementById('form_id').value = id;
	document.getElementById('form_table').value = table;
	document.getElementById('form_field').value= field;
}
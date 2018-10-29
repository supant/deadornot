var Util = Util || (function(){
    var _settings = null;

    return {
        init : function(settings) {
        	_settings = JSON.parse(settings);
        	if (_settings!=null && _settings.page!=null) {
            	_settings.page = _settings.page.replace('.php','_ajax.php');
        	}
        	this.showAlertIfNeeded();
        },
        ajaxCall : function(data) {
        	if (_settings==null || _settings.page==null) {
        		alert('Initialization Failed');
        		return;
        	}

			$.post(_settings.page, data, function(result) {
				if (result[0] == _settings.codeError) {
					location.href = _settings.pageError + "?erreur=" + result[1];
				} else if (result[0] == _settings.codeAlert) {
					if ($('[data-remodal-id=modal_msg]').length>0) {
						$('#modal_msg div').html(result[1]);
						var inst = $('[data-remodal-id=modal_msg]').remodal();
						inst.open();
						setTimeout(function(){
							inst.close();
  						}, 2000);	
					} else {
						alert(result[1]);
					} 
				} else {
					location.href = result[1];
				}
			}, "json");
       },
       showAlertIfNeeded : function (){
       		if ($('#modal_msg').length>0 && $('#modal_msg').text().trim().length>0) {
				var inst = $('[data-remodal-id=modal_msg]').remodal();
				inst.open();
				setTimeout(function(){
					inst.close();
	  			}, 5000);	
			}
       }
    };
}());
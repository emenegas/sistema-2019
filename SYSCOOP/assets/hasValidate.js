
(function() {
	'use strict';
	window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
    	form.addEventListener('submit', function(event) {
    		if (form.checkValidity() === false) {
    			event.preventDefault();
    			event.stopPropagation();
    		}
    		form.classList.add('was-validated');
    	}, false);
    });
}, false);
})();
function exibeErro(mensagem){
formerror = 
	'<div class="alert alert-danger alert-dismissible fade show" role="alert">'+
	'<strong>Aviso!</strong>'+
	'<div>'+mensagem+'</div>'+
	'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
		'<span aria-hidden="true">&times;</span>'+ 
	'</button>'+
'</div>';

$(formerror).appendTo('body');

}

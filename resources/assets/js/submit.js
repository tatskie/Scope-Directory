(function(){
	$('.form-prevent-multiple-submits').on('submit', function() {
		$('.button-prevent-multiple-submits').attr('disabled', 'true');
		$('.spinner').show();
	})
})();

(function(){
	$('.proceed-form-prevent-multiple-submits').on('submit', function() {
		$('.button-prevent-multiple-submits').attr('disabled', 'true');
		$('.proceed-spinner').show();
	})
})();

(function(){
	$('.pif-form-prevent-multiple-submits').on('submit', function() {
		$('.button-prevent-multiple-submits').attr('disabled', 'true');
		$('.pif-spinner').show();
	})
})();


(function($) {
	$.fn.validationEngineLanguage = function() {};
	$.validationEngineLanguage = {
		newLang: function() {
			$.validationEngineLanguage.allRules = {"required":{    
						"regex":"none",
						"alertText":"* Este campo é obrigatório",
						"alertTextCheckboxMultiple":"*Escolha uma opção",
						"alertTextCheckboxe":"* Este checkbox é obrigatório"},
					"length":{
						"regex":"none",
						"alertText":"* Entre ",
						"alertText2":" e ",
						"alertText3":" caracteres são requeridos"},
					"maxCheckbox":{
						"regex":"none",
						"alertText":"* Número máximo de caracteres excedidos"},	
					"minCheckbox":{
						"regex":"none",
						"alertText":"* Por favor,l escolha ",
						"alertText2":" opções"},		
					"confirm":{
						"regex":"none",
						"alertText":"* Seus campos não são idênticos"},		
					"telephone":{
						"regex":"/^[0-9\-\(\)\ ]+$/",
						"alertText":"* Número de telefone inválido"},	
					"email":{
						"regex":"/^[a-zA-Z0-9_\.\-]+\@([a-zA-Z0-9\-]+\.)+[a-zA-Z0-9]{2,4}$/",
						"alertText":"* Email inválido ou em uso"},	
					"date":{
                         "regex":"/^[0-9]{4}\-\[0-9]{1,2}\-\[0-9]{1,2}$/",
                         "alertText":"* Data inválida, formato AAAA-MM-DD requerido"},
					"onlyNumber":{
						"regex":"/^[0-9\ ]+$/",
						"alertText":"* Apenas números são aceitos"},	
					"noSpecialCaracters":{
						"regex":"/^[0-9a-zA-Z]+$/",
						"alertText":"* Caracteres especiais não são aceitos"},	
					"onlyLetter":{
						"regex":"/^[a-zA-Z\ \']+$/",
						"alertText":"* Apenas letras são aceitas"},
					"ajaxUser":{
						"file":"validateUser.php",
						"alertTextOk":"* Este nome já está em uso",	
						"alertTextLoad":"* Carregando, aguarde",
						"alertText":"* Este nome já está sendo usado"},	
					"ajaxName":{
						"file":"validateUser.php",
						"alertText":"* Este nome já é usado",
						"alertTextOk":"*Este nome está disponível",	
						"alertTextLoad":"* LChargement, Por favor, aguarde"}	
				}	
		}
	}
})(jQuery);

$(document).ready(function() {	
	$.validationEngineLanguage.newLang()
});
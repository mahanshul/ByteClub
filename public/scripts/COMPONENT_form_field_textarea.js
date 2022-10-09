$(document)
	.one('focus.auto-expand', 'textarea.auto-expand', function(){
		var savedValue = this.value;
		this.value = '';
		this.baseScrollHeight = this.scrollHeight;
		this.value = savedValue;
	})
	.on('input.auto-expand', 'textarea.auto-expand', function(){
		var minRows = this.getAttribute('data-min-rows')|0, rows;
		this.rows = minRows;
		rows = Math.ceil((this.scrollHeight - this.baseScrollHeight) / (parseInt($(this).css('line-height'))));
		this.rows = minRows + rows;
	});
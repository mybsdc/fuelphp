$('#editTrue').click(function(){ // 编辑验证以及确认
	// $.post('edit', {title: $('#title').val(), content: editor.txt.text(), id: $('#id').val()}, function(data){
	// $('#content-hidden').val(editor.txt.html());
	$.post('edit', $('#editForm').serialize(), function(data){
		var dataObj = JSON.parse(data);

		if (dataObj.status === -1) {
			// console.log(dataObj.data.title);

			$('.tips').html('');
			$(dataObj.data).each(function(name, msg){
				$.each(msg, function(n, m){
					$('.' + n + '-tips').html(m);
				});
			});
		} else {
			// return false;
			window.location.href = 'edit_true?kw=' + kw + '&page=' + page;
			/*var content = ue.getContentTxt();
			$('#isTitle').html($('#title').val());
			$('#isContent').html(content);
			$('#test').modal();
			$('#truePost').click(function(){
				$.post('edit_true', $("#editForm").serialize(), function(res){
					var dataObj = JSON.parse(res);

					if (dataObj.status === 200) {
						window.location.href = 'index?&page=' + page + '&kw=' + kw;
					}
				});
			});*/
		}
	});
	return false;
});

$('#editPost').click(function(){
    $.post('edit_true', {is_true: 1}, function(res){
        var dataObj = JSON.parse(res);

        if (dataObj.status === 200) {
            window.location.href = 'index?&page=' + page + '&kw=' + kw;
        }
    });
});

$('#addPost').click(function(){
	$.post('add', $("#addForm").serialize(), function(res){
		var html = '';
		var dataObj = JSON.parse(res);

		if (dataObj.status === -1) {
			console.log(dataObj);
			for (var i = 0; i < dataObj.data.length; i++) {
				html += '<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>' + dataObj.data[i] + '</strong></div>';
			}
			$('#tips').html(html);
		} else {
			window.location.href = 'index';
		}
	});
	return false;
});

// other
function StandardPost (url, args) {
    var form = $("<form method='post'></form>");
    form.attr({"action":url});
    for (arg in args)
    {
        var input = $("<input type='hidden'>");
        input.attr({"name":arg});
        input.val(args[arg]);
        form.append(input);
    }
    form.submit();
}
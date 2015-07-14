function update_program() {
    $.post('app/programwrite', $("#programchooser").serialize(), function(data){
        location.href = '/app';
    });
}

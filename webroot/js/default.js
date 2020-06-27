$(document).ready(function() {
    $('#custom-fields').selectize({
        plugins: [
            'remove_button',
            'restore_on_backspace'
        ],
        delimiter: ',',
        persist: false,
        valueField: 'id',
        labelField: 'name',
        searchField: [
            'id',
            'name',
        ]
    });

    $('#custom-order').selectize({
        persist: false,
        valueField: 'id',
        labelField: 'name',
        searchField: [
            'id',
            'name',
        ]
    });
}); 

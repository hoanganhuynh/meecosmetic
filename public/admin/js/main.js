$(document).ready(function() {
    // var selects = document.getElementsByClassName('js-select2');
    $('.js-select2').select2({
        // dropdownAutoWidth: true,
        // placeholder: '-- Chọn cửa hàng --'
    }).on('select2:opening', function(e) {
        $(this).data('select2').$dropdown.find(':input.select2-search__field').attr('placeholder', 'Tìm kiếm cửa hàng.....')
    })
});

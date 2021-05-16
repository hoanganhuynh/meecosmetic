// $(function() {

//     $('.dropdown-local > .dropdown-local-item').on('click', function() {
//       $(this).parent().toggleClass('open');
//     });

//     $('.dropdown-local > .dropdown-local-sub-menu > .dropdown-local-sub-menu-intro > .dropdown-local-sub-menu-intro-main > .main-list').on('click', function() {
//         $('.dropdown-local > .dropdown-local-sub-menu > .dropdown-local-sub-menu-intro > .dropdown-local-sub-menu-intro-main > .main-list').removeClass('selected');

//         $(this).addClass('selected').parent().parent().parent().removeClass('open').children('.dropdown-local-item').text( $(this).text() );
//       });

//       $(document).on('keyup', function(evt) {
//         if ( (evt.keyCode || evt.which) === 27 ) {
//           $('.dropdown-local').removeClass('open');
//         }
//       });

//     $(document).on('click', function(evt) {
//         evt.preventDefault();
//       if ( $(evt.target).closest(".dropdown-local > .dropdown-local-item").length === 0 ) {
//         $('.dropdown-local').removeClass('open');
//       }
//     });

//   });
// function myFunction() {
//     document.getElementsByClassName("dropdown-local").classList.toggle("show");
//   }


$(document).ready(function() {
    $(".dropdown-local").click(function(e) {
        e.preventDefault();
        $("ul.dropdown-local-sub-menu").slideToggle(150);
    });
    $(".dropdown-local ul.dropdown-local-sub-menu li.dropdown-local-sub-menu-intro ul.dropdown-local-sub-menu-intro-main > .main-list").click(function() {
        $("div.dropdown-local-item").text($(this).text());
    });

    //    Goole map api
    // function initMap() {

    // }
    // initMap();

});
$(document).ready(function() {
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        dots:false,
        nav:true,
        // mouseDrag:false,
        // stagePadding: 200,
        autoplay:true,
        // animateOut: 'slideOutUp',
        responsive:{
            0:{
                items: 1
            },
            800:{
                items: 2
            },
            1000:{
                items: 2
            }
        }
    });
    $('.slider').slick({
        slidesToShow: 4,
        slidesToScroll: 4,
        dots: true,
        // infinite: true,
        cssEase: 'linear',
        slickSetOption: true,
        draggable: true,
        refresh: true
    });
});

$(document).ready(function() {
    $('.js-select2').select2({
        dropdownAutoWidth: true,
        placeholder: 'Select an option'
    }).on('select2:opening', function(e) {
        $(this).data('select2').$dropdown.find(':input.select2-search__field').attr('placeholder', 'Search local,.....')
    });
    // changeProductType();
  });
  const $button  = document.querySelector('#sidebar-toggle');
const $wrapper = document.querySelector('#wrapper-main');

// $button.addEventListener('click', (e) => {
//   e.preventDefault();
//   $wrapper.classList.toggle('toggled');
// });


// function changeProductType(){
//     $('.product-type').on('click', function (e) {
//         e.preventDefault();
//         var typeId = $(this).data('type-product');
//         loadStore(typeId);
//     });
// }
//
// function loadStore(typeId, page = 1){
//     console.log(GET_STORE_URL)
//     $.ajax({
//         url: GET_STORE_URL,
//         type: 'GET',
//         data: {
//             type_id: typeId,
//             page: page
//         }
//     }).done(function(ketqua) {
//         //$('#noidung').html(ketqua);
//         console.log(ketqua);
//     });
// }

    // $(".js-select2-multi").select2();

    // $(".large").select2({
    //   dropdownCssClass: "big-drop",
    // });



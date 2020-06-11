<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <?php 

     if(Request::path() === '/' ) {
   ?>
    <meta property="og:image" content="https://umpcg.me/img/UMPCG_logo.svg" />
    <meta property="og:image:width" content="470px" />
    <meta property="og:image:height" content="246px" />
    <meta property="og:title" content="UMPCG">
    <meta property="og:url" content="https://umpcg.me/" />
<?php } else { ?>
    @yield('meta')
<?php } ?>
    <link rel="shortcut icon" type="image/x-icon" href="/img/logo_icon.ico" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awsome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/acordian.css') }}" rel="stylesheet">
    <link href="{{ asset('css/carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jcarousel.responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nav.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/posts.css') }}" rel="stylesheet">
    <link href="{{ asset('css/singlePost.css') }}" rel="stylesheet">
    <link href="{{ asset('css/about.css') }}" rel="stylesheet">
    <link href="{{ asset('css/becomeMember.css') }}" rel="stylesheet">
    <link href="{{ asset('css/eBooks.css') }}" rel="stylesheet">
    <link href="{{ asset('css/members.css') }}" rel="stylesheet">
    <link href="{{ asset('css/activities.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin-nav.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/carousel.css') }}" rel="stylesheet">
      @yield('select_css')
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
</head>
<style>
    @media only screen and (max-width : 760px) {
    #myBtn {
        display: none !important;
    }
}
</style>
<body style="font-family: 'Roboto'; background-color:white !important;">
    <div id="app">
        <img src="/img/Ikonica za povratak na vrh.svg" alt="" onclick="topFunction()" id="myBtn" title="Go to top">
        @include('inc.navbar')
        <div class="container">
            @include('inc.messages')
            @yield('content')
        </div>
        @yield('members')
        @yield('carousel')
        @yield('breadcrumbs')
        @include('inc.footer')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jcarousel.responsive.js') }}"></script>
    <script src="{{ asset('js/jquery.jcarousel.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    @yield('boostrap-script')
    @yield('fixed-column-script')
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
    <script>
        //Get the button
        var mybutton = document.getElementById("myBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
        }
</script>
<script>
    $('textarea').keyup(updateCount);
    $('textarea').keydown(updateCount);

    function updateCount() {
        var cs = $(this).val().length;
        $('#characters').text(cs);
    }
</script>
<script>
    $('#title').keyup(updateCount);
    $('#title').keydown(updateCount);

    function updateCount() {
        var cs = $(this).val().length;
        $('#char').text(cs);
    }
</script>
<script>
    $(function() {
        $(".random").html($(".random").children().sort(function() { return 0.5 - Math.random() }));
        });
</script>

<script>
    var input = document.getElementById( 'file-upload' );
    var infoArea = document.getElementById( 'file-upload-filename' );

    input.addEventListener( 'change', showFileName );

    function showFileName( event ) {
    
    // the change event gives us the input it occurred in 
    var input = event.srcElement;
    
    // the input has an array of files in the `files` property, each one has a name that you can use. We're just using the name here.
    var fileName = input.files[0].name;
    
    // use fileName however fits your app best, i.e. add it into a div
    infoArea.textContent = fileName;
    }
</script>
<script>
    $(window).scroll(function(){
    if ($(window).scrollTop() >= 107) {
        $('#navbar').addClass('fixed-header');
    }
    else {
        $('#navbar').removeClass('fixed-header');
    }
});

</script>

<script>
$('#delete').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var postId = button.data('post') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-content #p_id').val(postId) 
})
</script>

<script>
 $(function() {
    $(".wrapper2").mousewheel(function(event, delta) {
    this.scrollLeft -= (delta * 50);   
    event.preventDefault();

    });

    });
</script>

<script>

/*  $(document).ready(function() {
    var table = $('#example').DataTable( {     
    scrollX:        true,
    scrollCollapse: true,
    paging: false,
    "info": false,
    } );
} ); */

var table = $('#example').DataTable({
    paging: false,
    "info": false,
});

$('#myInputTextField').on( 'keyup', function () {
    table.search( this.value ).draw();
} );

</script>

<script>
    $(function(){
    $(".wrapper1").scroll(function(){
        $(".wrapper2")
            .scrollLeft($(".wrapper1").scrollLeft());
    });
    $(".wrapper2").scroll(function(){
        $(".wrapper1")
            .scrollLeft($(".wrapper2").scrollLeft());
    });
});
</script>

<script>
    function copyText(element) {
  var range, selection, worked;

  if (document.body.createTextRange) {
    range = document.body.createTextRange();
    range.moveToElementText(element);
    range.select();
  } else if (window.getSelection) {
    selection = window.getSelection();        
    range = document.createRange();
    range.selectNodeContents(element);
    selection.removeAllRanges();
    selection.addRange(range);
  }
  
  try {
    document.execCommand('copy');
    alert('text copied');
  }
  catch (err) {
    alert('unable to copy text');
  }
}
</script>

{{-- 
<script>
    // Iterate over each select element
$('.myselect').each(function () {

// Cache the number of options
var $this = $(this),
    numberOfOptions = $(this).children('option').length;

// Hides the select element
$this.addClass('s-hidden');

// Wrap the select element in a div
$this.wrap('<div class="select"></div>');

// Insert a styled div to sit over the top of the hidden select element
$this.after('<div class="styledSelect"></div>');

// Cache the styled div
var $styledSelect = $this.next('div.styledSelect');

// Show the first select option in the styled div
$styledSelect.text($this.children('option').eq(0).text());

// Insert an unordered list after the styled div and also cache the list
var $list = $('<ul />', {
    'class': 'options'
}).insertAfter($styledSelect);

// Insert a list item into the unordered list for each select option
for (var i = 0; i < numberOfOptions; i++) {
    $('<li />', {
        text: $this.children('option').eq(i).text(),
        rel: $this.children('option').eq(i).val()
    }).appendTo($list);
}

// Cache the list items
var $listItems = $list.children('li');

// Show the unordered list when the styled div is clicked (also hides it if the div is clicked again)
$styledSelect.click(function (e) {
    e.stopPropagation();
    $('div.styledSelect.active').each(function () {
        $(this).removeClass('active').next('ul.options').hide();
    });
    $(this).toggleClass('active').next('ul.options').toggle();
});

// Hides the unordered list when a list item is clicked and updates the styled div to show the selected list item
// Updates the select element to have the value of the equivalent option
$listItems.click(function (e) {
    e.stopPropagation();
    $styledSelect.text($(this).text()).removeClass('active');
    $this.val($(this).attr('rel'));
    $list.hide();
    /* alert($this.val()); Uncomment this for demonstration! */
});

// Hides the unordered list when clicking outside of it
$(document).click(function () {
    $styledSelect.removeClass('active');
    $list.hide();
});

});
</script> --}}

<script>
    $('.options li').click(function() {
        var className = $( "#organization option:selected" ).val();
        if(className == "doo") {
            $('.row_doo').show();
            $('.row_preduzetnik').hide();
            $('.row_ad').hide();
            $('.row_nvo').hide();
        } else if(className == "preduzetnik") {
            $('.row_doo').hide();
            $('.row_preduzetnik').show();
            $('.row_ad').hide();
            $('.row_nvo').hide();
        } else if(className == "ad") {
            $('.row_doo').hide();
            $('.row_preduzetnik').hide();
            $('.row_ad').show();
            $('.row_nvo').hide();
        }else {
            $('.row_doo').hide();
            $('.row_preduzetnik').hide();
            $('.row_ad').hide();
            $('.row_nvo').show();
        }
    })
</script>
@yield('select_js')

</body>
</html>

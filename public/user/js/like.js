$(document).ready(function(){
    let postId = 0;

    $("#like").on( "click", function() {
       // event.preventDefault();
       postId = $(this).attr('data-id');
       alert(postId);
    });
});


// $(document).ready(function(){
//     $("#like").on( "click", function() {
//         // alert('Hello');
//     });
// });

// ----------
// function like(){
//   alert('Hello')
// };

// $(document).ready(function (){
//     alert('Hello')
// });

//  console.log('tested');
// $(document).ready(function () {
//     $.ajaxSetup({
//         header:{'X-CSRF_TOKEN':$('meta[name="csrf-token"]').attr('content')}
//     });
//     $("#submit").click(function(e)
//     {
//         e.preventDefault();
//         var email=$("input[name=email]").val();
//         var password=$("input[name=password]").val();

//         $.ajax({
//             type:'POST',
//             // url:"{{ route('admin.auth')}}",
//             url:'admin/auth',
//             data:{name:email,password:password},
//             success:function(data){
//                 alert(data.success);
//             }
//         })
//     })
// });

var i=0;
var time;
 $(document).ready(function () {
    $('.ig').eq(0).show().siblings().hide()
    timer();

    $('.left-button').click(function (){
        clearInterval(time);
        if (i==0){
            i=3;
        }
        i--;
        show();
        timer();


    })
     $('.right-button').click(function () {
         clearInterval(time);
         if (i == 3) {
             i = -1;
         }
         i++;
         show();
         timer();
     })

});
function timer() {
    time = setInterval(function () {
        show();
        i++;
        if(i==3){
            i=0
        }

    },2000)

}

function show() {
    $('.ig').eq(i).fadeIn(300).siblings().fadeOut(300)
}
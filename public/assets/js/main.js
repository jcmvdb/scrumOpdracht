function classHide(number) {
    $(`#vehicleInput${number}`).change(function () {
        if ($(`#vehicleInput${number}`).is(":checked")) {
            $(`#vehicle-${number}`).removeClass("hide", 1000, "swing");
            $(`#vehicle-${number} input`).prop('required',true);

        } else {
            $(`#vehicle-${number}`).addClass("hide", 1000, "swing");
            $(`#vehicle-${number} input`).prop('required',false);
        }
    })
}


$(document).ready(function(){
    var maxField = 99999; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div><input type="text" list="person" name="field_name[]" value="" placeholder="Manschappen"/><a href="javascript:void(0);" class="remove_button">-</a></div>'; //New input field html
    var x = 1; //Initial field counter is 1

    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });

    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});





const randomBackgroundArray = [
    "/assets/img/loginBackground/back1.webp",
    "/assets/img/loginBackground/back2.webp",
    "/assets/img/loginBackground/back3.jpg",
    "/assets/img/loginBackground/back4.webp",
    "/assets/img/loginBackground/back5.png",
];

const random = Math.floor(Math.random() * randomBackgroundArray.length);
console.log(random);


document.getElementById("loginScreenWrapper").style.background = 'url(' + randomBackgroundArray[random] + ')';
document.getElementById("loginScreenWrapper").style.backgroundSize = "cover";
document.getElementById("loginScreenWrapper").style.backgroundAttachment = "fixed";

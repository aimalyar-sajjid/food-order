
const validate = selector => {
    let error = [];

    $.each($(selector), function(){

        // CHECKING FOR EMPTY FIELDS
        if($(this).val() == "")
        {
            let formGroup = $(this).parent();

            // ADD TEXT TO SMALL FROM NAME ATTRIBUTE AND REPLACE - TO SPACE
            formGroup.children('small').text($(this).attr("name").replace(/-/g, " ") + " is required!");

            error.push(1);
            
        }else
        {
            let formGroup = $(this).parent();
            formGroup.children('small').text("");
            error = [];
        }
        
    });
    return (error.length == 0)? true :  false;
}

export {validate};
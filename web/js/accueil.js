const CSS = {
    show_carre_absolute: {
        "border":"1px solid #7fc241",
        "border-top-color": "#fff",
        "border-bottom-color": "#fff",
        "background": "white"
    },
    hide_carre_absolute: {
        "border":"1px solid transparent",
        "border-top-color": "transparent",
        "border-bottom-color": "transparent",
        "background": "transparent"
    }
}

const toggleCarre = (numIdCarre) => {
    $("#absolute-section").children().map(function() {
        let element = $(this).attr('id')
        let ishow = $(this).attr('ishow')

        if(element == `carre-${numIdCarre}` && !ishow){
            $(this).attr('ishow','true')
            $(`#${element}`).css(CSS.show_carre_absolute)
        }
        else {
            $(this).attr('ishow','')
            $(`#${element}`).css(CSS.hide_carre_absolute)
        }
    })
}
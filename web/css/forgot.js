
/**
 * MAJ 21/08/2019
 * 
 * js forgot | file forgot.js
 *
 * In this js files, we manage the view of the forgot page with javascript
 *
 * List of files working with
 * forgot.css
 * forgot.html
 * forgot.php
 * 
 *
 *
 * @package rps Project
 * @subpackage rps
 * @author @Afpa Lab Team 5
 * @copyright  1920-2080 The Afpa Lab Team 5 Group Corporation World Company
 * @version v1.0
 */




/**
 * Called when load view is finished
 * Set the title of the page
 */
$(window).on('load', function() {
    $('.page-title').html('Mot de passe oublié');
})

/** 
 * 
 * Clear the pop message on after submit
 * 
 * */
function displayPop() {
    element = $( "#for-info-pop" );
    element.attr("class","w3-container w3-center w3-animate-left" ).show();
    console.log('adding class for animate');
}
$(document).ready(function () {

    async function getUserInfo(){
        const response = await fetch('php/user_profile.php');
        if(!response.ok){
            const message = "An Error has occurred";
            throw new Error(message);
        }
        const results = await response.json();
        return results;
    }
    getUserInfo().then(data => {
        if (data.about_me == null) {
            about = "You did not add your about info yet. Click on 'edit my about me' to add them"
        }else{
            about = data.about_me;
        }
        if (data.status == null) {
            status_value = "You did not post your status yet"
        }else{
            status_value = data.status;
        }
        $("#friends").text(data.friends + " friends");
        $("#followers").text(data.followers + " followers");
        $("#following").text(data.following + " following");
        $("#name").text(data.first_name + " " + data.last_name);
        $("#email").text("Email: " + data.email);
        $("#birthday").text("Birthday: " + data.birthday);
        $("#about_me").text(about);
        $("#status").text(status_value);
        $("#country").text("Country: " + data.country);
        $("#city").text("City: " + data.city);
        $("#addressLine").text("Address Line: " + data.address_line,
        $("#notifications_nb").text(data.notifications)
        );
    }).catch(error => {
        console.log(error.message);
    });

    $("#update_status").click(editStatus);
    function editStatus(){
            new_status = $("#new_status").val();
            data = {
                new_status: new_status,
            };
            postStatusData(data);
    }
    async function postStatusData(form_data){
    try{
        result = await $.ajax({
        type: "POST",
        url: 'php/status_update.php',
        data: form_data,});

        var jsonData = await JSON.parse(result);
        $("#status").text(jsonData.status);
    }catch(error){
        console.log(error);
    }
    }

    $("#update_about").click(editAbout);
    function editAbout(){
            new_about = $("#new_about_me").val();
            data = {
                new_about: new_about,
            };
            postAboutData(data);
    }
    async function postAboutData(form_data){
    try{
        result = await $.ajax({
        type: "POST",
        url: 'php/about_me_update.php',
        data: form_data,});

        var jsonData = await JSON.parse(result);
        $("#about_me").text(jsonData.about_me);
    }catch(error){
        console.log(error);
    }
    }

    $("#update_address").click(editAddress);
    function editAddress(){
        data = {
            country: $("#new_country").val(),
            city: $("#new_city").val(),
            address_line: $("#new_address_line").val(),
        };
        postAddressData(data);
    }
    async function postAddressData(form_data){
    try{
        result = await $.ajax({
        type: "POST",
        url: 'php/address_update.php',
        data: form_data,});

        var jsonData = await JSON.parse(result);
        $("#country").text("Country: " + jsonData.country);
        $("#city").text("City: " + jsonData.city);
        $("#addressLine").text("Address Line: " + jsonData.address_line);
    }catch(error){
        console.log(error);
    }
    }
    $("#search").click(Search);
    function Search(){
            keyword = $("#srch-term").val();
            data = {
                keyword: keyword,
            };
            console.log(data);
            postSearchData(data);
    }
    async function postSearchData(form_data){
    try{
        if (form_data.keyword != ""){
        result = await $.ajax({
        type: "POST",
        url: 'php/search_for_friends.php',
        data: form_data,});
        var data = await JSON.parse(result);
        if(data.length >0){
            markup = ""
            for(i=0; i<data.length; i++) {
                element = data[i];
                markup = markup + '<tr id="' + element.id + '">\
                        <th scope="col">' + element.first_name + ' ' + element.last_name + '</th>\
                        <td>Mark</td>\
                        <td><button type="button" class="btn btn-outline-success" onclick="add('+element.id+')">Add Friend</button></td>\
                        <td><button type="button" class="btn btn-outline-danger" onclick="block('+element.id+')">Block</button></td>\
                        </tr>';
            }
            $("#search_result").html(markup);
            $("#srch").show();
        }else{
            $("#search_result").html("No results found");
        }
    }else{
        $("#search_result").html("");
        $("#srch").hide();
    }
    }catch(error){
        console.log(error);
    }
    }

    $("#update_profile").click(editAddress);
    function editAddress(){
        data = {
            first_name: $("#new_fname").val(),
            last_name: $("#new_lname").val(),
            email: $("#email").val(),
            address_line: $("#birthday").val(),
        };
        postAddressData(data);
    }
    async function postAddressData(form_data){
    try{
        result = await $.ajax({
        type: "POST",
        url: 'php/profile_update.php',
        data: form_data,});

        var jsonData = await JSON.parse(result);
        $("#name").text(jsonData.first_name + " " + jsonData.last_name);
        $("#email").text("Email: " + jsonData.email);
        $("#birthday").text("Birthday: " + jsonData.birthday);
    }catch(error){
        console.log(error);
    }
    }
});

async function add(id){
    console.log("adding")
    try{
        result = await $.ajax({
        type: "GET",
        url: 'php/add_friend.php?q='+id,
    });
        var jsonData = await JSON.parse(result);
        console.log(jsonData);
        $('#'+jsonData.id).remove();
    }catch(error){
        console.log(error);
    }
}
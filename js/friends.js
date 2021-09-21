$(document).ready(function(){
    async function getFriendsList(){
        const response = await fetch('php/view_friends.php');
        if(!response.ok){
            const message = "An Error has occurred";
            throw new Error(message);
        }
        const results = await response.json();
        return results;
    }
    getFriendsList().then(data => {
        console.log(data);
        markup = ""
        for(i=0; i<data.length; i++) {
            element = data[i];
            markup = markup + '<tr id="' + element.id + '">\
                    <th scope="col">' + element.first_name + ' ' + element.last_name + '</th>\
                    <td>Mark</td>\
                    <td><button type="button" class="btn btn-outline-primary" onclick="unfriend('+element.id+')">Unfriend</button></td>\
                    <td><button type="button" class="btn btn-outline-danger" onclick="block('+element.id+')">Block</button></td>\
                    </tr>';
        }
        $("#friend_list").html(markup);
    }).catch(error => {
        console.log(error.message);
    });

    async function getFollowersList(){
        const response = await fetch('php/view_followers.php');
        if(!response.ok){
            const message = "An Error has occurred";
            throw new Error(message);
        }
        const results = await response.json();
        return results;
    }
    getFollowersList().then(data => {
        console.log(data);
        markup = ""
        for(i=0; i<data.length; i++) {
            element = data[i];
            markup = markup + '<tr id="' + element.id + '">\
                    <th scope="col">' + element.first_name + ' ' + element.last_name + '</th>\
                    <td>Mark</td>\
                    <td><button type="button" class="btn btn-outline-success" onclick="accept('+element.id+')">Accept</button></td>\
                    <td><button type="button" class="btn btn-outline-primary" onclick="reject('+element.id+')">Reject</button></td>\
                    <td><button type="button" class="btn btn-outline-danger" onclick="block('+element.id+')">Block</button></td>\
                    </tr>';
        }
        $("#followers_list").html(markup);
    }).catch(error => {
        console.log(error.message);
    });

    async function getFollowingList(){
        const response = await fetch('php/view_following_list.php');
        if(!response.ok){
            const message = "An Error has occurred";
            throw new Error(message);
        }
        const results = await response.json();
        return results;
    }
    getFollowingList().then(data => {
        console.log(data);
        markup = ""
        for(i=0; i<data.length; i++) {
            element = data[i];
            markup = markup + '<tr id="' + element.id + '">\
                    <th scope="col">' + element.first_name + ' ' + element.last_name + '</th>\
                    <td>Mark</td>\
                    <td><button type="button" class="btn btn-outline-primary" onclick="cancel('+element.id+')">Cancel</button></td>\
                    <td><button type="button" class="btn btn-outline-danger" onclick="block('+element.id+')">Block</button></td>\
                    </tr>';
        }
        $("#following_list").html(markup);
    }).catch(error => {
        console.log(error.message);
    });

    async function getNotificationsList(){
        const response = await fetch('php/get_notifications.php');
        if(!response.ok){
            const message = "An Error has occurred";
            throw new Error(message);
        }
        const results = await response.json();
        return results;
    }
    getNotificationsList().then(data => {
        markup = ""
        for(i=0; i<data.length; i++) {
            element = data[i];
            markup = markup + '<tr ">';
            if(element.is_read == 0 ){
                markup = markup + '<td id="' + element.id + '" style="font-weight: bold">' + element.text + '</td>';
                markup = markup + '<td><button type="button" class="btn btn-outline-primary" onclick="markRead('+element.id+')">Mark as read</button></td></tr>';
            }else{
                markup = markup + '<td id="' + element.id + '" style="font-weight: normal">' + element.text + '</td>';
            }
                }
        $("#notifications").html(markup);
    }).catch(error => {
        console.log(error.message);
    });
});
async function block(id){
    try{
        result = await $.ajax({
        type: "GET",
        url: 'php/block_user.php?q='+id,
    });
        var jsonData = await JSON.parse(result);
        $('#'+jsonData.id).remove();
    }catch(error){
        console.log(error);
    }
}

async function reject(id){
    try{
        result = await $.ajax({
        type: "GET",
        url: 'php/reject_friend_request.php?q='+id,
    });
        var jsonData = await JSON.parse(result);
        $('#'+jsonData.id).remove();
    }catch(error){
        console.log(error);
    }
}

async function accept(id){
    try{
        result = await $.ajax({
        type: "GET",
        url: 'php/accept_friend_request.php?q='+id,
    });
        var jsonData = await JSON.parse(result);
        $('#'+jsonData.id).remove();
    }catch(error){
        console.log(error);
    }
}
async function cancel(id){
    console.log('accept');
    try{
        result = await $.ajax({
        type: "GET",
        url: 'php/cancel_request.php?q='+id,
    });
        var jsonData = await JSON.parse(result);
        $('#'+jsonData.id).remove();
    }catch(error){
        console.log(error);
    }
}
async function unfriend(id){
    try{
        result = await $.ajax({
        type: "GET",
        url: 'php/unfriend.php?q='+id,
    });
        var jsonData = await JSON.parse(result);
        $('#'+jsonData.id).remove();
    }catch(error){
        console.log(error);
    }
}

async function markRead(id){
    try{
        result = await $.ajax({
        type: "GET",
        url: 'php/mark_read.php?q='+id,
    });
        var nb = $("#notifications_nb").val;
        nb = nb - 1;
        $("#notifications_nb").text(nb);
        $("#"+id).css("font-weight", "normal")
    }catch(error){
        console.log(error);
    }
}

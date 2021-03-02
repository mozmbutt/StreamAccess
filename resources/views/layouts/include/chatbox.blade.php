@section('chatboxstyle')
<style>
    .conv-list:hover{
        background-color: #e44d3a;
    }
</style>
@endsection
<div class="chatbox-list">
    <div class="chatbox">
        <div class="chat-mg">
            <a href="#" title=""><img src="images/resources/usr-img1.png" alt=""></a>
            <span>2</span>
        </div>
        <div class="conversation-box" id="main-chatbox">
            <div class="con-title mg-3">
                <div class="chat-user-info">
                    <img src="images/resources/us-img1.png" alt="">
                    <h3 id="user-name">John Doe <span class="status-info"></span></h3>
                </div>
                <div class="st-icons">
                    <a href="#" title=""><i class="la la-cog"></i></a>
                    <a href="#" title="" class="close-chat"><i class="la la-minus-square"></i></a>
                    <a href="#" title="" class="close-chat"><i class="la la-close"></i></a>
                </div>
            </div>
            <div class="chat-hist mCustomScrollbar" data-mcs-theme="dark">
                <div class="chat-msg st2">
                    <p>NO MSG</p>
                </div>
            </div>
            <!--chat-list end-->
            <div class="typing-msg">
                <form>
                    <textarea id="chatbox-message" placeholder="Type a message here"></textarea>
                    <button type="button" onclick="sendNewMessage()"><i class="fa fa-send"></i></button>
                </form>
                <ul class="ft-options">
                    <li><a href="#" title=""><i class="la la-smile-o"></i></a></li>
                    <li><a href="#" title=""><i class="la la-camera"></i></a></li>
                    <li><a href="#" title=""><i class="fa fa-paperclip"></i></a></li>
                </ul>
            </div>
            <!--typing-msg end-->
        </div>
        <!--chat-history end-->
    </div>
    <!-- <div class="chatbox">
        <div class="chat-mg">
            <a href="#" title=""><img src="images/resources/usr-img2.png" alt=""></a>
        </div>
        <div class="conversation-box"> -->
            <!-- <div class="con-title mg-3">
                <div class="chat-user-info">
                    <img src="images/resources/us-img1.png" alt="">
                    <h3>John Doe <span class="status-info"></span></h3>
                </div>
                <div class="st-icons">
                    <a href="#" title=""><i class="la la-cog"></i></a>
                    <a href="#" title="" class="close-chat"><i class="la la-minus-square"></i></a>
                    <a href="#" title="" class="close-chat"><i class="la la-close"></i></a>
                </div>
            </div>
            <div class="chat-hist mCustomScrollbar" data-mcs-theme="dark">
                <div class="chat-msg">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor.</p>
                    <span>Sat, Aug 23, 1:10 PM</span>
                </div>
                <div class="date-nd">
                    <span>Sunday, August 24</span>
                </div>
                <div class="chat-msg st2">
                    <p>Cras ultricies ligula.</p>
                    <span>5 minutes ago</span>
                </div>
                <div class="chat-msg">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor.</p>
                    <span>Sat, Aug 23, 1:10 PM</span>
                </div>
            </div> -->
            <!--chat-list end-->
            <!-- <div class="typing-msg">
                <form>
                    <textarea placeholder="Type a message here"></textarea>
                    <button type="submit"><i class="fa fa-send"></i></button>
                </form>
                <ul class="ft-options">
                    <li><a href="#" title=""><i class="la la-smile-o"></i></a></li>
                    <li><a href="#" title=""><i class="la la-camera"></i></a></li>
                    <li><a href="#" title=""><i class="fa fa-paperclip"></i></a></li>
                </ul>
            </div> -->
            <!--typing-msg end-->
        <!-- </div> -->
        <!--chat-history end-->
    <!-- </div> -->
    <div class="chatbox">
        <div class="chat-mg bx">
            <a href="#" title=""><img src="images/chat.png" alt=""></a>
            <span>2</span>
        </div>
        <div class="conversation-box" id="user-original-chatbox">
            <div class="con-title">
                <h3>Messages</h3>
                <a href="#" title="" class="close-chat"><i class="la la-minus-square"></i></a>
            </div>
            <div class="chat-list">
            </div>
            <!--chat-list end-->
        </div>
        <!--conversation-box end-->
    </div>
</div>
<!--chatbox-list end-->
@section('chatboxscript')
<script>
    let globalUser = null;
    let globalCurrentUser = null;
    

    function writeNewMessage(usersKey, author, message, timestamp) {
    
        // A message entry.
        var messageData = {
            author: author,
            message: message,
            timestamp: timestamp
        };

        // Get a key for a new message.
        var newMessageKey = database.ref('messages/' + usersKey).child(usersKey).push().key;

        // Write the new message                                                                                                     .
        var updates = {};
        updates[`${usersKey}/${newMessageKey}`] = messageData;

        $('#chatbox-message').val('');

        return database.ref('messages/').update(updates);
    }

    function userKeyAssembler(firstUsername, secondUsername) { return firstUsername.localeCompare(secondUsername) == -1 ?  `${firstUsername}-${secondUsername}` : `${secondUsername}-${firstUsername}`;}

    function sendNewMessage(){
        if(!globalUser || !globalCurrentUser)
            retun;
        let msg = $('#chatbox-message').val();
        writeNewMessage(userKeyAssembler(globalUser.username,globalCurrentUser.username), globalCurrentUser.username, msg, firebase.firestore.Timestamp.now());
    }

    function getUsersList(){
        axios.get('/api/get-all-users')
        .then(response => {
            let usersHTML = createUserListResponse(response.data);
            $('.chat-list').append(usersHTML);
        })
        .catch(error => {
            console.log(error)
        })
    }

    function changeChatPerson(){

        let user = JSON.parse($($(event.target).parent().parent().find('textarea').get(0)).val());
        let currentUser = JSON.parse($($(event.target).parent().parent().find('textarea').get(1)).val());

        //WRITE A API CALL FOR SELECTED USER IMAGE

        globalUser = user;
        globalCurrentUser = currentUser;

        $('#user-original-chatbox').removeClass('active');

        $('#user-name').text(user.name);

        $('#main-chatbox').addClass('active');

        fetchAllMessagesAndListen(user, currentUser);
    }

    function fetchAllMessagesAndListen(user, currentUser){
        let usersKey = userKeyAssembler(user.username,currentUser.username);

        firebase.database().ref('messages/' + usersKey).on('value', (snapshot) => {
            $('#mCSB_1_container').empty();
            snapshot.forEach(function(child){
                let message = child.val();
                let msg = `<div class="${message.author == currentUser.username ? 'chat-msg' : 'chat-msg st2'}">
                     <p>${message.message}</p>
                     <span>${new Date(message.timestamp.seconds*1000).toLocaleString()}</span>
                 </div>`;

                $('#mCSB_1_container').append(msg);
            });
        });
    }

    function createUserListResponse(data){
        return data.users.map(user => {
            return `<div class="conv-list" onclick=changeChatPerson(event)>
                <textarea type="hidden" style="display:none">${JSON.stringify(user)}</textarea>
                <textarea type="hidden" style="display:none">${JSON.stringify(data.currentUser)}</textarea>
                <div class="usrr-pic">
                    <img src="images/resources/usy1.png" alt="NO IMAGE">
                    <span class="active-status activee"></span>
                </div>
                <div class="usy-info">
                    <h3>${user.name}</h3>
                    <!-- <span>Lorem ipsum dolor <img src="images/smley.png" alt=""></span> -->
                </div>
                <!-- <div class="ct-time">
                    <span>1:55 PM</span>
                </div> -->
                <!-- <span class="msg-numbers">2</span> -->
                </div>`;
            });
    }

    $(document).ready(function(){
        getUsersList();
    })

</script>
@endsection
<script>
    //following function is written just to remove the navbar-transparent class from the navbar.
    //So that it could be stay visible on other pages
    function remove_class_from_menu(){
        var element = document.getElementById("main_menu");
        element.className = element.className.replace(/\bnavbar-transparent\b/g, "");
        //console.log("called");
    }
    remove_class_from_menu();
</script>
   <script type="text/javascript">
    // Setup an event listener to make an API call once auth is complete
    function onLinkedInLoad() {
        IN.Event.on(IN, "auth", getProfileData);
    }
    
    // Use the API call wrapper to request the member's profile data
    function getProfileData() {
        IN.API.Profile("me").fields("id", "first-name", "last-name", "headline", "location", "picture-url", "public-profile-url", "email-address").result(displayProfileData).error(onError);
    }

    // Handle the successful return from the API call
    function displayProfileData(data){
        var user = data.values[0];
        document.getElementById("picture").innerHTML = '<img src="'+user.pictureUrl+'" />';
        document.getElementById("name").innerHTML = user.firstName+' '+user.lastName;
        document.getElementById("intro").innerHTML = user.headline;
        document.getElementById("email").innerHTML = user.emailAddress;
        document.getElementById("location").innerHTML = user.location.name;
        document.getElementById("link").innerHTML = '<a href="'+user.publicProfileUrl+'" target="_blank">Visit profile</a>';
        document.getElementById('profileData').style.display = 'block';
    }

    // Handle an error response from the API call
    function onError(error) {
        console.log(error);
    }
    
    // Destroy the session of linkedin
    function logout(){
        IN.User.logout(removeProfileData);
    }
    
    // Remove profile data from page
    function removeProfileData(){
        document.getElementById('profileData').remove();
    }
</script>
<!-- sign in with linkedin button -->
<br/>
<br/>
<section class="module">
    <script type="in/Login"></script>
    <div id="profileData" style="display: none;">
    <p><a href="javascript:void(0);" onclick="logout()">Logout</a></p>
    <div id="picture"></div>
    <div class="info">
        <p id="name"></p>
        <p id="intro"></p>
        <p id="email"></p>
        <p id="location"></p>
        <p id="link"></p>
    </div>
    </div>
</section>

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
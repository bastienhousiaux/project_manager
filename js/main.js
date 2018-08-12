// $(init);

// function init(){
//     showTasks();
//     $("#task_edit_submit").on("click",addTask);
//     $("body").load("test.html");
// }

// function showTasks(){
//     $.get("php/controllers/TasksController",
//     {
//         request_type:"getTasks"
//     },
//     function(data){
//         var data=JSON.parse(data);
//         for(var i=0;i<data.length;i++)
//         $(".tasks_container").append('<div class="task_template"><h2 class="task_name">'
//         +data[i].task_name+
//         '</h2><p class="task_description">'
//         +data[i].task_description+
//         '</p></div>');
//     });
// }

// function addTask(){
//     var name=$("#task_edit #task_name").val();
//     var description=$("#task_edit #task_description").val();
//     console.log(name);
//     console.log(description);
//     $.post("php/controllers/TasksController",
//     {
//         request_type:"createTask",
//         name:name,
//         description:description
//     },
//     function(){
//         console.log("ok");
//         $(".tasks_container").html("");
//         showTasks();
//     }
//     );
// }
var vue;
window.onload=function(){
    vue=new Vue({
        el:"#main-container",
        data:{
            message:"hello world",
            tasks:[]
        }
    })

    utils.get("php/controllers/TasksController.php?request_type=getTasks",
    function(data){
        vue.data.tasks=data;
    },
    function(data){
        console.log(data);
    })
}

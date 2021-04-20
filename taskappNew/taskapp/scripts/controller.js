$(document).ready(function()
{
    /**
     * HANDLE FORM VALIDATION
     */
    $("#taskForm").validate({
        rules:
        {
            taskname: {
                required: true
            },
            startdate: {
                required: true
            },
            deadline: {
                required: true
            }
        },

        messages:
        {
            taskname: {
                required: '<div class="clRed"> <span class="fa fa-warning"></span> Task name is required</div>'
            },
            startdate: {
                required: '<div class="clRed"> <span class="fa fa-warning"></span> Select a start date</div>'
            },
            deadline: {
                required: '<div class="clRed"> <span class="fa fa-warning"></span> Select an end date</div>'
            }
        },

        submitHandler: submitTask
    });

    /**
     * Handler for submitForm method/function
     */
    function submitTask()
    {
        var data= $("#taskForm").serialize();

        const submitting= '<span class="fa fa-spinner"></span> Submitting ...';
        const unprepared= '<div class="alert alert-danger"> <span class="fa fa-warning"></span> SQL statement not prepared</div>';
        const retry= '<span class="fa fa-sign-in"></span>   Retry...';
        const submitted= '<span class="fa fa-check"></span> Submitted ...';
        const taskAdded= '<div class="alert alert-success"> <span class="fa fa-warning"></span> New task added successfully! </div>';
        const notSubmitted= '<div class="alert alert-danger"><span class="fa fa-warning"></span>  Failed '+data+' !</div>';
        
        // use ajax to fetch and post data to the database
        $.ajax({
            type: 'POST',
            url: 'controller.php',
            data: data,
            beforeSend: function(){
                $("#error").fadeOut();
                $("#submitTask").html(submitting);
            },
            success: function(response){
                // alert(response)
                if(response=="registered"){
                    $("#submitTask").html(submitted);
                    $("#error").fadeIn(700, function(){
                        $("#error").html(taskAdded);
                    });
                    setTimeout('window.location.href= "homepage.php?Submission was successful"', 2500);
                }
                else if(response=="notPrepared"){
                    $("#error").fadeIn(700, function(){
                        $("#error").html(unprepared);
                        $("#submitTask").html(retry);
                    });
                }
                else{
                    $("#error").fadeIn(700, function(){
                        $("#error").html(notSubmitted);
                        $("#submitTask").html(retry);
                    });
                }
            }
        });
        return false;
    }
    /**
     * end of function add new task
     */
});
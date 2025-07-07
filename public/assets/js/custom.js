/**
 * Created by DOTO OSEBAGA on 11/9/2025.
 */
let admission_filter = localStorage.getItem('AdmissionFilter');
let add_grade_scheme = localStorage.getItem('GradeScheme');
let add_grades = localStorage.getItem('Grades');
let add_gpa_class = localStorage.getItem('GpaClass');
let add_mean_test = localStorage.getItem('MeanTest');
let add_position = localStorage.getItem('Positions');
let add_building = localStorage.getItem('Buildings');
let add_hostel = localStorage.getItem('Hostel');
let add_gpa = localStorage.getItem('gpa');

$(document).ready(function () {
    if (admission_filter) {
        $('#admission-filter').prop('checked', true);
        $('#admission-filter-option').slideDown();
    }
    if (add_grade_scheme) {
        $('#grade-scheme').prop('checked', true);
        $('#grade-scheme-option').slideDown();
    }
    if (add_grades) {
        $('#grades').prop('checked', true);
        $('#grades-option').slideDown();
    }
    if (add_gpa_class) {
        $('#gpa-class').prop('checked', true);
        $('#gpa-class-option').slideDown();
    }
    if (add_gpa) {
        $('#gpa').prop('checked', true);
        $('#gpa-option').slideDown();
    }
    if (add_mean_test) {
        $('#mean-test').prop('checked', true);
        $('#mean-test-option').slideDown();
    }
    if (add_position) {
        $('#position').prop('checked', true);
        $('#positions-option').slideDown();
    }
    if(add_hostel){
        $('#hostel').pop('checked',true);
        $('#hostel-option').slideDown();
    }
    if (add_building) {
        $('#building').prop('checked', true);
        $('#building-option').slideDown();
    }

    $(document).on('change', '#admission-filter', function () {
        if ($(this).prop('checked')) {
            localStorage.setItem('AdmissionFilter', 1);
            $('#admission-filter-option').slideDown();
        } else {
            localStorage.removeItem('AdmissionFilter');
            $('#admission-filter-option').slideUp();
        }
    });
    $(document).on('change', '#grade-scheme', function () {
        if ($(this).prop('checked')) {
            localStorage.setItem('GradeScheme', 1);
            $('#grade-scheme-option').slideDown();
        } else {
            localStorage.removeItem('GradeScheme');
            $('#grade-scheme-option').slideUp();
        }
    });
    $(document).on('change', '#grades', function () {
        if ($(this).prop('checked')) {
            localStorage.setItem('Grades', 1);
            $('#grades-option').slideDown();
        } else {
            localStorage.removeItem('Grades');
            $('#grades-option').slideUp();
        }
    });
    $(document).on('change', '#gpa-class', function () {
        if ($(this).prop('checked')) {
            localStorage.setItem('GpaClass', 1);
            $('#gpa-class-option').slideDown();
        } else {
            localStorage.removeItem('GpaClass');
            $('#gpa-class-option').slideUp();
        }
    });
    $(document).on('change', '#gpa', function () {
        if ($(this).prop('checked')) {
            localStorage.setItem('gpa', 1);
            $('#gpa-option').slideDown();
        } else {
            localStorage.removeItem('gpa');
            $('#gpa-option').slideUp();
        }
    });
    $(document).on('change', '#position', function () {
        if ($(this).prop('checked')) {
            localStorage.setItem('Positions', 1);
            $('#positions-option').slideDown();
        } else {
            localStorage.removeItem('Positions');
            $('#positions-option').slideUp();
        }
    });
    $(document).on('change', '#hostel', function(){
        if($(this).prop('checked')){
            localStorage.setItem('hostel', 1);
            $('#hostel-option').slideDown();
        } else{
            localStorage.removeItem('hostel');
            $('#hostel-option').slideUp();
        }
    });
    $(document).on('change', '#building', function () {
        if ($(this).prop('checked')) {
            localStorage.setItem('Buildings', 1);
            $('#building-option').slideDown();
        } else {
            localStorage.removeItem('Buildings');
            $('#building-option').slideUp();
        }
    });
    $(document).on('click', '#scheme-edit', function (e) {
        e.preventDefault();
        let id = $(this).attr('data-id');

        let url = '/dashboard/schemes/grade-schemes/' + id + '/edit';
        let title = "Edit Grade Scheme"
        $.ajax({
            url: base_url + url,
            cache: false,
            success: function (res) {
                //console.log(res)
                $('.custom-modal-title').html(title);
                $('.modal-body').html(res);


                var box = new Custombox.modal({

                    content: {
                        target: '#edit_scheme_modal',
                        effect: 'door',
                        fullscreen: false,

                    },
                    loader: {

                        active: true,
                        color: '#000',
                        speed: 200000,
                    },


                }).open();


            },
            complete: function () {
                // var table = $('#gradeTable').DataTable();
                //table.ajax.reload();

            },
            error: function (request, status, error) {
                console.log("ajax call went wrong:" + request.responseText);
            }
        });

    });

    resource_create('resource-institution-add-button','ADD INSTITUTION','inst_modal',false);
    resource_edit('resource-institution-edit-button','EDIT INSTITUTION','inst_modal',false);

    resource_create('resource-combination-add-button','ADD COMBINATION','comb_modal',false);
    resource_edit('resource-combination-edit-button','EDIT COMBINATION','comb_modal',false);

    resource_create('resource-fee-add-button','ADD FEE STRUCTURE','fee_modal',false);
    resource_edit('resource-fee-edit-button','EDIT FEE STRUCTURE','fee_modal',false);

    resource_create('resource-combinationCourse-add-button','ADD COMBINATION COURSE','courseCombModal',false);
    resource_edit('resource-combinationCourse-edit-button','EDIT COMBINATION COURSE','courseCombModal',false);

    resource_create('resource-campus-add-button','ADD SCHOOL','campus_modal',false,true,'institution_id','Select Campus');
    resource_edit('resource-campus-edit-button','EDIT SCHOOL','campus_modal',false,true,'institution_id','Select Campus');

    resource_create('resource-center-add-button','ADD CENTER','center_modal',false,true,'campus_id','Select Center');
    resource_edit('resource-center-edit-button','EDIT CENTER','center_modal',false,true,'campus_id','Select Center');

    resource_create('resource-faculty-add-button','ADD FACULTY','faculty_modal',false,true,'campus_id','Select Campus');
    resource_edit('resource-faculty-edit-button','EDIT FACULTY','faculty_modal',false,true,'campus_id','Select Campus');

    resource_create('resource-dept-add-button','ADD DEPARTMENT','dept_modal',false,true,'faculty_id','Select Faculty');
    resource_edit('resource-dept-edit-button','EDIT DEPARTMENT','dept_modal',false,true,'faculty_id','Select Faculty');

    resource_create('resource-sponsor-add-button','ADD SPONSOR','sponsor_modal',false);
    resource_edit('resource-sponsor-edit-button','EDIT SPONSOR','sponsor_modal',false);

    resource_create('resource-level-add-button','ADD STUDY LEVEL','level_modal',false);
    resource_edit('resource-level-edit-button','EDIT STUDY LEVEL','level_modal',false);

    resource_create('resource-attachment-add-button','ADD ATTACHMENTS','attachment_modal',false);
   resource_edit('resource-attachment-edit-button','EDIT ATTACHMENTS LEVEL','attachment_modal',false);

    resource_create('resource-academic-year-add-button','ADD ACADEMIC YEAR','year_modal',false,true,'parent_id');
    resource_edit('resource-academic-year-edit-button','EDIT ACADEMIC YEAR','year_modal',false);
//semestal modal
resource_create('resource-semester-add-button','ADD NEW TERM','semester_modal',false);
resource_edit('resource-semester-edit-button','EDIT TERM','semester_modal',false);

    resource_create('resource-exam-cat-add-button','ADD EXAM CATEGORY','exam_modal',false);
    resource_edit('resource-exam-cat-edit-button','EDIT EXAM CATEGORY','exam_modal',false);



   // resource_create('resource-exam-cat-add-button','ADD EXAM CATEGORY','exam_modal',false);
    resource_edit('resource-student-photo-edit-button','UPDATE PHOTO','general_modal',false,false);
    resource_edit('resource-student-program-info-edit-button','UPDATE STUDY PROGRAM INFORMATION','general_modal',false,true,'manner_of_entry_id','Select manner of entry','academic_year_id','Select admission year','program_id','Select Program registered');
    resource_edit('resource-student-edu-history-edit-button','ADD EDUCTION HISTORY','general_modal',false,true,'level','Select Level','grade','Select Grade');
    resource_edit('resource-student-bank-info-edit-button','ADD BANK INFORMATION','general_modal',false,true,'manner_of_entry_id','Select manner of entry','academic_year_id','Select admission year','program_id','Select Program registered');
    resource_edit('resource-student-dependant-edit-button','ADD DEPENDANT INFORMATION','general_modal',false,true,'gender','Select Gender','relationship','Select relationship');
    resource_edit('resource-student-next-of-kin-edit-button','ADD NEXT-OF-KIN INFORMATION','general_modal',false,true,'gender','Select Gender','relationship','Select relationship');
    resource_edit('resource-student-contact-info-edit-button','UPDATE STUDENT CONTACT INFORMATION','general_modal',false);
    resource_edit('resource-student-change-password-update-button','CHANGE PASSWORD','general_modal',false);

    resource_edit('resource-studentinfo-button','UPDATE STUDENT GENERAL INFORMATION','general_modal',false);
    resource_edit('resource-studentsponsor-button','ADD STUDENT SPONSOR INFORMATION','general_modal',false);

    resource_edit('resource-electionpost-button','ADD ELECTION POST','general_modal',false);

    resource_edit('resource-electioncandidate-button','ADD ELECTION CANDIDATE','general_modal',false);

    resource_edit('resource-studenteditedu-history-button','UPDATE EDUCATION HISTORY','general_modal',false);
    resource_edit('resource-studenteditbank-button','UPDATE BANK INFORMATION','general_modal',false);
    resource_edit('resource-studenteditsponsor-button','UPDATE SPONSOR INFORMATION','general_modal',false);
    resource_edit('resource-studenteditnext-of-kin-button','UPDATE NEXT OF KIN INFORMATION','general_modal',false);
    resource_edit('resource-studenteditdependant-button','UPDATE DEPENDANT','general_modal',false);
   
    // resource_create('resource-exam-cat-add-button','ADD EXAM CATEGORY','general_modal',false);
    // resource_edit('resource-exam-cat-edit-button','EDIT EXAM CATEGORY','general_modal',false);

   
   
    // resource_create('resource-academic-year-add-button','ADD ACADEMIC YEAR','year_modal',false);
    // resource_edit('resource-level-academic-year-button','EDIT ACADEMIC YEAR','year_modal',false);



    $(document).on('click', '#gpa-class-edit', function (e) {
        e.preventDefault();
        let id = $(this).attr('data-id');


        let url = '/dashboard/gpa-classifications/' + id + '/edit';
        let title = "Edit Class Award";
        //alert('dd'+url);
        // $('#grades-edit-option').slideToggle();
        $.ajax({
            url: base_url + url,
            cache: false,
            success: function (res) {
                //console.log(res)
                $('.custom-modal-title').html(title);
                $('.modal-body').html(res);


                var box = new Custombox.open({

                        target: '#edit_gpa_class_modal',
                        effect: 'door',
                        fullscreen: false,



                });


            },
            complete: function () {
                // var table = $('#gradeTable').DataTable();
                //table.ajax.reload();

            },
            error: function (request, status, error) {
                console.log("ajax call went wrong:" + request.responseText);
            }
        });

    });
    $(document).on('click', '#grade-edit', function (e) {
        e.preventDefault();
        let id = $(this).attr('data-id');


        let url = '/dashboard/grades/' + id + '/edit';
        let title = "Edit Grade"
        //alert('dd'+url);
        // $('#grades-edit-option').slideToggle();
        $.ajax({
            url: base_url + url,
            cache: false,
            success: function (res) {
                //console.log(res)
                $('.custom-modal-title').html(title);
                $('.modal-body').html(res);


                var box = new Custombox.open({

                        target: '#edit_grade_modal',
                        effect: 'door',
                        fullscreen: false,


                });


            },
            complete: function () {
                // var table = $('#gradeTable').DataTable();
                //table.ajax.reload();

            },
            error: function (request, status, error) {
                console.log("ajax call went wrong:" + request.responseText);
            }
        });

    });
    $(document).on('click', '#position-edit', function (e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        let url = $(this).attr('href');
        let title = "Edit Staff Position"
        $.ajax({
            url: url,
            cache: false,
            success: function (res) {
                //console.log(res)
                $('.custom-modal-title').html(title);
                $('.modal-body').html(res);
                var box = new Custombox.open({
                        target: '#edit_position_modal',
                        effect: 'door',
                        fullscreen: false,


                });


            },
            complete: function () {
                // var table = $('#gradeTable').DataTable();
                //table.ajax.reload();

            },
            error: function (request, status, error) {
                console.log("ajax call went wrong:" + request.responseText);
            }
        });

    });

    $(document).on('click', '#hostel-edit', function (e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        let url = $(this).attr('href');
        let title = "Edit Hostel"
        $.ajax({
            url: url,
            cache: false,
            success: function (res) {
                //console.log(res)
                $('.custom-modal-title').html(title);
                $('.modal-body').html(res);
                var box = new Custombox.open({
                        target: '#edit_hostel_modal',
                        effect: 'door',
                        fullscreen: false,


                });


            },
            complete: function () {
                // var table = $('#gradeTable').DataTable();
                //table.ajax.reload();

            },
            error: function (request, status, error) {
                console.log("ajax call went wrong:" + request.responseText);
            }
        });

    });
    $(document).on('click', '#building-edit', function (e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        let url = $(this).attr('href');
        let title = "Edit Building/Office"
        $.ajax({
            url: url,
            cache: false,
            success: function (res) {
                //console.log(res)
                $('.custom-modal-title').html(title);
                $('.modal-body').html(res);
                var box = new Custombox.open({
                        target: '#edit_building_modal',
                        effect: 'door',
                        fullscreen: false,

                });


            },
            complete: function () {
                // var table = $('#gradeTable').DataTable();
                //table.ajax.reload();

            },
            error: function (request, status, error) {
                console.log("ajax call went wrong:" + request.responseText);
            }
        });

    });
    $(document).on('click', '#resource-intake-add-button', function (e) {
        e.preventDefault();
       // let id = $(this).attr('data-id');
       // let url = $(this).attr('href');
        let url = $(this).attr('data-url');
        let title = "Add Class Group";
        $.ajax({
            url: url,
            cache: false,
            success: function (res) {
                //console.log(res)
                $('.custom-modal-title').html(title);
                $('.modal-body').html(res);
                var box = new Custombox.open({

                        target: '#intake_modal',
                        effect: 'door',
                        fullscreen: false,

                });


            },
            complete: function () {
                // var table = $('#gradeTable').DataTable();
                //table.ajax.reload();

            },
            error: function (request, status, error) {
                console.log("ajax call went wrong:" + request.responseText);
            }
        });

    });
    $(document).on('click', '#resource-intake-edit-button', function (e) {
        e.preventDefault();
       // let id = $(this).attr('data-id');
       // let url = $(this).attr('href');
        let url = $(this).attr('data-url');
        let title = "Edit Class Group";
        $.ajax({
            url: url,
            cache: false,
            success: function (res) {
                //console.log(res)
                $('.custom-modal-title').html(title);
                $('.modal-body').html(res);
                var box = new Custombox.open({
                        target: '#intake_modal',
                        effect: 'door',
                        fullscreen: false,


                })


            },
            complete: function () {
                // var table = $('#gradeTable').DataTable();
                //table.ajax.reload();

            },
            error: function (request, status, error) {
                console.log("ajax call went wrong:" + request.responseText);
            }
        });

    });

    function addAlert(message, type) {
        $('#alerts').empty().append(
            '<div class="alert alert-' + type + '">' +
            '<button type="button" class="close" data-dismiss="alert">' +
            '&times;</button>' + message + '</div>');
    }

    $(document).on('click', '.po', function (e) {
        e.preventDefault();
        $('.po').popover({html: true, placement: 'left', trigger: 'manual'}).popover('show').not(this).popover('hide');
        return false;
    });
    $(document).on('click', '.po-close', function () {
        $('.po').popover('hide');
        return false;
    });
    $(document).on('click', '.po-delete1', function (e) {
        var row = $(this).closest("tr").remove();

        e.preventDefault();
        $('.po').popover('hide');
        var link = $(this).attr('href');
        $.ajax({
            type: "delete", url: link,
            success: function (data) {
                row.remove();
                addAlert(data, 'success');
            },
            error: function (jqXHR, textStatus, errorThrown) {
                //console.log(textStatus)
                addAlert('Failed', 'danger');
            }
        });
        return false;
    });

    $(document).on('click', '.po-delete', function (e) {
        let row = $(this).closest('tr').remove();
        // let table=$(this).closest('table');
        // let id=table.attr('id');
        //alert('id=',id);

        // $(this).parent.parents("tr").remove();
        console.log(row)
        // $(this).parent().parent().remove();
        e.preventDefault();
        // console.log(row)

        $('.po').popover('hide');
        var link = $(this).attr('href');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "DELETE",
            url: link,
            success: function (data) {
                //row.remove();
                addAlert(data, 'success');
                $.notify({
                    // options
                    message: 'Deleted Successfully'
                },{
                    // settings
                    type: 'success',
                    placement: {
                        from: "bottom",
                        align: "right"
                    },
                    animate: {
                        enter: 'animated fadeInDown',
                        exit: 'animated fadeOutUp'
                    },
                });
                window.history.go();
             },
            error: function (data) {
                addAlert(data, 'danger');

            }
        });
        return false;
    });

    $(document).on('click', '.po-delete2', function (e) {
        e.preventDefault();
        $('.po').popover('hide');
        var link = $(this).attr('href');
        var s = $(this).attr('id');
        alert('id=' + s);
        var sp = s.split('__')
        $.ajax({
            type: "get", url: link,
            success: function (data) {
                addAlert(data, 'success');
                $('#' + sp[1]).remove();
            },
            error: function (data) {
                addAlert('Failed', 'danger');
            }
        });
        return false;
    });

});

function resource_create(resourceName,resourceTitle,resourceTarget,fullscreen=false,select2=false,select2_id='',select2_message='',select2_id2='',select2_message2='') {
    $(document).on('click', '#'+resourceName+'', function (e,) {
        e.preventDefault();
        let url = $(this).attr('data-url');
        let title = ''+resourceTitle+'';
        $.ajax({
            url: url,
            cache: false,
            success: function (res){
                //console.log(res)
                $('.custom-modal-title').html(title);
                $('.modal-body').html(res);
                if(select2){
                    var box = Custombox.open({
                        target: '#'+resourceTarget+'',
                        effect: 'door',
                        fullscreen: fullscreen,
                            // overlay : true,
                            // overlayColor: '#ffccae',
                            // overlayClose:false,
                            // overlayOpacity: .48,
                        onComplete: function () {
                            $('#'+select2_id+'').select2({
                                dropdownParent: $("#"+resourceTarget+'') ,
                                placeholder: ""+select2_message,
                            });
                            if(select2_id2 != '') {
                                $('#' + select2_id2 + '').select2({
                                    dropdownParent: $("#" + resourceTarget + ''),
                                    placeholder: "" + select2_message2,
                                });
                            }
                            //console.log('Complete');
                        },
                        close: function () {

                        },

                        loading: {
                           delay:200,
                            parent: ['sk-wandering-cubes'],
                            children: [
                                ['sk-cube','sk-cube1'],
                                ['sk-cube','sk-cube2'],
                            ],

                        },


                    })


                }else {
                    var box =  Custombox.open({
                        target: '#'+resourceTarget+'',
                        effect: 'door',
                        fullscreen: fullscreen,
                        // overlay : true,
                        // overlayColor: '#ffccae',
                        // overlayClose:false,
                        // overlayOpacity: .48,
                        close: function () {

                        },

                        loading: {
                            delay:200,
                            parent: ['sk-wandering-cubes'],
                            children: [
                                ['sk-cube','sk-cube1'],
                                ['sk-cube','sk-cube2'],
                            ],

                        },


                    })


                }

            },
            complete: function () {
                // var table = $('#gradeTable').DataTable();
                //table.ajax.reload();

            },
            error: function (request, status, error) {
                console.log("ajax call went wrong:" + request.responseText);
            }
        });

    });

}
function resource_edit(resourceName,resourceTitle,resourceTarget,fullscreen=false,select2=false,select2_id='',select2_message='',select2_id1='',select2_message1='',select2_id2='',select2_message2='',isFile=false,file_id='') {

    $(document).on('click', '#'+resourceName+'', function (e) {
        e.preventDefault();
        let name = $(this).attr('title');
        let url = $(this).attr('data-url');
        let title = ''+resourceTitle+'';
        $.ajax({
            url: url,
            cache: false,
            success: function (res) {
                //console.log(res)
                $('.custom-modal-title').html(title);
                $('.modal-body').html(res);
                if(select2){
                    var box = Custombox.open({
                        target: '#'+resourceTarget+'',
                        effect: 'door',
                        fullscreen: fullscreen,
                            // overlay : true,
                            // overlayColor: '#ffccae',
                            // overlayClose:false,
                            // overlayOpacity: .48,
                            onComplete: function () {
                                $('#'+select2_id+'').select2({
                                    dropdownParent: $("#"+resourceTarget+'') ,
                                    placeholder: ""+select2_message,
                                });
                                if(select2_id1 !== '') {
                                    $('#' + select2_id1 + '').select2({
                                        dropdownParent: $("#" + resourceTarget + ''),
                                        placeholder: "" + select2_message1,
                                    });
                                }

                                if(select2_id2 !== '') {
                                    $('#' + select2_id2 + '').select2({
                                        dropdownParent: $("#" + resourceTarget + ''),
                                        placeholder: "" + select2_message2,
                                    });
                                }
                                //console.log('Complete');
                            },
                        close: function () {

                        },

                        loading: {
                           delay:200,
                            parent: ['sk-wandering-cubes'],
                            children: [
                                ['sk-cube','sk-cube1'],
                                ['sk-cube','sk-cube2'],
                            ],

                        },


                    })
                }else {
                    var box =  Custombox.open({
                        target: '#'+resourceTarget+'',
                        effect: 'door',
                        fullscreen: fullscreen,
                        // overlay : true,
                        // overlayColor: '#ffccae',
                        // overlayClose:false,
                        overlayOpacity: .48,
                        close: function () {

                        },

                        loading: {
                            delay:200,
                            parent: ['sk-wandering-cubes'],
                            children: [
                                ['sk-cube','sk-cube1'],
                                ['sk-cube','sk-cube2'],
                            ],

                        },


                    })


                }

            },
            complete: function () {
                // var table = $('#gradeTable').DataTable();
                //table.ajax.reload();

            },
            error: function (request, status, error) {
                console.log("ajax call went wrong:" + request.responseText);
            }
        });

    });

}




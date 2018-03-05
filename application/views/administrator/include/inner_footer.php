 <!-- Warper Ends Here (working area) -->
        <footer class="container-fluid footer">
        	Copyright &copy; 2016 <?php /*?><a href="http://freakpixels.com/" target="_blank">FreakPixels</a><?php */?>
            <a href="#" class="pull-right scrollToTop"><i class="fa fa-chevron-up"></i></a>
        </footer>
    </section>
    <!-- Content Block Ends Here (right box)-->
   <!-- <script src="<?php echo base_url(); ?>assets_admin/js/jquery/jquery-1.9.1.min.js" type="text/javascript"></script>-->
	<script src="<?php echo base_url(); ?>assets_admin/js/jquery/jquery.validate.js" type="text/javascript"></script>
	
    <script src="<?php echo base_url(); ?>assets_admin/js/plugins/underscore/underscore-min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url(); ?>assets_admin/js/bootstrap/bootstrap.min.js"></script>
    
    <!-- Globalize -->
    <script src="<?php echo base_url(); ?>assets_admin/js/globalize/globalize.min.js"></script>
    
    <!-- NanoScroll -->
    <script src="<?php echo base_url(); ?>assets_admin/js/plugins/nicescroll/jquery.nicescroll.min.js"></script>
    
    <!-- Chart JS -->
    <script src="<?php echo base_url(); ?>assets_admin/js/plugins/DevExpressChartJS/dx.chartjs.js"></script>
    <script src="<?php echo base_url(); ?>assets_admin/js/plugins/DevExpressChartJS/world.js"></script>
   	<!-- For Demo Charts -->
    <script src="<?php echo base_url(); ?>assets_admin/js/plugins/DevExpressChartJS/demo-charts.js"></script>
    <script src="<?php echo base_url(); ?>assets_admin/js/plugins/DevExpressChartJS/demo-vectorMap.js"></script>
    
    <!-- Sparkline JS -->
    <script src="<?php echo base_url(); ?>assets_admin/js/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- For Demo Sparkline -->
    <script src="<?php echo base_url(); ?>assets_admin/js/plugins/sparkline/jquery.sparkline.demo.js"></script>
    
    <!-- Angular JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.0-beta.14/angular.min.js"></script>
    <!-- ToDo List Plugin -->
    <script src="<?php echo base_url(); ?>assets_admin/js/angular/todo.js"></script>
    
    <!-- Calendar JS -->
    <script src="<?php echo base_url(); ?>assets_admin/js/plugins/calendar/calendar.js"></script>
    <!-- Calendar Conf 
    <script src="<?php echo base_url(); ?>assets_admin/js/plugins/calendar/calendar-conf.js"></script>-->
	
    
	<!-- Data Table -->
    <script src="<?php echo base_url(); ?>assets_admin/js/plugins/datatables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>assets_admin/js/plugins/datatables/DT_bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets_admin/js/plugins/datatables/jquery.dataTables-conf.js"></script>
    <!-- Custom JQuery -->
	<script src="<?php echo base_url(); ?>assets_admin/js/moment/moment.js"></script>
	<!--<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>-->
	<script src="<?php echo base_url(); ?>assets_admin/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.js"></script>
	<script src="<?php echo base_url(); ?>assets_admin/js/app/custom.js" type="text/javascript"></script>
	
	<script src="<?php echo base_url(); ?>assets_admin/js/plugins/ckeditor/ckeditor.js"></script>
	<script src="<?php echo base_url(); ?>assets_admin//js/plugins/ckeditor/adapters/jquery.js"></script>

   
	
    
    <script>
  $('#schedule_data').validate({
    rules: {
	
	    schedule_name: {
            required: true
        },
        schedule_start_time: {
            required: true
        },
        schedule_end_time: {
            required: true
        },
		schedule_distroy_time: {
            required: true
        },
        company: {
            required: true
        },
		contact_person: {
            required: true
        },
		company_desc: {
            required: true
        },
		address: {
            required: true
        },
		phone_no: {
            required: true,
			number: true
        },
		website: {
            required: true,
			url: true
        },
		company_email: {
            required: true
        },
		company_logo: {
            required: true
        },
		mobile_no: {
            required: true,
			number: true
        },
		fax: {
            required: true,
			number: true
        },
		degree: {
            required: true
        },
		/*section*/
	 schedule: {
            required: true
        },
	 sectiontype: {
            required: true
        },	
		start_x_cordinate: {
            required: true
        },	
		start_y_cordinate: {
            required: true
        },	
		end_x_cordinate: {
            required: true
        },	
		end_y_cordinate: {
            required: true
        },
		/*video item*/
	   video_name: {
            required: true
        },
		video_url: {
            required: true
        },
		video_download_url: {
            required: true
        },
		file_start_time: {
            required: true
        },
		/*Text item validation */
		text_size: {
            required: true
        },	
		text_color: {
            required: true
        },
		 text_lang: {
            required: true
        },	
		text_scrollable: {
            required: true
        },	
		text_scroll_speed: {
            required: true
        },	
		text_scroll_direction: {
            required: true
        },
		text_type: {
            required: true
        },	
		text_file_name: {
            required: true
        },	
		text_file_download_url: {
            required: true
        },	
		text_value: {
            required: true
        },	
		image_url: {
            required: true
        }, /*cell validation */
		cell_bg_color: {
		required: true
		}, 	
		cell_type: {
		required: true
		}, 	
		cell_image_url: {
		required: true
		}, 	
		cell_blink_color: {
		required: true
		},	
		cell_start_x: {
		required: true
		}, 	
		cell_start_y: {
		required: true
		}, 	
		cell_end_x: {
		required: true
		}, 
		cell_end_y: {
		required: true
		}, 
    },
    highlight: function (element) {
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    },
    success: function (element) {
        $(element)
            .closest('.form-group').removeClass('has-error').addClass('has-success ');
    }
});
 $('#jobseekerform').validate({
    rules: {
	
	    username: {
            required: true
        },
        password: {
            minlength: 2,
            required: true
        },
        email: {
            required: true,
            email: true
        },
        first_name: {
            required: true
        },
		last_name: {
            required: true
        },
		address: {
            required: true
        },
		dob: {
            required: true
        },
		mobile_no: {
            required: true,
			number: true
        },
		phone_no: {
            required: true,
			number: true
        },
		career_obj: {
            required: true
        },
		cv: {
            required: true
        }
    },
    highlight: function (element) {
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    },
    success: function (element) {
        $(element).closest('.form-group').removeClass('has-error').addClass('has-success ');
    }
});
$('#jobcategoryform').validate({
    rules: {
        title: {
            required: true
        },
        description: {
            required: true,
        },
       
    },
    highlight: function (element) {
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    },
    success: function (element) {
        $(element).closest('.form-group').removeClass('has-error').addClass('has-success ');
    }
});


$('#jobtypeform').validate({
    rules: {
        job_type: {
            required: true
        },
    },
    highlight: function (element) {
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    },
    success: function (element) {
        $(element).closest('.form-group').removeClass('has-error').addClass('has-success ');
    }
});
$('#degreeform').validate({
    rules: {
        degree_title: {
            required: true
        },
    },
    highlight: function (element) {
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    },
    success: function (element) {
        $(element).closest('.form-group').removeClass('has-error').addClass('has-success ');
    }
});

$('#experienceform').validate({
    rules: {
        experience: {
            required: true
        },
    },
    highlight: function (element) {
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    },
    success: function (element) {
        $(element).closest('.form-group').removeClass('has-error').addClass('has-success ');
    }
});

$('#jobform').validate({
    rules: {
	    job_title: {
            required: true
        },
		job_category: {
            required: true
        },
		country: {
            required: true
        },
        vacancies: {
            required: true
        },
		experience: {
            required: true
        },
		job_min_sal: {
            required: true
        },
		job_max_sal: {
            required: true
        },
		job_max_sal: {
            required: true
        },
		salary_type: {
            required: true
        },
		job_type: {
            required: true
        },
		company: {
            required: true
        },
		expiry_from_date: {
            required: true
        },
		expiry_to_date: {
            required: true
        },
		job_desc: {
            required: true
        },
		
    },
    highlight: function (element) {
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    },
    success: function (element) {
        $(element).closest('.form-group').removeClass('has-error').addClass('has-success ');
    }
});
$('#pageform').validate({
    rules: {
        page_title: {
            required: true
        },
		 page_content: {
            required: true
        },
		 meta_desc: {
            required: true
        },
    },
    highlight: function (element) {
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    },
    success: function (element) {
        $(element).closest('.form-group').removeClass('has-error').addClass('has-success ');
    }
});
$('#postform').validate({
    rules: {
        post_title: {
            required: true
        },
		 ckeditor: {
            required: true
        },
		 meta_desc: {
            required: true
        },
		 post_tags: {
            required: true
        },
		 post_image: {
            required: true
        },
		
    },
    highlight: function (element) {
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    },
    success: function (element) {
        $(element).closest('.form-group').removeClass('has-error').addClass('has-success ');
    }
});


$('#industryform').validate({
    rules: {
        industry_name: {
            required: true
        },
    },
    highlight: function (element) {
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    },
    success: function (element) {
        $(element).closest('.form-group').removeClass('has-error').addClass('has-success ');
    }
});
$('#countryform').validate({
    rules: {
        country_name: {
            required: true
        },
		
    },
    highlight: function (element) {
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    },
    success: function (element) {
        $(element).closest('.form-group').removeClass('has-error').addClass('has-success ');
    }
});
$('#stateform').validate({
    rules: {
        state_name: {
            required: true
        },
		 country_id: {
            required: true
        },
		
    },
    highlight: function (element) {
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    },
    success: function (element) {
        $(element).closest('.form-group').removeClass('has-error').addClass('has-success ');
    }
});
$('#cityform').validate({
    rules: {
        city_name: {
            required: true
        },
		 state_id: {
            required: true
        },
    },
    highlight: function (element) {
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    },
    success: function (element) {
        $(element).closest('.form-group').removeClass('has-error').addClass('has-success ');
    }
});
$('#advertiseform').validate({
    rules: {
        advertising_title: {
            required: true
        },
		 sponser: {
            required: true
        },
		 country: {
            required: true
        },
		 content: {
            required: true
        },
    },
    highlight: function (element) {
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    },
    success: function (element) {
        $(element).closest('.form-group').removeClass('has-error').addClass('has-success ');
    }
});
$('#careerform').validate({
    rules: {
        career_title: {
            required: true
        },
    },
    highlight: function (element) {
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    },
    success: function (element) {
        $(element).closest('.form-group').removeClass('has-error').addClass('has-success ');
    }
});

$('#skillform').validate({
    rules: {
        skill_title: {
            required: true
        },
    },
    highlight: function (element) {
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    },
    success: function (element) {
        $(element).closest('.form-group').removeClass('has-error').addClass('has-success ');
    }
});
 $('#groupform').validate({
    rules: {
        group_name: {
            required: true
        },
	    admin_group: {
            required: true
        },
		sponser: {
            required: true
        },
		about_group: {
            required: true
        },
		group_image: {
            required: true
        },
    },
    highlight: function (element) {
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    },
    success: function (element) {
        $(element).closest('.form-group').removeClass('has-error').addClass('has-success ');
    }
});
$('#needHelpCategoryform').validate({
    rules: {
        category_name: {
            required: true
        },
		category_image: {
            required: true
        },
    },
    highlight: function (element) {
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    },
    success: function (element) {
        $(element).closest('.form-group').removeClass('has-error').addClass('has-success ');
    }
});
$('#needHelpArticalform').validate({
    rules: {
        artical_question: {
            required: true
        },
		artical_answer: {
            required: true
        },
		artical_category: {
            required: true
        },
		
    },
    highlight: function (element) {
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    },
    success: function (element) {
        $(element).closest('.form-group').removeClass('has-error').addClass('has-success ');
    }
});
$('#onlinetestform').validate({
    rules: {
        test_name: {
            required: true
        },
		 badges: {
            required: true
        },
		 category: {
            required: true
        },
		 hrs_timer: {
            required: true
        },
		 min_timer: {
            required: true
        },
		 sec_timer: {
            required: true
        },
		 req_min_marks: {
            required: true
        },
		req_max_marks: {
            required: true
        },
		level: {
            required: true
        },
		price: {
            required: true
        },
		author_name: {
            required: true
        },
		
    },
    highlight: function (element) {
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    },
    success: function (element) {
        $(element).closest('.form-group').removeClass('has-error').addClass('has-success ');
    }
});

$('#addQuestionform').validate({
    rules: {
        question_name: {
            required: true
        },
		 question_desc: {
            required: true
        },
		 ans1: {
            required: true
        },
		 ans2: {
            required: true
        },
		 ans3: {
            required: true
        },
		 ans4: {
            required: true
        },
		 true_ans: {
            required: true,
			number: true
        },
		
		
    },
    highlight: function (element) {
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    },
    success: function (element) {
        $(element).closest('.form-group').removeClass('has-error').addClass('has-success ');
    }
});


</script>
<script>
    $(document).ready(function() {
    
    var navListItems = $('ul.setup-panel li a'),
        allWells = $('.setup-content');

    allWells.hide();

    navListItems.click(function(e)
    {
	     
		  
	      
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this).closest('li');
        
        if (!$item.hasClass('disabled')) {
            navListItems.closest('li').removeClass('active');
            $item.addClass('active');
            allWells.hide();
            $target.show();
        }
    });
    
    $('ul.setup-panel li.active a').trigger('click');
    
    // DEMO ONLY //
    $('#activate-step-2').on('click', function(e) {
	
	  
        $('ul.setup-panel li:eq(1)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-2"]').trigger('click');
        $(this).remove();
    })    
});


    </script>
	<script>
	 $('#userformeeee').validate({
    rules: {
        firstname: {
            required: true
        },
		 lastname: {
            required: true
        },
		 username: {
            required: true
        },
		 email: {
            required: true
        },
		 password: {
            required: true
        },
		 mobile_no: {
            required: true,
			number: true
        },
		 address: {
            required: true,
			
        },
		 country: {
            required: true,			
        },
		 state: {
            required: true,			
        },
		city: {
            required: true,			
        },
		dob: {
            required: true,			
        },
    },
    highlight: function (element) {
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    },
    success: function (element) {
        $(element).closest('.form-group').removeClass('has-error').addClass('has-success ');
    }
}); $('#newsform').validate({    rules: {        news_title: {            required: true        },		 news_desc: {            required: true        },		 class: {            required: true        },		 status: {            required: true        },		     },    highlight: function (element) {        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');    },    success: function (element) {        $(element).closest('.form-group').removeClass('has-error').addClass('has-success ');    }});</script>
	<script>
  $(function() {
    $( "#dob" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  });
  </script>

<style>	     
label.error{
	color:#FF0000;
	font-weight:300;
}
.new_erroe_one{
	  color:#FF0000;
	}		
</style>
</body>
</html>
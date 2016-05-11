                
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="//code.jquery.com/ui/1.11.1/jquery-ui.min.js" type="text/javascript"></script>
        
        <!-- fullCalendar -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.7.0/moment.min.js" type="text/javascript"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.0.2/fullcalendar.min.js" type="text/javascript"></script>
        
        <!-- Morris.js charts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="js/plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        
        <!-- jvectormap -->
        <? if(isset($mapScript)): ?>
        <script src="js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <? endif; ?>
        
        <!-- jQuery Knob Chart -->
        <script src="js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- InputMask -->
        <script src="js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
        <script src="js/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
        <script src="js/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        <!-- bootstrap color picker -->
        <script src="js/plugins/colorpicker/bootstrap-colorpicker.min.js" type="text/javascript"></script>
        <!-- bootstrap time picker -->
        <script src="js/plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        
        <script src="js/jquery.popupWindow.js" type="text/javascript"></script>
        
        <script src="http://maps.googleapis.com/maps/api/js?libraries=places&sensor=false"></script>
		<script src="js/jquery.geocomplete.min.js"></script>
        
        <!-- SELECT -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0-rc.2/js/select2.min.js"></script>
        
        <?php /*?><script type="text/javascript">
			$(window).load(function(event){
				if ($(window).width() > 780) {
					$("a.sidebar-toggle").trigger("click");
				}
			});
		</script><?php */?>
        
        <!-- BootBox Custom Alert -->
        <script src="js/bootbox.min.js" type="text/javascript"></script>
        <script type="text/javascript">
			function showAlert(msg){
				bootbox.alert({
					title: "Alert", 
					message: msg
				});
			}
		</script>
        
        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js?v=3.3" type="text/javascript"></script>
        
        <script type="text/javascript">
            $(function() {
				$('.datePicker').datepicker({'autoclose':true});
                //Datemask dd/mm/yyyy
                $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
                //Datemask2 mm/dd/yyyy
                $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
                //Money Euro
                $("[data-mask]").inputmask();

                //Date range picker
                $('#reservation').daterangepicker();
                //Date range picker with time picker
                $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
                //Date range as a button
                $('#daterange-btn').daterangepicker(
                        {
                            ranges: {
                                'Today': [moment(), moment()],
                                'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                                'Last 7 Days': [moment().subtract('days', 6), moment()],
                                'Last 30 Days': [moment().subtract('days', 29), moment()],
                                'This Month': [moment().startOf('month'), moment().endOf('month')],
                                'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                            },
                            startDate: moment().subtract('days', 29),
                            endDate: moment()
                        },
                function(start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                }
                );

                /*//iCheck for checkbox and radio inputs
                $('input[type="checkbox"].minimal:not(.simple), input[type="radio"].minimal:not(.simple)').iCheck({
                    checkboxClass: 'icheckbox_minimal',
                    radioClass: 'iradio_minimal'
                });
                //Red color scheme for iCheck
                $('input[type="checkbox"].minimal-red:not(.simple), input[type="radio"].minimal-red:not(.simple)').iCheck({
                    checkboxClass: 'icheckbox_minimal-red',
                    radioClass: 'iradio_minimal-red'
                });
                //Flat red color scheme for iCheck
                $('input[type="checkbox"].flat-red:not(.simple), input[type="radio"].flat-red:not(.simple)').iCheck({
                    checkboxClass: 'icheckbox_flat-red',
                    radioClass: 'iradio_flat-red'
                });*/

                //Colorpicker
                $(".my-colorpicker1").colorpicker();
                //color picker with addon
                $(".my-colorpicker2").colorpicker();

                //Timepicker
                $(".timepicker").timepicker({
                    showInputs: false
                });
            });
        </script>
        
        <script type="text/javascript" src="tinymce/tinymce.min.js"></script>
        <script src="js/lightbox.min.js"></script>
        
		<script type="text/javascript">
            //language: "ar"
            tinymce.init({
                height : 250, 
                width: '99.9%', 
                selector: "textarea.htmlEditor", 
                theme: "modern",
                plugins: [
                     "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                     "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                     "save table contextmenu directionality emoticons template paste textcolor"
               ],
               toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | fontselect fontsizeselect | link image insertimage insertfile | print preview media fullpage | forecolor backcolor emoticons", 
               convert_urls:false, 
               relative_urls : false, 
               remove_script_host : false, 
               extended_valid_elements: "iframe[class|src|frameborder=0|alt|title|width|height|align|name],i[class|id|style],span[class|id|style]", 
               document_base_url : "/", 
               forced_root_block : "", 
               file_browser_callback : elFinderBrowser, 
               force_br_newlines : true,
               force_p_newlines : false,
               
               style_formats: [
                    {title: 'Bold text', inline: 'b'},
                    {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                    {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                    {title: 'Example 1', inline: 'span', classes: 'example1'},
                    {title: 'Example 2', inline: 'span', classes: 'example2'},
                    {title: 'Table styles'},
                    {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                ]
            });
            function elFinderBrowser(field_name, url, type, win){
               tinymce.activeEditor.windowManager.open({
                    file: 'file-manager/tinymce-file-manager.html', 
                    title: 'File Manager', 
                    width: 900, 
                    height: 450,
                    resizable: 'yes'
                    }, {
                        setUrl: function (url) {
                        win.document.getElementById(field_name).value = url;
                    }
                });
                return false;
            }
        </script>
        
        <script type="text/javascript">
			$(document).on('change', '.updateSelect', function(e){
				var thisE = $(this);
				var url = $(this).data('url');
				var wid = $(this).data('wid');
				var div = $(this).data('resultprefix');
				var val = $(this).val();
				var a	= $(this).data('a');
				//console.log('Value: '+val);
				$('#'+div+wid).html('<div class="progress progress-striped active"><div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"><span class="sr-only">Loading...</span></div></div>');
				
				if(url != '' && a != '' && wid != '' && val != ''){
					$.ajax({
						type: "POST",
						data: 'a='+a+'&val='+val+'&wid='+wid,
						url : url, 
						success: function(jSonData){
							console.log(jSonData);
							var data = jSonData;
							
							if(typeof data.status != 'undefined'){
								console.log(data.msg);
								if(data.status == 0){
									
								}
								//console.log(div+' | '+wid)
								$('#'+div+wid).html(data.msg);
							}
						}
					});
				}
			});
			
			$('.forceUrl').keydown(function(e) {
				var oldvalue=$(this).val();
				var field=this;
				setTimeout(function () {
					if(field.value.indexOf('http://') !== 0 && field.value.indexOf('https://') !== 0) {
						$(field).val(oldvalue);
					} 
				}, 1);
			});
			$(document).on('blur', '.onblurUpdate', function(event){
				event.preventDefault();
				
				var thisE	= $(this);
				var a		= $(this).data('a');
				var ids		= $(this).data('ids');
				var url		= $(this).data('url');
				var val		= $(this).val();
				
				if(a != '' && ids != '' && url != '' && val != ''){
					$.ajax({
						type: "POST", 
						data: 'a='+a+'&ids='+ids+'&val='+val, 
						url : url, 
						success: function(jSonData, textStatus, jqXHR){
							var data = jSonData;
							console.log(data);
							
							if(typeof data.msg != 'undefined'){
								showAlert(data.msg);
							}
							
							if(typeof data.html != 'undefined'){
								$.each(data.html, function(id, content){
									//console.log(id+': '+content);
									$('#'+id).html(content);
								});
							}
						}, 
						error: function(jqXHR, textStatus, errorThrown){
							showAlert('Error on Submitting Request.');
						}
					});
				}else {
					//showAlert('Required Data not Found, Please Contact Support.');
				}
			});
			
			$(document).on('click', '.nonFormPost', function(event){
				var field	= $(this).data('f');
				var val		= $('#'+field).val();
				var action	= $(this).data('a');
				var url		= $(this).data('u');
				var at		= $(this).data('at');
				var where	= $('#'+$(this).data('wf')).val();
				numbering	= $(this).data('numbering')
				column		= $(this).data('column')
				
				if(val == ''){
					showAlert(at);
					$('#'+field).focus();
				}else if(val != '' && action != '' && url != '' && where != ''){
					$.ajax({
						type: "POST",
						data: 'a='+action+'&val='+val+'&where='+where,
						url : url, 
						success: function(jSonData){
							var data = jSonData;
							console.log(data);
							
							if(typeof data.status != 'undefined'){
								if(typeof data.prependtr != 'undefined'){
									$.each(data.prependtr, function(tableID, tr){
										//console.log(tableID+' | '+tr);
										$("#"+tableID+" .errorRow").remove();
										$("#"+tableID+" tbody").prepend(tr);
									});
								}
								if(typeof data.appendtr != 'undefined'){
									$.each(data.appendtr, function(tableID, tr){
										//console.log(tableID+' | '+tr);
										$("#"+tableID+" .errorRow").remove();
										$("#"+tableID+" tbody").append(tr);
									});
								}
							}
							
							if(typeof data.html != 'undefined'){
								$.each(data.html, function(id, content){
									//console.log(id+': '+content);
									$('#'+id).html(content);
								});
							}
							
							if(typeof data.field != 'undefined'){
								$.each(data.field, function(id, val){
									//console.log(id+': '+content);
									$('#'+id).val(val);
								});
							}
							
							if(typeof data.icheck != 'undefined'){
								 $("input[type='checkbox']:not(.simple), input[type='radio']:not(.simple)").iCheck({
									checkboxClass: 'icheckbox_minimal',
									radioClass: 'iradio_minimal'
								});
							}
							
							if(typeof data.msg != 'undefined'){
								$('#sMsg').html(data.msg);
							}
							if(typeof data.std != 'undefined'){
								scrollToDiv(data.std);
							}
							
							if(typeof data.stid != 'undefined'){
								scrollInnerDivToTop(data.stid+' .inner');
							}
							
							if(numbering != ''){
								numberingRows(numbering, column);
							}
						}
					});
				}else {
					showAlert('Required Details are Empty');
				}
			});
			
			$(document).on('click', '.swapesoption', function(event){
				event.preventDefault();
				
				var targetID		= $('#'+$(this).data('swapid'));
				var ssort			= $(this).data('sort');
				var value			= $(this).val();
				var targetselect	= $(this).data('targetselect');
				var selectremaining	= $(this).data('selectremaining');
				var text			= $(this).find('option:selected').text();
				var osort			= $(this).find('option:selected').data('sort');
				
				//console.log(targetID+' | '+ssort+' | '+value+' | '+text+' | '+osort);
				//console.log(value.indexOf(','));
				
				if(value !== null && value !== 'null' && value != ''){
					value = value.toString();
					if(value.indexOf(',') <= -1){
						$(this).find('option:selected').remove();
						if(targetselect == 'Y'){
							var selected = ' selected="selected"';
						}else {
							var selected = '';
						}
						targetID.append('<option value="'+value+'" data-sort="'+osort+'"'+selected+'>'+text+'</option>');
					}
				}
				
				if(ssort == 'Y'){
					$(targetID).append($('option', targetID).get().sort(function(a, b){
						//console.log($(a).attr("data-sort")+' | '+$(b).attr("data-sort"));
						return parseInt($(a).attr("data-sort").match(/\d+/)) - parseInt($(b).attr("data-sort").match(/\d+/))
					}));
				}
				
				if(selectremaining == 'Y'){
					$('option', this).prop('selected', true);
					targetID.focus();
				}
			});
			
			$('form.multipleRowAction').submit(function(event){
				event.preventDefault();
				
				var thisF = $(this);
				var numbering = $(this).data('numbering');
				var column = $(this).data('column');
				var check = $(this).data('check');
				
				var w = $(this).closest('div.popupWrapper').attr('id');
				
				var submitBtn = thisF.find('button[type="submit"]:focus').attr("name");
				console.log(submitBtn);
				
				var checked = $('.'+check+':checked').length;
				
				//Action If Okay Button Pressed
				var postUrl	= $(this).attr('action');
				var formData = new FormData(this);
				
				console.log(postUrl);
				console.log(formData);
				
				if(submitBtn == 'deleteAll'){
					if(checked > 0){
						bootbox.confirm({
							title: "WARNING!",
							message: "Are you sure to Proceed this Action?",
							callback: function(result) {
								if(result){
									$.ajax({
										url: postUrl,
										type: 'POST',
										data: formData,
										processData: false,
										contentType: false, 
										success:function(data, textStatus, jqXHR){
											console.log(data);
											
											if(typeof data.status != 'undefined'){
												if(data.status == 0){
													
													if(numbering != ''){
														numberingRows(numbering, column);
													}
													
													if(w != '' && typeof w != "undefined"){
														console.log(w);
														scrollInnerDivToTop('#'+w+' .inner');
													}else {
														scrollToDiv('section.content');
													}
												}
											}
											
											if(typeof data.msg != 'undefined'){
												showAlert(data.msg);
											}
											
											if(typeof data.sMsg != 'undefined'){
												$('#sMsg').html(data.sMsg);
											}
											
											if(typeof data.html != 'undefined'){
												$.each(data.html, function(id, content){
													//console.log(id+': '+content);
													$('#'+id).html(content);
												});
											}
											
											if(typeof data.icheck != 'undefined'){
												 $("input[type='checkbox']:not(.simple), input[type='radio']:not(.simple)").iCheck({
													checkboxClass: 'icheckbox_minimal',
													radioClass: 'iradio_minimal'
												});
											}
											
											if(typeof data.anim != 'undefined'){
												$.each(data.anim, function(id, action){
													if(action == 'remove'){
														$('#'+id).remove();
													}else if(action == 'show'){
														$('#'+id).show();
													}else if(action == 'hide'){
														$('#'+id).hide();
													}else if(action == 'fadeIn'){
														$('#'+id).fadeIn('slow');
													}else if(action == 'fadeOut'){
														$('#'+id).fadeOut('fast');
													}
												});
											}
										},
										error: function(jqXHR, textStatus, errorThrown){
											showAlert('Error on Submitting Form.');
										}
										
									});
									//Action If Okay Button Pressed
								}
							}	
						});
					}else {
						showAlert('Please Select atleast 1 Record to do this Action.');
					}
				}else if(submitBtn == 'updateExpiry'){
					if($('#days').val() == ''){
						alert('Please Enter No of Days.');
						$('#days').focus();
					}else if(checked > 0){
						bootbox.confirm({
							title: "WARNING!",
							message: "Are you sure to Update Expiry Days for Selected Records?",
							callback: function(result) {
								if(result){
									$.ajax({
										url: postUrl,
										type: 'POST',
										data: formData,
										processData: false,
										contentType: false, 
										success:function(data, textStatus, jqXHR){
											console.log(data);
											
											if(typeof data.status != 'undefined'){
												if(data.status == 0){
													
													if(numbering != ''){
														numberingRows(numbering, column);
													}
													
													if(w != '' && typeof w != "undefined"){
														console.log(w);
														scrollInnerDivToTop('#'+w+' .inner');
													}else {
														scrollToDiv('section.content');
													}
												}
											}
											
											if(typeof data.msg != 'undefined'){
												showAlert(data.msg);
											}
											
											if(typeof data.sMsg != 'undefined'){
												$('#sMsg').html(data.sMsg);
											}
											
											if(typeof data.html != 'undefined'){
												$.each(data.html, function(id, content){
													//console.log(id+': '+content);
													$('#'+id).html(content);
												});
											}
											
											if(typeof data.icheck != 'undefined'){
												 $("input[type='checkbox']:not(.simple), input[type='radio']:not(.simple)").iCheck({
													checkboxClass: 'icheckbox_minimal',
													radioClass: 'iradio_minimal'
												});
											}
											
											if(typeof data.anim != 'undefined'){
												$.each(data.anim, function(id, action){
													if(action == 'remove'){
														$('#'+id).remove();
													}else if(action == 'show'){
														$('#'+id).show();
													}else if(action == 'hide'){
														$('#'+id).hide();
													}else if(action == 'fadeIn'){
														$('#'+id).fadeIn('slow');
													}else if(action == 'fadeOut'){
														$('#'+id).fadeOut('fast');
													}
												});
											}
										},
										error: function(jqXHR, textStatus, errorThrown){
											showAlert('Error on Submitting Form.');
										}
										
									});
									//Action If Okay Button Pressed
								}
							}	
						});
					}else {
						showAlert('Please Select atleast 1 Record to do this Action.');
					}
				}else {
					//Other Actions Start
					$.ajax({
						url: postUrl,
						type: 'POST',
						data: formData,
						processData: false,
						contentType: false, 
						success:function(data, textStatus, jqXHR){
							console.log(data);
							
							if(typeof data.status != 'undefined'){
								if(data.status == 0){
									
									if(numbering != ''){
										numberingRows(numbering, column);
									}
									
									if(w != '' && typeof w != "undefined"){
										console.log(w);
										scrollInnerDivToTop('#'+w+' .inner');
									}else {
										scrollToDiv('section.content');
									}
								}
							}
							
							if(typeof data.msg != 'undefined'){
								showAlert(data.msg);
							}
							
							if(typeof data.sMsg != 'undefined'){
								$('#sMsg').html(data.sMsg);
							}
							
							if(typeof data.html != 'undefined'){
								$.each(data.html, function(id, content){
									//console.log(id+': '+content);
									$('#'+id).html(content);
								});
							}
							
							if(typeof data.icheck != 'undefined'){
								 $("input[type='checkbox']:not(.simple), input[type='radio']:not(.simple)").iCheck({
									checkboxClass: 'icheckbox_minimal',
									radioClass: 'iradio_minimal'
								});
							}
							
							if(typeof data.anim != 'undefined'){
								$.each(data.anim, function(id, action){
									if(action == 'remove'){
										$('#'+id).remove();
									}else if(action == 'show'){
										$('#'+id).show();
									}else if(action == 'hide'){
										$('#'+id).hide();
									}else if(action == 'fadeIn'){
										$('#'+id).fadeIn('slow');
									}else if(action == 'fadeOut'){
										$('#'+id).fadeOut('fast');
									}
								});
							}
						},
						error: function(jqXHR, textStatus, errorThrown){
							showAlert('Error on Submitting Form.');
						}
						
					});
					//Other Actions End
				}
			});
			
			$('.addPopup').click(function(e){
				$('.popupWrapper').fadeOut('slow');
				var w = $(this).data('w');
				$('#'+w+' .sMsg').html('');
				$('#'+w+' form').trigger("reset");
				$('#'+w).fadeIn('slow');
				scrollToDiv('section.content');
				
				$('.emptyHtml').html('');
				
				if($('#'+w+' .mapCanvas').length > 0){
					$('#'+w+' .mapCanvas').each(function(index, element){
						var mapID = $(this).attr('id');
						var formID = $(this).data('form');
						var searchInputID = $(this).data('search');
						//showAlert(mapID+' | '+formID);
						
						$("#"+searchInputID).geocomplete({
							map: "#"+mapID, 
							
							details: "#"+formID,
							detailsAttribute: "data-geo", 
							
							types: ["geocode", "establishment"],
							markerOptions: {
								draggable: true
							}, 
							mapOptions: {
								zoom: 13
							}
						});
						$("#"+searchInputID).bind("geocode:dragged", function(event, latLng){
							$("#"+mapID+"_lat").val(latLng.lat());
							$("#"+mapID+"_lng").val(latLng.lng());
						});
					});
				}
			});
			
			$(document).on('click', '.closeButton', function(e){
				var div = $(this).closest('.popupWrapper');
				div.fadeOut('slow');
				$('form', div).trigger('reset');
				$('.sMsg', div).html('');
				
				$('.tip', div).remove();
				
				$('form', div).children('.form-control').each(function(index, element){
					$(this).removeClass('formFieldError');
					$(this).removeClass('formFieldSuccess');
				});
				
				if(typeof tinymce != 'undefined'){
					$('form', div).children('.htmlEditor').each(function(index, element){
						var fieldID = $(this).attr('id');
						tinymce.get(fieldID).setContent('');
					});
				}
			});
			
			$(document).on('click', '.editBtn', function(e){
				$('.popupWrapper').fadeOut('slow');
				$('.emptyHtml').html('');
				
				var thisE	= $(this);
				var url		= thisE.data('u');
				var id		= thisE.data('id');
				var a		= thisE.data('a');
				var w		= thisE.data('w');
				
				$('.hide', thisE).hide('fast');
				$('a.browseFile', thisE).removeAttr('style');
				$('a.browseFile img', thisE).attr('src', '');
				
				$('input[type=checkbox]', thisE).prop('checked',false);
				$('input[type=radio]', thisE).prop('checked',false);
				
				//console.log(url+'?a='+a+'&id='+id);
				
				if($('#'+w+' .mapCanvas').length > 0){
					$('#'+w+' .mapCanvas').each(function(index, element){
						var mapID = $(this).attr('id');
						var formID = $(this).data('form');
						var searchInputID = $(this).data('search');
						//showAlert(mapID+' | '+formID);
						
						$("#"+searchInputID).geocomplete({
							map: "#"+mapID, 
							
							details: "#"+formID,
							detailsAttribute: "data-geo", 
							
							types: ["geocode", "establishment"],
							markerOptions: {
								draggable: true
							}, 
							mapOptions: {
								zoom: 13
							}
						});
						$("#"+searchInputID).bind("geocode:dragged", function(event, latLng){
							$("#"+mapID+"_lat").val(latLng.lat());
							$("#"+mapID+"_lng").val(latLng.lng());
						});
					});
				}
				
				$.ajax({
					type: "POST", 
					data: 'a='+a+'&id='+id, 
					url : url, 
					success: function(jSonData, textStatus, jqXHR){
						var data = jSonData;
						console.log(data);
						
						if(data.status == 0){
							if(typeof data.table != 'undefined'){
								$.each(data.table, function(tableID, tbody){
									//console.log(tableID);
									$('#'+tableID+' tbody tr').remove();
									$('#'+tableID+' tbody').prepend(tbody);
								});
							}
							
							if(typeof data.soptions != 'undefined'){
								$.each(data.soptions, function(id, optionlist){
									$('#'+id).find('option').remove().end().append(optionlist);
								});
								
								if(typeof data.reloadSelect2 != 'undefined'){
									$('.select2').select2();
								}
							}
							
							if(typeof data.select2 != 'undefined'){
								$.each(data.select2, function(id, val){
									console.log(id+' | '+val);
									$("#"+id).select2("val", val);
								});
							}
							
							if(typeof data.html != 'undefined'){
								$.each(data.html, function(id, content){
									$('#'+id).html(content);
								});
							}
							
							if(typeof data.field != 'undefined'){
								$.each(data.field, function(field, value){
									$('#'+field).val(value);
								});
							}
							
							if(typeof data.tinymce != 'undefined'){
								$.each(data.tinymce, function(field, value){
									tinymce.get(field).setContent(value);
								});
							}
							
							if(typeof data.show != 'undefined'){
								$.each(data.show, function(id, stat){
									$('#'+id).show('fast');
								});
							}
							
							if(typeof data.img != 'undefined'){
								$.each(data.img, function(field, src){
									if(src != ''){
										console.log(field+' | '+src);
										$('#'+field).attr('src', src);
										$('a[data-p='+field+']').css('background-image', 'none');
									}
								});
							}
							
							if(typeof data.check != 'undefined'){
								$.each(data.check, function(field, value){
									$('#'+field).prop('checked',true);
								});
							}
							
							$('#'+w).fadeIn('slow');
							
							if(typeof data.anim != 'undefined'){
								$.each(data.anim, function(id, action){
									if(action == 'remove'){
										$('#'+id).remove();
									}else if(action == 'show'){
										$('#'+id).show();
									}else if(action == 'hide'){
										$('#'+id).hide();
									}else if(action == 'fadeIn'){
										$('#'+id).fadeIn('slow');
									}else if(action == 'fadeOut'){
										$('#'+id).fadeOut('fast');
									}
								});
							}
							
							if(typeof data.map != 'undefined'){
								eMap = $("#"+data.map).geocomplete('map');
								
								center = new google.maps.LatLng(parseFloat(data.lat), parseFloat(data.lng));
								$("#"+data.map).geocomplete('find', data.lat+','+data.lng);
								
								eMap.setCenter(center);
								
								google.maps.event.trigger(eMap,'resize')
							}
							
							if(typeof data.icheck != 'undefined'){
								 $("input[type='checkbox']:not(.simple), input[type='radio']:not(.simple)").iCheck({
									checkboxClass: 'icheckbox_minimal',
									radioClass: 'iradio_minimal'
								});
								
								$(document).on("ifChecked ifUnchecked", "input.iCheckAll", function(event) {
									var className = $(this).data('class');
									if(event.type == "ifChecked") {
										$("input."+className).iCheck("check");
									}else {
										$("input."+className).iCheck("uncheck");
									}
								});
							}
							
							//scrollInnerDivToTop('#'+w+' .inner');
							scrollToDiv('section.content');
							
							$('.datePicker').datepicker('update');
						}else {
							if(typeof data.msg != 'undefined'){
								showAlert(data.msg);
							}
						}
					}, 
					error: function(jqXHR, textStatus, errorThrown){
						showAlert('Error on Submitting Request.');
					}
				});
			});
			
			$(document).on('click', '.deleteIcon', function(e){
				var thisE		= $(this);
				var alertTxt	= $(this).data('at');
				var url			= thisE.data('u');
				var id			= thisE.data('id');
				var a			= thisE.data('a');
				var numbering	= thisE.data('numbering');
				var column		= thisE.data('column');
				
				
				bootbox.confirm({
					title: "WARNING!",
					message: "You are trying to Delete "+alertTxt+", Are you sure?",
					callback: function(result) {
						if(result){
							//Delete Start
							if(url != '' && id != '' && a != ''){
								$.ajax({
									type: "POST",
									data: 'a='+a+'&id='+id,
									url : url, 
									success: function(jSonData){
										var data = jSonData;
										console.log(data);
										
										if(typeof data.status != 'undefined'){
											if(data.status == 0){
												thisE.closest('tr').remove();
											}
										}
										
										if(typeof data.html != 'undefined'){
											$.each(data.html, function(id, content){
												//console.log(id+': '+content);
												$('#'+id).html(content);
											});
										}
										
										if(typeof data.icheck != 'undefined'){
											 $("input[type='checkbox']:not(.simple), input[type='radio']:not(.simple)").iCheck({
												checkboxClass: 'icheckbox_minimal',
												radioClass: 'iradio_minimal'
											});
										}
										
										$('#sMsg').html(data.msg);
										
										scrollToDiv('section.content');
										
										if(numbering != ''){
											numberingRows(numbering, column);
										}
									}
								});
							}
							//Delete End
						}
					}
				});
			});
			
			$('form.afs').submit(function(event){
				
				event.preventDefault();
				var thisF = $(this);
				$(this).children('.sMsg').html('');
				$(this).children('.inlinemsg').html('');
				var numbering = $(this).data('numbering');
				var column = $(this).data('column');
				
				$('.tip', this).remove();
				var fa = $(this).children('input[name="fa"]');
				var tableID = fa.data('tableid');
				
				var w = $(this).closest('div.popupWrapper').attr('id');
				
				thisF.children('.form-control').removeClass('formFieldError');
				thisF.children('.form-control').removeClass('formFieldSuccess');
				
				if(typeof tinymce != 'undefined'){
					tinymce.triggerSave();
				}
				
				var postUrl	= $(this).attr('action');
				var postData= $(this).serializeArray();
				var formData = new FormData(this);
				var sMsg	= $(this).children('.sMsg');
				console.log(postUrl);
				console.log(postData);
				
				$.ajax({
					url: postUrl,
					type: 'POST',
					data: formData,
					processData: false,
					contentType: false, 
					success:function(jSonData, textStatus, jqXHR){
						console.log(jSonData);
						var data = jSonData;
						
						if(data.status > 0 && typeof data.err != 'undefined'){
							var errors = data.err;
							$.each(errors, function(key, item) {
								var id = key.toString(), msg = item.toString();
								//console.log(id+' | '+msg);
								$("<span class='text-red inlinemsg'>"+msg+"</span>").insertBefore('#'+id);
								//$(msg).insertBefore('#'+id);
								$('#'+id).addClass('formFieldError');
							});
						}else if(data.status == 0){
							if(fa.val() == 'Add'){
								$('#'+tableID+' .errorRow').remove();
								
								if(typeof data.tbody != 'undefined'){
									console.log('tbody: '+data.tbody);
									$('#'+tableID+' tbody').prepend(data.tbody);
								}
								
								thisF.children('.formField').each(function(index, element){
									 $(this).removeClass('formFieldSuccess');
								});
								
								if(typeof data.html != 'undefined'){
									$.each(data.html, function(id, content){
										$('#'+id).html(content);
									});
								}
								
								thisF.trigger("reset");
								
								if(typeof data.emptySelect2 != 'undefined'){
									$('.select2', thisF).select2("val", '');
								}
								
								if(numbering != ''){
									numberingRows(numbering, column);
								}
								
								if(typeof data.prepend != 'undefined'){
									$.each(data.prepend, function(field, content){
										$('#'+field).prepend(content);
									});
								}
								
								$('.datePicker').datepicker('update');
							}else if(fa.val() == 'Edit'){
								if(typeof data.field != 'undefined'){
									console.log(data.field);
									$.each(data.field, function(field, value){
										$('#'+field).val(value);
									});
								}
								
								if(typeof data.html != 'undefined'){
									$.each(data.html, function(id, content){
										$('#'+id).html(content);
									});
								}
								
								if(typeof data.img != 'undefined'){
									$.each(data.img, function(field, src){
										if(src != ''){
											$('#'+field).attr('src', src);
											$('a[data-p='+field+']').css('background-image', 'none');
										}
									});
								}
							}
						}
						
						if(typeof data.soptions != 'undefined'){
							$.each(data.soptions, function(id, optionlist){
								$('#'+id).find('option').remove().end().append(optionlist);
							});
						}
						
						if(typeof data.msg != 'undefined'){
							sMsg.html(data.msg);
						}
						
						if(w != '' && typeof w != "undefined"){
							//console.log(w);
							//scrollInnerDivToTop('#'+w+' .inner');
							scrollToDiv('section.content');
						}else {
							scrollToDiv('section.content');
						}
						
						if(typeof data.anim != 'undefined'){
							$.each(data.anim, function(id, action){
								if(action == 'remove'){
									$('#'+id).remove();
								}else if(action == 'show'){
									$('#'+id).show();
								}else if(action == 'hide'){
									$('#'+id).hide();
								}else if(action == 'fadeIn'){
									$('#'+id).fadeIn('slow');
								}else if(action == 'fadeOut'){
									$('#'+id).fadeOut('fast');
								}
							});
						}
						
						if(typeof data.icheck != 'undefined'){
							 $("input[type='checkbox']:not(.simple), input[type='radio']:not(.simple)").iCheck({
								checkboxClass: 'icheckbox_minimal',
								radioClass: 'iradio_minimal'
							});
						}
						
						if(typeof data.redirect != 'undefined'){
							window.location.href = data.redirect;
						}
						
						if(typeof data.resetswapoption != 'undefined'){
							$.each(data.resetswapoption, function(sourceID, targetID){
								//console.log('sourceID: '+sourceID+' | targetID: '+targetID);
								var source = $('#'+sourceID);
								var target = $('#'+targetID);
								var ssort	 = source.data('sort');
								//console.log('ssort: '+ssort);
								
								$("#"+sourceID+" option").each(function(opt) {
									var value	= $(this).val();
									var text	= $(this).text();
									var osort	= $(this).data('sort');
									//console.log('value: '+value+' | text: '+text+' | osort: '+osort);
									target.append('<option value="'+value+'" data-sort="'+osort+'">'+text+'</option>');
								});
								
								if(ssort == 'Y'){
									$(target).append($('option', target).get().sort(function(a, b){
										//console.log($(a).attr("data-sort")+' | '+$(b).attr("data-sort"));
										return parseInt($(a).attr("data-sort").match(/\d+/)) - parseInt($(b).attr("data-sort").match(/\d+/))
									}));
								}
								
								//Remove the source Options
								source.find('option').remove();
								//End
							});
						}
					},
					error: function(jqXHR, textStatus, errorThrown){
						showAlert('Error on Submitting Form.');
					}
				});
			});
			
			$(document).on('keyup', '.sortThis', function(e){
				var thisE = $(this);
				var url = $(this).data('url');
				var wid = $(this).data('wid');
				var div = $(this).data('resultprefix');
				var val = $(this).val();
				var a	= $(this).data('a');
				
				$('#'+div+wid).html('<div class="progress progress-striped active"><div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"><span class="sr-only">Loading...</span></div></div>');
				
				if(url != '' && a != '' && wid != '' && val != ''){
					$.ajax({
						type: "POST",
						data: 'a='+a+'&val='+val+'&wid='+wid,
						url : url, 
						success: function(jSonData){
							console.log($.trim(jSonData));
							var data = jSonData;
							
							if(typeof data.status != 'undefined'){
								console.log(data.msg);
								if(data.status == 0){
									thisE.closest('tr').attr('data-sort', val);
								}
								
								$('#'+div+wid).html(data.msg);
							}
						}
					});
				}
			});
			
			$(document).on('change', '.loadSelectOptions', function(event){
				var thisE		= $(this);
				var action		= $(this).data('a');
				var url			= $(this).data('url');
				var wValue		= $(this).val();
				
				var wValues = [];
				$.each($("option:selected", thisE), function(){            
					wValues.push($(this).val());
				});
				wValues = wValues.join(",");
				
				var sBox = $('#'+$(this).data('targetid'));
				sBox.find('option').remove().end().append('<option value="">Loading...</option>');
				console.log('Action: '+action+' | query: '+wValue);
				if($.trim(wValue) != ''){
					$.ajax({
						url: url,
						type: 'POST',
						data: 'a='+action+'&wValue='+wValue, 
						success:function(jSonData, textStatus, jqXHR){
							console.log(jSonData);
							var data = jSonData;
							
							if(typeof data.optionlist != 'undefined'){
								console.log(data.optionlist);
								sBox.find('option').remove().end().append(data.optionlist);
							}
							
						},
						error: function(jqXHR, textStatus, errorThrown){
							showAlert('Error on Submitting Form.');
						}
					});
				}else if($.trim(wValue) == ''){
					sBox.find('option').remove().end().append('<option value="">Select '+emptytext+'</option>');
				}
			});
			
			function scrollToDiv(selector){
				$('html,body').animate({
					scrollTop: $(selector).offset().top
				}, 'slow');
			}
			
			function scrollInnerDivToTop(selector){
				$(selector).animate({
					scrollTop: 0
				}, 'fast');
			}
			
			$('.stopBgScroll').bind('mousewheel DOMMouseScroll', function(e) {
				var scrollTo = null;
			
				if (e.type == 'mousewheel') {
					scrollTo = (e.originalEvent.wheelDelta * -1);
				}
				else if (e.type == 'DOMMouseScroll') {
					scrollTo = 40 * e.originalEvent.detail;
				}
			
				if (scrollTo) {
					e.preventDefault();
					$(this).scrollTop(scrollTo + $(this).scrollTop());
				}
			});
			
			$(document).on('ifChecked', 'input.checkAll', function(e){
				var className = $(this).data('class');
				$("input."+className).iCheck('check');
			});
			
			$(document).on('ifUnchecked', 'input.unCheckAll', function(e){
				var className = $(this).data('class');
				$("input."+className).iCheck('uncheck');
			});
			
			$(document).on('ifChecked ifUnchecked', 'input.checkUncheck', function(event){
				var className = $(this).data('class');
				console.log('a checkUncheck Clicked and Class Name: '+className);
				if(event.type == "ifChecked") {
					$("input."+className).iCheck("check");
				}else {
					$("input."+className).iCheck("uncheck");
				}
			});
			
			function sortTable(tableID){
				$("#"+tableID+" tbody:first").append($("#"+tableID+" tr.sortRow").get().sort(function(a, b){
					return parseInt($(a).attr("data-sort").match(/\d+/)) - parseInt($(b).attr("data-sort").match(/\d+/))
				}));
			}
			
			function numberingRows(trClass, column){
				if(column == ''){
					column = 'first';
				}else {
					column = 'nth-child('+column+')';
				}
				sNo = 1;
				$('.'+trClass).each(function(){
					$('td:'+column, this).html(sNo);
					sNo++;
				});
			}
			
			function receiveFile(file, id, previewID){
				$('#'+id).val(file);
				if(previewID != ''){
					$('#'+previewID).attr('src', file);
				}
			}
			
			$(document).ready(function(){
				$('.browseFile').popupWindow({ 
					windowURL:'file-manager/select.php', 
					windowName:'File Manager',
					height:490, 
					width:950, 
					centerScreen:1
				});
			});
			
			$(document).on('click', '.logout', function(e){
				e.preventDefault();
				
				bootbox.confirm({
					title: "WARNING!",
					message: "You are trying to signout, Are you sure?",
					callback: function(result) {
						if(result){
							//Logout Start
							var postUrl	= 'login-post.php';
							var postData= 'a=logout';
							
							//console.log(postUrl);
							//console.log(postData);
							
							$.ajax({
								url: postUrl, 
								type: "POST",
								data : postData,
								success:function(jSonData, textStatus, jqXHR){
									console.log(jSonData);
									var data = jSonData;
									
									if(typeof data.msg != 'undefined'){
										showAlert(data.msg);
									}
									
									if(typeof data.redirect != 'undefined'){
										window.location.href = data.redirect;
									}
								}
							});
							//Logout End
						}
					}
				});
			});
			
			$(document).on('change', '.showHide', function(event){
				var val				= $(this).val(), 
					elementid		= $(this).data('elementid'), 
					elseelementid	= $(this).data('elseelementid'), 
					hidevalue		= $(this).data('hidevalue'),
					showvalue		= $(this).data('showvalue');
				console.log('Data: '+val+' | '+elementid+' | '+elseelementid+' | '+hidevalue+ ' | '+showvalue);
				
				if(typeof hidevalue != 'undefined' && hidevalue !== null && hidevalue !== ''){
					if(val == hidevalue){
						if(!elseelementid){
							$('#'+elementid).hide();
						}else {
							$('#'+elementid).hide();
							$('#'+elseelementid).show();
						}
					}else {
						if(!elseelementid){
							$('#'+elementid).show();
						}else {
							$('#'+elementid).show();
							$('#'+elseelementid).hide();
						}
					}
				}else if(typeof showvalue != 'undefined' && showvalue !== null && showvalue !== ''){
					if(val == showvalue){
						if(!elseelementid){
							$('#'+elementid).show();
						}else {
							$('#'+elementid).show();
							$('#'+elseelementid).hide();
						}
					}else {
						if(!elseelementid){
							$('#'+elementid).hide();
						}else {
							$('#'+elementid).hide();
							$('#'+elseelementid).show();
						}
					}
				}
			});
		</script>
        
        <?=$footerscript?>
        
        <? if($currentPage == 'index.php'): ?>
			<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"async defer></script>
        <? endif; ?>
    </body>
</html>
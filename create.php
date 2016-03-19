<html>
<head>
	<title>Create |UGE</title>
	<link rel="stylesheet" type="text/css" href="CSS/Reset.css"/>
	<link rel="stylesheet" type="text/css" href="CSS/create.css"/>
	<style type="text/css">

	#subjectInner,#bookInner,#chapterInner,#articleInner,#articleDescriptionInner,#articleVideoLinkInner
	{
			display: inline-block;
			color: red;
	}

	</style>
</head>
<body>
	<?php include_once "includes/header.php"; ?>
	<div class="form_title">
		<span class="title">CREATE YOUR OWN ARTICLE . . .</span>
	</div>

	<div class= "form_container">
	<form name="createForm" onsubmit="return validateForm()" class= "create_form" method="POST" action="create_action.php">
	<?php 
		//$count=0;
		include 'connect_db.php';
		
		$sql="SELECT * from subject";
 		$result = $conn->query($sql);
 		if(mysqli_num_rows($result)>0)
 		{
 			
 			echo"Choose Subject Name: ";
			echo "<select class= \"style_select\" name=\"subject\" id=\"subject\">";
			echo "<option value=0>".""."</option>";	    		
	    	foreach($result as $value)
			{
				echo "<option value=".$value['SubjectID'].">".$value['SubjectName']."</option>";	
				//$count++;    		
	    	}	    	
	    	echo "</select>";
	    	echo"<br><br>";		
	 	}

	 	?>
	
	 	<input type="button" name="createSubjectButton" class="style_button" value="Create Subject"id="createSubjectButton"><br/>
	 	<div id="newSubject">
	 		<br>Subject Name:
	 		<input type="text" name="newSubjectName" class="style_select" id="newSubjectName">
	 		<input type="button" class="style_Cancel_button" name="cancelSubjectButton" value=" x " id="cancelSubjectButton"><br/>
	 	</div>

	 	<div id="subjectInner"></div>


	<div id="bookOption">
		<br><hr><br>Choose Book Name: 
		<select name="book"id="book"class= "style_select">
			<option value='0'></option>

		</select><br><br>
	</div> 	
		

	<input type="button" name="createBookButton" class="style_button" value="Create Book"id="createBookButton"><br/><br>
 	<div id="newBook">
 		Book Name:
 		<input type="text" name="newBookName" id="newBookName" class="style_select">
 		<input type="button" name="cancelBookButton" class="style_cancel_button" value=" x " id="cancelBookButton"><br/>
 	</div><br><br>

 	<div id="bookInner"></div>

	<div id="chapterOption">
		<br><hr><br>Choose Chapter Name: 
		<select name="chapter" id="chapter" class ="style_select">
			<option value='0'></option>
			
		</select></br><br>
	</div> 	

	<input type="button" name="createChapterButton" value="Create Chapter" class="style_button" id="createChapterButton"><br/>
 	
 	<div id="newChapter">
 		<br>Chapter Name:
 		<input type="text" name="newChapterName" id="newChapterName" class="style_select">
 		<input type="button" name="cancelChapterButton" class="style_Cancel_button" value=" x " id="cancelChapterButton"><br/>
 	</div>

 	<div id="chapterInner"></div>

 	<div id="newArticle">
	 	<br><hr><br>Article Name:
	 	<input type="text" name="article" class= "style_select" id="article"><br><br/><div id="articleInner"></div><br/>
	 	<br>Article Description:
	 	<textarea name="articleDescription" id="articleDescription" style= "float: right; width: 400px; height: 50px; border-radius: 5px;"></textarea><br/><div id="articleDescriptionInner"></div><br/>
	 	<br><br>Youtube Link:
	 	<input type="text" name="articleVideoLink" class= "style_select" id="articleVideoLink"><br/><div id="articleVideoLinkInner"></div><br/>
	 	<input type="hidden" name="bookHidden" id="bookHidden" value="">
	 	<input type="hidden" name="chapterHidden" id="chapterHidden" value="">
	 	<br><br><br><input type="submit" value="Submit" id="submit" class="style_submit_button"/>
	</div>
	
	</form>
</div>

<?php
include_once "includes/footer.php";

?>



	 <script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript">
		function validateForm () {
			track=0;
			//alert($("#book").val())
			//alert($("#chapter").val())
			subjectReqiure=validate($("#subject").val(),$("#newSubjectName").val());
			if(subjectReqiure)
			{
				track=1;
				str = '* Subject Require';
				$("#subjectInner").html(str);
			}
			else
			{
				str = '';
				$("#subjectInner").html(str);
			}
			

			bookReqiure=validate($("#book").val(),$("#newBookName").val());
			if(bookReqiure)
			{
				track=1;
				str = '* Book Require';
				$("#bookInner").html(str);
			}
			else
			{
				str = '';
				$("#bookInner").html(str);
				if($("#newBookName").val()===""){

					temp=$("#book").val();
					//alert($("#chapter").val());
					$("#bookHidden").val(temp);
				}
					
				else{
					temp=$("#newBookName").val();
					//alert($("#newChapterName").val())
					$("#bookHidden").val(temp);
				}
			}

			chapterReqiure=validate($("#chapter").val(),$("#newChapterName").val());
			//alert("Chapter: "+$("#chapter").val())
			//alert("Book: "+$("#book").val())
			if(chapterReqiure)
			{
				track=1;
				str = '* Chapter Require';
				$("#chapterInner").html(str);
			}
			else
			{

				str = '';
				$("#chapterInner").html(str);
				if($("#newChapterName").val()===""){

					temp=$("#chapter").val();
					//alert($("#chapter").val());
					$("#chapterHidden").val(temp);
				}
					
				else{
					temp=$("#newChapterName").val();
					//alert($("#newChapterName").val())
					$("#chapterHidden").val(temp);
				}
			}
			article=$("#article").val();
			if(article==="")
			{
				track=1;
				str = '* Article Require';
				$("#articleInner").html(str);
			}
			else
			{
				str = '';
				$("#articleInner").html(str);
			}
			articleDescription=$("#articleDescription").val();
			if(articleDescription==="")
			{
				track=1;
				str = '* Article Description Require';
				$("#articleDescriptionInner").html(str);
			}
			else
			{
				str = '';
				$("#articleDescriptionInner").html(str);	
			}
			articleVideoLink=$("#articleVideoLink").val();
			if(articleVideoLink==="")
			{
				track=1;
				str = '* Article Youtube Link Require';
				$("#articleVideoLinkInner").html(str);
			}
			else
			{
				str = '';
				$("#articleVideoLinkInner").html(str);
			}
			if(track===1)
				return false;
			return true;
			// body...
		}

		function validate (selectOption,createValue) {
			// body...
			//alert(selectOption);
			//alert(createValue);
			if(selectOption==="0" && createValue==="")
				return true;
			return false;
		}




		$(document).ready(function(){
			$("#newSubject").hide();
			$("#newBook").hide();
			$("#newChapter").hide();

		});
		$("#createSubjectButton").click(function(){
			$("#newSubject").show();
			$('#subject').prop('selectedIndex',0);
			clearOption("#bookOption","book","Choose Book Name:");
			clearOption("#chapterOption","chapter","Choose Chapter Name:");

		});
		$("#cancelSubjectButton").click(function(){
			$("#newSubject").hide();
			$("#newSubjectName").val("");		
		});

		$("#createBookButton").click(function(){
			$("#newBook").show();
			$('#book').prop('selectedIndex',0);
			clearOption("#chapterOption","chapter","Choose Chapter Name:");

		});
		$("#cancelBookButton").click(function(){
			$("#newBook").hide();
			$("#newSubjectName").val("");		
		});

		$("#createChapterButton").click(function(){
			$("#newChapter").show();
			$('#chapter').prop('selectedIndex',0);
		});
		$("#cancelChapterButton").click(function(){
			$("#newChapter").hide();
			$("#newChapterName").val("");		

		});
		


		$('#subject').on('change',function() {
			$("#newSubject").hide();
			$("#newSubjectName").val("");
			

			sub_id = $(this).val();

			$.ajax({
				url:'choice_book.php',
				type:'POST',
				data:{'sub_id':sub_id},
				success:function(data)
				{
					data = JSON.parse(data);
					str="Choose Book Name:";
					str = str+" <select name='book' id='book' '>";//onchange='Book()
					option = "<option value=0></option>";

					for(i=0;i<data.length;i++)
					{
						option = option +"<option value='"+data[i]["BookID"]+"'>"+ data[i]['BookName']+"</option>";
					}
					str = str+ option + "</select>";
					//alert(str);
					$("#bookOption").html(str);
				}
			});
			clearOption("#chapterOption","chapter","Choose Chapter Name:");
					
		});
		
		/*function Book()
		{
			book_id = $("#book").val();
		

			$.ajax({
				url:'choice_chapter.php',
				type:'POST',
				data:{'book_id':book_id},
				success:function(data)
				{
					data = JSON.parse(data);
					str="Choose Chapter Name:";
					str = str+"<select id='chapter'>";
					option = "<option value=0></option>";

					for(i=0;i<data.length;i++)
					{
						option = option +"<option value='"+data[i]["ChapterID"]+"'>"+ data[i]['ChapterName']+"</option>";
					}
					str = str+ option + "</select>";

					$("#ChapterOption").html(str);
				}
			});
			
		}	*/
		function clearOption (divName,selectId,basicStr) 
		{

			str=basicStr;
			str = str+" <select name='"+selectId+"' id='"+selectId+"'>";
			option = " <option value='0'></option>";
			str = str+ option + "</select>";
			$(divName).html(str);
			//alert(str);
			
		}
		
		$(document).on('change', '#book', function() {
  			$("#newChapter").hide();
  			$("#newBook").hide();
			$("#newChapterName").val("");
  			book_id = $("#book").val();
  			//alert(book_id);
		

			$.ajax({
				url:'choice_chapter.php',
				type:'POST',
				data:{'book_id':book_id},
				success:function(data)
				{
					data = JSON.parse(data);
					str="Choose Chapter Name:";
					str = str+" <select name='chapter' id='chapter' >";
					option = "<option value='0'></option>";

					for(i=0;i<data.length;i++)
					{
						option = option +"<option value='"+data[i]["ChapterID"]+"'>"+ data[i]['ChapterName']+"</option>";
					}
					str = str+ option + "</select>";
					//alert(str);
					$("#chapterOption").html(str);
				}
			});
		});
		$(document).on('change', '#chapter', function() {
			$("#newChapter").hide();
			$("#newChapterName").val("");
		});
	</script>
</body>
</html>
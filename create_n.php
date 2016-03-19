<html>
<head>
	<title></title>
</head>
<body>

	<form name="createForm" method="POST" action="">
	<?php 
		//$count=0;
		include 'connect_db.php';
		$sql="SELECT * from subject";
 		$result = $conn->query($sql);
 		if(mysqli_num_rows($result)>0)
 		{
 			
 			echo"Choose Subject Name: ";
			echo "<select name=\"subject\" id=\"subject\">";
			echo "<option value=0>".""."</option>";	    		
	    	foreach($result as $value)
			{
				echo "<option value=".$value['SubjectID'].">".$value['SubjectName']."</option>";	
				//$count++;    		
	    	}	    	
	    	echo "</select>";
	    	echo"</br>";		
	 	}
	 	?>
	
	 	<input type="button" name="createSubjectButton" value="Create Subject"id="createSubjectButton"><br/>
	 	<div id="newSubject">
	 		Subject Name:
	 		<input type="text" name="newSubjectName" id="newSubjectName">
	 		<input type="button" name="cancelSubjectButton" value="Cancel" id="cancelSubjectButton"><br/>
	 	</div>


	<div id="bookOption">
		Choose Book Name: 
		<select>
			<option value=0></option>
		</select>
	</div> 	
		

	<input type="button" name="createBookButton" value="Create Book"id="createBookButton"><br/>
 	<div id="newBook">
 		Book Name:
 		<input type="text" name="newBookName" id="newBookName">
 		<input type="button" name="cancelBookButton" value="Cancel" id="cancelBookButton"><br/>
 	</div>


 	<?php 
	 	/*$sql="SELECT * from chapter";
 		$result = $conn->query($sql);
 		if(mysqli_num_rows($result)>0)
 		{
 			
 			echo"Choose Chapter Name: ";
			echo "<select name=\"chapter\" id\"chapter\">";
			echo "<option value=0>".""."</option>";
	    	foreach($result as $value)
			{	
				echo "<option value=".$value['ChapterID'].">".$value['ChapterName']."</option>";	    		
	    	}	    	
	    	echo "</select>";
	    	echo"</br>";		
	 	}
	 	*/
	?>
	<div id="chapterOption">
		Choose Chapter Name: 
		<select id="chapter">
			<option></option>
		</select>
	</div>

	<input type="button" name="createChapterButton" value="Create Chapter"id="createChapterButton"><br/>
 	
 	<div id="newChapter">
 		Chapter Name:
 		<input type="text" name="newChapterName" id="newChapterName">
 		<input type="button" name="cancelChapterButton" value="Cancel" id="cancelChapterButton"><br/>
 	</div>
 	<div id="newArticle">
	 	Article Name:
	 	<input type="text" name="article" id="article"><br/>
	 	<input type="submit" vlaue="Submit" id="submit">
	</div>
	</form>



	 <script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#newSubject").hide();
			$("#newBook").hide();
			$("#newChapter").hide();

		});
		$("#createSubjectButton").click(function(){
			$("#newSubject").show();
			$('#subject').prop('selectedIndex',0);
			clearOption("#bookOption","#book");
			clearOption("#chapterOption","#chapter");

		});
		$("#cancelSubjectButton").click(function(){
			$("#newSubject").hide();
			$("#newSubjectName").val("");		
		});

		$("#createBookButton").click(function(){
			$("#newBook").show();
			$('#book').prop('selectedIndex',0);
			clearOption("#chapterOption","#chapter");

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
					str = str+"<select id='book' '>";//onchange='Book()
					option = "<option value=0></option>";

					for(i=0;i<data.length;i++)
					{
						option = option +"<option value='"+data[i]["BookID"]+"'>"+ data[i]['BookName']+"</option>";
					}
					str = str+ option + "</select>";

					$("#bookOption").html(str);
				}
			});
			clearOption("#chapterOption","#chapter");
					
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
		function clearOption (divName,selectId) 
		{
			str="Choose Chapter Name:";
			str = str+"<select id="+selectId+">";
			option = "<option vlaue=0></option>";
			str = str+ option + "</select>";
			$(divName).html(str);
			
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
					str = str+"<select id='chapter'>";
					option = "<option vlaue=0></option>";

					for(i=0;i<data.length;i++)
					{
						option = option +"<option value='"+data[i]["ChapterID"]+"'>"+ data[i]['ChapterName']+"</option>";
					}
					str = str+ option + "</select>";

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
function selectCourse(e){
    let faculty=document.getElementById('faculty');
    let course=document.getElementById('courses');
    console.log(e);
    if(e==1){
        faculty.style.display="none";
        course.style.display="block";
    }else if(e==2){
        faculty.style.display="none";
        course.style.display="block";
    }

}
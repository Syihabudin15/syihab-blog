function handleCollapse(){
    const menu = document.getElementById("menu-wrapper");
    const anyClass = document.getElementsByClassName("anyclass");
    menu.classList.toggle("collapsed")
    for(let i = 0; i < anyClass.length; i++){
        anyClass[i].classList.toggle('inlined');
    }
}

tinymce.init({
    selector: '#textarea',
    images_upload_url: 'http://127.0.0.1:8000/blog/create',
    automatic_uploads: true,
    plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    mergetags_list: [
        { value: 'First.Name', title: 'First Name' },
        { value: 'Email', title: 'Email' },
    ],
});
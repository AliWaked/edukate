<x-dashboard.layout title='Add Course' :items="['Courses', 'Add Courses']">
    <style>
        section.add-courses .back a {
            text-transform: capitalize;
            border: 2px solid #2878EB;
            padding: 8px 15px;
            border-radius: 7px;
            transition: 0.5s;
            font-weight: 500px;
        }

        section.add-courses form {
            margin-top: 20px;
        }

        section.add-courses form label {
            display: block;
            font-size: 20px;
            font-weight: 500;
        }

        section.add-courses form input,
        section.add-courses form select,
        section.add-courses form textarea {
            margin-top: 5px;
            height: 40px;
            padding: 5px;
            outline: none;
            color: #2878EB;
            border: 2px solid #2878EB;
            border-radius: 5px;
            width: 300px;
        }

        section.add-courses form textarea {
            height: 120px;
            resize: none;
        }

        section.add-courses form button {
            border: 2px solid #2878EB;
            padding: 0px 20px;
            margin-top: 15px;
            width: 300px;
            height: 50px;
            color: #fff;
            background: #2878EB;
            text-transform: capitalize;
            font-size: 20px;
            margin-bottom: 15px;
        }

        .content-lesson {
            position: relative;
            width: fit-content;
            border-radius: 5px;
            /* pointer-events: none; */
            padding-right: 30px;
        }

        .content-lesson .icon-lesson {
            color: #2878EB;
            font-size: 20px;
            position: relative;
            z-index: 1000;
            left: 40%;
            top: 47px;

            cursor: pointer;
            transition: 0.3s;
            /* pointer-events: auto; */
        }

        /* .content-lesson .icon-lesson::after {
            content: '';
            position: absolute;
            height: 0px;
            top: -63px;
            left: 8px;
            width: 3px;
            background-color: #2878EB;
            transition: 0.5s;
        }

        .content-lesson .icon-lesson:hover::after {
            height: 220px;
        } */

        /* .content-lesson:hover {
            border-right: 3px solid #66666673;
        } */

        .content-lectures {
            position: relative;
            width: fit-content;
            border-radius: 5px;
            /* pointer-events: none; */
            padding-right: 30px;
        }

        .content-lectures .icon-lectures {
            color: #2878EB;
            font-size: 20px;
            position: relative;
            left: 44%;
            top: 46px;

            cursor: pointer;
            transition: 0.3s;
        }

        /* .content-lectures .icon-lectures::after {
            content: '';
            position: absolute;
            height: 0px;
            top: -63px;
            left: 8px;
            width: 3px;
            background-color: #2878EB;
            transition: 0.5s;
        }

        .content-lectures .icon-lectures:hover::after {
            height: 177px;
        } */

        .attachments {
            position: relative;
            width: fit-content;
            border-radius: 5px;
            padding-right: 30px;
        }

        .attachments i {
            color: #2878EB;
            font-size: 20px;
            position: relative;
            left: 44%;
            top: 47px;

            cursor: pointer;
            transition: 0.3s;
        }
    </style>
    <section class="add-courses">
        <div class="back">
            @php
                if (Config::get('fortify.guard') == 'admin') {
                    $back = 'dashboard.course.index';
                    $route = 'dashboard.course.store';
                } else {
                    $back = 'dashboard.instructor.course.index';
                    $route = 'dashboard.instructor.course.store';
                }
            @endphp
            <a href="{{ route($back) }}">back</a>
        </div>
        <form action="{{ route($route) }}" method="post" enctype="multipart/form-data">
            @csrf
            <x-dashboard.partials.input name='en[name]' label='Course Name en' id='name' :required="true"
                value="{{ old('en[name]') }}" />
            <x-dashboard.partials.input name='ar[name]' label='Course Name ar' id='name' :required="true"
                value="{{ old('ar[name]') }}" />
            <x-dashboard.partials.input type='number' name='price' label='Course Price' id='price'
                :required="true" value="{{ old('price') }}" />
            <x-dashboard.partials.input name='en[language]' label='Course Langouage en' id='language' :required="true"
                value="{{ old('language') }}" />
            <x-dashboard.partials.input name='ar[language]' label='Course Langouage ar' id='language' :required="true"
                value="{{ old('language') }}" />
            <x-dashboard.partials.select :items="['all level', 'beginners', 'intermediate', 'advanced']" name='skill_level' label='skill_level' id='skill_level'
                :required="true" />
            <x-dashboard.partials.select :items="$categories" name='category_id' label='category_id' id='category_id'
                :required="true" />
            <x-dashboard.partials.input name='course_image' type='file' accept='image/*' label='Course Image'
                id='course_image' :required="true" value="{{ old('course_image') }}" />
            <x-dashboard.partials.textarea id='description' name='en[descriptions]' label='Course Description en' />
            <x-dashboard.partials.textarea id='description' name='ar[descriptions]' label='Course Description ar' />
            <x-dashboard.partials.section-title title='Course Lessons' width='300px' />

            <div class="content-lesson" id="content-lesson">
                <i class="fas fa-plus-circle icon-lesson" id="icon-lesson" title="add lesson"></i>
                <x-dashboard.partials.input name='en_lesson_title[]]' label='Lesson Title' id='lesson_title'
                    placeholder='ex: Lesson One' value="{{ old('lesson_title') }}" />
                <x-dashboard.partials.input name='ar_lesson_title[]' label='Lesson Title ar' id='lesson_title'
                    placeholder='ex: Lesson One' value="{{ old('lesson_title') }}" />
                <div class="content-lectures" id="content-lectures">
                    <i class="fas fa-plus-circle icon-lectures" id="icon-lectures" title="add lecture"></i>
                    <x-dashboard.partials.input name='en_lectures[0][title][]' label='Lectures Title' id='lectures'
                        :required="true" placeholder='ex: Lesson one : Defining leadership'
                        value="{{ old('lectures') }}" />
                    <x-dashboard.partials.input name='en_lectures[0][file][]' type='file' label='Lectures Content'
                        id='lesson_title' title="chooice video" value="{{ old('lectures') }}" accept='video/*' />
                    {{-- <i class="fas fa-plus-circle icon-lectures" id="icon-lectures" title="add lecture"></i> --}}
                    <x-dashboard.partials.input name='ar_lectures[0][title][]' label='Lectures Title ar' id='lectures'
                        :required="true" placeholder='ex: Lesson one : Defining leadership'
                        value="{{ old('lectures') }}" />
                    <x-dashboard.partials.input name='ar_lectures[0][file][]' type='file' label='Lectures Content ar'
                        id='lesson_title' title="chooice video" value="{{ old('lectures') }}" accept='video/*' />
                </div>
                <div class="attachments">
                    <i class="fas fa-plus-circle attachment-icon" title="add attachment"></i>
                    <x-dashboard.partials.input name='ar_attachments[0][]' type='file' label='Attachment'
                        :required="true" title="chooice video" value="{{ old('attachments') }}" />
                    <x-dashboard.partials.input name='ar_attachments[0][]' type='file' label='Attachment ar'
                        :required="true" title="chooice video" value="{{ old('attachments') }}" />
                </div>
            </div>
            {{-- <x-dashboard.partials.section-title title='Add Attachments' width='300px' /> --}}

            <button type="submit">add course</button>
        </form>
    </section>
    <script>
        iconLesson = document.getElementById('icon-lesson');
        divLesson = document.getElementById('content-lesson');
        var number = 0;

        function addLesson() {
            divLectures = document.getElementsByClassName('content-lectures');
            iconlectures = document.getElementsByClassName('icon-lectures');
            for (let i = 0; i < divLectures.length; i++) {
                console.log(divLectures.length);
                for (let j = 0; j < iconlectures.length; j++) {
                    document.getElementsByClassName('icon-lectures')[j].onclick = function(e) {

                        let lecturesContent = document.createElement('div');
                        lecturesContent.innerHTML = `
                     <x-dashboard.partials.section-title title='New Lectures' width='300px' background='green' />
                    <x-dashboard.partials.input name='en_lectures[${number}][title][]' label='Lectures Title' id='lesson_title'
                        :required="true" placeholder='ex: Lesson one : Defining leadership'
                        value="{{ old('lesson_title') }}" />
                    <x-dashboard.partials.input name='en_lectures[${number}][file][]' type='file' label='Lectures Content'
                        id='lectures' :required="true" title="chooice video" value="{{ old('lectures') }}"
                        accept='video/*'/>
                    <x-dashboard.partials.input name='ar_lectures[${number}][title][]' label='Lectures Title ar' id='lesson_title'
                        :required="true" placeholder='ex: Lesson one : Defining leadership'
                        value="{{ old('lesson_title') }}" />
                    <x-dashboard.partials.input name='ar_lectures[${number}][file][]' type='file' label='Lectures Content ar'
                        id='lectures' :required="true" title="chooice video" value="{{ old('lectures') }}"
                        accept='video/*'/>
                `;
                        document.getElementsByClassName('content-lectures')[i].appendChild(lecturesContent);
                    }
                }
            }
        }



        iconLesson.onclick = function(e) {
            let lessonContent = document.createElement('div');
            num = ++number;
            lessonContent.innerHTML =
                `
            <x-dashboard.partials.section-title title='New Lesson' width='300px' background='#2878EB' />
            <x-dashboard.partials.input name='en_lesson_title[]' label='Lesson Title' id='lesson_title' :required="true"
                    placeholder='ex: Lesson One' value="{{ old('lesson_title') }}" />
            <x-dashboard.partials.input name='ar_lesson_title[]' label='Lesson Title' id='lesson_title ar' :required="true"
                    placeholder='ex: Lesson One' value="{{ old('lesson_title') }}" />
            <div class="content-lectures">
                <i class="fas fa-plus-circle icon-lectures" title="add lecture"></i>
                <x-dashboard.partials.input name='en_lectures[${num}][title][]' label='Lectures Title' 
                    :required="true" placeholder='ex: Lesson one : Defining leadership'
                    value="{{ old('lesson_title') }}" />
                <x-dashboard.partials.input name='en_lectures[${num}][file][]' type='file' label='Lectures Content'
                    id='lesson_title' :required="true" title="chooice video" value="{{ old('lesson_title') }}"
                    accept='video/*' />
                <x-dashboard.partials.input name='ar_lectures[${num}][title][]' label='Lectures Title ar' 
                    :required="true" placeholder='ex: Lesson one : Defining leadership'
                    value="{{ old('lesson_title') }}" />
                <x-dashboard.partials.input name='ar_lectures[${num}][file][]' type='file' label='Lectures Content ar'
                    id='lesson_title' :required="true" title="chooice video" value="{{ old('lesson_title') }}"
                    accept='video/*' />
                    <div class="attachments">
                            <i class="fas fa-plus-circle attachment-icon" title="add attachment"></i>
                            <x-dashboard.partials.input name='attachments[${num}][]' type='file' label='Attachment' :required="true"
                                title="chooice video" value="{{ old('attachments') }}" />
                            <x-dashboard.partials.input name='ar_attachments[${num}][]' type='file' label='Attachment ar' :required="true"
                                title="chooice video" value="{{ old('attachments') }}" />
                        </div>
            </div>
            `;
            document.getElementById('content-lesson').appendChild(
                lessonContent); //iv.insertAdjacentHTML( 'beforeend', str );
            addLesson();
        };
        addLesson();

        // document.getElementById('attachment-icon').onclick = function() {
        //     let attachment = document.createElement('div');
        //     attachment.innerHTML = `
    //     <x-dashboard.partials.input name='attachments[]' type='file' label='Attachment'
    //              :required="true" title="chooice video" value="{{ old('attachments') }}"
    //             />`;
        //     document.getElementById('attachments').appendChild(attachment);
        // }
        function attachment() {
            divLectures = document.getElementsByClassName('attachments');
            iconlectures = document.getElementsByClassName('attachment-icon');
            for (let i = 0; i < divLectures.length; i++) {
                for (let j = 0; j < iconlectures.length; j++) {
                    document.getElementsByClassName('attachment-icon')[j].onclick = function(e) {

                        let lecturesContent = document.createElement('div');
                        lecturesContent.innerHTML = `
                            <x-dashboard.partials.section-title title='New Attachment' width='300px' background='red' />
                            <x-dashboard.partials.input name='en_attachments[${number}][]' type='file' label='Attachment' :required="true"
                                title="chooice video" value="{{ old('attachments') }}" />
                            <x-dashboard.partials.input name='en_attachments[${number}][]' type='file' label='Attachment' :required="true"
                                title="chooice video" value="{{ old('attachments') }}" />
                        `;
                        document.getElementsByClassName('attachments')[i].appendChild(lecturesContent);
                    }
                }
            }
        }
        attachment();
    </script>
</x-dashboard.layout>

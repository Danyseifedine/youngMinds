function initLevelField(courses) {
    const courseSelect = document.querySelector('select[name="registration[course_id]"]');
    const levelInput = document.querySelector('input[name="registration[selected_level]"]');
    const levelGroup = levelInput?.closest('.form-group');

    if (!courseSelect || !levelInput || !levelGroup) return;

    function updateLevelField() {
        const courseId = parseInt(courseSelect.value);
        const course = courses.find(c => c.id === courseId);

        if (course && course.has_level) {
            levelGroup.style.display = 'block';
        } else {
            levelGroup.style.display = 'none';
            levelInput.value = '';
        }
    }

    courseSelect.addEventListener('change', updateLevelField);
    updateLevelField();
}

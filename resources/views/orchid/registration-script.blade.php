<script src="{{ asset('js/registration-dynamic-levels.js') }}"></script>
<script>
    function setupLevelField() {
        const courses = @json(\App\Models\Course::where('is_active', true)->get(['id', 'has_level']));
        initLevelField(courses);
    }

    // For initial page load
    document.addEventListener('DOMContentLoaded', setupLevelField);

    // For Orchid's Turbo navigation
    document.addEventListener('turbo:load', setupLevelField);
</script>

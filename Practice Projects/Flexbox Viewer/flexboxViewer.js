$(document).ready(function () {
    const flexContainer = $("#flex-container");

    // ADD Class Functions
    function addRow() {
        flexContainer.addClass("row");
    }

    function removeColumn() {
        flexContainer.removeClass("column");
    }

    $("#gap-0").click(function () {
        flexContainer.removeClass("gap-5");
        flexContainer.addClass("gap-0");
    });

    $("#gap-5").click(function () {
        flexContainer.addClass("gap-5");
    });

    $("#flex-row").click(function () {
        removeColumn();
    });

    $("#flex-column").click(function () {
        flexContainer.addClass("column");
    });
});

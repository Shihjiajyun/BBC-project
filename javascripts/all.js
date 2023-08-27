document.addEventListener("DOMContentLoaded", function () {
    const toggleButton = document.getElementById("toggleButton");
    const hiddenBlock = document.getElementById("hiddenBlock");
    const scrollContainer = document.getElementById("scrollContainer");
    let isHiddenBlockVisible = false;

    toggleButton.addEventListener("click", function () {
        isHiddenBlockVisible = !isHiddenBlockVisible;
        hiddenBlock.style.display = isHiddenBlockVisible ? "block" : "none";

        // 更改 scrollContainer 的寬度
        if (isHiddenBlockVisible) {
            scrollContainer.style.width = "calc(100vw - 140px)";
            // console.log("1");
        } else {
            scrollContainer.style.width = "calc(100vw - 50px)";
            // console.log("2");
        }
    });
    if (!isHiddenBlockVisible) {
        scrollContainer.style.width = "calc(100vw - 50px)";
    }
});

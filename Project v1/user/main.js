const inputs = document.querySelectorAll(".input")

function focusInput() {
    let parent = this.parentNode.parentNode
    parent.classList.add("focus")
}
function removeFocus() {
    let parent = this.parentNode.parentNode
    if(this.value == "") {
        parent.classList.remove("focus")
    }
}

inputs.forEach(input => {
    input.addEventListener("focus", focusInput)
    input.addEventListener("blur", removeFocus)
})
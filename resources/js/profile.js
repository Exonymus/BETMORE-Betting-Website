document.getElementById('upload-avatar-btn').addEventListener("click", function () {
    document.getElementById('upload-avatar-inp').click();
});
document.getElementById('upload-avatar-inp').onchange = function () {
    document.getElementById('avatar-img').src =
        URL.createObjectURL(document.getElementById('upload-avatar-inp').files[0]);
};

function setLevel(xp) {
    let level = (xp / 5000).toFixed(0);
    let exp = (xp % 5000) / 5000;
    document.getElementById('user-level').innerText = level.toString();
    document.querySelector('.percentage').innerHTML = `${exp * 100}%`;
    document.querySelector('.cover .progressbar').style.width = `${exp * 100}%`;
}

// setTimeout(() => {
//     setLevel(6000);
//     setTimeout(() => {
//         setLevel(3000);
//     }, 3000);
// }, 3000);

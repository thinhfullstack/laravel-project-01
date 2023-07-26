const changeLocation = document.querySelectorAll('.js-location-block')
const changeCantho = document.querySelector('.js-location-none')
const noneLocation = document.querySelector('.none-block-location')

changeLocation.forEach((item) => {
    item.addEventListener('click', () => {
        if(item.checked) {
            noneLocation.style.display = item.checked ? 'block' : 'none'
        }
    })
})

changeCantho.addEventListener('click', () => {
    if(changeCantho.checked) {
        noneLocation.style.display = 'none'
    }
})

